<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.superadmin.group-karyawan.index', [
            'title' => 'Group Pegawai',
            'groupKaryawan' => GroupKaryawan::with(['alternatif', 'groupKaryawanDetail'])->orderBy('nama_group_karyawan', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Dapatkan nama karyawan dengan role kepala sekolah di table users yang belum terdaftar di group karyawan
        $kepalaSekolah = Alternatif::with(['users', 'groupKaryawan'])
            ->whereHas('users', function($query) {
                $query->whereHas('roles', function($query) {
                    $query->where('name', 'kepala sekolah');
                });
            })
            ->whereNotIn('kode_alternatif', function($query) {
                $query->select('kepala_sekolah')->from('group_karyawan');
            })
            ->get();
            
        // Dapatkan nama karyawan yang belum terdaftar di group karyawan dan jangan tampilkan kepala sekolah
        $getRoleKepalaSekolah = Alternatif::with(['users'])
            ->whereHas('users', function($query) {
                $query->whereHas('roles', function($query) {
                    $query->where('name', 'kepala sekolah');
                });
            })
            ->pluck('kode_alternatif');

        $alternatif = Alternatif::whereNotIn('kode_alternatif', function($query) {
                $query->select('kode_alternatif')->from('group_karyawan_detail');
            })
            ->whereNotIn('kode_alternatif', $getRoleKepalaSekolah)
            ->orderBy('nama_alternatif', 'ASC')
            ->get();

        return view('pages.superadmin.group-karyawan.create', [
            'title' => 'Tambah Group Pegawai',
            'kepalaSekolah' => $kepalaSekolah,
            'namaKaryawan' => $alternatif,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_group_karyawan' => 'required',
            'kepala_sekolah' => 'required',
        ],[
            'nama_group_karyawan.required' => 'Nama group karyawan harus diisi',
            'kepala_sekolah.required' => 'Nama kepala sekolah harus diisi',
        ]);

        DB::beginTransaction();

        try {    
            // Menggunakan insertGetId agar bisa mendapatkan id group karyawan yang baru saja dibuat
            $idGroupKaryawan = GroupKaryawan::insertGetId([
                'nama_group_karyawan' => $validatedData['nama_group_karyawan'],
                'kepala_sekolah' => $validatedData['kepala_sekolah'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $validatedGroupKaryawanDetail = $request->validate([
                'kode_alternatif.*' => 'required',
            ], [
                'kode_alternatif.*.required' => 'Nama karyawan harus diisi',
            ]);

            $groupKaryawanDetail = [];
            foreach ($validatedGroupKaryawanDetail['kode_alternatif'] as $key => $value) {
                $groupKaryawanDetail[] = [
                    'id_group_karyawan' => $idGroupKaryawan,
                    'kode_alternatif' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            GroupKaryawanDetail::insert($groupKaryawanDetail);

            DB::commit();

            return redirect()->route('groupPenilaian.create', $idGroupKaryawan);
        } catch (\Throwable $th) {
            DB::rollback();

            $notif = notify()->error('Terjadi kesalahan saat menyimpan data group pegawai');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('pages.superadmin.group-karyawan.show', [
            'title' => 'Detail Group Pegawai',
            'groupKaryawan' => GroupKaryawan::with(['groupKaryawanDetail', 'groupKaryawanDetail.alternatif', 'groupPenilaian', 'groupPenilaian.alternatifPertama', 'groupPenilaian.groupPenilaianDetail', 'groupPenilaian.groupPenilaianDetail.alternatifKedua'])->where('id_group_karyawan', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Dapatkan nama karyawan dengan role kepala sekolah di table users
        $kepalaSekolah = Alternatif::with(['users'])
            ->whereHas('users', function($query) {
                $query->whereHas('roles', function($query) {
                    $query->where('name', 'kepala sekolah');
                });
            })
            ->whereNotIn('kode_alternatif', function($query) {
                $query->select('kode_alternatif')->from('group_karyawan_detail');
            })
            ->get();

        return view('pages.superadmin.group-karyawan.edit', [
            'title' => 'Ubah Group Pegawai',
            'namaKaryawan' => Alternatif::get(),
            'kepalaSekolah' => $kepalaSekolah,
            'groupKaryawan' => GroupKaryawan::with(['alternatif', 'groupKaryawanDetail', 'groupKaryawanDetail.alternatif'])->where('id_group_karyawan', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_group_karyawan' => 'required',
            'kepala_sekolah' => 'required',
        ],[
            'nama_group_karyawan.required' => 'Nama group karyawan harus diisi',
            'kepala_sekolah.required' => 'Nama kepala sekolah harus diisi',
        ]);

        DB::beginTransaction();

        try {    
            GroupKaryawan::where('id_group_karyawan', $id)->update([
                'nama_group_karyawan' => $validatedData['nama_group_karyawan'],
                'kepala_sekolah' => $validatedData['kepala_sekolah'],
                'updated_at' => now(),
            ]);

            $validatedGroupKaryawanDetail = $request->validate([
                'kode_alternatif.*' => 'required',
            ], [
                'kode_alternatif.*.required' => 'Nama karyawan harus diisi',
            ]);

            $groupKaryawanDetail = [];
            foreach ($validatedGroupKaryawanDetail['kode_alternatif'] as $key => $value) {
                $groupKaryawanDetail[] = [
                    'id_group_karyawan' => $id,
                    'kode_alternatif' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            GroupKaryawanDetail::where('id_group_karyawan', $id)->delete();
            GroupKaryawanDetail::insert($groupKaryawanDetail);

            DB::commit();
            return redirect()->route('groupPenilaian.edit', $id);
        } catch (\Throwable $th) {
            DB::rollback();

            $notif = notify()->error('Terjadi kesalahan saat mengubah data group pegawai');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            GroupKaryawan::where('id_group_karyawan', $id)->delete();

            $notif = notify()->success('Data group pegawai berhasil dihapus');
            return back()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menghapus data group pegawai');
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     * @params string $idGroupKaryawan
     */
    public function getAlternatif($idGroupKaryawan)
    {
        $getRoleKepalaSekolah = Alternatif::with(['users'])
            ->whereHas('users', function($query) {
                $query->whereHas('roles', function($query) {
                    $query->where('name', 'kepala sekolah');
                });
            })
            ->pluck('kode_alternatif');

        $alternatif = Alternatif::whereNotIn('kode_alternatif', function($query) use ($idGroupKaryawan) {
            $query->select('kode_alternatif')->from('group_karyawan_detail')->where('id_group_karyawan', $idGroupKaryawan);
        })
        ->whereNotIn('kode_alternatif', $getRoleKepalaSekolah)
        ->orderBy('nama_alternatif', 'ASC')
        ->get();

        return response()->json($alternatif);
    }
}
