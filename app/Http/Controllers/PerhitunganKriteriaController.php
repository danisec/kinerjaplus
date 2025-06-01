<?php

namespace App\Http\Controllers;

use App\Models\BobotPrioritasKriteria;
use App\Models\Kriteria;
use App\Models\PerhitunganKriteria;
use App\Models\RatioIndex;
use App\Services\PerhitunganKriteriaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        $intensitasKepentingan = [
            [
                'key' => '1',
                'value' => '1 - Sama penting',
            ],
            [
                'key' => '2',
                'value' => '2 - Mendekati sedikit lebih penting (Grey Area)',
            ],
            [
                'key' => '3',
                'value' => '3 - Sedikit lebih penting',
            ],
            [
                'key' => '4',
                'value' => '4 - Mendekati lebih penting (Grey Area)',
            ],
            [
                'key' => '5',
                'value' => '5 - Lebih penting',
            ],
            [
                'key' => '6',
                'value' => '6 - Mendekati jelas lebih penting (Grey Area)',
            ],
            [
                'key' => '7',
                'value' => '7 - Jelas lebih penting',
            ],
            [
                'key' => '8',
                'value' => '8 - Mendekati mutlak penting (Grey Area)',
            ],
            [
                'key' => '9',
                'value' => '9 - Mutlak penting',
            ],
        ];

        return view('pages.kepala-sekolah.perhitungan-kriteria.index', [
            'title' => 'Perbandingan Kriteria',
            'intensitasKepentingan' => $intensitasKepentingan,
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
        $result = Cache::remember('hasil_perhitungan_kriteria', now()->addMinutes(30), function () {
            $ratioIndex = RatioIndex::orderBy('ordo_matriks', 'asc')->get();
            $perhitunganKriteria = $this->perhitunganKriteria;
            $jumlahKriteria = Kriteria::count();
    
            $totalKolomKriteria = $this->perhitunganKriteriaService->totalKolomKriteria($perhitunganKriteria);
            $normalisasiMatriks = $this->perhitunganKriteriaService->normalisasiMatriks($perhitunganKriteria, $totalKolomKriteria);
            $totalBarisNormalisasiMatriks = $this->perhitunganKriteriaService->totalBarisNormalisasiMatriks($normalisasiMatriks);
            $bobotPrioritasKriteria = $this->perhitunganKriteriaService->bobotPrioritasKriteria($totalBarisNormalisasiMatriks, $jumlahKriteria);
            $consistencyMeasures = $this->perhitunganKriteriaService->consistencyMeasure($perhitunganKriteria, $bobotPrioritasKriteria);
            $totalConsistencyMeasures = $this->perhitunganKriteriaService->totalConsistencyMeasures($consistencyMeasures, $jumlahKriteria);
            $consistencyRatio = $this->perhitunganKriteriaService->consistencyRatio($totalConsistencyMeasures, $jumlahKriteria, $ratioIndex);
            $consistencyResult = $this->perhitunganKriteriaService->consistencyResult($consistencyRatio);

            return [
                'kriteria' => $this->kriteria,
                'perhitunganKriteria' => $perhitunganKriteria,
                'totalKolomKriteria' => $totalKolomKriteria,
                'normalisasiMatriks' => $normalisasiMatriks,
                'bobotPrioritasKriteria' => $bobotPrioritasKriteria,
                'consistencyMeasures' => $consistencyMeasures,
                'totalConsistencyMeasures' => $totalConsistencyMeasures,
                'consistencyData' => $consistencyRatio,
                'consistencyResult' => $consistencyResult,
            ];
        });

        return view('pages.kepala-sekolah.perhitungan-kriteria.hasil', array_merge([
            'title' => 'Hasil Perbandingan Kriteria'
        ], $result));
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

        return view('pages.kepala-sekolah.perhitungan-kriteria.pedoman', [
            'title' => 'Pedoman Pengisian Perbandingan Kriteria',
            'intensitasKepentingan' => $intensitasKepentingan,
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
        // Truncate table perhitungan_kriteria
        PerhitunganKriteria::truncate();
        
        // Truncate table bobot_prioritas_kriteria
        BobotPrioritasKriteria::truncate();

        // Forget cache hasil_perhitungan_kriteria
        Cache::forget('hasil_perhitungan_kriteria');

        $notif = notify()->success('Perbandingan kriteria berhasil direset');
        return redirect()->back()->withInput()->with('notif', $notif);
    }
}
