<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.alternatif.index', [
            'title' => 'Karyawan',
            'alternatif' => Alternatif::orderBy('kode_alternatif', 'ASC')->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enumJenisKelamin = DB::select("SHOW COLUMNS FROM alternatif WHERE Field = 'jenis_kelamin'")[0]->Type;
       
        return view('pages.dashboard.alternatif.create', [
            'title' => 'Tambah Karyawan',
            'jenisKelamin' => explode("','", substr($enumJenisKelamin, 6, (strlen($enumJenisKelamin)-8))),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_alternatif' => 'required|unique:alternatif,kode_alternatif|max:2',
            'nama_alternatif' => 'required|unique:alternatif,nama_alternatif',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_masuk_kerja' => 'required|date',
            'nip' => 'required|unique:alternatif,nip|max:10',
            'jabatan' => 'required',
            'pendidikan' => 'required|max:3',
        ], [
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'kode_alternatif.unique' => 'Kode alternatif sudah ada',
            'kode_alternatif.max' => 'Kode alternatif maksimal 2 karakter',
            'nama_alternatif.required' => 'Nama karyawan harus diisi',
            'nama_alternatif.unique' => 'Nama karyawan sudah ada',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'tanggal_masuk_kerja.required' => 'Tanggal masuk kerja harus diisi',
            'tanggal_masuk_kerja.date' => 'Tanggal masuk kerja harus berupa tanggal',
            'nip.required' => 'Nomor induk pegawai harus diisi',
            'nip.unique' => 'Nomor induk pegawai sudah ada',
            'nip.max' => 'Nomor induk pegawai maksimal 10 karakter',
            'jabatan.required' => 'Jabatan harus diisi',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 3 karakter',
        ]);

        DB::beginTransaction();

        try {
            Alternatif::create($validatedData);
            DB::commit();

            $notif = notify()->success('Data karyawan berhasil ditambahkan');
            return redirect()->route('alternatif.index')->withInput()->with('notif', $notif);

        } catch (\Throwable $th) {
            DB::rollback();

            $notif = notify()->error('Terjadi kesalahan saat menyimpan data karyawan');
            return back();
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
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_alternatif' => 'required|max:2',
            'nama_alternatif' => 'required',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_masuk_kerja' => 'required|date',
            'nip' => 'required|max:10',
            'jabatan' => 'required',
            'pendidikan' => 'required|max:3',
        ], [
            'kode_alternatif.required' => 'Kode alternatif harus diisi',
            'kode_alternatif.max' => 'Kode alternatif maksimal 2 karakter',
            'nama_alternatif.required' => 'Nama karyawan harus diisi',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan',
            'tanggal_masuk_kerja.required' => 'Tanggal masuk kerja harus diisi',
            'tanggal_masuk_kerja.date' => 'Tanggal masuk kerja harus berupa tanggal',
            'nip.required' => 'Nomor induk pegawai harus diisi',
            'nip.max' => 'Nomor induk pegawai maksimal 10 karakter',
            'jabatan.required' => 'Jabatan harus diisi',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 3 karakter',
        ]);

        DB::beginTransaction();

        try {
            Alternatif::where('id_alternatif', $id)->update($validatedData);
            DB::commit();

            $notif = notify()->success('Data karyawan berhasil diubah');
            return redirect()->route('alternatif.index')->withInput()->with('notif', $notif);

        } catch (\Throwable $th) {
            DB::rollback();

            $notif = notify()->error('Terjadi kesalahan saat mengubah data karyawan');
            return back();
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
