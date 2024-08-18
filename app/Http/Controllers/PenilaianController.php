<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\GroupPenilaian;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\PenilaianIndikator;
use App\Models\TanggalPenilaian;
use App\Models\User;
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
        $getUserAlternatif = Auth::user()->alternatif->kode_alternatif ?? null;

        // Dapatkan $getUserAlternatif berada di group karyawan mana
        $getAlternatifGroupKaryawan = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $getAlternatifGroupKaryawan = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $getUserAlternatif)->first();
        } elseif (Auth::user()->hasAnyRole([
                'yayasan',
                'deputi',
                'guru',
                'tata usaha tenaga pendidikan',
                'tata usaha non tenaga pendidikan',
                'kerohanian tenaga pendidikan',
                'kerohanian non tenaga pendidikan',
            ])) {
            $getAlternatifGroupKaryawan = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $getUserAlternatif)->first();
        }

        // Check tanggal penilaian ada atau tidak, berdasarkan tahun ajaran, dan akhir tanggal penilaian
        $checkTanggalPenilaian = TanggalPenilaian::where('tahun_ajaran', $this->tahunAjaran ?? null)
            ->where('id_group_karyawan', $getAlternatifGroupKaryawan->id_group_karyawan ?? null)
            ->where('akhir_tanggal_penilaian', '>=', now()->format('Y-m-d'))
            ->first();

        return view('pages.guru.penilaian.index', [
            'title' => 'Penilaian',
            'tahunAjaran' => $this->tahunAjaran,
            'checkGroupKaryawan' => $getAlternatifGroupKaryawan,
            'checkTanggalPenilaian' => $checkTanggalPenilaian,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $tahunAjaran = $this->tahunAjaran;
        $getUserAlternatif = Auth::user()->alternatif->kode_alternatif;
        $penilaian = Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.indikatorSubkriteria'])
            ->orderBy('alternatif_pertama', 'ASC')
            ->get();

        // Dapatkan $getUserAlternatif berada di group karyawan mana
        $getAlternatifGroupKaryawan = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $getAlternatifGroupKaryawan = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $getUserAlternatif)->first();
        } elseif (Auth::user()->hasAnyRole([
                'yayasan',
                'deputi',
                'guru',
                'tata usaha tenaga pendidikan',
                'tata usaha non tenaga pendidikan',
                'kerohanian tenaga pendidikan',
                'kerohanian non tenaga pendidikan',
            ])) {
            $getAlternatifGroupKaryawan = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $getUserAlternatif)->first();
        }

        // Check tanggal penilaian ada atau tidak, berdasarkan tahun ajaran, dan akhir tanggal penilaian
        $checkTanggalPenilaian = TanggalPenilaian::where('tahun_ajaran', $this->tahunAjaran ?? null)
            ->where('id_group_karyawan', $getAlternatifGroupKaryawan->id_group_karyawan ?? null)
            ->where('akhir_tanggal_penilaian', '>=', now()->format('Y-m-d'))
            ->first();

        // Ambil daftar alternatif_kedua yang sudah dinilai oleh alternatif_pertama $getUserAlternatif berdasarkan tahunAjaran
        $alternatifKeduaTerpilih = $penilaian
            ->where('alternatif_pertama', $getUserAlternatif)
            ->where('id_tanggal_penilaian', $checkTanggalPenilaian->id_tanggal_penilaian)
            ->pluck('alternatif_kedua')
            ->toArray();

        // Dapatkan alternatif_kedua yang belum dinilai oleh $getUserAlternatif dari group penilaian yang sama berdasarkan tahunAjaran
        $alternatifKeduaBelumTerpilih = GroupPenilaian::with(['groupPenilaianDetail', 'groupPenilaianDetail.alternatifKedua'])
            ->where('id_group_karyawan', $getAlternatifGroupKaryawan->id_group_karyawan)
            ->where('alternatif_pertama', $getUserAlternatif)
            ->first();

        // Inisialisasi array untuk menyimpan alternatif yang belum dipilih
        $alternatifNotSelected = [];

        // Periksa apakah diri sendiri sudah dinilai oleh $getUserAlternatif atau belum
        if (!in_array($getUserAlternatif, $alternatifKeduaTerpilih)) {
            $alternatifNotSelected[] = GroupPenilaian::with(['alternatifPertama'])->where('alternatif_pertama', $getUserAlternatif)->first();
        }

        // Periksa apakah alternatif_kedua sudah dinilai oleh $getUserAlternatif atau belum
        foreach ($alternatifKeduaBelumTerpilih->groupPenilaianDetail as $value) {
            if (!in_array($value->alternatif_kedua, $alternatifKeduaTerpilih) && $value->alternatif_kedua != $getUserAlternatif) {
                $alternatifNotSelected[] = $value;
            }
        }

        // Inisialisasi array untuk menyimpan data penilaian sendiri
        $alternatifPenilaianSendiri = collect($alternatifNotSelected)
            ->filter(function ($value) {
                return isset($value->alternatifPertama);
            })
            ->map(function ($value) {
                return [
                    'kode_alternatif' => $value->alternatifPertama->kode_alternatif,
                    'nama_alternatif' => $value->alternatifPertama->nama_alternatif,
                    'jabatan' => $value->alternatifPertama->jabatan,
                ];
            })->toArray();

        // Inisialisasi array untuk menyimpan data rekan
        $alternatifPenilaianRekan = collect($alternatifNotSelected)
            ->filter(function ($value) {
                return isset($value->alternatifKedua);
            })
            ->map(function ($value) {
                return [
                    'kode_alternatif' => $value->alternatifKedua->kode_alternatif,
                    'nama_alternatif' => $value->alternatifKedua->nama_alternatif,
                    'jabatan' => $value->alternatifKedua->jabatan,
                ];
            })->toArray();

        // Menggabungkan data penilaian sendiri dengan data rekan
        $alternatifPenilaianArray = array_merge($alternatifPenilaianSendiri, $alternatifPenilaianRekan);
        
        if ($checkTanggalPenilaian == null) {
            return back();
        }
        
        return view('pages.guru.penilaian.create', [
            'title' => 'Tambah Penilaian',
            'alternatif' => Alternatif::orderBy('nama_alternatif', 'ASC')->get(),
            'alternatifPenilaianArray' => $alternatifPenilaianArray,

            'kriteria' => Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria.skalaIndikator.skalaIndikatorDetail'])->orderBy('kode_kriteria', 'ASC')->get(),
            'penilaian' => Penilaian::with(['alternatifPertama', 'alternatifKedua', 'penilaianIndikator', 'penilaianIndikator.indikatorSubkriteria'])->orderBy('alternatif_pertama', 'ASC')->get(),
            'tahunAjaran' => $this->tahunAjaran,
            'checkTanggalPenilaian' => $checkTanggalPenilaian,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tanggal_penilaian' => 'required',
            'alternatif_pertama' => 'required',
            'alternatif_kedua' => 'required',
            'status' => '',
            'id_indikator_subkriteria' => '',
            'id_skala_indikator_detail' => 'required',
        ], [
            'alternatif_kedua.required' => 'Nama karyawan harus dipilih',
            'id_skala_indikator_detail.required' => 'Skala harus diisi',
        ]);

        DB::beginTransaction();

        try {
            $penilaian = Penilaian::where('alternatif_pertama', $validatedData['alternatif_pertama'])
                ->where('alternatif_kedua', $validatedData['alternatif_kedua'])
                ->where('id_tanggal_penilaian', $validatedData['id_tanggal_penilaian'])
                ->first();
            
            if ($penilaian) {
                $notif = notify()->warning('Penilaian untuk karyawan ini sudah dilakukan. Silakan pilih karyawan lain');
                return back()->withInput()->with('notif', $notif);
            }
            
            $penilaian = Penilaian::insertGetId([
                'id_tanggal_penilaian' => $validatedData['id_tanggal_penilaian'],
                'alternatif_pertama' => $validatedData['alternatif_pertama'],
                'alternatif_kedua' => $validatedData['alternatif_kedua'],
                'status' => $validatedData['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $penilaianIndikator = [];
            foreach ($validatedData['id_skala_indikator_detail'] as $key => $value) {
                $penilaianIndikator[] = [
                    'id_penilaian' => $penilaian,
                    'id_skala_indikator_detail' => $value,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            PenilaianIndikator::insert($penilaianIndikator);

            DB::commit();

            $notif = notify()->success('Data penilaian berhasil disimpan');
            return back()->withInput()->with('notif', $notif);
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

    /**
     * Get kriteria
     */
    public function getKriteria(Request $request, $kodeAlternatif)
    {
        // Mendapatkan kriteria berdasarkan kode_alternatif yang dipilih
         $kodeAlternatif = $request->kode_alternatif;

        // Ambil role user berdasarkan kode_alternatif yang dipilih
        $user = User::whereHas(
            'alternatif',
            function ($query) use ($kodeAlternatif) {
                $query->where('kode_alternatif', $kodeAlternatif);
            }
        )->first();

        $kriteria = Kriteria::with('subkriteria.indikatorSubkriteria.skalaIndikator.skalaIndikatorDetail')
            ->when($user && in_array($user->role, ['tata usaha non tenaga pendidikan', 'kerohanian non tenaga pendidikan']), function ($query) {
                $query->where('kode_kriteria', '!=', 'K2');
            })
            ->get();

        return response()->json($kriteria);
    }
}
