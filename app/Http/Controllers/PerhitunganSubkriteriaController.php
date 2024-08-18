<?php

namespace App\Http\Controllers;

use App\Models\PerhitunganSubkriteria;
use App\Models\RatioIndex;
use App\Models\Subkriteria;
use App\Services\PerhitunganSubkriteriaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PerhitunganSubkriteriaController extends Controller
{
    /* 
     * Constructor
     */
    private $perhitunganSubkriteria;
    private $perhitunganSubkriteriaService;

    public function __construct(PerhitunganSubkriteriaService $perhitunganSubkriteriaService )
    {
        $this->perhitunganSubkriteria = PerhitunganSubkriteria::with('subkriteriaPertama', 'subkriteriaKedua')->orderBy('subkriteria_pertama', 'asc')->get();
        $this->perhitunganSubkriteriaService = $perhitunganSubkriteriaService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subkriteria = Subkriteria::with(['kriteria'])->orderBy('kode_kriteria', 'asc')->get()->groupBy('kode_kriteria');
        
        return view('pages.kepala-sekolah.perhitungan-subkriteria.index', [
            'title' => 'Perbandingan Subkriteria',
            'subkriteria' => $subkriteria,
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
            PerhitunganSubkriteria::truncate();

            foreach ($matriks as $kodeKriteria => $subkriteriaArray) {
                foreach ($subkriteriaArray as $kodeSubkriteriaPertama => $subkriteriaPertama) {
                    foreach ($subkriteriaPertama as $kodeSubkriteriaKedua => $nilaiSubkriteria) {

                        PerhitunganSubkriteria::updateOrCreate(
                            [
                                'kode_kriteria' => $kodeKriteria,
                                'subkriteria_pertama' => $kodeSubkriteriaPertama,
                                'subkriteria_kedua' => $kodeSubkriteriaKedua,
                            ],
                            ['nilai_subkriteria' => $nilaiSubkriteria]
                        );
                    }
                }
            }

            $notif = notify()->success('Data perbandingan subkriteria berhasil disimpan');
            return redirect()->route('perhitunganSubkriteria.hasil')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Data perbandingan subkriteria gagal disimpan');
            return redirect()->route('perhitunganSubkriteria.index')->withInput()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function hasil()
    {
        $result = Cache::remember('hasil_perhitungan_subkriteria', now()->addMinutes(30), function () {
            $ratioIndex = RatioIndex::orderBy('ordo_matriks', 'asc')->get();
            $perhitunganSubkriteria = $this->perhitunganSubkriteria;
    
            $totalKolomSubkriteria = $this->perhitunganSubkriteriaService->totalKolomSubkriteria($perhitunganSubkriteria);
            $normalisasiMatriks = $this->perhitunganSubkriteriaService->normalisasiMatriks($perhitunganSubkriteria, $totalKolomSubkriteria);
            
            $totalBarisNormalisasiMatriks = $this->perhitunganSubkriteriaService->totalBarisNormalisasiMatriks($normalisasiMatriks);
            $countSubkriteriaByKriteria = $this->perhitunganSubkriteriaService->countSubkriteriaByKriteria($totalBarisNormalisasiMatriks);
            
            $bobotPrioritasSubkriteria = $this->perhitunganSubkriteriaService->bobotPrioritasSubkriteria($totalBarisNormalisasiMatriks, $countSubkriteriaByKriteria);
            $calculateTotalBobotSubkriteria = $this->perhitunganSubkriteriaService->calculateTotalBobotSubkriteria($bobotPrioritasSubkriteria);
            
            $consistencyMeasures = $this->perhitunganSubkriteriaService->consistencyMeasures($perhitunganSubkriteria, $bobotPrioritasSubkriteria);
            $totalConsistencyMeasures = $this->perhitunganSubkriteriaService->totalConsistencyMeasures($consistencyMeasures, $countSubkriteriaByKriteria);
    
            $consistencyRatio = $this->perhitunganSubkriteriaService->consistencyRatio($totalConsistencyMeasures, $countSubkriteriaByKriteria, $ratioIndex);
            $consistencyResult = $this->perhitunganSubkriteriaService->consistencyResult($consistencyRatio);

            // Mengembalikan data yang akan di simpan dalam cache
            return [
                'subkriteria' => Subkriteria::with(['kriteria'])->orderBy('kode_kriteria', 'asc')->get()->groupBy('kode_kriteria'),
                'perhitunganSubkriteria' => $perhitunganSubkriteria,
                'totalKolomSubkriteria' => $totalKolomSubkriteria,
                'normalisasiMatriks' => $normalisasiMatriks,
                'bobotPrioritasSubkriteria' => $bobotPrioritasSubkriteria,
                'totalBobotPrioritas' => $calculateTotalBobotSubkriteria,
                'consistencyMeasures' => $consistencyMeasures,
                'totalConsistencyMeasures' => $totalConsistencyMeasures,
                'consistencyRatio' => $consistencyRatio,
                'consistencyResult' => $consistencyResult,
            ];
        });

        return view('pages.kepala-sekolah.perhitungan-subkriteria.hasil', array_merge(['title' => 'Hasil Perbandingan Subkriteria'], $result));
    }

        /**
     * Display the specified resource.
     */
    public function pedoman()
    {
        $intensitasKepentingan = [
            [
                'nilai' => '1',
                'definisi' => 'Elemen yang satu sama pentingnya dibanding dengan elemen yang lain (equal importance).'
            ],
            [
                'nilai' => '3',
                'definisi' => 'Elemen yang satu sedikit lebih penting dari pada elemen yang lain (moderate more importance).'
            ],
            [
                'nilai' => '5',
                'definisi' => 'Elemen yang satu jelas lebih penting dari pada elemen yang lain (essential, strong more importance).'
            ],
            [
                'nilai' => '7',
                'definisi' => 'Elemen yang satu sangat jelas lebih penting dari pada elemen yang lain (demonstrated importance).'
            ],
            [
                'nilai' => '9',
                'definisi' => 'Elemen yang satu mutlak lebih penting dari pada elemen yang lain (absolutely more importance).'
            ],
            [
                'nilai' => '2, 4, 6, 8',
                'definisi' => 'Apabila ragu-ragu antara dua nilai yang berdekatan (grey area).'
            ],
        ];

        return view('pages.kepala-sekolah.perhitungan-subkriteria.pedoman', [
            'title' => 'Pedoman Pengisian Perbandingan Subkriteria',
            'intensitasKepentingan' => $intensitasKepentingan,
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
