<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupPenilaian\StoreGroupPenilaianRequest;
use App\Http\Requests\GroupPenilaian\UpdateGroupPenilaianRequest;
use App\Models\GroupKaryawan;
use App\Models\GroupPenilaian;
use App\Models\GroupPenilaianDetail;
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
        $groupKaryawan = GroupKaryawan::with([
            'alternatif', 
            'groupKaryawanDetail', 
            'groupKaryawanDetail.alternatif'
        ])
        ->where('id_group_karyawan', $id)
        ->first();

        // Get kepala sekolah
        $kepalaSekolah = $groupKaryawan->alternatif;
        
        // Get data karyawan
        $namaKaryawan = $groupKaryawan->groupKaryawanDetail;

        // Merge kepala sekolah and karyawan in groupKaryawanArray
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
    public function store(StoreGroupPenilaianRequest $request)
    {
        DB::beginTransaction();

        try {
            $groupPenilaian = [];
            foreach ($request['alternatif_pertama'] as $key => $value) {
                $groupPenilaian[] = GroupPenilaian::insertGetId([
                    'id_group_karyawan' => $request['id_group_karyawan'],
                    'alternatif_pertama' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $groupPenilaianDetail = [];
            foreach ($request['alternatif_kedua'] as $key => $alternatifKedua) {
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
        $groupKaryawan = GroupKaryawan::with([
            'alternatif', 
            'groupKaryawanDetail', 
            'groupKaryawanDetail.alternatif', 
            'groupPenilaian', 
            'groupPenilaian.groupPenilaianDetail.alternatifKedua'
        ])
        ->where('id_group_karyawan', $id)
        ->first();

        // Get data kepala sekolah
        $kepalaSekolah = $groupKaryawan->alternatif;
        
        // Get data karyawan
        $namaKaryawan = $groupKaryawan->groupKaryawanDetail;

        // Get group penilaian by id
        $groupPenilaian = $groupKaryawan->groupPenilaian;

        // Merge kepala sekolah and karyawan
        $groupKaryawanArray = [
            [
                'kode_alternatif' => $kepalaSekolah->kode_alternatif,
                'nama_alternatif' => $kepalaSekolah->nama_alternatif,
                'jabatan' => $kepalaSekolah->jabatan,
                'group_penilaian' => [],
            ]
        ];

        foreach ($namaKaryawan as $valueNamaKaryawan) {
            $groupKaryawanArray[] = [
                'kode_alternatif' => $valueNamaKaryawan->kode_alternatif,
                'nama_alternatif' => $valueNamaKaryawan->alternatif->nama_alternatif,
                'jabatan' => $valueNamaKaryawan->alternatif->jabatan,
                'group_penilaian' => [],
            ];
        }

        // Match each groupPenilaian's 'alternatif_pertama' with 'kode_alternatif' in groupKaryawanArray
        foreach ($groupPenilaian as $penilaian) {
            foreach ($groupKaryawanArray as &$karyawan) {
                if ($penilaian->alternatif_pertama === $karyawan['kode_alternatif']) {
                    foreach ($penilaian->groupPenilaianDetail as $detail) {
                        $karyawan['group_penilaian'][] = [
                            'alternatif_kedua' => $detail->alternatif_kedua,
                        ];
                    }
                }
            }
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
    public function update(UpdateGroupPenilaianRequest $request, $id)
    {
    DB::beginTransaction();

    try {
        // Get data group penilaian that already exists by id group karyawan
        $existingGroupPenilaian = GroupPenilaian::where('id_group_karyawan', $request['id_group_karyawan'])
        ->get()
        ->keyBy('alternatif_pertama');

        // Get data group penilaian detail that already exists by id group penilaian
        $existingGroupPenilaianDetail = GroupPenilaianDetail::whereIn('id_group_penilaian', $existingGroupPenilaian->pluck('id_group_penilaian'))
        ->get()
        ->groupBy('id_group_penilaian');

        // Update or create group penilaian
        foreach ($request['alternatif_pertama'] as $key => $alternatifPertama) {
            if ($existingGroupPenilaian->has($alternatifPertama)) {
                GroupPenilaian::where('id_group_penilaian', $existingGroupPenilaian[$alternatifPertama]->id_group_penilaian)
                    ->update(['updated_at' => now()]);
            } else {
                $groupPenilaianId = GroupPenilaian::insertGetId([
                    'id_group_karyawan' => $request['id_group_karyawan'],
                    'alternatif_pertama' => $alternatifPertama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $existingGroupPenilaian[$alternatifPertama] = (object) [
                    'id_group_penilaian' => $groupPenilaianId,
                ];
            }
        }

        // Update or insert group penilaian detail
        foreach ($request['alternatif_kedua'] as $key => $alternatifKeduaList) {
            $idGroupPenilaian = $existingGroupPenilaian[$request['alternatif_pertama'][$key]]->id_group_penilaian;

            // Get data alternatif kedua that already exists for this id group penilaian
            $existingDetails = $existingGroupPenilaianDetail->get($idGroupPenilaian, collect());

            // Compare with data sent from the form
            foreach ($alternatifKeduaList as $alternatifKedua) {
                if (!$existingDetails->contains('alternatif_kedua', $alternatifKedua)) {
                    GroupPenilaianDetail::create([
                        'id_group_penilaian' => $idGroupPenilaian,
                        'alternatif_kedua' => $alternatifKedua,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Delete data that is not in the form but exists in the database
            $existingDetails->whereNotIn('alternatif_kedua', $alternatifKeduaList)
                ->each(function ($detail) {
                    GroupPenilaianDetail::where('id_group_penilaian_detail', $detail->id_group_penilaian_detail)
                        ->delete();
                });
        }

        DB::commit();

        $notif = notify()->success('Data group pegawai berhasil diubah');
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
