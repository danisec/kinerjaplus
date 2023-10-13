<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.kriteria.index', [
            'title' => 'Kriteria',
            'kriteria' => Kriteria::orderBy('kode_kriteria', 'ASC')->filter(request(['search']))->paginate(10)->withQueryString(),
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
            'kode_kriteria' => 'required|unique:kriteria,kode_kriteria|max:2',
            'nama_kriteria' => 'required|unique:kriteria,nama_kriteria',
            'deskripsi' => 'required',
        ], [
            'kode_kriteria.required' => 'Kode kriteria harus diisi',
            'kode_kriteria.unique' => 'Kode kriteria sudah ada',
            'kode_kriteria.max' => 'Kode kriteria maksimal 2 karakter',
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'nama_kriteria.unique' => 'Nama kriteria sudah ada',
            'deskripsi.required' => 'Deskripsi kriteria harus diisi',
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
            'kode_kriteria' => 'required|max:2',
            'nama_kriteria' => 'required',
            'deskripsi' => 'required',
        ], [
            'kode_kriteria.required' => 'Kode kriteria harus diisi',
            'kode_kriteria.max' => 'Kode kriteria maksimal 2 karakter',
            'nama_kriteria.required' => 'Nama kriteria harus diisi',
            'deskripsi.required' => 'Deskripsi kriteria harus diisi',
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
        Kriteria::where('id_kriteria', $id)->delete();

        $notif = notify()->success('Data kriteria berhasil dihapus');
        return back()->with('notif', $notif);
    }
}
