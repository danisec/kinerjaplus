<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkalaIndikator\StoreSkalaIndikatorRequest;
use App\Http\Requests\SkalaIndikator\UpdateSkalaIndikatorRequest;
use App\Models\NilaiSkala;
use App\Models\SkalaIndikator;
use App\Models\SkalaIndikatorDetail;
use App\Models\Subkriteria;
use Illuminate\Support\Facades\DB;

class SkalaIndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skalaIndikator = SkalaIndikator::with([
            'indikatorSubkriteria', 
            'skalaIndikatorDetail'
        ])
        ->orderBy('id_skala_indikator', 'DESC')
        ->filter(request(['search']))
        ->paginate(10)->withQueryString();

        $nilaiSkala = NilaiSkala::orderBy('id_nilai_skala', 'ASC')->get();

        return view('pages.superadmin.skala-indikator.index', [
            'title' => 'Skala Indikator',
            'skalaIndikator' => $skalaIndikator,
            'nilaiSkala' => $nilaiSkala,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subkriteria = Subkriteria::with('indikatorSubkriteria')->orderBy('id_subkriteria', 'ASC')->get();

        return view('pages.superadmin.skala-indikator.create', [
            'title' => 'Tambah Skala Indikator',
            'subkriteria' => $subkriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkalaIndikatorRequest $request)
    {
        DB::beginTransaction();

        try {
            $skalaIndikator = SkalaIndikator::create($request->only(['id_indikator_subkriteria']));
            $idSkalaIndikator = $skalaIndikator->id;

            $skalaIndikatorDetail = [];
            foreach ($request['deskripsi_skala'] as $key => $value) {
                $skalaIndikatorDetail[] = [
                    'id_skala_indikator' => $idSkalaIndikator,
                    'skala' => $request['skala'][$key],
                    'deskripsi_skala' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            SkalaIndikatorDetail::insert($skalaIndikatorDetail);

            DB::commit();

            $notif = notify()->success('Data skala indikator berhasil ditambahkan');
            return redirect()->route('skalaIndikator.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            DB::rollback();
            
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data skala indikator');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $skalaIndikator = SkalaIndikator::with([
            'indikatorSubkriteria', 
            'indikatorSubkriteria.subkriteria'
        ])
        ->where('id_skala_indikator', $id)
        ->first();

        return view('pages.superadmin.skala-indikator.show', [
            'title' => 'Detail Skala Indikator',
            'skalaIndikator' => $skalaIndikator,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $skalaIndikator = SkalaIndikator::with([
            'indikatorSubkriteria', 
            'indikatorSubkriteria.subkriteria'
        ])
        ->where('id_skala_indikator', $id)
        ->first();

        return view('pages.superadmin.skala-indikator.edit', [
            'title' => 'Ubah Skala Indikator',
            'skalaIndikator' => $skalaIndikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkalaIndikatorRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            SkalaIndikator::where('id_skala_indikator', $id)->update($request->only(['id_indikator_subkriteria']));
            $idSkalaIndikator = $id;

            $idSkalaIndikatorDetail = SkalaIndikatorDetail::select('id_skala_indikator_detail')->where('id_skala_indikator', $idSkalaIndikator)->get()->toArray();

            foreach ($request['deskripsi_skala'] as $key => $value) {
                SkalaIndikatorDetail::updateOrCreate(
                    ['id_skala_indikator_detail' => $idSkalaIndikatorDetail[$key]['id_skala_indikator_detail']],
                    [
                        'id_skala_indikator' => $idSkalaIndikator,
                        'skala' => $request['skala'][$key],
                        'deskripsi_skala' => $value,
                        'updated_at' => now(),
                    ]
                );
            }

            DB::commit();

            $notif = notify()->success('Data skala indikator berhasil diubah');
            return redirect()->route('skalaIndikator.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            DB::rollback();
            
            $notif = notify()->error('Terjadi kesalahan saat mengubah data skala indikator');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            SkalaIndikator::where('id_skala_indikator', $id)->delete();

            $notif = notify()->success('Data skala indikator berhasil dihapus');
            return back()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menghapus data skala indikator');
            return back();
        }
    }

    /**
     * Display a listing of the resource.
     * @params string $kodeSubkriteria
     */
    public function getIndikatorSubkriteria($kodeSubkriteria)
    {
        $indikatorSubkriteria = Subkriteria::with('indikatorSubkriteria')->where('kode_subkriteria', $kodeSubkriteria)->get();
        return response()->json($indikatorSubkriteria);
    }
}
