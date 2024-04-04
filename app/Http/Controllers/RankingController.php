<?php

namespace App\Http\Controllers;

use App\Models\BobotPrioritasAlternatif;
use App\Models\BobotPrioritasSubkriteria;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Ranking;
use App\Services\RankingService;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /* 
     * Constructor
     */
    private $kriteria;
    private $bobotPrioritasSubkriteria;
    private $alternatifPenilaian;
    private $bobotAlternatif;
    private $tahunAjaran;

    public function __construct(RankingService $rankingService)
    {
        $this->alternatifPenilaian = Penilaian::with(['penilaianIndikator', 'penilaianIndikator.skalaIndikatorDetail.skalaIndikator.indikatorSubkriteria', 'penilaianIndikator.skalaIndikatorDetail.nilaiSkala', 'alternatifKedua'])->where('status', 'Disetujui')->get();
        $this->kriteria = Kriteria::orderBy('kode_kriteria', 'asc')->get();
        $this->bobotAlternatif = BobotPrioritasAlternatif::orderBy('kode_kriteria', 'asc')->get();
        $this->bobotPrioritasSubkriteria = BobotPrioritasSubkriteria::with(['kriteria'])->get();
        $this->rankingService = $rankingService;

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
        $tahunAjaran = $this->tahunAjaran;
        $alternatifPenilaian = $this->alternatifPenilaian;
        $kriteria = $this->kriteria;
        $bobotAlternatif = $this->bobotAlternatif;
        $bobotPrioritasSubkriteria = $this->bobotPrioritasSubkriteria;

        $uniqueAlternatifPenilaianByTahunAjaran = $alternatifPenilaian->filter(function ($item) use ($tahunAjaran) {
            return $item->tahun_ajaran == $tahunAjaran;
        })->unique('alternatif_kedua');

        $totalBobotKriteria = $this->rankingService->totalBobotKriteria($uniqueAlternatifPenilaianByTahunAjaran, $kriteria, $bobotPrioritasSubkriteria, $bobotAlternatif);

        /* ================= */

        /* Menghitung nilai skala penilaian yang memiliki tahun ajaran paling terbaru berdasarkan $tahunAjaran */
        // Dapat bobot setiap kriteria
        $bobotKriteria = [];
        foreach ($kriteria as $kriteriaItem) {
            $bobotKriteria[$kriteriaItem->kode_kriteria] = $kriteriaItem->bobot_kriteria;
        }

        // Dapatkan jumlah subkriteria setiap kriteria
        $getCountSubkriteria = Kriteria::with(['subkriteria'])->get();
        $countSubkriteria = [];
        foreach ($getCountSubkriteria as $kriteriaItem) {
            $countSubkriteria[$kriteriaItem->kode_kriteria] = $kriteriaItem->subkriteria->count();
        }

        // Dapatkan jumlah indikator setiap subkriteria
        $getCountIndikator = Kriteria::with(['subkriteria', 'subkriteria.indikatorSubkriteria'])->get();

        // Kelompokkan key subkriteria berdasarkan kode_kriteria
        $countIndikator = [];
        foreach ($getCountIndikator as $kodeKriteria => $kriteriaItem) {
            $kodeKriteria = $kriteriaItem->kode_kriteria;

            foreach ($kriteriaItem->subkriteria as $subkriteriaItem) {
                $countIndikator[$kodeKriteria][$subkriteriaItem->kode_subkriteria] = $subkriteriaItem->indikatorSubkriteria->count();
            }
        }

        // dd($countIndikator);

        // Dapatkan bobot setiap subkriteria
        $bobotSubkriteria = [];
        foreach ($getCountIndikator as $kodeKriteria => $kriteriaItem) {
            $kodeKriteria = $kriteriaItem->kode_kriteria;
            $bobotKriteriaItem = $bobotKriteria[$kodeKriteria];

            foreach ($kriteriaItem->subkriteria as $subkriteriaItem) {
                // $bobotSubkriteria[$kodeKriteria][$subkriteriaItem->kode_subkriteria] = $bobotKriteriaItem / $countSubkriteria[$kodeKriteria];
                $bobotSubkriteria[$kodeKriteria][$subkriteriaItem->kode_subkriteria] = $subkriteriaItem->bobot_subkriteria;

                // Convert to persen
                $bobotSubkriteria[$kodeKriteria][$subkriteriaItem->kode_subkriteria] = $bobotSubkriteria[$kodeKriteria][$subkriteriaItem->kode_subkriteria] / 100;
            }
        }

        // dd($bobotSubkriteria);

        // Hitung persentase bobot setiap indikator
        // Rumus = $bobotSubkriteria / $countIndikator
        $totalBobotSubkriteriaIndikator = [];
        foreach ($bobotSubkriteria as $kodeKriteria => $kriteriaItem) {
            foreach ($kriteriaItem as $kodeSubkriteria => $subkriteriaItem) {
                $totalBobotSubkriteriaIndikator[$kodeKriteria][$kodeSubkriteria] = $subkriteriaItem / $countIndikator[$kodeKriteria][$kodeSubkriteria];
            }
        }

        // dd('ini adalah persentase tiap indikator', $totalBobotSubkriteriaIndikator);

        // Dapatkan alternatifPenilaian yang memiliki tahun_ajaran paling terbaru berdasarkan $tahunAjaran
        $alternatifPenilaianByTahunAjaran = [];
        foreach ($alternatifPenilaian as $alternatifPenilaianItem) {
            if ($alternatifPenilaianItem->tahun_ajaran == $tahunAjaran) {
                $alternatifPenilaianByTahunAjaran[] = $alternatifPenilaianItem;
            }
        }

        // dd($alternatifPenilaianByTahunAjaran);

        // Dapatkan alternatif kedua dan penilaianIndikator yang memiliki tahun_ajaran paling terbaru berdasarkan $tahunAjaran
        $getNilaiSkala = [];
        foreach ($alternatifPenilaianByTahunAjaran as $keyAlternatif => $alternatifPenilaianItem) {
            $alternatifKedua = $alternatifPenilaianItem->alternatifKedua;
            $penilaianIndikator = $alternatifPenilaianItem->penilaianIndikator;

            $getNilaiSkala[$keyAlternatif][$alternatifKedua->kode_alternatif] = $penilaianIndikator;
        }

        // dd($getNilaiSkala);

        // Kelompokkan sebelum penilaianIndikator diseleksi berdasarkan nilai tersebut berada di kode_subkriteria apa
        $nilaiSkala = [];
        foreach ($getNilaiSkala as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeAlternatif => $penilaianIndikatorItem) {
                foreach ($penilaianIndikatorItem as $penilaianIndikatorSubkriteriaItem) {
                    $nilaiSkala[$keyAlternatif][$kodeAlternatif][$penilaianIndikatorSubkriteriaItem->skalaIndikatorDetail->skalaIndikator->indikatorSubkriteria->subkriteria->kode_kriteria][$penilaianIndikatorSubkriteriaItem->skalaIndikatorDetail->skalaIndikator->indikatorSubkriteria->kode_subkriteria][] = $penilaianIndikatorSubkriteriaItem->skalaIndikatorDetail->nilaiSkala->nilai_skala;
                }
            }
        }

        // dd($nilaiSkala);

        // Hitung total bobot setiap indikator
        // Rumus = ($totalBobotSubkriteriaIndikator / banyaknya indikator) * $nilaiSkala
        $totalBobotIndikator = [];
        foreach ($nilaiSkala as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeKriteria => $kriteriaItem) {
                foreach ($kriteriaItem as $kodeSubkriteria => $subkriteriaItem) {
                    foreach ($subkriteriaItem as $kodeIndikator => $nilaiSkalaItem) {
                        // Perbaikan: Gunakan array_map untuk perkalian setiap elemen array dengan $totalBobotSubkriteriaIndikator
                        $totalBobotIndikator[$keyAlternatif][$kodeKriteria][$kodeSubkriteria][$kodeIndikator] = array_map(function ($value) use ($totalBobotSubkriteriaIndikator, $kodeSubkriteria, $kodeIndikator) {
                            return $totalBobotSubkriteriaIndikator[$kodeSubkriteria][$kodeIndikator] * $value;
                        }, $nilaiSkalaItem);
                    }
                }
            }
        }

        // dd('ini adalah total bobot subkriteria indikator',$totalBobotIndikator);

        // Jumlahkan total setiap nilai dari kode subkriteria pada $totalBobotIndikator
        $sumNilaiSubkriteria = [];
        foreach ($totalBobotIndikator as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeKriteria => $kriteriaItem) {
                foreach ($kriteriaItem as $kodeSubkriteria => $subkriteriaItem) {
                    foreach ($subkriteriaItem as $kodeIndikator => $nilaiSkalaItem) {
                        // Jumlahkan total setiap nilai dari kode_subkriteria
                        $sumNilaiSubkriteria[$keyAlternatif][$kodeKriteria][$kodeSubkriteria][$kodeIndikator] = array_sum($nilaiSkalaItem);
                    }
                }
            }
        }

        // dd('ini adalah total nilai persentase subkritera', $sumNilaiSubkriteria);

        // Jumlahkan total setiap nilai dari kode kriteria pada $sumNilaiSubkriteria
        $totalNilaiSubkriteria = [];

        foreach ($sumNilaiSubkriteria as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeKriteria => $kriteriaItem) {
                foreach ($kriteriaItem as $kodeSubkriteria => $subkriteriaItem) {
                    $totalNilaiSubkriteria[$keyAlternatif][$kodeKriteria][$kodeSubkriteria] = array_sum($subkriteriaItem);
                }
            }
        }

        // dd('ini adalah total nilai kriteria', $totalNilaiSubkriteria);

        // Dapatkan banyaknya alternatif yang sama dari $totalNilaiSubkriteria
        $countAlternatif = [];
        foreach ($totalNilaiSubkriteria as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeKriteria => $kriteriaItem) {
                // Inisialisasi array untuk kode kriteria jika belum ada
                if (!isset($countAlternatif[$kodeKriteria])) {
                    $countAlternatif[$kodeKriteria] = 0;
                }

                // Tambahkan jumlah alternatif yang sama pada indeks yang sesuai
                $countAlternatif[$kodeKriteria]++;
            }
        }

        // dd($countAlternatif);

        // Kelompokkan nilai berdasarkan kode alternatif
        // Lalu jumlahkan setiap kode kriteria pada sub array alternatif
        $avgNilaiKriteria = [];

        // Inisialisasi array dinamis untuk K1, K2, dan K3
        foreach ($sumNilaiSubkriteria as $keyAlternatif) {

            foreach ($keyAlternatif as $alternatifKode => $nilaiKriteria) {
                // Inisialisasi array untuk setiap kode alternatif
                if (!isset($avgNilaiKriteria[$alternatifKode])) {
                    $avgNilaiKriteria[$alternatifKode] = [];
                }

                // Iterasi untuk setiap nilai kriteria dan inisialisasi jika belum ada
                foreach ($nilaiKriteria as $kodeSubkriteria => $nilai) {
                    if (!isset($avgNilaiKriteria[$alternatifKode][$kodeSubkriteria])) {
                        $avgNilaiKriteria[$alternatifKode][$kodeSubkriteria] = 0;
                    }
                }

                // Jumlahkan setiap nilai kriteria pada setiap kode alternatif
                // Lalu di bagi dengan banyaknya alternatif yang sama
                foreach ($nilaiKriteria as $kodeSubkriteria => $nilai) {
                   // Periksa apakah $nilai adalah array atau bukan
                    if (is_array($nilai)) {
                        foreach ($nilai as $nilaiItem) {
                            $avgNilaiKriteria[$alternatifKode][$kodeSubkriteria] += $nilaiItem / $countAlternatif[$alternatifKode];
                        }
                    } else {
                        $avgNilaiKriteria[$alternatifKode][$kodeSubkriteria] += $nilai / $countAlternatif[$alternatifKode];
                    }
                }
            }
        }

        // dd($avgNilaiKriteria);
        
        // Hitung total nilai setiap kode alternatif $totalNilaiKriteria
        $totalNilaiKriteriaAlternatif = [];
        foreach ($avgNilaiKriteria as $kodeAlternatif => $nilaiKriteriaItem) {
            $totalNilaiKriteriaAlternatif[$kodeAlternatif] = array_sum($nilaiKriteriaItem);
        }

        // dd($totalNilaiKriteriaAlternatif);

        // Hitung total nilai setiap kode alternatif $totalNilaiKriteriaAlternatif
        // Rumus = $avgNilaiKriteria + $totalBobotKriteria
        $totalNilaiAlternatif = [];
        foreach ($totalNilaiKriteriaAlternatif as $kodeAlternatif => $totalNilaiKriteriaAlternatifItem) {
            $totalNilaiAlternatif[$kodeAlternatif] = $totalNilaiKriteriaAlternatifItem + $totalBobotKriteria[$kodeAlternatif];
        }

        // dd($totalNilaiAlternatif);


        // Urutkan $totalNilaiAlternatif secara descending (dari yang tertinggi)
        arsort($totalNilaiAlternatif);

        // Urutkan ranking dari nilai terbesar ke terkecil
        $rank = 0;
        $prevTotal = 0;
        $rankAlternatif = [];
        foreach ($totalNilaiAlternatif as $kodeAlternatif => $totalNilaiAlternatifItem) {
            if ($totalNilaiAlternatifItem != $prevTotal) {
                $rank++;
            }

            $rankAlternatif[$kodeAlternatif] = $rank;
            $prevTotal = $totalNilaiAlternatifItem;
        }

        // dd($rankAlternatif);

        // Buatkan array untuk menampung data $totalNilaiAlternatif dan $rankAlternatif
        $totalNilaiAlternatifAndRankAlternatif = [];
        foreach ($totalNilaiAlternatif as $kodeAlternatif => $totalNilaiAlternatifItem) {
            $totalNilaiAlternatifAndRankAlternatif[$kodeAlternatif] = [
                'tahun_ajaran' => $tahunAjaran,
                'nilai' => $totalNilaiAlternatifItem,
                'rank' => $rankAlternatif[$kodeAlternatif],
            ];
        }

        // dd($totalNilaiAlternatifAndRankAlternatif);

        // Simpan otomatis ke database Ranking dari $totalNilaiAlternatifAndRankAlternatif
        try {
            foreach ($totalNilaiAlternatifAndRankAlternatif as $kodeAlternatif => $totalNilaiAlternatifAndRankAlternatifItem) {
                Ranking::updateOrCreate(
                    ['tahun_ajaran' => $tahunAjaran, 'kode_alternatif' => $kodeAlternatif],
                    ['nilai' => $totalNilaiAlternatifAndRankAlternatifItem['nilai'], 'rank' => $totalNilaiAlternatifAndRankAlternatifItem['rank']]
                );
            }
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data perankingan');
            return back()->with('notif', $notif);
        }
        
        return view('pages.dashboard.ranking.index', [
            'title' => 'Perankingan',
            'tahunAjaran' => $tahunAjaran,
            'alternatifPenilaian' => $uniqueAlternatifPenilaianByTahunAjaran,
            'kriteria' => $kriteria,
            'bobotAlternatif' => $bobotAlternatif,
            'bobotPrioritasSubkriteria' => $bobotPrioritasSubkriteria,
            'totalBobotKriteria' => $totalBobotKriteria,
            'avgNilaiKriteria' => $avgNilaiKriteria,
            'nilaiAlternatif' => $totalNilaiAlternatif,
            'rankAlternatif' => $rankAlternatif,
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
        //
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
