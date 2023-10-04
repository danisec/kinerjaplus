<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\PerhitunganKriteria;
use App\Models\RatioIndex;
use Illuminate\Http\Request;

class PerhitunganKriteriaController extends Controller
{
    /* 
     * Constructor
     */
    private $kriteria;
    private $perhitunganKriteria;

    public function __construct()
    {
        $this->kriteria = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $this->perhitunganKriteria = PerhitunganKriteria::with('kriteriaPertama', 'kriteriaKedua')->orderBy('kriteria_pertama', 'asc')->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.perhitungan-kriteria.index', [
            'title' => 'Perhitungan Kriteria',
            'kriteria' => $this->kriteria,
            'perhitunganKriteria' => $this->perhitunganKriteria,
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

        // Clear the existing records
        PerhitunganKriteria::truncate();

        foreach ($matriks as $key => $value) {
            $kriteriaPertama = $key;
            foreach ($value as $key => $nilaiKriteria) {
                $kriteriaKedua = $key;

                // Create or update the record
                PerhitunganKriteria::updateOrCreate(
                    ['kriteria_pertama' => $kriteriaPertama, 'kriteria_kedua' => $kriteriaKedua],
                    ['nilai_kriteria' => $nilaiKriteria]
                );
            }
        }

        $notif = notify()->success('Data perbandingan kriteria berhasil disimpan');
        return redirect()->route('perhitunganKriteria.hasil')->with('notif', $notif);
    }

    /**
     * Display the specified resource.
     */
    public function hasil()
    {
        $ratioIndex = RatioIndex::orderBy('ordo_matriks', 'asc')->get();
        $perhitunganKriteria = $this->perhitunganKriteria;

        /* Menghitung total per kolom kriteria */
        $columnTotals = [];
        foreach ($perhitunganKriteria as $item) {
            $kriteriaKedua = $item->kriteriaKedua->id_kriteria;
            $nilaiKriteria = $item->nilai_kriteria;

            // Inisialisasi total kolom jika belum ada
            if (!isset($columnTotals[$kriteriaKedua])) {
                $columnTotals[$kriteriaKedua] = 0;
            }

            // Tambahkan nilai ke total kolom
            $columnTotals[$kriteriaKedua] += $nilaiKriteria;
        }

        /* Normalisasi matriks kriteria
        Rumus = nilai kriteria / total kolom */
        $normalizedMatrix = [];
        foreach ($perhitunganKriteria as $item) {
            $kriteriaPertama = $item->kriteriaPertama->id_kriteria;
            $kriteriaKedua = $item->kriteriaKedua->id_kriteria;
            $nilaiKriteria = $item->nilai_kriteria;

            // Normalisasi nilai
            $normalizedValue = $nilaiKriteria / $columnTotals[$kriteriaKedua];

            // Simpan nilai normalisasi dalam matriks
            $normalizedMatrix[$item->kriteriaPertama->id_kriteria][$kriteriaKedua] = $normalizedValue;

            // Dapatkan 4 angka di belakang koma
            $normalizedMatrix[$item->kriteriaPertama->id_kriteria][$kriteriaKedua] = round($normalizedMatrix[$item->kriteriaPertama->id_kriteria][$kriteriaKedua], 4);
        }

        /* Menjumlahkan nilai per baris kriteria dari matriks normalisasi */
        $rowTotals = [];
        foreach ($normalizedMatrix as $kriteriaPertama => $kriteriaKedua) {
            foreach ($kriteriaKedua as $kriteria => $nilai) {
                // Inisialisasi total baris jika belum ada
                if (!isset($rowTotals[$kriteriaPertama])) {
                    $rowTotals[$kriteriaPertama] = 0;
                }

                // Tambahkan nilai ke total baris
                $rowTotals[$kriteriaPertama] += $nilai;
            }
        }

        /* Menghitung jumlah kriteria (banyaknya kriteria) */
        $jumlahKriteria = Kriteria::count();

        /* Menghitung bobot prioritas per kriteria */
        $bobotPrioritas = [];
        foreach ($rowTotals as $kriteriaPertama => $total) {
            $bobotPrioritas[$kriteriaPertama] = $total / $jumlahKriteria;
        }

        /* Menghitung Consistency Measure (CM)
        Rumus = (Angka kriteriaPerhitungan per setiap baris * bobot prioritas per setiap kolom) + (Angka kriteriaPerhitungan per setiap baris * bobot prioritas per setiap kolom) + ... */
        $consistencyMeasures = [];
        foreach ($perhitunganKriteria as $item) {
            $kriteriaPertama = $item->kriteriaPertama->id_kriteria;
            $kriteriaKedua = $item->kriteriaKedua->id_kriteria;
            $nilaiKriteria = $item->nilai_kriteria;

            // Inisialisasi CM jika belum ada
            if (!isset($consistencyMeasures[$kriteriaPertama])) {
                $consistencyMeasures[$kriteriaPertama] = 0;
            }

            // Hitung CM
            $consistencyMeasures[$kriteriaPertama] += $nilaiKriteria * $bobotPrioritas[$kriteriaKedua];

            // Dapatkan 4 angka di belakang koma
            $consistencyMeasures[$kriteriaPertama] = round($consistencyMeasures[$kriteriaPertama], 4);
        }

        /* Menghitung total jumlah Consistency Measure (CM)
        Rumus = total jumlah kolom CM / jumlah kriteria */
        $totalConsistencyMeasures = array_sum($consistencyMeasures) / $jumlahKriteria;

        /* Menghitung Consistency Index (CI)
        Rumus = (total jumlah kolom CM - jumlah kriteria) / (jumlah kriteria - 1) */
        $consistencyIndex = ($totalConsistencyMeasures - $jumlahKriteria) / ($jumlahKriteria - 1);

        /* Mendapatkan Ratio Index (RI) dari database */
        $ratioIndexByKriteria = $ratioIndex[$jumlahKriteria - 1]->nilai_ratio_index;

        /* Menghitung Consistency Ratio (CR)
        Rumus = Consistency Index (CI) / Ratio Index (RI) */
        $consistencyRatio = $consistencyIndex / $ratioIndexByKriteria;

        /* Menghitung Hasil Dinyatakan Konsisten atau Tidak
        Rumus = Consistency Ratio (CR) <= 0.1 ? 'Konsisten' : 'Tidak Konsisten' */
        $consistencyResult = $consistencyRatio <= 0.1 ? 'Konsisten' : 'Tidak Konsisten';

        /* Menyimpan variabel-variabel dalam bentuk array */
        $consistencyData = [
            'Consistency Index (CI)' => round($consistencyIndex, 4),
            'Ratio Index (RI)' => $ratioIndexByKriteria,
            'Consistency Ratio (CR)' => round($consistencyRatio, 4),
        ];

        return view('pages.dashboard.perhitungan-kriteria.hasil', [
            'title' => 'Hasil Perhitungan Kriteria',
            'kriteria' => $this->kriteria,
            'perhitunganKriteria' => $perhitunganKriteria,
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
    public function show(PerhitunganKriteria $perhitunganKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerhitunganKriteria $perhitunganKriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerhitunganKriteria $perhitunganKriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerhitunganKriteria $perhitunganKriteria)
    {
        //
    }
}
