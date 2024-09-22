<?php

namespace App\Http\Controllers;

use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\TanggalPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPenilaianController extends Controller
{
    /* 
     * Constructor
     */
    private $penilaian;
    private $tahunAjaran;

    public function __construct()
    {
        $this->penilaian = Penilaian::with(['alternatifPertama'])->orderBy('alternatif_pertama', 'ASC');

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
        // Cari nama alternatif berdasarkan nama auth user
        $checkAuthAlternatif = auth()->user()->alternatif->kode_alternatif ?? null;

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasRole('guru')) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Cari semua penilaian dari $checkAuthAlternatif berdasarkan $checkTanggalPenilaian->id_tanggal_penilaian
        $penilaianGroupedByTahun = Penilaian::with(['tanggalPenilaian','alternatifPertama'])
            ->whereHas('alternatifPertama', function ($query) use ($checkGroupKaryawanId) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId);
        })
        ->join('tanggal_penilaian', 'penilaian.id_tanggal_penilaian', '=', 'tanggal_penilaian.id_tanggal_penilaian')
        ->orderBy('tanggal_penilaian.tahun_ajaran', 'DESC')
        ->when(request()->has('search'), function ($query) {
            // Request search berdasarkan tahun ajaran dan semester
            $query->where('tanggal_penilaian.tahun_ajaran', 'like', '%' . request('search') . '%')
                ->orWhere('tanggal_penilaian.semester', 'like', '%' . request('search') . '%');
        })
        ->get()
        ->unique('id_tanggal_penilaian');

        // Menggabungkan tahun_ajaran dengan nama group karyawan
        $penilaianWithGroupKaryawan = [];
        foreach ($penilaianGroupedByTahun as $penilaian) {
            $namaGroupKaryawan = GroupKaryawan::where('id_group_karyawan', $checkGroupKaryawanId)->value('nama_group_karyawan');
            $penilaianWithGroupKaryawan[] = [
                'tahun' => $penilaian->tanggalPenilaian->tahun_ajaran,
                'semester' => $penilaian->tanggalPenilaian->semester,
                'namaGroupKaryawan' => $namaGroupKaryawan
            ];
        }
        
        return view('pages.guru.riwayat-penilaian.index', [
            'title' => 'Riwayat Penilaian',
            'penilaianGroupedByTahun' => $penilaianGroupedByTahun,
            'penilaianWithGroupKaryawan' => $penilaianWithGroupKaryawan,
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
    public function show($id)
    {
        $getTahunAjaran = Penilaian::with(['tanggalPenilaian'])->where('id_penilaian', $id)->get();

        $tahunAjaran = explode('/', $getTahunAjaran->first()->tanggalPenilaian->tahun_ajaran);
        $tahunAjaran[] = $getTahunAjaran->first()->tanggalPenilaian->semester;

        return view('pages.guru.riwayat-penilaian.show', [
            'title' => 'Detail Data Penilaian',
            'kriteria' => Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria'])->orderBy('kode_kriteria', 'ASC')->get(),
            'penilaian' => Penilaian::with(['tanggalPenilaian', 'alternatifPertama.alternatifPertama', 'alternatifKedua',  'alternatifKedua.alternatifPertama.users', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('id_penilaian', $id)->first(),
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showTahun($firstYear, $secondYear, $semester)
    {
        $tahunAjaran = $this->tahunAjaran;

        // Buat breadcrumbs tahun ajaran dan semester dalam bentuk array
        $tahunAjaranBreadcrumbs = [
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;
        
        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasAnyRole([
                'yayasan',
                'deputi',
                'guru',
                'tata usaha tenaga pendidikan',
                'tata usaha non tenaga pendidikan',
                'kerohanian tenaga pendidikan',
                'kerohanian non tenaga pendidikan',
            ])) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Dapatkan TanggalPenilaian berdasarkan tahun ajaran, semester, dan group karyawan
        $checkTanggalPenilaian = TanggalPenilaian::where('tahun_ajaran', $tahunAjaranBreadcrumbs['tahun_ajaran'] ?? null)
            ->where('semester', $tahunAjaranBreadcrumbs['semester'] ?? null)
            ->where('id_group_karyawan', $checkGroupKaryawanId)
            ->get();

        // Dapatkan ID Tanggal Penilaian dalam array
        $idTanggalPenilaian = $checkTanggalPenilaian->pluck('id_tanggal_penilaian')->toArray();

        $penilaian = Penilaian::with(['tanggalPenilaian', 'alternatifPertama.alternatifPertama'])
        ->where('alternatif_pertama', $checkAuthAlternatif)
        ->orderBy('alternatif_pertama', 'ASC')
        ->whereIn('id_tanggal_penilaian', $idTanggalPenilaian)
        ->filter(request(['search']))
        ->paginate(10)->withQueryString();

        return view('pages.guru.riwayat-penilaian.show-tahun', [
            'title' => 'Detail Data Penilaian',
            'penilaian' => $penilaian,
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
