<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subkriteria\StoreSubkriteriaRequest;
use App\Http\Requests\Subkriteria\UpdateSubkriteriaRequest;
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
        $subkriteria = Subkriteria::with('kriteria')->orderBy('id_subkriteria', 'DESC')->filter(request(['search']))->paginate(10)->withQueryString();

        return view('pages.superadmin.subkriteria.index', [
            'title' => 'Subkriteria',
            'subkriteria' => $subkriteria,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.superadmin.subkriteria.create', [
            'title' => 'Tambah Subkriteria',
            'kriteria' => $this->kriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubkriteriaRequest $request)
    {
        DB::beginTransaction();

        try {
            $subkriteria = Subkriteria::create($request->validated());
            $kodeSubkriteria = $subkriteria->kode_subkriteria;

            $indikatorSubkriteria = [];
            foreach ($request['indikator_subkriteria'] as $key => $value) {
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
        $subkriteria = Subkriteria::with('kriteria', 'indikatorSubkriteria')->where('id_subkriteria', $id)->first();

        return view('pages.superadmin.subkriteria.show', [
            'title' => 'Detail Subkriteria',
            'subkriteria' => $subkriteria,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subkriteria = Subkriteria::with('kriteria', 'indikatorSubkriteria')->where('id_subkriteria', $id)->first();

        return view('pages.superadmin.subkriteria.edit', [
            'title' => 'Ubah Subkriteria',
            'kriteria' => $this->kriteria,
            'subkriteria' => $subkriteria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubkriteriaRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            Subkriteria::where('id_subkriteria', $id)->update($request->only([
                'kode_kriteria',
                'kode_subkriteria',
                'nama_subkriteria',
                'deskripsi_subkriteria',
                'bobot_subkriteria',
            ]));
    
            $idIndikatorSubkriteria = IndikatorSubkriteria::select('id_indikator_subkriteria')
            ->where('kode_subkriteria', $request['kode_subkriteria'])
            ->get()
            ->toArray();

            foreach ($request['indikator_subkriteria'] as $key => $value) {
                IndikatorSubkriteria::updateOrCreate(
                    ['id_indikator_subkriteria' => $idIndikatorSubkriteria[$key]['id_indikator_subkriteria']],
                    [
                        'kode_subkriteria' => $request['kode_subkriteria'],
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

    /**
     * Show the form for creating code subkriteria a new resource.
     */
    public function getnewCodeSubkriteria(Request $request)
    {
        try {
            $kodeKriteria = $request->kode_kriteria;
            $lastKodeSubkriteria = Subkriteria::where('kode_kriteria', $kodeKriteria)->orderBy('id_subkriteria', 'DESC')->first();
            
            if ($lastKodeSubkriteria) {
                // Separate the kode subkriteria into prefix and number
                // Example: SK2.9 -> ['SK2', '9']
                list($kode, $nomor) = explode('.', $lastKodeSubkriteria->kode_subkriteria);

                // Increment nomor subkriteria
                $newNomor = $nomor + 1;

                // Formated nomor subkriteria
                $newKodeSubkriteria = $kode . '.' . $newNomor;
            } else {
                // If there is no previous subkriteria, start from number 1
                $newKodeSubkriteria = 'S'.$kodeKriteria.'.1';
            }

            return response()->json(['newKodeSubkriteria' => $newKodeSubkriteria]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Terjadi kesalahan saat mengambil kode subkriteria']);
        }
    }
}
