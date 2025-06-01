<?php

namespace App\Http\Controllers;

use App\Http\Requests\Alternatif\StoreAlternatifRequest;
use App\Http\Requests\Alternatif\UpdateAlternatifRequest;
use App\Models\Alternatif;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /*
     * Constructor
     */
    private $namaKaryawan;

    public function __construct()
    {
       // Get nama karyawan except superadmin, admin, and IT
        $this->namaKaryawan = User::whereHas('roles', function ($query) {
            $query->whereNotIn('name', ['superadmin', 'admin', 'IT']);
        })->orderBy('fullname', 'ASC')->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::orderBy('id_alternatif', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString();

        return view('pages.superadmin.alternatif.index', [
            'title' => 'Pegawai',
            'alternatif' => $alternatif,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alternatif = Alternatif::get();
        $enumJenisKelamin = DB::select("SHOW COLUMNS FROM alternatif WHERE Field = 'jenis_kelamin'")[0]->Type;

        // Get last kode_alternatif
        $lastKodeAlaternatif = Alternatif::orderBy('id_alternatif', 'DESC')->first();
        $newKodeAlternatif = $lastKodeAlaternatif ? ++$lastKodeAlaternatif->kode_alternatif : 'A1';

        return view('pages.superadmin.alternatif.create', [
            'title' => 'Tambah Pegawai',
            'pluckAlternatif' => $alternatif->pluck('nama_alternatif')->toArray(),
            'jenisKelamin' => explode("','", substr($enumJenisKelamin, 6, (strlen($enumJenisKelamin)-8))),
            'namaKaryawan' => $this->namaKaryawan,
            'newKodeAlternatif' => $newKodeAlternatif,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlternatifRequest $request)
    {
        try {
            Alternatif::create($request->validated());

            $notif = notify()->success('Data pegawai berhasil ditambahkan');
            return redirect()->route('alternatif.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data pegawai');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alternatif = Alternatif::where('id_alternatif', $id)->first();

        return view('pages.superadmin.alternatif.show', [
            'title' => 'Detail Pegawai',
            'alternatif' => $alternatif,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $alternatif = Alternatif::where('id_alternatif', $id)->first();

        $enumJenisKelamin = DB::select("SHOW COLUMNS FROM alternatif WHERE Field = 'jenis_kelamin'")[0]->Type;
        $jenisKelamin = explode("','", substr($enumJenisKelamin, 6, (strlen($enumJenisKelamin)-8)));

        return view('pages.superadmin.alternatif.edit', [
            'title' => 'Ubah Pegawai',
            'alternatif' => $alternatif,
            'jenisKelamin' => $jenisKelamin,
            'namaKaryawan' => $this->namaKaryawan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternatifRequest $request, $id)
    {
        try {
            Alternatif::where('id_alternatif', $id)->update($request->validated());

            $notif = notify()->success('Data pegawai berhasil diubah');
            return redirect()->route('alternatif.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah data pegawai');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Alternatif::where('id_alternatif', $id)->delete();

        $notif = notify()->success('Data pegawai berhasil dihapus');
        return back()->with('notif', $notif);
    }
}
