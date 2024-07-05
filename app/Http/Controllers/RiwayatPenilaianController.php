<?php

namespace App\Http\Controllers;

use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPenilaianController extends Controller
{
    /* 
     * Constructor
     */
    private $penilaian;

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
        $checkAuthAlternatif = auth()->user()->alternatif->kode_alternatif;

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->role == 'kepala sekolah') {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->role == 'guru') {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Cari penilaian dari $checkAuthAlternatif berdasarkan tahun ajaran
        $penilaianGroupedByTahun = Penilaian::select('tahun_ajaran')
        ->orderBy('tahun_ajaran', 'DESC')
        ->where('alternatif_pertama', $checkAuthAlternatif)
        ->when(request()->has('search'), function ($query) {
            $query->where('tahun_ajaran', 'like', '%' . request('search') . '%');
        })
        ->groupBy('tahun_ajaran')
        ->pluck('tahun_ajaran');

        // Menggabungkan tahun_ajaran dengan nama group karyawan
        $penilaianWithGroupKaryawan = [];
        foreach ($penilaianGroupedByTahun as $tahun) {
            $namaGroupKaryawan = GroupKaryawan::where('id_group_karyawan', $checkGroupKaryawanId)->value('nama_group_karyawan');
            $penilaianWithGroupKaryawan[] = ['tahun' => $tahun, 'namaGroupKaryawan' => $namaGroupKaryawan];
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
        $getTahunAjaran = Penilaian::where('id_penilaian', $id)->value('tahun_ajaran');
        $tahunAjaran = explode('/', $getTahunAjaran);

        return view('pages.guru.riwayat-penilaian.show', [
            'title' => 'Detail Data Penilaian',
            'kriteria' => Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria'])->orderBy('kode_kriteria', 'ASC')->get(),
            'penilaian' => Penilaian::with(['alternatifPertama.alternatifPertama', 'alternatifKedua',  'alternatifKedua.alternatifPertama.users', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('id_penilaian', $id)->first(),
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showTahun($firstYear, $secondYear)
    {
        // Cari nama alternatif berdasarkan nama auth user
        $checkAuthAlternatif = auth()->user()->alternatif->kode_alternatif;

        $tahunAjaranBreadcrumbs = $firstYear . '/' . $secondYear;

        return view('pages.guru.riwayat-penilaian.show-tahun', [
            'title' => 'Detail Data Penilaian',
            'penilaian' => Penilaian::with(['alternatifPertama.alternatifPertama'])->where('alternatif_pertama', $checkAuthAlternatif)->orderBy('alternatif_pertama', 'ASC')->where('tahun_ajaran', "$firstYear/$secondYear")->filter(request(['search']))->paginate(10)->withQueryString(),
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
