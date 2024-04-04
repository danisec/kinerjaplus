<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\RiwayatPenilaian;
use Illuminate\Http\Request;

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

        // Cari penilaian dari $checkAuthAlternatif berdasarkan tahun ajaran
        $penilaianAlternatifGroupedByTahun = Penilaian::select('tahun_ajaran')
        ->where('alternatif_pertama', $checkAuthAlternatif)
        ->when(request()->has('search'), function ($query) {
            $query->where('tahun_ajaran', 'like', '%' . request('search') . '%');
        })
        ->groupBy('tahun_ajaran')
        ->pluck('tahun_ajaran');
        
        return view('pages.guru.riwayat-penilaian.index', [
            'title' => 'Riwayat Penilaian',
            'penilaianAlternatifGroupedByTahun' => $penilaianAlternatifGroupedByTahun,
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
        return view('pages.guru.riwayat-penilaian.show', [
            'title' => 'Detail Data Penilaian',
            'kriteria' => Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria'])->orderBy('kode_kriteria', 'ASC')->get(),
            'penilaian' => Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('id_penilaian', $id)->first(),
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
            'penilaian' => Penilaian::with(['alternatifPertama'])->where('alternatif_pertama', $checkAuthAlternatif)->orderBy('alternatif_pertama', 'ASC')->where('tahun_ajaran', "$firstYear/$secondYear")->filter(request(['search']))->paginate(10)->withQueryString(),
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
