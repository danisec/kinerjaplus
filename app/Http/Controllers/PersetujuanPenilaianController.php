<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\PersetujuanPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersetujuanPenilaianController extends Controller
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
        $penilaianGroupedByTahun = Penilaian::select('tahun_ajaran')
        ->when(request()->has('search'), function ($query) {
            $query->where('tahun_ajaran', 'like', '%' . request('search') . '%');
        })
        ->groupBy('tahun_ajaran')
        ->pluck('tahun_ajaran');

        return view('pages.kepala-sekolah.persetujuan-penilaian.index', [
            'title' => 'Persetujuan Penilaian',
            'penilaianGroupedByTahun' => $penilaianGroupedByTahun,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showTahun($firstYear, $secondYear)
    {
        $tahunAjaranBreadcrumbs = $firstYear . '/' . $secondYear;

        return view('pages.kepala-sekolah.persetujuan-penilaian.show-tahun', [
            'title' => 'Detail Data Penilaian',
            'penilaian' => Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('tahun_ajaran', "$firstYear/$secondYear")->filter(request(['search']))->paginate(10)->withQueryString(),
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
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
        return view('pages.kepala-sekolah.persetujuan-penilaian.show', [
            'title' => 'Detail Data Penilaian',
            'kriteria' => Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria'])->orderBy('kode_kriteria', 'ASC')->get(),
            'penilaian' => Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('id_penilaian', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pages.kepala-sekolah.persetujuan-penilaian.edit', [
            'title' => 'Ubah Persetujuan Penilaian',
            'penilaian' => Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('id_penilaian', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tahun_ajaran' => '',
            'alternatif_pertama' => '',
            'alternatif_kedua' => '',
            'status' => 'required|in:Disetujui,Tidak Disetujui',
        ],[
            'status.required' => 'Status harus diisi',
        ]);

        try {
            Penilaian::where('id_penilaian', $id)->update($validatedData);

            $notif = notify()->success('Status persetujuan penilaian berhasil diubah');
            return back()->withInput()->with('notif', $notif);
        } catch (\Exception $e) {
           $notif = notify()->error('Terjadi kesalahan saat mengubah status persetujuan penilaian');
           return back()->with('notif', $notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
