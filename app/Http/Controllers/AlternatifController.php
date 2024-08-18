<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /*
     * Constructor
     */
    private $namaKaryawan;

    public function __construct()
    {
        // Dapatkan nama karyawan kecuali superadmin, admin, dan IT
        $this->namaKaryawan = User::whereHas('roles', function ($query) {
            $query->whereNotIn('name', ['superadmin', 'admin', 'IT']);
        })->orderBy('fullname', 'ASC')->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.superadmin.alternatif.index', [
            'title' => 'Pegawai',
            'alternatif' => Alternatif::orderBy('id_alternatif', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alternatif = Alternatif::get();
        $enumJenisKelamin = DB::select("SHOW COLUMNS FROM alternatif WHERE Field = 'jenis_kelamin'")[0]->Type;

        // ambil kode alternatif terakhir
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_alternatif' => 'required|unique:alternatif,kode_alternatif',
            'nama_alternatif' => 'required|unique:alternatif,nama_alternatif',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_masuk_kerja' => 'required|date',
            'nip' => 'required|numeric|unique:alternatif,nip',
            'jabatan' => 'required',
            'pendidikan' => 'required|max:10',
        ], [
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'kode_alternatif.unique' => 'Kode alternatif sudah ada',
            'nama_alternatif.required' => 'Nama karyawan harus diisi',
            'nama_alternatif.unique' => 'Nama karyawan sudah ada',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'tanggal_masuk_kerja.required' => 'Tanggal masuk kerja harus diisi',
            'tanggal_masuk_kerja.date' => 'Tanggal masuk kerja harus berupa tanggal',
            'nip.required' => 'Nomor induk pegawai harus diisi',
            'nip.numeric' => 'Nomor induk pegawai harus berupa angka',
            'nip.unique' => 'Nomor induk pegawai sudah ada',
            'jabatan.required' => 'Jabatan harus diisi',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 10 karakter',
        ]);

        try {
            Alternatif::create($validatedData);

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
        return view('pages.superadmin.alternatif.show', [
            'title' => 'Detail Pegawai',
            'alternatif' => Alternatif::where('id_alternatif', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $enumJenisKelamin = DB::select("SHOW COLUMNS FROM alternatif WHERE Field = 'jenis_kelamin'")[0]->Type;

        return view('pages.superadmin.alternatif.edit', [
            'title' => 'Ubah Pegawai',
            'alternatif' => Alternatif::where('id_alternatif', $id)->first(),
            'jenisKelamin' => explode("','", substr($enumJenisKelamin, 6, (strlen($enumJenisKelamin)-8))),
            'namaKaryawan' => $this->namaKaryawan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_alternatif' => 'required',
            'nama_alternatif' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_masuk_kerja' => 'required|date',
            'nip' => 'required|numeric',
            'jabatan' => 'required',
            'pendidikan' => 'required|max:10',
        ], [
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'nama_alternatif.required' => 'Nama karyawan harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'tanggal_masuk_kerja.required' => 'Tanggal masuk kerja harus diisi',
            'tanggal_masuk_kerja.date' => 'Tanggal masuk kerja harus berupa tanggal',
            'nip.required' => 'Nomor induk pegawai harus diisi',
            'nip.numeric' => 'Nomor induk pegawai harus berupa angka',
            'jabatan.required' => 'Jabatan harus diisi',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 10 karakter',
        ]);

        try {
            Alternatif::where('id_alternatif', $id)->update($validatedData);
            DB::commit();

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
