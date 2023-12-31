<?php

namespace App\Http\Controllers;

use App\Models\NilaiSkala;
use Illuminate\Http\Request;

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
        return view('pages.dashboard.nilai-skala.create', [
            'title' => 'Tambah Nilai Skala'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'skala' => 'required',
            'nilai_skala' => 'required|min:1|max:100'
        ], [
            'skala.required' => 'Skala harus diisi',
            'nilai_skala.required' => 'Nilai skala harus diisi',
            'nilai_skala.min' => 'Nilai skala minimal 1',
            'nilai_skala.max' => 'Nilai skala maksimal 100'
        ]);

        try {
            $nilaiSkala = [];
            foreach ($validatedData['skala'] as $key => $skala) {
                $nilaiSkala[] = [
                    'skala' => $skala,
                    'nilai_skala' => $validatedData['nilai_skala'][$key],
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
        return view('pages.dashboard.nilai-skala.edit', [
            'title' => 'Ubah Nilai Skala',
            'nilaiSkala' => NilaiSkala::orderBy('id_nilai_skala', 'ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NilaiSkala $nilaiSkala)
    {
        $validatedData = $request->validate([
            'id_nilai_skala' => '',
            'skala' => '',
            'nilai_skala' => 'min:1|max:100'
        ], [
            'nilai_skala.min' => 'Nilai skala minimal 1',
            'nilai_skala.max' => 'Nilai skala maksimal 100'
        ]);

        try {
            $nilaiSkala = [];
            foreach ($validatedData['id_nilai_skala'] as $key => $id_nilai_skala) {
                $nilaiSkala[] = [
                    'id_nilai_skala' => $id_nilai_skala,
                    'skala' => $validatedData['skala'][$key],
                    'nilai_skala' => $validatedData['nilai_skala'][$key],
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
