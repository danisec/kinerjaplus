<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatatanKaryawan\StoreCatatanKaryawanRequest;
use App\Http\Requests\PersetujuanPenilaian\UpdatePersetujuanPenilaianRequest;
use App\Models\CatatanKaryawan;
use App\Models\Penilaian;
use App\Services\CatatanKaryawan\CatatanKaryawanService;
use App\Services\PersetujuanPenilaian\PersetujuanPenilaianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersetujuanPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PersetujuanPenilaianService $persetujuanPenilaianService)
    {
        if (Auth::user()->hasAnyRole(['yayasan', 'deputi'])) {
            $data = $persetujuanPenilaianService->indexPersetujuanPenilaianYayasanOrDeputi();

            return view('pages.pimpinan.persetujuan-penilaian.index', [
                'title' => 'Persetujuan Penilaian',
                'penilaianGroupedByTahun' => $data['penilaianGroupedByTahunAjaran'],
                'penilaianWithGroupKaryawan' => $data['penilaianWithGroupKaryawan'],
            ]);
        }

        if (Auth::user()->hasRole(['kepala sekolah'])) {
            $data = $persetujuanPenilaianService->indexPersetujuanPenilaianKepalaSekolah();
    
            return view('pages.kepala-sekolah.persetujuan-penilaian.index', [
                'title' => 'Persetujuan Penilaian',
                'penilaianGroupedByTahun' => $data['penilaianGroupedByTahun'],
                'penilaianWithGroupKaryawan' => $data['penilaianWithGroupKaryawan'],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showTahun(PersetujuanPenilaianService $persetujuanPenilaianService, $firstYear, $secondYear, $semester)
    {
        $data = $persetujuanPenilaianService->showTahunAjaranKepalaSekolah($firstYear, $secondYear, $semester);

        return view('pages.kepala-sekolah.persetujuan-penilaian.show-tahun', [
            'title' => 'Detail Data Penilaian',
            'penilaian' => $data['penilaian'],
            'tahunAjaranBreadcrumbs' => $data['tahunAjaranBreadcrumbs'],
            'totalReviewPenilaian' => $data['totalReviewPenilaian'],
            'notApprovedPenilaian' => $data['notApprovedPenilaian'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showTahunPimpinan(PersetujuanPenilaianService $persetujuanPenilaianService, $idGroupKaryawan, $firstYear, $secondYear, $semester)
    {
        $data = $persetujuanPenilaianService->showTahunAjaranYayasanOrDeputi($idGroupKaryawan, $firstYear, $secondYear, $semester);

        return view('pages.pimpinan.persetujuan-penilaian.show-tahun', [
            'title' => 'Detail Data Penilaian',
            'penilaian' => $data['penilaian'],
            'tahunAjaranBreadcrumbs' => $data['tahunAjaranBreadcrumbs'],
            'totalReviewPenilaian' => $data['totalReviewPenilaian'],
            'notApprovedPenilaian' => $data['notApprovedPenilaian'],
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
    public function show(PersetujuanPenilaianService $persetujuanPenilaianService, $id)
    {
        $data = $persetujuanPenilaianService->showReviewPenilaian($id);

        return view('pages.kepala-sekolah.persetujuan-penilaian.review', [
            'title' => 'Detail Data Penilaian',
            'kriteria' => $data['kriteria'],
            'penilaian' => $data['penilaian'],
            'checkRole' => $data['checkRole'],
            'tahunAjaran' => $data['tahunAjaran'],
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
    public function update(UpdatePersetujuanPenilaianRequest $request, $id)
    {
        try {
            $penilaian = Penilaian::findOrFail($id);

            foreach ($request->validated()['status'] as $indikatorId => $status) {
                // Update status per indikator
                $penilaian->penilaianIndikator()
                    ->where('id_skala_indikator_detail', $indikatorId)
                    ->update(['status' => $status]);
            }

            $notif = notify()->success('Review penilaian berhasil disimpan');
            return back()->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat review penilaian');
            return back()->with('notif', $notif);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function createCatatan(CatatanKaryawanService $catatanKaryawanService, $firstYear, $secondYear, $semester, $id)
    {
        $data = $catatanKaryawanService->createCatatanKaryawan($firstYear, $secondYear, $semester, $id);

        return view('pages.kepala-sekolah.catatan-karyawan.create', [
            'title' => 'Tambah Catatan Karyawan',
            'penilaian' => $data['penilaian'],
            'tahunAjaran' => $data['tahunAjaran'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function storeCatatan(StoreCatatanKaryawanRequest $request, $firstYear, $secondYear, $semester)
    {
        try {            
            CatatanKaryawan::create([
                'id_penilaian' => $request->validated()['id_penilaian'],
                'id_tanggal_penilaian' => $request->validated()['id_tanggal_penilaian'],
                'catatan' => $request->validated()['catatan'],
            ]);

            $penilaian = Penilaian::with(['alternatifKedua'])->where('id_penilaian', $request->validated()['id_penilaian'])->first();
            $idGroupKaryawan = $penilaian->alternatifKedua->id_group_karyawan;

            if (Auth::user()->hasAnyRole(['yayasan', 'deputi'])) {
                $notif = notify()->success('Catatan Karyawan berhasil ditambahkan');
                return redirect()->route('persetujuanPenilaian.showTahunPimpinan', [
                    'idGroupKaryawan' => $idGroupKaryawan,
                    'firstYear' => $firstYear,
                    'secondYear' => $secondYear,
                    'semester' => $semester,
                ])->with('notif', $notif);
            }

            if (Auth::user()->hasAnyRole(['kepala sekolah'])) {
                $notif = notify()->success('Catatan Karyawan berhasil ditambahkan');
                return redirect()->route('persetujuanPenilaian.showTahun', [
                    'firstYear' => $firstYear,
                    'secondYear' => $secondYear,
                    'semester' => $semester,
                ])->with('notif', $notif);
            }
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan catatan karyawan');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $penilaian = Penilaian::findOrFail($id);
            $penilaian->delete();

            $notif = notify()->success('Penilaian berhasil diatur ulang');
            return back()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengatur ulang penilaian');
            return back()->with('notif', $notif);
        }
    }
}
