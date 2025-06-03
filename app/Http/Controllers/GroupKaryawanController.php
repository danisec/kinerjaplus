<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupKaryawan\StoreGroupKaryawanRequest;
use App\Http\Requests\GroupKaryawan\UpdateGroupKaryawanRequest;
use App\Models\Alternatif;
use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use Illuminate\Support\Facades\DB;

class GroupKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groupKaryawan = GroupKaryawan::with([
            'alternatif', 
            'groupKaryawanDetail'
        ])
        ->orderBy('nama_group_karyawan', 'DESC')
        ->filter(request(['search']))
        ->paginate(10)
        ->withQueryString();

        return view('pages.superadmin.group-karyawan.index', [
            'title' => 'Group Pegawai',
            'groupKaryawan' => $groupKaryawan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get nama karyawan with role kepala sekolah in users table that is not registered in group karyawan
        $kepalaSekolah = Alternatif::with([
            'users', 
            'groupKaryawan'
        ])
        ->whereHas('users', function($query) {
            $query->whereHas('roles', function($query) {
                $query->where('name', 'kepala sekolah');
            });
        })
        ->whereNotIn('kode_alternatif', function($query) {
            $query->select('kepala_sekolah')->from('group_karyawan');
        })
        ->get();
            
        // Get nama karyawan that is not registered in group karyawan and do not show kepala sekolah that is not registered
        $pimpinan = Alternatif::whereNotIn('kode_alternatif', function($query) {
            $query->select('kepala_sekolah')->from('group_karyawan');
        })
        ->orderBy('nama_alternatif', 'ASC')
        ->get();

        $alternatif = Alternatif::orderBy('nama_alternatif', 'ASC')->get();

        return view('pages.superadmin.group-karyawan.create', [
            'title' => 'Tambah Group Pegawai',
            'kepalaSekolah' => $pimpinan,
            'namaKaryawan' => $alternatif,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroupKaryawanRequest $request)
    {
        DB::beginTransaction();

        try {    
            // Get id group karyawan
            $idGroupKaryawan = GroupKaryawan::insertGetId([
                'nama_group_karyawan' => $request['nama_group_karyawan'],
                'kepala_sekolah' => $request['kepala_sekolah'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $groupKaryawanDetail = [];
            foreach ($request['kode_alternatif'] as $key => $value) {
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
        $groupKaryawan = GroupKaryawan::with([
            'groupKaryawanDetail', 
            'groupKaryawanDetail.alternatif', 
            'groupPenilaian', 
            'groupPenilaian.alternatifPertama', 
            'groupPenilaian.groupPenilaianDetail', 
            'groupPenilaian.groupPenilaianDetail.alternatifKedua'
        ])
        ->where('id_group_karyawan', $id)
        ->first();

        return view('pages.superadmin.group-karyawan.show', [
            'title' => 'Detail Group Pegawai',
            'groupKaryawan' => $groupKaryawan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Get nama karyawan with role kepala sekolah
        $kepalaSekolah = Alternatif::with([
            'users'
        ])
        ->whereHas('users', function($query) {
            $query->whereHas('roles', function($query) {
                $query->where('name', 'kepala sekolah');
            });
        })
        ->whereNotIn('kode_alternatif', function($query) {
            $query->select('kode_alternatif')->from('group_karyawan_detail');
        })
        ->get();
        
        // Get all nama karyawan
        $pimpinan = Alternatif::orderBy('nama_alternatif', 'ASC')->get();

        // Merge data kepala sekolah with data kryawan is not registered in group karyawan
        $mergePimpinan = [];
        foreach ($kepalaSekolah as $key => $value) {
            $mergePimpinan[] = $value;
        }

        foreach ($pimpinan as $key => $value) {
            $mergePimpinan[] = $value;
        }

        // Get all nama karyawan
        $namaKaryawan = Alternatif::get();
        
        // Get group karyawan by id
        $groupKaryawan = GroupKaryawan::with([
            'alternatif', 
            'groupKaryawanDetail', 
            'groupKaryawanDetail.alternatif'
        ])
        ->where('id_group_karyawan', $id)
        ->first();
        
        // Get nama karyawan is not selected
        $karyawanBelumDipilih = Alternatif::whereNotIn('kode_alternatif', function($query) use ($id) {
            $query->select('kode_alternatif')
                ->from('group_karyawan_detail')
                ->where('id_group_karyawan', $id);
        })
        ->get();

        return view('pages.superadmin.group-karyawan.edit', [
            'title' => 'Ubah Group Pegawai',
            'namaKaryawan' => $namaKaryawan,
            'kepalaSekolah' => $mergePimpinan,
            'groupKaryawan' => $groupKaryawan,
            'karyawanBelumDipilih' => $karyawanBelumDipilih
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupKaryawanRequest $request, $id)
    {
        DB::beginTransaction();

        try {    
            GroupKaryawan::where('id_group_karyawan', $id)->update([
                'nama_group_karyawan' => $request['nama_group_karyawan'],
                'kepala_sekolah' => $request['kepala_sekolah'],
                'updated_at' => now(),
            ]);

            $groupKaryawanDetail = [];
            foreach ($request['kode_alternatif'] as $key => $value) {
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
            $notif = notify()->error('Data tidak bisa dihapus karena masih digunakan dalam penilaian');
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     * @params string $idGroupKaryawan
     */
    public function getAlternatif($idGroupKaryawan)
    {
        $getRoleKepalaSekolah = Alternatif::with([
            'users'
        ])
        ->whereHas('users', function($query) {
            $query->whereHas('roles', function($query) {
                $query->where('name', 'kepala sekolah');
            });
        })
        ->pluck('kode_alternatif');

        $alternatif = Alternatif::whereNotIn('kode_alternatif', function($query) use ($idGroupKaryawan) {
            $query->select('kode_alternatif')
            ->from('group_karyawan_detail')
            ->where('id_group_karyawan', $idGroupKaryawan);
        })
        ->whereNotIn('kode_alternatif', $getRoleKepalaSekolah)
        ->orderBy('nama_alternatif', 'ASC')
        ->get();

        return response()->json($alternatif);
    }
}
