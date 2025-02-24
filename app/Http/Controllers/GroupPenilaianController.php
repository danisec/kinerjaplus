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
        $groupKaryawan = GroupKaryawan::with([
            'alternatif', 
            'groupKaryawanDetail', 
            'groupKaryawanDetail.alternatif', 
            'groupPenilaian', 
            'groupPenilaian.groupPenilaianDetail.alternatifKedua'
        ])->where('id_group_karyawan', $id)->first();

        // Dapatkan data kepala sekolah dari $groupKaryawan
        $kepalaSekolah = $groupKaryawan->alternatif;
        
        // Dapatkan data karyawan dari $groupKaryawan
        $namaKaryawan = $groupKaryawan->groupKaryawanDetail;

        // Dapatkan data group penilaian berdasarkan id_group_karyawan
        $groupPenilaian = $groupKaryawan->groupPenilaian;

        // Menggabungkan data kepala sekolah dan karyawan menjadi satu array
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

        // Cocokkan groupPenilaian->alternatif_pertama dengan groupKaryawanArray->kode_alternatif
        foreach ($groupPenilaian as $penilaian) {
            foreach ($groupKaryawanArray as &$karyawan) {
                if ($penilaian->alternatif_pertama === $karyawan['kode_alternatif']) {
                    // Tambahkan data groupPenilaianDetail ke dalam array group_penilaian
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
    public function update(Request $request, $id)
    {
    // Validasi data yang dikirim dari form
    $validatedData = $request->validate([
        'id_group_karyawan' => 'required',
        'alternatif_pertama.*' => 'required',
        'alternatif_kedua.*' => 'required|array',
    ], [
        'alternatif_kedua.*.required' => 'Nama karyawan harus diisi',
    ]);

    DB::beginTransaction();

    try {
        // Ambil data group_penilaian yang sudah ada berdasarkan id_group_karyawan
        $existingGroupPenilaian = GroupPenilaian::where('id_group_karyawan', $validatedData['id_group_karyawan'])
            ->get()
            ->keyBy('alternatif_pertama'); // Gunakan alternatif_pertama sebagai key

        // Ambil data group_penilaian_detail yang sudah ada berdasarkan id_group_penilaian
        $existingGroupPenilaianDetail = GroupPenilaianDetail::whereIn('id_group_penilaian', $existingGroupPenilaian->pluck('id_group_penilaian'))
            ->get()
            ->groupBy('id_group_penilaian');

        // Proses update atau insert data group_penilaian
        foreach ($validatedData['alternatif_pertama'] as $key => $alternatifPertama) {
            if ($existingGroupPenilaian->has($alternatifPertama)) {
                // Jika data sudah ada, update updated_at
                GroupPenilaian::where('id_group_penilaian', $existingGroupPenilaian[$alternatifPertama]->id_group_penilaian)
                    ->update(['updated_at' => now()]);
            } else {
                // Jika data belum ada, insert baru
                $groupPenilaianId = GroupPenilaian::insertGetId([
                    'id_group_karyawan' => $validatedData['id_group_karyawan'],
                    'alternatif_pertama' => $alternatifPertama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $existingGroupPenilaian[$alternatifPertama] = (object) [
                    'id_group_penilaian' => $groupPenilaianId,
                ];
            }
        }

        // Proses update atau insert data group_penilaian_detail
        foreach ($validatedData['alternatif_kedua'] as $key => $alternatifKeduaList) {
            $idGroupPenilaian = $existingGroupPenilaian[$validatedData['alternatif_pertama'][$key]]->id_group_penilaian;

            // Ambil data alternatif_kedua yang sudah ada untuk id_group_penilaian ini
            $existingDetails = $existingGroupPenilaianDetail->get($idGroupPenilaian, collect());

            // Bandingkan dengan data yang dikirim dari form
            foreach ($alternatifKeduaList as $alternatifKedua) {
                if (!$existingDetails->contains('alternatif_kedua', $alternatifKedua)) {
                    // Jika data belum ada, insert baru
                    GroupPenilaianDetail::create([
                        'id_group_penilaian' => $idGroupPenilaian,
                        'alternatif_kedua' => $alternatifKedua,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Hapus data yang tidak ada di form tetapi ada di database
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
