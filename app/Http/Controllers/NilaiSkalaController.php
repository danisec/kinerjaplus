<?php

namespace App\Http\Controllers;

use App\Http\Requests\NilaiSkala\StoreNilaiSkalaRequest;
use App\Http\Requests\NilaiSkala\UpdateNilaiSkalaRequest;
use App\Models\NilaiSkala;

class NilaiSkalaController extends Controller
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
    public function create()
    {
        return view('pages.superadmin.nilai-skala.create', [
            'title' => 'Tambah Nilai Skala'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNilaiSkalaRequest $request)
    {
        try {
            $nilaiSkala = [];
            foreach ($request['skala'] as $key => $skala) {
                $nilaiSkala[] = [
                    'skala' => $skala,
                    'nilai_skala' => $request['nilai_skala'][$key],
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            NilaiSkala::insert($nilaiSkala);

            $notif = notify()->success('Berhasil menambahkan data nilai skala');
            return redirect()->route('nilaiSkala.edit')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data nilai skala');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(NilaiSkala $nilaiSkala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NilaiSkala $nilaiSkala)
    {
        $nilaiSkala = NilaiSkala::orderBy('id_nilai_skala', 'ASC')->get();

        return view('pages.superadmin.nilai-skala.edit', [
            'title' => 'Ubah Nilai Skala',
            'nilaiSkala' => $nilaiSkala,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNilaiSkalaRequest $request, NilaiSkala $nilaiSkala)
    {
        try {
            $nilaiSkala = [];
            foreach ($request['id_nilai_skala'] as $key => $id_nilai_skala) {
                $nilaiSkala[] = [
                    'id_nilai_skala' => $id_nilai_skala,
                    'skala' => $request['skala'][$key],
                    'nilai_skala' => $request['nilai_skala'][$key],
                    'updated_at' => now()
                ];
            }

            foreach ($nilaiSkala as $key => $value) {
                NilaiSkala::where('id_nilai_skala', $value['id_nilai_skala'])->update($value);
            }

            $notif = notify()->success('Berhasil mengubah data nilai skala');
            return redirect()->route('nilaiSkala.edit')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah data nilai skala');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NilaiSkala $nilaiSkala)
    {
        //
    }
}
