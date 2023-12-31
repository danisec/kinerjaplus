<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\PerhitunganKriteria;
use App\Models\RatioIndex;
use App\Services\PerhitunganKriteriaService;
use Illuminate\Http\Request;

class PerhitunganKriteriaController extends Controller
{
    /* 
     * Constructor
     */
    private $kriteria;
    private $perhitunganKriteria;
    private $perhitunganKriteriaService;

    public function __construct(PerhitunganKriteriaService $perhitunganKriteriaService)
    {
        $this->kriteria = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $this->perhitunganKriteria = PerhitunganKriteria::with('kriteriaPertama', 'kriteriaKedua')->orderBy('kriteria_pertama', 'asc')->get();
        $this->perhitunganKriteriaService = $perhitunganKriteriaService;
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

        try {
            PerhitunganKriteria::truncate();

            foreach ($matriks as $key => $value) {
                $kriteriaPertama = $key;
                foreach ($value as $key => $nilaiKriteria) {
                    $kriteriaKedua = $key;

                    PerhitunganKriteria::updateOrCreate(
                        ['kriteria_pertama' => $kriteriaPertama, 'kriteria_kedua' => $kriteriaKedua],
                        ['nilai_kriteria' => $nilaiKriteria]
                    );
                }
            }

            $notif = notify()->success('Data perbandingan kriteria berhasil disimpan');
            return redirect()->route('perhitunganKriteria.hasil')->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Data perbandingan kriteria gagal disimpan');
            return redirect()->route('perhitunganKriteria.index')->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function hasil()
    {
        $ratioIndex = RatioIndex::orderBy('ordo_matriks', 'asc')->get();
        $perhitunganKriteria = $this->perhitunganKriteria;
        $jumlahKriteria = Kriteria::count();

        $totalKolomKriteria = $this->perhitunganKriteriaService->totalKolomKriteria($perhitunganKriteria);
        $normalisasiMatriks = $this->perhitunganKriteriaService->normalisasiMatriks($perhitunganKriteria, $totalKolomKriteria);
        $totalBarisNormalisasiMatriks = $this->perhitunganKriteriaService->totalBarisNormalisasiMatriks($normalisasiMatriks);
        $bobotPrioritasKriteria= $this->perhitunganKriteriaService->bobotPrioritasKriteria($totalBarisNormalisasiMatriks, $jumlahKriteria);
        $consistencyMeasures= $this->perhitunganKriteriaService->consistencyMeasure($perhitunganKriteria, $bobotPrioritasKriteria);
        $totalConsistencyMeasures= $this->perhitunganKriteriaService->totalConsistencyMeasures($consistencyMeasures, $jumlahKriteria);
        $consistencyRatio= $this->perhitunganKriteriaService->consistencyRatio($totalConsistencyMeasures, $jumlahKriteria, $ratioIndex);
        $consistencyResult= $this->perhitunganKriteriaService->consistencyResult($consistencyRatio);

        return view('pages.dashboard.perhitungan-kriteria.hasil', [
            'title' => 'Hasil Perhitungan Kriteria',
            'kriteria' => $this->kriteria,
            'perhitunganKriteria' => $perhitunganKriteria,
            'totalKolomKriteria' => $totalKolomKriteria,
            'normalisasiMatriks' => $normalisasiMatriks,
            'bobotPrioritasKriteria' => $bobotPrioritasKriteria,
            'consistencyMeasures' => $consistencyMeasures,
            'totalConsistencyMeasures' => $totalConsistencyMeasures,
            'consistencyData' => $consistencyRatio,
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
