<?php 

namespace App\Services\Ranking\Handlers;

use App\Models\BobotPrioritasAlternatif;
use App\Models\PerhitunganAlternatif;

class AlgorithmAhpHandler
{
    protected TotalBobotKriteriaHandler $totalBobotKriteriaHandler;

    public function __construct(TotalBobotKriteriaHandler $totalBobotKriteriaHandler)
    {
        $this->totalBobotKriteriaHandler = $totalBobotKriteriaHandler;
    }

    public function handle(?int $idTanggalPenilaian = null, $kriteria, $bobotPrioritasSubkriteria, $alternatifPenilaian, $uniqueAlternatifPenilaianByTahunIdTanggalPenilaian): array
    {
        // Get perhitungan alternatif by id_tanggal_penilaian
        $perhitunganAlternatif = PerhitunganAlternatif::with([
            'tanggalPenilaian', 
            'alternatifPertama', 
            'alternatifKedua'
        ])
        ->where('id_tanggal_penilaian', $idTanggalPenilaian)
        ->get();

        // Get bobot prioritas alternatif by id_tanggal_penilaian
        $bobotAlternatif = BobotPrioritasAlternatif::with([
            'tanggalPenilaian'
        ])
        ->where('id_tanggal_penilaian', $idTanggalPenilaian)
        ->orderBy('kode_kriteria', 'asc')
        ->get();

        // Get the second unique alternative of the assessment that has the same employee group as the employee group owned by the auth user
        $uniqueAlternatifPenilaianByTahunIdTanggalPenilaian = $uniqueAlternatifPenilaianByTahunIdTanggalPenilaian;
    
        $totalBobotKriteria = $this->totalBobotKriteriaHandler->handle($uniqueAlternatifPenilaianByTahunIdTanggalPenilaian, $kriteria, $bobotPrioritasSubkriteria, $bobotAlternatif);

        // Get bobot kriteria
        $bobotKriteria = [];
        foreach ($kriteria as $kriteriaItem) {
            $bobotKriteria[$kriteriaItem->kode_kriteria] = $kriteriaItem->bobot_kriteria;
        }

        // Count subkriteria per kriteria
        foreach ($kriteria as $kriteriaItem) {
            $countSubkriteria[$kriteriaItem->kode_kriteria] = $kriteriaItem->subkriteria->count();
        }

        // Count indikator per subkriteria
        $countIndikator = [];
        foreach ($kriteria as $kodeKriteria => $kriteriaItem) {
            $kodeKriteria = $kriteriaItem->kode_kriteria;

            foreach ($kriteriaItem->subkriteria as $subkriteriaItem) {
                $countIndikator[$kodeKriteria][$subkriteriaItem->kode_subkriteria] = $subkriteriaItem->indikatorSubkriteria->count();
            }
        }

        // Get bobot subkriteria
        $bobotSubkriteria = [];
        foreach ($kriteria as $kodeKriteria => $kriteriaItem) {
            $kodeKriteria = $kriteriaItem->kode_kriteria;
            $bobotKriteriaItem = $bobotKriteria[$kodeKriteria];

            foreach ($kriteriaItem->subkriteria as $subkriteriaItem) {
                $bobotSubkriteria[$kodeKriteria][$subkriteriaItem->kode_subkriteria] = $bobotKriteriaItem / $countSubkriteria[$kodeKriteria];

                // Convert to persen
                $bobotSubkriteria[$kodeKriteria][$subkriteriaItem->kode_subkriteria] = $bobotSubkriteria[$kodeKriteria][$subkriteriaItem->kode_subkriteria] / 100;
            }
        }

        // Calculate total bobot indikator
        // Formula: $bobotSubkriteria / $countIndikator
        $totalBobotSubkriteriaIndikator = [];
        foreach ($bobotSubkriteria as $kodeKriteria => $kriteriaItem) {
            foreach ($kriteriaItem as $kodeSubkriteria => $subkriteriaItem) {
                $totalBobotSubkriteriaIndikator[$kodeKriteria][$kodeSubkriteria] = $subkriteriaItem / $countIndikator[$kodeKriteria][$kodeSubkriteria];
            }
        }

        // Get altenatif penilaian by id_tanggal_penilaian
        $alternatifPenilaianByIdTanggalPenilaian = [];
        foreach ($alternatifPenilaian as $alternatifPenilaianItem) {
            if ($alternatifPenilaianItem->id_tanggal_penilaian == $idTanggalPenilaian) {
                $alternatifPenilaianByIdTanggalPenilaian[] = $alternatifPenilaianItem;
            }
        }

        // Get nilai skala
        $getNilaiSkala = [];
        foreach ($alternatifPenilaianByIdTanggalPenilaian as $keyAlternatif => $alternatifPenilaianItem) {
            $alternatifKedua = $alternatifPenilaianItem->alternatifKedua->alternatifPertama;
            $penilaianIndikator = $alternatifPenilaianItem->penilaianIndikator;

            $getNilaiSkala[$keyAlternatif][$alternatifKedua->kode_alternatif] = $penilaianIndikator;
        }

        $nilaiSkala = [];
        foreach ($getNilaiSkala as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeAlternatif => $penilaianIndikatorItem) {
                foreach ($penilaianIndikatorItem as $penilaianIndikatorSubkriteriaItem) {
                    $nilaiSkala[$keyAlternatif][$kodeAlternatif][$penilaianIndikatorSubkriteriaItem->skalaIndikatorDetail->skalaIndikator->indikatorSubkriteria->subkriteria->kode_kriteria][$penilaianIndikatorSubkriteriaItem->skalaIndikatorDetail->skalaIndikator->indikatorSubkriteria->kode_subkriteria][] = $penilaianIndikatorSubkriteriaItem->skalaIndikatorDetail->nilaiSkala->nilai_skala;
                }
            }
        }

