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
        $this->namaKaryawan = User::where('role', '!=', 'superadmin')->orderBy('fullname', 'ASC')->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.alternatif.index', [
            'title' => 'Karyawan',
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
       
        return view('pages.dashboard.alternatif.create', [
            'title' => 'Tambah Karyawan',
            'pluckAlternatif' => $alternatif->pluck('nama_alternatif')->toArray(),
            'jenisKelamin' => explode("','", substr($enumJenisKelamin, 6, (strlen($enumJenisKelamin)-8))),
            'namaKaryawan' => $this->namaKaryawan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_alternatif' => 'required|unique:alternatif,kode_alternatif|max:3',
            'nama_alternatif' => 'required|unique:alternatif,nama_alternatif',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_masuk_kerja' => 'required|date',
            'nip' => 'required|numeric|unique:alternatif,nip|digits:10',
            'jabatan' => 'required',
            'pendidikan' => 'required|max:3',
        ], [
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'kode_alternatif.unique' => 'Kode alternatif sudah ada',
            'kode_alternatif.max' => 'Kode alternatif maksimal 3 karakter',
            'nama_alternatif.required' => 'Nama karyawan harus diisi',
            'nama_alternatif.unique' => 'Nama karyawan sudah ada',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'tanggal_masuk_kerja.required' => 'Tanggal masuk kerja harus diisi',
            'tanggal_masuk_kerja.date' => 'Tanggal masuk kerja harus berupa tanggal',
            'nip.required' => 'Nomor induk pegawai harus diisi',
            'nip.numeric' => 'Nomor induk pegawai harus berupa angka',
            'nip.unique' => 'Nomor induk pegawai sudah ada',
            'nip.digits' => 'Nomor induk pegawai harus 10 digit',
            'jabatan.required' => 'Jabatan harus diisi',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 3 karakter',
        ]);

        try {
            Alternatif::create($validatedData);

            $notif = notify()->success('Data karyawan berhasil ditambahkan');
            return redirect()->route('alternatif.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data karyawan');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('pages.dashboard.alternatif.show', [
            'title' => 'Detail Karyawan',
            'alternatif' => Alternatif::where('id_alternatif', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $enumJenisKelamin = DB::select("SHOW COLUMNS FROM alternatif WHERE Field = 'jenis_kelamin'")[0]->Type;

        return view('pages.dashboard.alternatif.edit', [
            'title' => 'Ubah Karyawan',
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
            'kode_alternatif' => 'required|max:3',
            'nama_alternatif' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_masuk_kerja' => 'required|date',
            'nip' => 'required|numeric|digits:10',
            'jabatan' => 'required',
            'pendidikan' => 'required|max:3',
        ], [
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'kode_alternatif.max' => 'Kode alternatif maksimal 3 karakter',
            'nama_alternatif.required' => 'Nama karyawan harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'tanggal_masuk_kerja.required' => 'Tanggal masuk kerja harus diisi',
            'tanggal_masuk_kerja.date' => 'Tanggal masuk kerja harus berupa tanggal',
            'nip.required' => 'Nomor induk pegawai harus diisi',
            'nip.numeric' => 'Nomor induk pegawai harus berupa angka',
            'nip.digits' => 'Nomor induk pegawai harus 10 digit',
            'jabatan.required' => 'Jabatan harus diisi',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 3 karakter',
        ]);

        try {
            Alternatif::where('id_alternatif', $id)->update($validatedData);
            DB::commit();

            $notif = notify()->success('Data karyawan berhasil diubah');
            return redirect()->route('alternatif.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah data karyawan');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Alternatif::where('id_alternatif', $id)->delete();

        $notif = notify()->success('Data karyawan berhasil dihapus');
        return back()->with('notif', $notif);
    }
}
