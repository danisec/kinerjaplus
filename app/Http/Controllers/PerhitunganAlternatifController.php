<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\BobotPrioritasAlternatif;
use App\Models\Kriteria;
use App\Models\PerhitunganAlternatif;
use App\Services\PerhitunganAlternatifService;
use Illuminate\Http\Request;

class PerhitunganAlternatifController extends Controller
{
    /* 
     * Constructor
     */
    private $kriteria;
    private $alternatif;
    private $perhitunganAlternatif;
    private $perhitunganAlternatifService;

    public function __construct(PerhitunganAlternatifService $perhitunganAlternatifService)
    {
        $this->kriteria = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $this->alternatif = Alternatif::orderBy('kode_alternatif', 'asc')->get();
        $this->perhitunganAlternatif = PerhitunganAlternatif::with('alternatifPertama', 'alternatifKedua')->orderBy('alternatif_pertama', 'asc')->get();
        $this->perhitunganAlternatifService = $perhitunganAlternatifService;
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
            PerhitunganAlternatif::truncate();

            foreach ($matriks as $kriteria => $dataKriteria) {
                foreach ($dataKriteria as $alternatifPertama => $dataAlternatif) {
                    foreach ($dataAlternatif as $alternatifKedua => $nilaiAlternatif) {
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

            return redirect()->route('perhitunganAlternatif.hasil')->withInput();
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

        $totalKolomAlternatif = $this->perhitunganAlternatifService->totalKolomAlternatif($perhitunganAlternatif);
        $normalisasiMatriks = $this->perhitunganAlternatifService->normalisasiMatriks($perhitunganAlternatif, $totalKolomAlternatif);

        $totalBarisNormalisasiMatriks = $this->perhitunganAlternatifService->totalBarisNormalisasiMatriks($normalisasiMatriks);
        $bobotPrioritasAlternatif = $this->perhitunganAlternatifService->bobotPrioritasAlternatif($totalBarisNormalisasiMatriks);

        return view('pages.dashboard.perhitungan-alternatif.hasil', [
            'title' => 'Hasil Perhitungan Alternatif',
            'kriteria' => $kriteria,
            'alternatif' => $alternatif,
            'perhitunganAlternatif' => $perhitunganAlternatif,
            'totalKolomAlternatif' => $totalKolomAlternatif,
            'normalisasiMatriks' => $normalisasiMatriks,
            'bobotPrioritasAlternatif' => $bobotPrioritasAlternatif,
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