<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\BobotPrioritasAlternatif;
use App\Models\Kriteria;
use App\Models\PerhitunganAlternatif;
use Illuminate\Http\Request;

class PerhitunganAlternatifController extends Controller
{
    /* 
     * Constructor
     */
    private $kriteria;
    private $alternatif;
    private $perhitunganAlternatif;

    public function __construct()
    {
        $this->kriteria = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $this->alternatif = Alternatif::orderBy('kode_alternatif', 'asc')->get();
        $this->perhitunganAlternatif = PerhitunganAlternatif::with('alternatifPertama', 'alternatifKedua')->orderBy('alternatif_pertama', 'asc')->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.perhitungan-alternatif.index', [
            'title' => 'Perhitungan Alternatif',
            'kriteria' => $this->kriteria,
            'alternatif' => $this->alternatif,
            'perhitunganAlternatif' => $this->perhitunganAlternatif,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matriks' => 'required|array'
        ]);

        $matriks = $validatedData['matriks'];

        try {
            // Clear the existing records
            PerhitunganAlternatif::truncate();

            foreach ($matriks as $kriteria => $dataKriteria) {
                foreach ($dataKriteria as $alternatifPertama => $dataAlternatif) {
                    foreach ($dataAlternatif as $alternatifKedua => $nilaiAlternatif) {
                        // Create or update the record
                        PerhitunganAlternatif::updateOrCreate(
                            [
                                'kode_kriteria' => $kriteria,
                                'alternatif_pertama' => $alternatifPertama,
                                'alternatif_kedua' => $alternatifKedua,
                            ],
                            ['nilai_alternatif' => $nilaiAlternatif]
                        );
                    }
                }
            }

            $notif = notify()->success('Data perbandingan alternatif berhasil disimpan');
            return redirect()->route('perhitunganAlternatif.hasil')->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Data perbandingan alternatif gagal disimpan');
            return redirect()->route('perhitunganAlternatif.index')->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function hasil()
    {
        $kriteria = $this->kriteria;
        $alternatif = $this->alternatif;
        $perhitunganAlternatif = $this->perhitunganAlternatif;

        /* Menghitung total per kolom alternatif  */
        $columnTotals = [];
        foreach ($perhitunganAlternatif as $item) {
            $kodeKriteria = $item->kode_kriteria;
            $alternatifKedua = $item->alternatif_kedua;
            $nilaiAlternatif = $item->nilai_alternatif;

            if (!isset($columnTotals[$kodeKriteria][$alternatifKedua])) {
                $columnTotals[$kodeKriteria][$alternatifKedua] = 0;
            }

            $columnTotals[$kodeKriteria][$alternatifKedua] += $nilaiAlternatif;

            // Urutkan kriteria secara ascending
            ksort($columnTotals);
        }

        /* Normalisasi matriks alternatif
           Rumus = nilai alternatif / total kolom
         */
        $normalizedMatrix = [];
        foreach ($perhitunganAlternatif as $item) {
            $kodeKriteria = $item->kode_kriteria;
            $alternatifPertama = $item->alternatif_pertama;
            $alternatifKedua = $item->alternatif_kedua;
            $nilaiAlternatif = $item->nilai_alternatif;

            if (!isset($normalizedMatrix[$kodeKriteria][$alternatifPertama][$alternatifKedua])) {
                $normalizedMatrix[$kodeKriteria][$alternatifPertama][$alternatifKedua] = 0;
            }

            $normalizedMatrix[$kodeKriteria][$alternatifPertama][$alternatifKedua] = $nilaiAlternatif / $columnTotals[$kodeKriteria][$alternatifKedua];

            // Dapatkan 4 angka di belakang koma
            $normalizedMatrix[$kodeKriteria][$alternatifPertama][$alternatifKedua] = substr($normalizedMatrix[$kodeKriteria][$alternatifPertama][$alternatifKedua], 0, 6);
        }

        /* Menjumlahkan nilai per baris alternatif dari matriks normalisasi */
        $rowTotals = [];
        foreach ($normalizedMatrix as $kodeKriteria => $matrixKriteria) {
            foreach ($matrixKriteria as $alternatifPertama => $matrixAlternatif) {
                if (!isset($rowTotals[$kodeKriteria][$alternatifPertama])) {
                    $rowTotals[$kodeKriteria][$alternatifPertama] = 0;
                }

                $rowTotals[$kodeKriteria][$alternatifPertama] = array_sum($matrixAlternatif);

                // Dapatkan 4 angka di belakang koma
                $rowTotals[$kodeKriteria][$alternatifPertama] = substr($rowTotals[$kodeKriteria][$alternatifPertama], 0, 6);
            }
        }

        // Menghitung jumlah alternatif
        $jumlahAlternatif = Alternatif::count();

        /* Menghitung Bobot
           Rumus = total baris / jumlah alternatif
         */
        $bobot = [];
        foreach ($rowTotals as $kodeKriteria => $matrixKriteria) {
            foreach ($matrixKriteria as $alternatifPertama => $total) {
                $bobot[$kodeKriteria][$alternatifPertama] = $total / $jumlahAlternatif;

                // Dapatkan 4 angka di belakang koma
                $bobot[$kodeKriteria][$alternatifPertama] = substr($bobot[$kodeKriteria][$alternatifPertama], 0, 6);
            }
        }

        // Simpan atau ubah data bobot prioritas alternatif ke database
        try {
            // Clear the existing records
            BobotPrioritasAlternatif::truncate();

            foreach ($bobot as $kodeKriteria => $matrixKriteria) {
                foreach ($matrixKriteria as $dataAlternatif => $bobotPrioritas) {
                    // Create or update the record
                    BobotPrioritasAlternatif::updateOrCreate(
                        [
                            'kode_kriteria' => $kodeKriteria,
                            'kode_alternatif' => $dataAlternatif,
                        ],
                        ['bobot_prioritas' => $bobotPrioritas]
                    );
                }
            }
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data bobot prioritas alternatif');
            return back()->with('notif', $notif);
        }

        return view('pages.dashboard.perhitungan-alternatif.hasil', [
            'title' => 'Hasil Perhitungan Alternatif',
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'perhitunganAlternatif' => $perhitunganAlternatif,
            'columnTotals' => $columnTotals,
            'normalizedMatrix' => $normalizedMatrix,
            'bobot' => $bobot,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PerhitunganAlternatif $perhitunganAlternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerhitunganAlternatif $perhitunganAlternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerhitunganAlternatif $perhitunganAlternatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerhitunganAlternatif $perhitunganAlternatif)
    {
        //
    }
}