        // Calulate total bobot indikator
        // Formula: ($totalBobotSubkriteriaIndikator / banyaknya indikator) * $nilaiSkala
        $totalBobotIndikator = [];
        foreach ($nilaiSkala as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeKriteria => $kriteriaItem) {
                foreach ($kriteriaItem as $kodeSubkriteria => $subkriteriaItem) {
                    foreach ($subkriteriaItem as $kodeIndikator => $nilaiSkalaItem) {
                        $totalBobotIndikator[$keyAlternatif][$kodeKriteria][$kodeSubkriteria][$kodeIndikator] = array_map(function ($value) use ($totalBobotSubkriteriaIndikator, $kodeSubkriteria, $kodeIndikator) {
                            return $totalBobotSubkriteriaIndikator[$kodeSubkriteria][$kodeIndikator] * $value;
                        }, $nilaiSkalaItem);
                    }
                }
            }
        }

        // Sum nilai subkriteria
        $sumNilaiSubkriteria = [];
        foreach ($totalBobotIndikator as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeKriteria => $kriteriaItem) {
                foreach ($kriteriaItem as $kodeSubkriteria => $subkriteriaItem) {
                    foreach ($subkriteriaItem as $kodeIndikator => $nilaiSkalaItem) {
                        $sumNilaiSubkriteria[$keyAlternatif][$kodeKriteria][$kodeSubkriteria][$kodeIndikator] = array_sum($nilaiSkalaItem);
                    }
                }
            }
        }

        // Calculate total nilai subkriteria
        $totalNilaiSubkriteria = [];
        foreach ($sumNilaiSubkriteria as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeKriteria => $kriteriaItem) {
                foreach ($kriteriaItem as $kodeSubkriteria => $subkriteriaItem) {
                    $totalNilaiSubkriteria[$keyAlternatif][$kodeKriteria][$kodeSubkriteria] = array_sum($subkriteriaItem);
                }
            }
        }

        // Count alternatif
        $countAlternatif = [];
        foreach ($totalNilaiSubkriteria as $keyAlternatif => $alternatifPenilaianItem) {
            foreach ($alternatifPenilaianItem as $kodeKriteria => $kriteriaItem) {
                if (!isset($countAlternatif[$kodeKriteria])) {
                    $countAlternatif[$kodeKriteria] = 0;
                }

                $countAlternatif[$kodeKriteria]++;
            }
        }

        // Average nilai subkriteria
        $avgNilaiKriteria = [];
        foreach ($sumNilaiSubkriteria as $keyAlternatif) {
            foreach ($keyAlternatif as $alternatifKode => $nilaiKriteria) {
                if (!isset($avgNilaiKriteria[$alternatifKode])) {
                    $avgNilaiKriteria[$alternatifKode] = [];
                }

                foreach ($nilaiKriteria as $kodeSubkriteria => $nilai) {
                    if (!isset($avgNilaiKriteria[$alternatifKode][$kodeSubkriteria])) {
                        $avgNilaiKriteria[$alternatifKode][$kodeSubkriteria] = 0;
                    }
                }

                foreach ($nilaiKriteria as $kodeSubkriteria => $nilai) {
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

        // Format average nilai kriteria
        $formattedAvgNilaiKriteria = [];
        foreach ($alternatifPenilaian as $dataAlternatif) {
            $kodeAlternatif = $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif;

            foreach ($kriteria as $dataKriteria) {
                $kodeKriteria = $dataKriteria->kode_kriteria;

                $formattedAvgNilaiKriteria[$kodeAlternatif][$kodeKriteria] = 
                    $avgNilaiKriteria[$kodeAlternatif][$kodeKriteria] ?? 0;
            }
        }

        // Calculate total nilai kriteria alternatif
        $totalNilaiKriteriaAlternatif = [];
        foreach ($avgNilaiKriteria as $kodeAlternatif => $nilaiKriteriaItem) {
            $totalNilaiKriteriaAlternatif[$kodeAlternatif] = array_sum($nilaiKriteriaItem);
        }

        // Calculate total nilai alternatif
        $totalNilaiAlternatif = [];
        if ($perhitunganAlternatif->isEmpty()) {
            $totalNilaiAlternatif = $totalNilaiKriteriaAlternatif;
        } else {
            foreach ($totalNilaiKriteriaAlternatif as $kodeAlternatif => $totalNilaiKriteriaAlternatifItem) {
                $totalNilaiAlternatif[$kodeAlternatif] = $totalNilaiKriteriaAlternatifItem + $totalBobotKriteria[$kodeAlternatif];
            }
        }

        // Sort total nilai alternatif
        arsort($totalNilaiAlternatif);

        // Sort rank alternatif
        $rank = 0;
        $prevTotal = null;

        $rankAlternatif = [];
        foreach ($totalNilaiAlternatif as $kodeAlternatif => $totalNilaiAlternatifItem) {
            if ($totalNilaiAlternatifItem !== $prevTotal) {
                $rank++;
            }

            $rankAlternatif[$kodeAlternatif] = $rank;
            $prevTotal = $totalNilaiAlternatifItem;
        }

        // Format total nilai alternatif and rank alternatif
        $totalNilaiAlternatifAndRankAlternatif = [];
        foreach ($totalNilaiAlternatif as $kodeAlternatif => $totalNilaiAlternatifItem) {
            $totalNilaiAlternatifAndRankAlternatif[$kodeAlternatif] = [
                'id_tanggal_penilaian' => $idTanggalPenilaian,
                'nilai' => $totalNilaiAlternatifItem,
                'rank' => $rankAlternatif[$kodeAlternatif],
            ];
        }

        return [
            'alternatifPenilaian' => $uniqueAlternatifPenilaianByTahunIdTanggalPenilaian,
            'checkPerhitunganAlternatif' => $perhitunganAlternatif,
            'bobotAlternatif' => $bobotAlternatif,
            'totalBobotKriteria' => $totalBobotKriteria,
            'avgNilaiKriteria' => $formattedAvgNilaiKriteria,
            'nilaiAlternatif' => $totalNilaiAlternatif,
            'rankAlternatif' => $rankAlternatif,
            'totalNilaiAlternatifAndRankAlternatif' => $totalNilaiAlternatifAndRankAlternatif,
        ];
    }
}