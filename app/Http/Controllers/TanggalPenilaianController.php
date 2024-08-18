<?php

namespace App\Http\Controllers;

use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\TanggalPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TanggalPenilaianController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Dapatkan $getUserAlternatif berada di group karyawan mana
        $getUserAlternatif = Auth::user()->alternatif->kode_alternatif;

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

        // Enum semester
        $semester = DB::select("SHOW COLUMNS FROM tanggal_penilaian WHERE Field = 'semester'")[0]->Type;

        // Check tanggal penilaian ada atau tidak, berdasarkan tahun ajaran, id_group_karyawan, dan akhir tanggal penilaian
        $checkTanggalPenilaian = TanggalPenilaian::where('tahun_ajaran', $this->tahunAjaran ?? null)
            ->where('id_group_karyawan', $getAlternatifGroupKaryawan->id_group_karyawan ?? null)
            ->where('akhir_tanggal_penilaian', '>=', now())
            ->first();

        if ($checkTanggalPenilaian) {
            return back();
        }

        return view('pages.guru.penilaian.create-date-penilaian', [
            'title' => 'Buat Tanggal Penilaian',
            'tahunAjaran' => $this->tahunAjaran,
            'alternatifGroupKaryawan' => $getAlternatifGroupKaryawan,
            'semester' => explode("','", substr($semester, 6, -2)),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_group_karyawan' => 'required',
            'tahun_ajaran' => 'required',
            'semester' => 'required|in:ganjil,genap',
            'awal_tanggal_penilaian' => 'required|date',
            'akhir_tanggal_penilaian' => 'required|date',
        ], [
            'semester.required' => 'Semester harus dipilih',
            'awal_tanggal_penilaian.required' => 'Tanggal awal penilaian harus diisi',
            'akhir_tanggal_penilaian.required' => 'Tanggal akhir penilaian harus diisi',
        ]);

        try {
            TanggalPenilaian::create($validatedData);

            $notif = notify()->success('Tanggal penilaian berhasil disimpan');
            return redirect()->route('penilaian.welcome')->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan tanggal penilaian');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
