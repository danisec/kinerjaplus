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

        $semester = DB::select("SHOW COLUMNS FROM tanggal_penilaian WHERE Field = 'semester'")[0]->Type;

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
            // Check tanggal penilaian exist or not, based on tahun ajaran, id_group_karyawan, semester
            $checkTanggalPenilaian = TanggalPenilaian::where('tahun_ajaran', $this->tahunAjaran ?? null)
                ->where('id_group_karyawan', $validatedData['id_group_karyawan'] ?? null)
                ->where('semester', $validatedData['semester'] ?? null)
                ->first();

            if ($checkTanggalPenilaian) {
                $notif = notify()->error('Tanggal penilaian sudah ada');
                return back()->withInput()->with('notif', $notif);
            }

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

        $semester = DB::select("SHOW COLUMNS FROM tanggal_penilaian WHERE Field = 'semester'")[0]->Type;

        return view('pages.guru.penilaian.edit-date-penilaian', [
            'title' => 'Ubah Tanggal Penilaian',
            'tahunAjaran' => $this->tahunAjaran,
            'alternatifGroupKaryawan' => $getAlternatifGroupKaryawan,
            'semester' => explode("','", substr($semester, 6, -2)),
            'tanggalPenilaian' => TanggalPenilaian::where('id_tanggal_penilaian', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            $currentTanggalPenilaian = TanggalPenilaian::findOrFail($id);

            $exists = TanggalPenilaian::where('id_group_karyawan', $validatedData['id_group_karyawan'])
                ->where('tahun_ajaran', $validatedData['tahun_ajaran'])
                ->where('semester', $validatedData['semester'])
                ->where('id_tanggal_penilaian', '!=', $id)
                ->exists();

            if ($exists) {
                $currentTanggalPenilaian->update([
                    'awal_tanggal_penilaian' => $validatedData['awal_tanggal_penilaian'],
                    'akhir_tanggal_penilaian' => $validatedData['akhir_tanggal_penilaian'],
                ]);

                $notif = notify()->error('Tanggal penilaian sudah ada');
                return back()->withInput()->with('notif', $notif);
            }

            $currentTanggalPenilaian->update($validatedData);

            $notif = notify()->success('Tanggal penilaian berhasil diubah');
            return redirect()->route('penilaian.welcome')->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat mengubah tanggal penilaian');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
