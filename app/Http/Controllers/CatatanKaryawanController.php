<?php

namespace App\Http\Controllers;

use App\Http\Requests\CatatanKaryawan\UpdateCatatanKaryawanRequest;
use App\Models\CatatanKaryawan;
use App\Services\CatatanKaryawan\CatatanKaryawanService;
use Illuminate\Support\Facades\Auth;

class CatatanKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CatatanKaryawanService $catatanKaryawanService)
    {
        if (Auth::user()->hasAnyRole(['yayasan', 'deputi'])) {
            $data = $catatanKaryawanService->catatanKaryawanGroupedByTahunAjaranForYayasanOrDeputi();
    
            return view('pages.pimpinan.catatan-karyawan.index', [
                'title' => 'Data Catatan Pegawai',
                'catatanKaryawan' => $data['catatanKaryawan'],
                'catatanWithGroupKaryawan' => $data['catatanWithGroupKaryawan'],
            ]);
        }

        if (Auth::user()->hasAnyRole(['kepala sekolah'])) {
            $data = $catatanKaryawanService->catatanKaryawanGroupedByTahunAjaranForKepalaSekolah();
    
            return view('pages.kepala-sekolah.catatan-karyawan.index', [
                'title' => 'Data Catatan Pegawai',
                'catatanKaryawan' => $data['catatanKaryawan'],
                'catatanWithGroupKaryawan' => $data['catatanWithGroupKaryawan'],
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showTahun(CatatanKaryawanService $catatanKaryawanService, $firstYear, $secondYear, $semester)
    {
        $data = $catatanKaryawanService->showTahunAjaranKepalaSekolah($firstYear, $secondYear, $semester);

        return view('pages.kepala-sekolah.catatan-karyawan.show-tahun', [
            'title' => $data['title'],
            'catatanKaryawan' => $data['catatanKaryawan'],
            'tahunAjaranBreadcrumbs' => $data['tahunAjaranBreadcrumbs'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showTahunPimpinan(CatatanKaryawanService $catatanKaryawanService, $idGroupKaryawan, $firstYear, $secondYear, $semester)
    {
        $data = $catatanKaryawanService->showTahunAjaranYayasanOrDeputi($idGroupKaryawan, $firstYear, $secondYear, $semester);

        return view('pages.pimpinan.catatan-karyawan.show-tahun', [
            'title' => $data['title'],
            'catatanKaryawan' => $data['catatanKaryawan'],
            'tahunAjaranBreadcrumbs' => $data['tahunAjaranBreadcrumbs'],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $firstYear, $secondYear, $semester)
    {
        $tahunAjaranBreadcrumbs = [
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        $catatanKaryawan = CatatanKaryawan::with([
            'tanggalPenilaian',
        ])
        ->where('id_catatan_karyawan', $id)
        ->first();
        
        return view('pages.kepala-sekolah.catatan-karyawan.show', [
            'title' => 'Detail Catatan Pegawai',
            'catatanKaryawan' => $catatanKaryawan,
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatatanKaryawanService $catatanKaryawanService, $id, $firstYear, $secondYear, $semester)
    {
        $data = $catatanKaryawanService->editCatatanKaryawan($id, $firstYear, $secondYear, $semester);

        return view('pages.kepala-sekolah.catatan-karyawan.edit', [
            'title' => 'Ubah Catatan Pegawai',
            'catatanKaryawan' => $data['catatanKaryawan'],
            'tahunAjaranBreadcrumbs' => $data['tahunAjaranBreadcrumbs'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCatatanKaryawanRequest $request, $id)
    {
        try {
            CatatanKaryawan::where('id_catatan_karyawan', $id)->update($request->validated());

            $notif = notify()->success('Catatan pegawai berhasil diubah');
            return back()->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah catatan pegawai');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CatatanKaryawan::where('id_catatan_karyawan', $id)->delete();

        $notif = notify()->success('Catatan pegawai berhasil dihapus');
        return back()->with('notif', $notif);
    }
}
