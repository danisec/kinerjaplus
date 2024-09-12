<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Dashboard;
use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\Kriteria;
use App\Models\Ranking;
use App\Models\Subkriteria;
use App\Models\TanggalPenilaian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $this->ranking = Ranking::with('tanggalPenilaian', 'alternatif.alternatifPertama');

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
    public function index()
    {
        // Dapatkan id_tanggal_penilaian yang unik dan urutkan dari yang terbesar
        $tanggalPenilaian = TanggalPenilaian::with('groupKaryawan')->orderBy('id_tanggal_penilaian', 'DESC')->get();

        // Dapatkan id_tanggal_penilaian yang paling terbaru
        $getFirstTanggalPenilaian = TanggalPenilaian::orderBy('id_tanggal_penilaian', 'DESC')->first();

        if (Auth::user()->hasAnyRole('superadmin', 'IT', 'admin')){

            return view('pages.dashboard.home.index-admin', [
                'title' => 'Dashboard',
                'countUser' => User::count(),
                'countAlternatif' => Alternatif::count(),
                'countKriteria' => Kriteria::count(),
                'countSubkriteria' => Subkriteria::count(),
                'alternatif' => Alternatif::orderBy('id_alternatif', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString(),
                'user' => User::orderBy('fullname', 'ASC')->filter(request(['search']))->paginate(10)->withQueryString(),
            ]);
        }

        if (Auth::user()->hasAnyRole('yayasan', 'deputi')){
            
            // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
            $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif ?? null;

            // Dapatkan $checkAuthAlternatif berada di group karyawan mana
            $checkGroupKaryawan = null;
            if (Auth::user()->hasRole('kepala sekolah')) {
                $checkGroupKaryawan = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->first();
            } elseif (Auth::user()->hasAnyRole('yayasan', 'deputi')) {
                $checkGroupKaryawan = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->first();
            }

            $selfRankings = $this->ranking->sortable()->orderBy('tahun_ajaran', 'DESC')->where('kode_alternatif', $checkAuthAlternatif)->paginate(5)->withQueryString();

            $namaGroupKaryawan = GroupKaryawan::pluck('nama_group_karyawan');
            $getFirstNamaGroupKaryawan = GroupKaryawan::first();

            return view('pages.dashboard.home.index-group', [
                'title' => 'Dashboard',
                'tanggalPenilaian' => $tanggalPenilaian,
                'firstTanggalPenilaian' => $getFirstTanggalPenilaian,
                'namaGroupKaryawan' => $namaGroupKaryawan,
                'firstNamaGroupKaryawan' => $getFirstNamaGroupKaryawan,
                'checkGroupKaryawan' => $checkGroupKaryawan,
                'selfRankings' => $selfRankings,
            ]);
        }

        if (Auth::user()->hasAnyRole([
            'kepala sekolah', 
            'guru', 
            'tata usaha tenaga pendidikan', 
            'tata usaha non tenaga pendidikan', 
            'kerohanian tenaga pendidikan', 
            'kerohanian non tenaga pendidikan'])){

            // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
            $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif ?? null;

            // Dapatkan $checkAuthAlternatif berada di group karyawan mana
            $checkGroupKaryawan = null;
            if (Auth::user()->hasRole('kepala sekolah')) {
                $checkGroupKaryawan = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->first();
            } elseif (Auth::user()->hasAnyRole([
                'guru',
                'tata usaha tenaga pendidikan',
                'tata usaha non tenaga pendidikan',
                'kerohanian tenaga pendidikan',
                'kerohanian non tenaga pendidikan',
            ])) {
                $checkGroupKaryawan = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->first();
            }

            $selfRankings = $this->ranking->sortable()->orderBy('id_tanggal_penilaian', 'DESC')->where('kode_alternatif', $checkAuthAlternatif)->paginate(5)->withQueryString();

            return view('pages.dashboard.home.index', [
                'title' => 'Dashboard',
                'tanggalPenilaian' => $tanggalPenilaian,
                'firstTanggalPenilaian' => $getFirstTanggalPenilaian,
                'checkGroupKaryawan' => $checkGroupKaryawan,
                'selfRankings' => $selfRankings,
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
    public function getSelfRankChart($kodeAlternatif)
    {
        // Cari ranking berdasarkan kodeAlternatif dan nama alternatif auth user $checkGroupKaryawan
        $ranking = $this->ranking->orderBy('id_tanggal_penilaian', 'DESC')->where('kode_alternatif', $kodeAlternatif)->get();

        // Convert collection to array
        $selfRanking = $ranking->toArray();

        // Buatkan array untuk menampung data top ranking
        $dataSelfRanking = [];
        foreach ($selfRanking as $key => $value) {
            $dataSelfRanking[$key]['tahun_ajaran'] = $value['tanggal_penilaian']['tahun_ajaran'];
            $dataSelfRanking[$key]['semester'] = $value['tanggal_penilaian']['semester'];
            $dataSelfRanking[$key]['nama'] = $value['alternatif']['alternatif_pertama']['nama_alternatif'];
            $dataSelfRanking[$key]['nilai'] = $value['nilai'];
            $dataSelfRanking[$key]['rank'] = $value['rank'];
        }

        // Mengurutkan data berdasarkan tahun ajaran
        usort($dataSelfRanking, function ($a, $b) {
            return $b['tahun_ajaran'] <=> $a['tahun_ajaran'];
        });

        return response()->json($dataSelfRanking);
    }

    /**
     * Display the specified resource.
     */
    public function getRankTahunAjaranChart($idTanggalPenilaian)
    {
        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;

        // Dapatkan $checkAuthAlternatif berada di group karyawan mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasRole('guru')) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Cari ranking berdasarkan tahun ajaran dan nama alternatif yang memiliki group karyawan yang sama dengan group karyawan yang dimiliki oleh auth user  $checkGroupKaryawan
        $ranking = $this->ranking
            ->orderBy('rank', 'ASC')
            ->where('id_tanggal_penilaian', $idTanggalPenilaian)
            ->whereHas('alternatif', function ($query) use ($checkGroupKaryawanId) {
                $query->whereHas('groupKaryawan', function ($query) use ($checkGroupKaryawanId) {
                    $query->where('id_group_karyawan', $checkGroupKaryawanId);
                });
            })
            ->get();

        // Dapatkan top 5 ranking pada table ranking berdasarkan $tahunAjaran dengan rank 1, 2, 3, 4, dan 5
        $topRanking = $ranking->whereIn('rank', [1, 2, 3, 4, 5]);

        // Convert collection to array
        $topRanking = $topRanking->toArray();

        // dd($topRanking);

        // Buatkan array untuk menampung data top ranking
        $dataTopRanking = [];
        foreach ($topRanking as $key => $value) {
            $dataTopRanking[$key]['tahun_ajaran'] = $value['tanggal_penilaian']['tahun_ajaran'];
            $dataTopRanking[$key]['nama'] = $value['alternatif']['alternatif_pertama']['nama_alternatif'];
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
    public function getRankTahunAjaranTable($idTanggalPenilaian)
    {
        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasRole('guru')) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Cari ranking berdasarkan tahun ajaran dan nama alternatif yang memiliki group karyawan yang sama dengan group karyawan yang dimiliki oleh auth user  $checkGroupKaryawan
        $rankings = $this->ranking
        ->orderBy('rank', 'ASC')
        ->where('id_tanggal_penilaian', $idTanggalPenilaian)
        ->whereHas('alternatif', function ($query) use ($checkGroupKaryawanId) {
            $query->whereHas('groupKaryawan', function ($query) use ($checkGroupKaryawanId) {
                $query->where('id_group_karyawan', $checkGroupKaryawanId);
            });
        })->paginate(10);

        // transformasi data sebelum mengirim respons
        $data = $rankings->transform(function ($item) {
            return [
                'id' => $item->id_ranking,
                'tahun_ajaran' => $item->tanggalPenilaian->tahun_ajaran,
                'semester' => $item->tanggalPenilaian->semester,
                'nama' => $item->alternatif->alternatifPertama->nama_alternatif,
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

    /**
     * Display the specified resource.
     */
    public function getRankTahunAjaranGroupChart($idTanggalPenilaian, $namaGroupKaryawan)
    {
        // Cari ranking berdasarkan tahun ajaran dan berdasarkan nama group karyawan
        $ranking = $this->ranking
        ->where('id_tanggal_penilaian', $idTanggalPenilaian)
        ->whereHas('alternatif', function ($query) use ($namaGroupKaryawan) {
            $query->whereHas('groupKaryawan', function ($query) use ($namaGroupKaryawan) {
                $query->where('nama_group_karyawan', $namaGroupKaryawan);
            });
        })->get();

        // Dapatkan top 5 ranking pada table ranking berdasarkan $tahunAjaran dengan rank 1, 2, 3, 4, dan 5
        $topRanking = $ranking->whereIn('rank', [1, 2, 3, 4, 5]);

        // Convert collection to array
        $topRanking = $topRanking->toArray();

        // Buatkan array untuk menampung data top ranking
        $dataTopRanking = [];
        foreach ($topRanking as $key => $value) {
            $dataTopRanking[$key]['tahun_ajaran'] = $value['tanggal_penilaian']['tahun_ajaran'];
            $dataTopRanking[$key]['semester'] = $value['tanggal_penilaian']['semester'];
            $dataTopRanking[$key]['nama'] = $value['alternatif']['alternatif_pertama']['nama_alternatif'];
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
     * Display the specified resource.
     */
    public function getRankTahunAjaranGroupTable($idTanggalPenilaian, $namaGroupKaryawan)
    {
        // Cari ranking berdasarkan tahun ajaran dan berdasarkan nama group karyawan
        $rankings = $this->ranking
        ->orderBy('rank', 'ASC')
        ->where('id_tanggal_penilaian', $idTanggalPenilaian)
        ->whereHas('alternatif', function ($query) use ($namaGroupKaryawan) {
            $query->whereHas('groupKaryawan', function ($query) use ($namaGroupKaryawan) {
                $query->where('nama_group_karyawan', $namaGroupKaryawan);
            });
        })->paginate(10);

        // transformasi data sebelum mengirim respons
        $data = $rankings->transform(function ($item) {
            return [
                'id' => $item->id_ranking,
                'tahun_ajaran' => $item->tanggalPenilaian->tahun_ajaran,
                'semester' => $item->tanggalPenilaian->semester,
                'nama' => $item->alternatif->alternatifPertama->nama_alternatif,
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
