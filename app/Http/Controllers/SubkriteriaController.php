<?php

namespace App\Http\Controllers;

use App\Models\IndikatorSubkriteria;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubkriteriaController extends Controller
{
    /* 
     * Constructor
     */
    private $kriteria;
    
    public function __construct()
    {
        $this->kriteria = Kriteria::orderBy('kode_kriteria', 'ASC')->get();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.subkriteria.index', [
            'title' => 'Subkriteria',
            'subkriteria' => Subkriteria::with('kriteria')->orderBy('id_subkriteria', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.subkriteria.create', [
            'title' => 'Tambah Subkriteria',
            'kriteria' => $this->kriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kriteria' => 'required',
            'kode_subkriteria' => 'required|unique:subkriteria,kode_subkriteria|max:4',
            'nama_subkriteria' => 'required|max:255',
            'deskripsi_subkriteria' => 'max:2000',
        ],[
            'kode_kriteria.required' => 'Kriteria harus diisi',
            'kode_subkriteria.required' => 'Kode subkriteria harus diisi',
            'kode_subkriteria.unique' => 'Kode subkriteria sudah ada',
            'kode_subkriteria.max' => 'Kode subkriteria maksimal 4 karakter',
            'nama_subkriteria.required' => 'Nama subkriteria harus diisi',
            'nama_subkriteria.max' => 'Nama subkriteria maksimal 255 karakter',
            'deskripsi_subkriteria.max' => 'Deskripsi subkriteria maksimal 2000 karakter',
        ]);

        DB::beginTransaction();

        try {
            $subkriteria = Subkriteria::create($validatedData);
            $kodeSubkriteria = $subkriteria->kode_subkriteria;

            $validatedIndikatorSubkriteria = $request->validate([
                'indikator_subkriteria' => 'required|max:200',
            ],[
                'indikator_subkriteria.required' => 'Indikator subkriteria harus diisi',
                'indikator_subkriteria.max' => 'Indikator subkriteria maksimal 200 karakter',
            ]);

            $indikatorSubkriteria = [];
            foreach ($validatedIndikatorSubkriteria['indikator_subkriteria'] as $key => $value) {
                $indikatorSubkriteria[] = [
                    'kode_subkriteria' => $kodeSubkriteria,
                    'indikator_subkriteria' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            IndikatorSubkriteria::insert($indikatorSubkriteria);

            DB::commit();

            $notif = notify()->success('Data subkriteria berhasil ditanbahkan');
            return redirect()->route('subkriteria.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            DB::rollback();
            
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data subkriteria');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('pages.dashboard.subkriteria.show', [
            'title' => 'Detail Subkriteria',
            'subkriteria' => Subkriteria::with('kriteria', 'indikatorSubkriteria')->where('id_subkriteria', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('pages.dashboard.subkriteria.edit', [
            'title' => 'Ubah Subkriteria',
            'kriteria' => $this->kriteria,
            'subkriteria' => Subkriteria::with('kriteria', 'indikatorSubkriteria')->where('id_subkriteria', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_kriteria' => '',
            'kode_subkriteria' => 'max:4',
            'nama_subkriteria' => 'max:255',
            'deskripsi_subkriteria' => 'max:2000',
        ],[
            'kode_subkriteria.max' => 'Kode subkriteria maksimal 4 karakter',
            'nama_subkriteria.max' => 'Nama subkriteria maksimal 255 karakter',
            'deskripsi_subkriteria.max' => 'Deskripsi subkriteria maksimal 2000 karakter',
        ]);

        DB::beginTransaction();

        try {
            Subkriteria::where('id_subkriteria', $id)->update($validatedData);

            $validatedIndikatorSubkriteria = $request->validate([
                'indikator_subkriteria' => 'max:200',
            ],[
                'indikator_subkriteria.max' => 'Indikator subkriteria maksimal 200 karakter',
            ]);

            $idIndikatorSubkriteria = IndikatorSubkriteria::select('id_indikator_subkriteria')->where('kode_subkriteria', $validatedData['kode_subkriteria'])->get()->toArray();

            foreach ($validatedIndikatorSubkriteria['indikator_subkriteria'] as $key => $value) {
                IndikatorSubkriteria::updateOrCreate(
                    ['id_indikator_subkriteria' => $idIndikatorSubkriteria[$key]['id_indikator_subkriteria']],
                    [
                        'kode_subkriteria' => $validatedData['kode_subkriteria'],
                        'indikator_subkriteria' => $value,
                        'updated_at' => now(),
                    ]
                );
            }

            DB::commit();

            $notif = notify()->success('Data subkriteria berhasil diubah');
            return redirect()->route('subkriteria.index')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            DB::rollback();
            
            $notif = notify()->error('Terjadi kesalahan saat mengubah data subkriteria');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Subkriteria::where('id_subkriteria', $id)->delete();

            $notif = notify()->success('Data subkriteria berhasil dihapus');
            return back()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menghapus data subkriteria');
            return back();
        }
    }
}
