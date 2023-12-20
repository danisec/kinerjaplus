<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.kriteria.index', [
            'title' => 'Kriteria',
            'kriteria' => Kriteria::orderBy('id_kriteria', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.kriteria.create', [
            'title' => 'Tambah Kriteria',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kriteria' => 'required|unique:kriteria,kode_kriteria|max:3',
            'nama_kriteria' => 'required|max:255',
            'bobot_kriteria' => 'required|numeric',
        ], [
            'kode_kriteria.required' => 'Kode kriteria harus diisi',
            'kode_kriteria.unique' => 'Kode kriteria sudah ada',
            'kode_kriteria.max' => 'Kode kriteria maksimal 3 karakter',
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'nama_kriteria.max' => 'Nama kriteria maksimal 255 karakter',
            'bobot_kriteria.required' => 'Bobot kriteria harus diisi',
            'bobot_kriteria.numeric' => 'Bobot kriteria harus berupa angka',
        ]);

        try {
            Kriteria::create($validatedData);

            $notif = notify()->success('Data kriteria berhasil ditambahkan');
            return redirect()->route('kriteria.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data kriteria');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('pages.dashboard.kriteria.show', [
            'title' => 'Detail Kriteria',
            'kriteria' => Kriteria::where('id_kriteria', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pages.dashboard.kriteria.edit', [
            'title' => 'Ubah Kriteria',
            'kriteria' => Kriteria::where('id_kriteria', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_kriteria' => 'required|max:3',
            'nama_kriteria' => 'required|max:255',
            'bobot_kriteria' => 'required|numeric',
        ], [
            'kode_kriteria.required' => 'Kode kriteria harus diisi',
            'kode_kriteria.max' => 'Kode kriteria maksimal 3 karakter',
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'nama_kriteria.max' => 'Nama kriteria maksimal 255 karakter',
            'bobot_kriteria.required' => 'Bobot kriteria harus diisi',
            'bobot_kriteria.numeric' => 'Bobot kriteria harus berupa angka',
        ]);

        try {
            Kriteria::where('id_kriteria', $id)->update($validatedData);

            $notif = notify()->success('Data kriteria berhasil diubah');
            return redirect()->route('kriteria.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah data kriteria');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Kriteria::where('id_kriteria', $id)->delete();

            $notif = notify()->success('Data kriteria berhasil dihapus');
            return back()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menghapus data kriteria');
            return back();
        }
    }
}
