<?php

namespace App\Http\Controllers;

use App\Http\Requests\Kriteria\StoreKriteriaRequest;
use App\Http\Requests\Kriteria\UpdateKriteriaRequest;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = Kriteria::orderBy('id_kriteria', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString();

        return view('pages.superadmin.kriteria.index', [
            'title' => 'Kriteria',
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get the last kode_kriteria from the database
        $lastKodeKriteria = Kriteria::orderBy('id_kriteria', 'DESC')->first();

        // Increment the last kode kriteria by 1
        $newKodeKriteria = $lastKodeKriteria ? ++$lastKodeKriteria->kode_kriteria : 'K1';

        return view('pages.superadmin.kriteria.create', [
            'title' => 'Tambah Kriteria',
            'newKodeKriteria' => $newKodeKriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKriteriaRequest $request)
    {
        try {
            Kriteria::create($request->validated());

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
        $kriteria = Kriteria::where('id_kriteria', $id)->first();

        return view('pages.superadmin.kriteria.show', [
            'title' => 'Detail Kriteria',
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriteria = Kriteria::where('id_kriteria', $id)->first();

        return view('pages.superadmin.kriteria.edit', [
            'title' => 'Ubah Kriteria',
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKriteriaRequest $request, $id)
    {
        try {
            Kriteria::where('id_kriteria', $id)->update($request->validated());

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
