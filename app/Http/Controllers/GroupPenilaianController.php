<?php

namespace App\Http\Controllers;

use App\Models\GroupKaryawan;
use App\Models\GroupPenilaian;
use App\Models\GroupPenilaianDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $groupKaryawan = GroupKaryawan::with(['alternatif', 'groupKaryawanDetail', 'groupKaryawanDetail.alternatif'])->where('id_group_karyawan', $id)->first();

        // Dapatkan data kepala sekolah dari $groupKaryawan
        $kepalaSekolah = $groupKaryawan->alternatif;
        
        // Dapatkan data karyawan dari $groupKaryawan
        $namaKaryawan = $groupKaryawan->groupKaryawanDetail;

        // Menggabungkan data kepala sekolah dan karyawan menjadi satu array
        $groupKaryawanArray = [
            [
                'kode_alternatif' => $kepalaSekolah->kode_alternatif,
                'nama_alternatif' => $kepalaSekolah->nama_alternatif,
                'jabatan' => $kepalaSekolah->jabatan,
            ]
        ];

        foreach ($namaKaryawan as $value) {
            $groupKaryawanArray[] = [
                'kode_alternatif' => $value->kode_alternatif,
                'nama_alternatif' => $value->alternatif->nama_alternatif,
                'jabatan' => $value->alternatif->jabatan,
            ];
        }

        return view('pages.superadmin.group-penilaian.create', [
            'title' => 'Filter Group Penilaian',
            'groupKaryawan' => $groupKaryawan,
            'groupKaryawanArray' => $groupKaryawanArray,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'id_group_karyawan' => 'required',
            'alternatif_pertama.*' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $groupPenilaian = [];
            foreach ($validatedData['alternatif_pertama'] as $key => $value) {
                $groupPenilaian[] = GroupPenilaian::insertGetId([
                    'id_group_karyawan' => $validatedData['id_group_karyawan'],
                    'alternatif_pertama' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $validatedGroupPenilaianDetail = $request->validate([
                'alternatif_kedua.*' => 'required',
            ], [
                'alternatif_kedua.*.required' => 'Nama karyawan harus diisi',
            ]);

            $groupPenilaianDetail = [];
            foreach ($validatedGroupPenilaianDetail['alternatif_kedua'] as $key => $alternatifKedua) {
                foreach ($alternatifKedua as $value) {
                    $groupPenilaianDetail[] = [
                        'id_group_penilaian' => $groupPenilaian[$key],
                        'alternatif_kedua' => $value,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            GroupPenilaianDetail::insert($groupPenilaianDetail);

            DB::commit();

            $notif = notify()->success('Data group karyawan berhasil ditambahkan');
            return redirect()->route('groupKaryawan.index')->with('notif', $notif);
        } catch (\Throwable $th) {
            DB::rollback();

            $notif = notify()->error('Terjadi kesalahan saat menyimpan data group penilaian');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $groupKaryawan = GroupKaryawan::with(['alternatif', 'groupKaryawanDetail', 'groupKaryawanDetail.alternatif'])->where('id_group_karyawan', $id)->first();

        // Dapatkan data kepala sekolah dari $groupKaryawan
        $kepalaSekolah = $groupKaryawan->alternatif;
        
        // Dapatkan data karyawan dari $groupKaryawan
        $namaKaryawan = $groupKaryawan->groupKaryawanDetail;

        // Menggabungkan data kepala sekolah dan karyawan menjadi satu array
        $groupKaryawanArray = [
            [
                'kode_alternatif' => $kepalaSekolah->kode_alternatif,
                'nama_alternatif' => $kepalaSekolah->nama_alternatif,
                'jabatan' => $kepalaSekolah->jabatan,
            ]
        ];

        foreach ($namaKaryawan as $value) {
            $groupKaryawanArray[] = [
                'kode_alternatif' => $value->kode_alternatif,
                'nama_alternatif' => $value->alternatif->nama_alternatif,
                'jabatan' => $value->alternatif->jabatan,
            ];
        }

        return view('pages.superadmin.group-penilaian.edit', [
            'title' => 'Filter Group Penilaian',
            'groupKaryawan' => $groupKaryawan,
            'groupKaryawanArray' => $groupKaryawanArray,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_group_karyawan' => 'required',
            'alternatif_pertama.*' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Hapus data di table group_penilaian berdasarkan id_group_karyawan dan group_penilaian_detail berdasarkan id_group_penilaian
            GroupPenilaian::where('id_group_karyawan', $validatedData['id_group_karyawan'])->delete();
            GroupPenilaianDetail::where('id_group_penilaian', $id)->delete();

            $groupPenilaian = [];
                foreach ($validatedData['alternatif_pertama'] as $key => $value) {
                    $groupPenilaian[] = GroupPenilaian::insertGetId([
                        'id_group_karyawan' => $validatedData['id_group_karyawan'],
                        'alternatif_pertama' => $value,
                        'updated_at' => now(),
                    ]);
                }

            $validatedGroupPenilaianDetail = $request->validate([
                'alternatif_kedua.*' => 'required',
            ], [
                'alternatif_kedua.*.required' => 'Nama karyawan harus diisi',
            ]);

            $groupPenilaianDetail = [];
            foreach ($validatedGroupPenilaianDetail['alternatif_kedua'] as $key => $alternatifKedua) {
                foreach ($alternatifKedua as $value) {
                    $groupPenilaianDetail[] = [
                        'id_group_penilaian' => $groupPenilaian[$key],
                        'alternatif_kedua' => $value,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            GroupPenilaianDetail::insert($groupPenilaianDetail);

            DB::commit();

            $notif = notify()->success('Data group karyawan berhasil diubah');
            return redirect()->route('groupKaryawan.index')->with('notif', $notif);
        } catch (\Throwable $th) {
            DB::rollback();

            $notif = notify()->error('Terjadi kesalahan saat menyimpan data group penilaian');
            return back()->withInput();
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
