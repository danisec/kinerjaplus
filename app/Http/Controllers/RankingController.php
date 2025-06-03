<?php

namespace App\Http\Controllers;

use App\Models\BobotPrioritasAlternatif;
use App\Models\BobotPrioritasSubkriteria;
use App\Models\Kriteria;
use App\Models\Ranking;
use App\Models\TanggalPenilaian;
use App\Services\Ranking\RankingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    /* 
     * Constructor
     */
    private $kriteria;
    private $bobotPrioritasSubkriteria;
    private $tahunAjaran;

    public function __construct()
    {      
        $this->kriteria = Kriteria::with([
            'subkriteria', 
            'subkriteria.indikatorSubkriteria'
        ])
        ->orderBy('kode_kriteria', 'asc')
        ->get();

        $this->bobotAlternatif = BobotPrioritasAlternatif::orderBy('kode_kriteria', 'asc')->get();
        $this->bobotPrioritasSubkriteria = BobotPrioritasSubkriteria::with(['kriteria'])->get();

        $currentMonth = date('m');
        $isAfterJune = $currentMonth >= 6;
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;
        $nextYear = $currentYear + 1;
        $this->tahunAjaran = $isAfterJune ? "$currentYear/$nextYear" : "$lastYear/$currentYear";
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RankingService $rankingService)
    {
        if (Auth::user()->hasRole(['kepala sekolah'])) {
            $tahunAjaran = $this->tahunAjaran;
            $kriteria = $this->kriteria;
            $bobotPrioritasSubkriteria = $this->bobotPrioritasSubkriteria;
    
            $data = $rankingService->indexRankingKepalaSekolah($tahunAjaran, $kriteria, $bobotPrioritasSubkriteria);

            // Update or create ranking data
            try {
                foreach ($data['totalNilaiAlternatifAndRankAlternatif'] as $kodeAlternatif => $totalNilaiAlternatifAndRankAlternatifItem) {
                    Ranking::updateOrCreate(
                        [
                            'id_tanggal_penilaian' => $totalNilaiAlternatifAndRankAlternatifItem['id_tanggal_penilaian'],
                            'kode_alternatif' => $kodeAlternatif,
                        ],
                        [
                            'nilai' => $totalNilaiAlternatifAndRankAlternatifItem['nilai'],
                            'rank' => $totalNilaiAlternatifAndRankAlternatifItem['rank'],
                        ]
                    );
                }
            } catch (\Throwable $th) {
                $notif = notify()->error('Terjadi kesalahan saat menyimpan data perankingan');
                return back()->with('notif', $notif);
            }
            
            return view('pages.kepala-sekolah.ranking.index', [
                'title' => 'Perankingan',
                'tahunAjaran' => $tahunAjaran,
                'checkAuthAlternatif' => $data['checkAuthAlternatif'],
                'checkTanggalPenilaian' => $data['checkTanggalPenilaian'],
                'alternatifPenilaian' => $data['alternatifPenilaian'],
                'kriteria' => $kriteria,
                'checkPerhitunganAlternatif' => $data['checkPerhitunganAlternatif'],
                'bobotAlternatif' => $data['bobotAlternatif'],
                'bobotPrioritasSubkriteria' => $bobotPrioritasSubkriteria,
                'totalBobotKriteria' => $data['totalBobotKriteria'],
                'avgNilaiKriteria' => $data['avgNilaiKriteria'],
                'nilaiAlternatif' => $data['nilaiAlternatif'],
                'rankAlternatif' => $data['rankAlternatif'],
            ]);
        }

        if (Auth::user()->hasAnyRole(['yayasan', 'deputi'])) {
            $tanggalPenilaian = TanggalPenilaian::with(['groupKaryawan'])
            ->orderBy('tahun_ajaran', 'desc')
            ->filter(request(['search']))
            ->paginate(10)
            ->withQueryString();

            return view('pages.pimpinan.ranking.index', [
                'title' => 'Perankingan',
                'tanggalPenilaian' => $tanggalPenilaian,
            ]);
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RankingService $rankingService, $idTanggalPenilaian, $firstYear, $secondYear, $semester)
    {
        $kriteria = $this->kriteria;
        $bobotPrioritasSubkriteria = $this->bobotPrioritasSubkriteria;

        $data = $rankingService->showRanking($idTanggalPenilaian, $firstYear, $secondYear, $semester, $kriteria, $bobotPrioritasSubkriteria);

        // Update or create ranking data
        try {
            foreach ($data['totalNilaiAlternatifAndRankAlternatif'] as $kodeAlternatif => $totalNilaiAlternatifAndRankAlternatifItem) {
                Ranking::updateOrCreate(
                    [
                        'id_tanggal_penilaian' => $totalNilaiAlternatifAndRankAlternatifItem['id_tanggal_penilaian'],
                        'kode_alternatif' => $kodeAlternatif,
                    ],
                    [
                        'nilai' => $totalNilaiAlternatifAndRankAlternatifItem['nilai'],
                        'rank' => $totalNilaiAlternatifAndRankAlternatifItem['rank'],
                    ]
                );
            }
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data perankingan');
            return back()->with('notif', $notif);
        }

        return view('pages.pimpinan.ranking.show', [
            'title' => 'Perankingan',
            'tahunAjaran' => $data['tahunAjaran'],
            'tanggalPenilaian' => $data['tanggalPenilaian'],
            'alternatifPenilaian' => $data['alternatifPenilaian'],
            'kriteria' => $kriteria,
            'checkPerhitunganAlternatif' => $data['checkPerhitunganAlternatif'],
            'bobotAlternatif' => $data['bobotAlternatif'],
            'bobotPrioritasSubkriteria' => $bobotPrioritasSubkriteria,
            'totalBobotKriteria' => $data['totalBobotKriteria'],
            'avgNilaiKriteria' => $data['avgNilaiKriteria'],
            'nilaiAlternatif' => $data['nilaiAlternatif'],
            'rankAlternatif' => $data['rankAlternatif'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($idTanggalPenilaian, $firstYear, $secondYear, $semester)
    {        
        Ranking::where('id_tanggal_penilaian', $idTanggalPenilaian)->delete();

        $notif = notify()->success('Ranking berhasil diperbaharui');
        return redirect()->route('ranking.show', [
            'idTanggalPenilaian' => $idTanggalPenilaian,
            'firstYear' => $firstYear,
            'secondYear' => $secondYear,
            'semester' => $semester,
        ])->with('notif', $notif);
    }
}
