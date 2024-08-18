<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\GroupKaryawan;
use App\Models\GroupKaryawanDetail;
use App\Models\GroupPenilaian;
use App\Models\Kriteria;
use App\Models\PerhitunganAlternatif;
use App\Models\TanggalPenilaian;
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

        $this->perhitunganAlternatif = PerhitunganAlternatif::with('tanggalPenilaian', 'alternatifPertama', 'alternatifKedua')->join('tanggal_penilaian', 'perhitungan_alternatif.id_tanggal_penilaian', '=', 'tanggal_penilaian.id_tanggal_penilaian')->orderBy('alternatif_pertama', 'asc');

        $this->perhitunganAlternatifService = $perhitunganAlternatifService;
    }

    private function initializeAuth()
    {
        // Check Auth kode alternatif
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;
        
        // Dapatkan $checkAuthAlternatif berada di group karyawan mana
        $this->checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $this->checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasAnyRole([
                'yayasan',
                'deputi',
                'guru',
                'tata usaha tenaga pendidikan',
                'tata usaha non tenaga pendidikan',
                'kerohanian tenaga pendidikan',
                'kerohanian non tenaga pendidikan',
            ])) {
            $this->checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Check tanggal penilaian ada atau tidak, berdasarkan tahun ajaran, dan akhir tanggal penilaian
        $this->checkTanggalPenilaian = TanggalPenilaian::where('tahun_ajaran', $this->tahunAjaran ?? null)
            ->where('id_group_karyawan', $this->checkGroupKaryawanId)
            ->where('akhir_tanggal_penilaian', '>=', now()->format('Y-m-d'))
            ->first();
        
        return $this->checkTanggalPenilaian;
    }

    /**
     * Display a listing of the resource.
     */
    public function introduction()
    {
        $tahunAjaran = $this->tahunAjaran;

        $getUserAlternatif = Auth::user()->alternatif->kode_alternatif;

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
            ->orderBy('akhir_tanggal_penilaian', 'desc')
            ->first();
        
        // Dapatkan id_tanggal_penilaian berdasarkan id group karyawan dan akhir tanggal penilaian
        $idTanggalPenilaian = $checkTanggalPenilaian->id_tanggal_penilaian ?? null;

        // Dapatkan perhitungan alternatif berdasarkan $tahunAjaran
        $perhitunganAlternatif = $this->perhitunganAlternatif->where('tanggal_penilaian.id_tanggal_penilaian', $idTanggalPenilaian)->get();

        return view('pages.kepala-sekolah.perhitungan-alternatif.introduction', [
            'title' => 'Perbandingan Karyawan',
            'tahunAjaran' => $tahunAjaran,
            'perhitunganAlternatif' => $perhitunganAlternatif,
            'checkTanggalPenilaian' => $checkTanggalPenilaian,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjaran = $this->tahunAjaran;

        $checkTanggalPenilaian = $this->initializeAuth();

        // Dapatkan id_tanggal_penilaian berdasarkan id group karyawan dan akhir tanggal penilaian
        $idTanggalPenilaian = $checkTanggalPenilaian->id_tanggal_penilaian ?? null;

        // Cari nama alternatif berdasarkan group karyawan yang mana nama alternatif sama dengan nama auth user
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;

        // Dapatkan perhitungan alternatif berdasarkan $tahunAjaran
        $perhitunganAlternatif = $this->perhitunganAlternatif->where('perhitungan_alternatif.id_tanggal_penilaian', $idTanggalPenilaian)->get();

        // checkAuthAlternatif berada di dalam group karyawan yang mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasRole('guru')) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Dapatkan alternatif_pertama yang memiliki group karyawan yang sama dengan group karyawan yang dimiliki oleh auth user di table group_penilaian
        $alternatifGroupedByGroupPenilaian = GroupPenilaian::with(['alternatifPertama'])
            ->where('id_group_karyawan', $checkGroupKaryawanId)
            ->get();

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
        
        return view('pages.kepala-sekolah.perhitungan-alternatif.index', [
            'title' => 'Perbandingan Karyawan',
            'tahunAjaran' => $tahunAjaran,
            'checkTanggalPenilaian' => $checkTanggalPenilaian,
            'idTanggalPenilaian' => $idTanggalPenilaian,
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
        $checkTanggalPenilaian = $this->initializeAuth();
        
        // Dapatkan id_tanggal_penilaian berdasarkan id group karyawan dan akhir tanggal penilaian
        $idTanggalPenilaian = $checkTanggalPenilaian->id_tanggal_penilaian ?? null;

        $validatedData = $request->validate([
            'matriks' => 'required|array'
        ]);

        $matriks = $validatedData['matriks'];

        try {
            PerhitunganAlternatif::truncate();

            foreach ($matriks as $idTanggalPenilaian => $dataIdTanggalPenilaian) {
                foreach ($dataIdTanggalPenilaian as $kodeKriteria => $dataKriteria) {
                    foreach ($dataKriteria as $alternatifPertama => $dataAlternatif) {
                        foreach ($dataAlternatif as $alternatifKedua => $nilaiAlternatif) {
                            PerhitunganAlternatif::updateOrCreate(
                                [
                                    'id_tanggal_penilaian' => $idTanggalPenilaian,
                                    'kode_kriteria' => $kodeKriteria,
                                    'alternatif_pertama' => $alternatifPertama,
                                    'alternatif_kedua' => $alternatifKedua,
                                ],
                                ['nilai_alternatif' => $nilaiAlternatif]
                            );
                        }
                    }
                }
            }

            $notif = notify()->success('Data perbandingan karyawan berhasil disimpan');
            return redirect()->route('perhitunganAlternatif.introduction')->withInput()->with('notif', $notif);
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
        // Check Auth kode alternatif
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;
        
        // Dapatkan $checkAuthAlternatif berada di group karyawan mana
        $checkGroupKaryawanId = null;
        if (Auth::user()->hasRole('kepala sekolah')) {
            $checkGroupKaryawanId = GroupKaryawan::with(['alternatif'])->where('kepala_sekolah', $checkAuthAlternatif)->value('id_group_karyawan');
        } elseif (Auth::user()->hasAnyRole([
                'yayasan',
                'deputi',
                'guru',
                'tata usaha tenaga pendidikan',
                'tata usaha non tenaga pendidikan',
                'kerohanian tenaga pendidikan',
                'kerohanian non tenaga pendidikan',
            ])) {
            $checkGroupKaryawanId = GroupKaryawanDetail::with(['alternatif'])->where('kode_alternatif', $checkAuthAlternatif)->value('id_group_karyawan');
        }

        // Check tanggal penilaian ada atau tidak, berdasarkan tahun ajaran, dan akhir tanggal penilaian
        $checkTanggalPenilaian = TanggalPenilaian::where('tahun_ajaran', $this->tahunAjaran ?? null)
            ->where('id_group_karyawan', $checkGroupKaryawanId)
            ->first();
        
        // Dapatkan id_tanggal_penilaian berdasarkan id group karyawan dan akhir tanggal penilaian
        $idTanggalPenilaian = $checkTanggalPenilaian->id_tanggal_penilaian ?? null;

        // Dapatkan alternatif_pertama yang memiliki group karyawan yang sama dengan group karyawan yang dimiliki oleh auth user di table group_penilaian
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

        $perhitunganAlternatif = $this->perhitunganAlternatif->where('perhitungan_alternatif.id_tanggal_penilaian', $idTanggalPenilaian)->get();

        $totalKolomAlternatif = $this->perhitunganAlternatifService->totalKolomAlternatif($perhitunganAlternatif);
        $normalisasiMatriks = $this->perhitunganAlternatifService->normalisasiMatriks($perhitunganAlternatif, $totalKolomAlternatif);

        $totalBarisNormalisasiMatriks = $this->perhitunganAlternatifService->totalBarisNormalisasiMatriks($normalisasiMatriks);
        $bobotPrioritasAlternatif = $this->perhitunganAlternatifService->bobotPrioritasAlternatif($totalBarisNormalisasiMatriks, $alternatifGroupedByGroupPenilaian, $idTanggalPenilaian);

        // return data ke array
        $resultArray = [
            'tahunAjaran' => $checkTanggalPenilaian,
            'idTanggalPenilaian' => $idTanggalPenilaian,
            'alternatif' => $alternatifPenilaian,
            'kriteria' => $kriteria,
            'perhitunganAlternatif' => $perhitunganAlternatif,
            'totalKolomAlternatif' => $totalKolomAlternatif,
            'normalisasiMatriks' => $normalisasiMatriks,
            'bobotPrioritasAlternatif' => $bobotPrioritasAlternatif,
        ];

        return view('pages.kepala-sekolah.perhitungan-alternatif.hasil', array_merge(['title' => 'Hasil Perbandingan Karyawan'], $resultArray));
    }

        /**
     * Display the specified resource.
     */
    public function pedoman()
    {
        $intensitasKepentingan = [
            [
                'nilai' => '1',
                'definisi' => 'Elemen yang satu sama pentingnya dibanding dengan elemen yang lain (equal importance).'
            ],
            [
                'nilai' => '3',
                'definisi' => 'Elemen yang satu sedikit lebih penting dari pada elemen yang lain (moderate more importance).'
            ],
            [
                'nilai' => '5',
                'definisi' => 'Elemen yang satu jelas lebih penting dari pada elemen yang lain (essential, strong more importance).'
            ],
            [
                'nilai' => '7',
                'definisi' => 'Elemen yang satu sangat jelas lebih penting dari pada elemen yang lain (demonstrated importance).'
            ],
            [
                'nilai' => '9',
                'definisi' => 'Elemen yang satu mutlak lebih penting dari pada elemen yang lain (absolutely more importance).'
            ],
            [
                'nilai' => '2, 4, 6, 8',
                'definisi' => 'Apabila ragu-ragu antara dua nilai yang berdekatan (grey area).'
            ],
        ];

        return view('pages.kepala-sekolah.perhitungan-alternatif.pedoman', [
            'title' => 'Pedoman Pengisian Perbandingan Pegawai',
            'intensitasKepentingan' => $intensitasKepentingan,
        ]);
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