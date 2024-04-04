<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\PenilaianIndikator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /* 
     * Constructor
     */
    private $tahunAjaran;
    
    public function __construct()
    {
        $currentMonth = date('m');
        $isAfterJune = $currentMonth >= 6;
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;
        $nextYear = $currentYear + 1;

        $this->tahunAjaran = $isAfterJune ? "$currentYear/$nextYear" : "$lastYear/$currentYear";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.superadmin.penilaian.index', [
            'title' => 'Data Penilaian',
            'penilaian' => Penilaian::with(['alternatifPertama'])->orderBy('alternatif_pertama', 'ASC')->filter(request(['search']))->paginate(10)->withQueryString(),
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function welcome()
    {
        return view('pages.guru.penilaian.index', [
            'title' => 'Data Penilaian',
            'tahunAjaran' => $this->tahunAjaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $tahunAjaran = $this->tahunAjaran;
        $getUserAlternatif = Auth::user()->alternatif->kode_alternatif;
        $alternatif = Alternatif::get();
        $penilaian = Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.indikatorSubkriteria'])->orderBy('alternatif_pertama', 'ASC')->get();

        // Ambil daftar alternatif_kedua yang sudah dinilai oleh alternatif_pertama $getUserAlternatif berdasarkan tahunAjaran
        $alternatifKeduaTerpilih = $penilaian->where('alternatif_pertama', $getUserAlternatif)->where('tahun_ajaran', $tahunAjaran)->pluck('alternatif_kedua')->toArray();
        // Filter alternatif_kedua yang belum dinilai oleh alternatif_pertama
        $alternatifKeduaBelumTerpilih = $alternatif->whereNotIn('kode_alternatif', $alternatifKeduaTerpilih);

        return view('pages.guru.penilaian.create', [
            'title' => 'Tambah Data Penilaian',
            'alternatif' => Alternatif::orderBy('nama_alternatif', 'ASC')->get(),
            'alternatifKeduaBelumTerpilih' => $alternatifKeduaBelumTerpilih,
            'kriteria' => Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria.skalaIndikator.skalaIndikatorDetail'])->orderBy('kode_kriteria', 'ASC')->get(),
            'penilaian' => Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.indikatorSubkriteria'])->orderBy('alternatif_pertama', 'ASC')->get(),
            'tahunAjaran' => $this->tahunAjaran,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun_ajaran' => 'required',
            'alternatif_pertama' => 'required',
            'alternatif_kedua' => 'required',
        ], [
            'alternatif_kedua.required' => 'Nama karyawan harus dipilih',
        ]);

        DB::beginTransaction();

        try {
            $penilaian = Penilaian::where('alternatif_pertama', $validatedData['alternatif_pertama'])->where('alternatif_kedua', $validatedData['alternatif_kedua'])->where('created_at', '>=', Carbon::now()->subDays(14))->first();
            
            if ($penilaian) {
                $notif = notify()->warning('Penilaian untuk karyawan ini sudah dilakukan. Silakan pilih karyawan lain');
                return back()->withInput()->with('notif', $notif);
            }
            
            $penilaian = Penilaian::create($validatedData);
            $idPenilaian = $penilaian->id;

            $validatedDataPenilaianIndikator = $request->validate([
                'id_indikator_subkriteria' => '',
                'id_skala_indikator_detail' => 'required',
            ], [
                'id_skala_indikator_detail.required' => 'Skala harus diisi',
            ]);

            $penilaianIndikator = [];
            foreach ($validatedDataPenilaianIndikator['id_skala_indikator_detail'] as $key => $value) {
                $penilaianIndikator[] = [
                    'id_penilaian' => $idPenilaian,
                    'id_skala_indikator_detail' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            PenilaianIndikator::insert($penilaianIndikator);

            DB::commit();

            $notif = notify()->success('Data penilaian berhasil disimpan');
            return redirect()->route('penilaian.create')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            DB::rollback();
            
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data penilaian');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('pages.superadmin.penilaian.show', [
            'title' => 'Detail Data Penilaian',
            'kriteria' => Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria'])->orderBy('kode_kriteria', 'ASC')->get(),
            'penilaian' => Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail'])->where('id_penilaian', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
