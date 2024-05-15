<?php

namespace App\Http\Controllers;

use App\Jobs\PerhitunganAlternatifJob;
use App\Models\Alternatif;
use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\GroupPenilaian;
use App\Models\Kriteria;
use App\Models\PerhitunganAlternatif;
use App\Services\PerhitunganAlternatifService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PerhitunganAlternatifController extends Controller
{
    /* 
     * Constructor
     */
    private $tahunAjaran;
    private $kriteria;
    private $alternatif;
    private $perhitunganAlternatif;
    private $perhitunganAlternatifService;

    public function __construct(PerhitunganAlternatifService $perhitunganAlternatifService)
    {
        $currentMonth = date('m');
        $isAfterJune = $currentMonth >= 6;
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;
        $nextYear = $currentYear + 1;

        $this->tahunAjaran = $isAfterJune ? "$currentYear/$nextYear" : "$lastYear/$currentYear";

        $this->kriteria = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $this->alternatif = Alternatif::orderBy('kode_alternatif', 'asc')->get();
        $this->perhitunganAlternatif = PerhitunganAlternatif::with('alternatifPertama', 'alternatifKedua')->orderBy('alternatif_pertama', 'asc');
        $this->perhitunganAlternatifService = $perhitunganAlternatifService;
    }

    /**
     * Display a listing of the resource.
     */
    public function introduction()
    {
        $tahunAjaran = $this->tahunAjaran;

        // Dapatkan perhitungan alternatif berdasarkan $tahunAjaran
        $perhitunganAlternatif = $this->perhitunganAlternatif->where('tahun_ajaran', $tahunAjaran)->get();

        return view('pages.kepala-sekolah.perhitungan-alternatif.introduction', [
            'title' => 'Perbandingan Karyawan',
            'tahunAjaran' => $this->tahunAjaran,
            'perhitunganAlternatif' => $perhitunganAlternatif,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjaran = $this->tahunAjaran;
        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;

        // Dapatkan perhitungan alternatif berdasarkan $tahunAjaran
        $perhitunganAlternatif = $this->perhitunganAlternatif->where('tahun_ajaran', $tahunAjaran)->get();

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->role == 'kepala sekolah') {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->role == 'guru') {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // dd($checkGroupKaryawanId);

        // Dapatkan alternatif_pertama yang memiliki group karyawan yang sama dengan group karyawan yang dimiliki oleh auth user di table group_penilaian
        $alternatifGroupedByGroupPenilaian = GroupPenilaian::with(['alternatifPertama'])
            ->where('id_group_karyawan', $checkGroupKaryawanId)
            ->get();

        // dd($alternatifGroupedByGroupPenilaian);

        // Dapatkan alternatif_pertama pada group_penilaian yang sama dengan group karyawan yang dimiliki oleh auth user
        $alternatifPenilaian = collect($alternatifGroupedByGroupPenilaian)
            ->filter(function ($value) {
                return isset($value->alternatifPertama);
            })
            ->map(function ($value) {
                return [
                    'nama_alternatif' => $value->alternatifPertama->nama_alternatif,
                    'kode_alternatif' => $value->alternatif_pertama,
                    'id_alternatif' => $value->alternatifPertama->id_alternatif,
                ];
            })->toArray();

        // Mengurutkan $alternatifPenilaian berdasarkan kode alternatif
        usort($alternatifPenilaian, function ($a, $b) {
            return strnatcmp($a['kode_alternatif'], $b['kode_alternatif']);
        });

        // dd($alternatifPenilaian);
        
        return view('pages.kepala-sekolah.perhitungan-alternatif.index', [
            'title' => 'Perbandingan Karyawan',
            'tahunAjaran' => $this->tahunAjaran,
            'kriteria' => $this->kriteria,
            'alternatif' => $alternatifPenilaian,
            'perhitunganAlternatif' => $perhitunganAlternatif,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'matriks' => 'required|array'
            ]);

            $matriks = $validatedData['matriks'];

            PerhitunganAlternatifJob::dispatch($matriks, $this->tahunAjaran);

            $notif = notify()->success('Data perbandingan karyawan berhasil disimpan');
            return redirect()->route('perhitunganAlternatif.hasil')->withInput()->with('notif', $notif);
        } catch (\Throwable $th) {
            $notif = notify()->error('Data perbandingan karyawan gagal disimpan');
            return back()->withInput()->with('notif', $notif);
        }
    }

    /**
     * Display the specified resource.
     */
    public function hasil()
    {
        $tahunAjaran = $this->tahunAjaran;

        // Buat cache remember untuk data hasil query
        $result = Cache::remember('hasil_perhitungan_alternatif_'.$tahunAjaran, 60, function () use ($tahunAjaran) {
            // Query untuk mendapatkan data yang diperlukan
            $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;
            
            $checkGroupKaryawanId = null;
            if (Auth::user()->role == 'kepala sekolah') {
                $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
            } elseif (Auth::user()->role == 'guru') {
                $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
            }

            $alternatifGroupedByGroupPenilaian = GroupPenilaian::with(['alternatifPertama'])
                ->where('id_group_karyawan', $checkGroupKaryawanId)
                ->get();

            $alternatifPenilaian = collect($alternatifGroupedByGroupPenilaian)
                ->filter(function ($value) {
                    return isset($value->alternatifPertama);
                })
                ->map(function ($value) {
                    return [
                        'nama_alternatif' => $value->alternatifPertama->nama_alternatif,
                        'kode_alternatif' => $value->alternatif_pertama,
                        'id_alternatif' => $value->alternatifPertama->id_alternatif,
                    ];
                })->toArray();

            // Mengurutkan $alternatifPenilaian berdasarkan kode alternatif
            usort($alternatifPenilaian, function ($a, $b) {
                return strnatcmp($a['kode_alternatif'], $b['kode_alternatif']);
            });

            $kriteria = $this->kriteria;

            $perhitunganAlternatif = $this->perhitunganAlternatif->where('tahun_ajaran', $tahunAjaran)->get();

            $totalKolomAlternatif = $this->perhitunganAlternatifService->totalKolomAlternatif($perhitunganAlternatif);
            $normalisasiMatriks = $this->perhitunganAlternatifService->normalisasiMatriks($perhitunganAlternatif, $totalKolomAlternatif);

            $totalBarisNormalisasiMatriks = $this->perhitunganAlternatifService->totalBarisNormalisasiMatriks($normalisasiMatriks);
            $bobotPrioritasAlternatif = $this->perhitunganAlternatifService->bobotPrioritasAlternatif($totalBarisNormalisasiMatriks, $alternatifGroupedByGroupPenilaian, $tahunAjaran);

            // dd($bobotPrioritasAlternatif);

            // Mengembalikan data yang akan disimpan dalam cache
            return [
                'alternatif' => $alternatifPenilaian,
                'kriteria' => $kriteria,
                'perhitunganAlternatif' => $perhitunganAlternatif,
                'totalKolomAlternatif' => $totalKolomAlternatif,
                'normalisasiMatriks' => $normalisasiMatriks,
                'bobotPrioritasAlternatif' => $bobotPrioritasAlternatif,
            ];
        });

        return view('pages.kepala-sekolah.perhitungan-alternatif.hasil', array_merge(['title' => 'Hasil Perbandingan Karyawan', 'tahunAjaran' => $tahunAjaran], $result));
    }

    /**
     * Display the specified resource.
     */
    public function show(PerhitunganAlternatif $perhitunganAlternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerhitunganAlternatif $perhitunganAlternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerhitunganAlternatif $perhitunganAlternatif)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerhitunganAlternatif $perhitunganAlternatif)
    {
        //
    }
}