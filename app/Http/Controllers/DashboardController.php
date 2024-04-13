<?php

namespace App\Http\Controllers;

use App\Charts\RankingKaryawan;
use App\Models\Alternatif;
use App\Models\Dashboard;
use App\Models\Kriteria;
use App\Models\Ranking;
use App\Models\Subkriteria;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /* 
     * Constructor
     */
    private $tahunAjaran;
    private $ranking;

    public function __construct()
    {
        // Gunakan pagination untuk menampilkan data ranking
        $this->ranking = Ranking::with('alternatif')->orderBy('rank', 'asc');

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
    public function index(RankingKaryawan $chart)
    {
        $tahunAjaran = $this->tahunAjaran;
        $tahunAjaranRanking = $this->ranking->pluck('tahun_ajaran')->unique()->sortDesc();

        return view('pages.dashboard.home.index', [
            'title' => 'Dashboard',
            'countUser' => User::count(),
            'countAlternatif' => Alternatif::count(),
            'countKriteria' => Kriteria::count(),
            'countSubkriteria' => Subkriteria::count(),
            'currentTahunAjaran' => $tahunAjaran,
            'tahunAjaranRanking' => $tahunAjaranRanking,
            'user' => User::orderBy('role', 'ASC')->filter(request(['search']))->paginate(10)->withQueryString(),
            // 'chart' => $chart->build(),
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function getRankTahunAjaranChart($firstYear, $secondYear)
    {
        // Cari ranking berdasarkan tahun ajaran
        $ranking = $this->ranking->where('tahun_ajaran', "$firstYear/$secondYear")->get();

        // Dapatkan top 5 ranking pada table ranking berdasarkan $tahunAjaran dengan rank 1, 2, 3, 4, dan 5
        $topRanking = $ranking->whereIn('rank', [1, 2, 3, 4, 5])->sortBy('rank');

        // Convert collection to array
        $topRanking = $topRanking->toArray();

        // Buatkan array untuk menampung data top ranking
        $dataTopRanking = [];
        foreach ($topRanking as $key => $value) {
            $dataTopRanking[$key]['tahun_ajaran'] = $value['tahun_ajaran'];
            $dataTopRanking[$key]['nama'] = $value['alternatif']['nama_alternatif'];
            $dataTopRanking[$key]['nilai'] = $value['nilai'];
            $dataTopRanking[$key]['rank'] = $value['rank'];
        }

        // Mengurutkan data berdasarkan total prioritas
        usort($dataTopRanking, function ($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        return response()->json($dataTopRanking);
    }

    /**
     * Display the specified resource in storage.
     */
    public function getRankTahunAjaranTable($firstYear, $secondYear)
    {
        // Cari ranking berdasarkan tahun ajaran
        $rankings = $this->ranking->where('tahun_ajaran', "$firstYear/$secondYear")->paginate(5);

        // transformasi data sebelum mengirim respons
        $data = $rankings->transform(function ($item) {
            return [
                'id' => $item->id_ranking,
                'tahun_ajaran' => $item->tahun_ajaran,
                'nama' => $item->alternatif->nama_alternatif,
                'nilai' => $item->nilai,
                'rank' => $item->rank,
            ];
        });

        return response()->json([
            'data' => $data,
            'pagination' => [
                'total' => $rankings->total(),
                'perPage' => $rankings->perPage(),
                'currentPage' => $rankings->currentPage(),
                'lastPage' => $rankings->lastPage(),
            ],
        ]);
    }
}
