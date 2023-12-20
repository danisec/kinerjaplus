<?php

namespace App\Http\Controllers;

use App\Models\BobotPrioritasSubkriteria;
use App\Models\PerhitunganSubkriteria;
use App\Models\RatioIndex;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class PerhitunganSubkriteriaController extends Controller
{
    /* 
     * Constructor
     */
    private $subkriteria;
    private $perhitunganSubkriteria;

    public function __construct()
    {
        $this->subkriteria = Subkriteria::orderBy('kode_kriteria', 'asc')->get();
        $this->perhitunganSubkriteria = PerhitunganSubkriteria::with('subkriteriaPertama', 'subkriteriaKedua')->orderBy('subkriteria_pertama', 'asc')->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.perhitungan-subkriteria.index', [
            'title' => 'Perhitungan Subkriteria',
            'subkriteria' => $this->subkriteria,
            'perhitunganSubkriteria' => $this->perhitunganSubkriteria,
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
            'matriks' => 'required'
        ]);

        $matriks = $validatedData['matriks'];

        try {
            // Clear the existing records
            PerhitunganSubkriteria::truncate();

            foreach ($matriks as $key => $value) {
                $subkriteriaPertama = $key;
                foreach ($value as $key => $nilaiSubkriteria) {
                    $subkriteriaKedua = $key;

                    // Create or update the record
                    PerhitunganSubkriteria::updateOrCreate(
                        ['subkriteria_pertama' => $subkriteriaPertama, 'subkriteria_kedua' => $subkriteriaKedua],
                        ['nilai_subkriteria' => $nilaiSubkriteria]
                    );
                }
            }

            $notif = notify()->success('Data perbandingan sub kriteria berhasil disimpan');
            return redirect()->route('perhitunganSubkriteria.hasil')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Data perbandingan sub kriteria gagal disimpan');
            return redirect()->route('perhitunganSubkriteria.index')->withInput()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function hasil()
    {
        $ratioIndex = RatioIndex::orderBy('ordo_matriks', 'asc')->get();
        $perhitunganSubkriteria = $this->perhitunganSubkriteria;

        /* Menghitung total per kolom sub kriteria */
        $columnTotals = [];
        foreach ($perhitunganSubkriteria as $item) {
            $subkriteriaKedua = $item->subkriteriaKedua->id_subkriteria;
            $nilaiSubkriteria = $item->nilai_subkriteria;

            // Inisialisasi total kolom jika belum ada
            if (!isset($columnTotals[$subkriteriaKedua])) {
                $columnTotals[$subkriteriaKedua] = 0;
            }

            // Tambahkan nilai ke total kolom
            $columnTotals[$subkriteriaKedua] += $nilaiSubkriteria;
        }

        /* Normalisasi matriks sub kriteria
        Rumus = nilai sub kriteria / total kolom */
        $normalizedMatrix = [];
        foreach ($perhitunganSubkriteria as $item) {
            $subkriteriaPertama = $item->subkriteriaPertama->id_subkriteria;
            $subkriteriaKedua = $item->subkriteriaKedua->id_subkriteria;
            $nilaiSubkriteria = $item->nilai_subkriteria;

            // Normalisasi nilai
            $normalizedValue = $nilaiSubkriteria / $columnTotals[$subkriteriaKedua];

            // Simpan nilai normalisasi dalam matriks
            $normalizedMatrix[$item->subkriteriaPertama->id_subkriteria][$subkriteriaKedua] = $normalizedValue;

            // Dapatkan 4 angka di belakang koma
            $normalizedMatrix[$item->subkriteriaPertama->id_subkriteria][$subkriteriaKedua] = substr($normalizedMatrix[$item->subkriteriaPertama->id_subkriteria][$subkriteriaKedua], 0, 6);
        }

        /* Menjumlahkan nilai per baris kriteria dari matriks normalisasi */
        $rowTotals = [];
        foreach ($normalizedMatrix as $subkriteriaPertama => $subkriteriaKedua) {
            foreach ($subkriteriaKedua as $subkriteria => $nilai) {
                // Inisialisasi total baris jika belum ada
                if (!isset($rowTotals[$subkriteriaPertama])) {
                    $rowTotals[$subkriteriaPertama] = 0;
                }

                // Tambahkan nilai ke total baris
                $rowTotals[$subkriteriaPertama] += $nilai;
            }
        }

        /* Menghitung jumlah sub kriteria (banyaknya sub kriteria) */
        $jumlahSubkriteria = Subkriteria::count();

        /* Menghitung bobot prioritas per sub kriteria */
        $bobotPrioritas = [];
        foreach ($rowTotals as $subkriteriaPertama => $total) {
            $bobotPrioritas[$subkriteriaPertama] = $total / $jumlahSubkriteria;
        }

        // Simpan atau ubah data bobot prioritas sub kriteria ke database
        try {
            BobotPrioritasSubkriteria::truncate();
            
            foreach ($bobotPrioritas as $subkriteriaPertama => $bobot) {
                BobotPrioritasSubkriteria::updateOrCreate(
                    ['id_subkriteria' => $subkriteriaPertama],
                    ['bobot_prioritas' => $bobot]
                );
            }
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data bobot prioritas kriteria');
            return back()->with('notif', $notif);
        }

        /* Menghitung Consistency Measure (CM)
        Rumus = (Angka subkriteriaPerhitungan per setiap baris * bobot prioritas per setiap kolom) + (Angka subkriteriaPerhitungan per setiap baris * bobot prioritas per setiap kolom) + ... */
        $consistencyMeasures = [];
        foreach ($perhitunganSubkriteria as $item) {
            $subkriteriaPertama = $item->subkriteriaPertama->id_subkriteria;
            $subkriteriaKedua = $item->subkriteriaKedua->id_subkriteria;
            $nilaiSubkriteria = $item->nilai_subkriteria;

            // Inisialisasi CM jika belum ada
            if (!isset($consistencyMeasures[$subkriteriaPertama])) {
                $consistencyMeasures[$subkriteriaPertama] = 0;
            }

            // Hitung CM
            $consistencyMeasures[$subkriteriaPertama] += $nilaiSubkriteria * $bobotPrioritas[$subkriteriaKedua];

            // Dapatkan 4 angka di belakang koma
            $consistencyMeasures[$subkriteriaPertama] = substr($consistencyMeasures[$subkriteriaPertama], 0, 6);
        }

        /* Menghitung total jumlah Consistency Measure (CM)
        Rumus = total jumlah kolom CM / jumlah sub kriteria */
        $totalConsistencyMeasures = array_sum($consistencyMeasures) / $jumlahSubkriteria;

        /* Menghitung Consistency Index (CI)
        Rumus = (total jumlah kolom CM - jumlah sub kriteria) / (jumlah sub kriteria - 1) */
        $consistencyIndex = ($totalConsistencyMeasures - $jumlahSubkriteria) / ($jumlahSubkriteria - 1);

        /* Mendapatkan Ratio Index (RI) dari database */
        $ratioIndexByKriteria = $ratioIndex[$jumlahSubkriteria - 1]->nilai_ratio_index;

        /* Menghitung Consistency Ratio (CR)
        Rumus = Consistency Index (CI) / Ratio Index (RI) */
        $consistencyRatio = $consistencyIndex / $ratioIndexByKriteria;

        /* Menghitung Hasil Dinyatakan Konsisten atau Tidak
        Rumus = Consistency Ratio (CR) <= 0.1 ? 'Konsisten' : 'Tidak Konsisten' */
        $consistencyResult = $consistencyRatio <= 0.1 ? 'Konsisten' : 'Tidak Konsisten';

        /* Menyimpan variabel-variabel dalam bentuk array */
        $consistencyData = [
            'Consistency Index (CI)' => substr($consistencyIndex, 0, 6),
            'Ratio Index (RI)' => $ratioIndexByKriteria,
            'Consistency Ratio (CR)' => substr($consistencyRatio, 0, 6),
        ];

        return view('pages.dashboard.perhitungan-subkriteria.hasil', [
            'title' => 'Hasil Perhitungan Sub kriteria',
            'subkriteria' => $this->subkriteria,
            'perhitunganSubkriteria' => $perhitunganSubkriteria,
            'columnTotals' => $columnTotals,
            'normalizedMatrix' => $normalizedMatrix,
            'prioritas' => $bobotPrioritas,
            'consistencyMeasures' => $consistencyMeasures,
            'totalConsistencyMeasures' => $totalConsistencyMeasures,
            'consistencyData' => $consistencyData,
            'consistencyResult' => $consistencyResult,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PerhitunganSubkriteria $perhitunganSubkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerhitunganSubkriteria $perhitunganSubkriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerhitunganSubkriteria $perhitunganSubkriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerhitunganSubkriteria $perhitunganSubkriteria)
    {
        //
    }
}
