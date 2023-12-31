<?php

namespace App\Services;

use App\Models\BobotPrioritasKriteria;
use Illuminate\Http\Request;

class PerhitunganKriteriaService
{
    public function totalKolomKriteria($perhitunganKriteria)
    {
        $columnTotalKriteria = [];
        foreach ($perhitunganKriteria as $item) {
            $kriteriaKedua = $item->kriteriaKedua->id_kriteria;
            $nilaiKriteria = $item->nilai_kriteria;

            if (!isset($columnTotalKriteria[$kriteriaKedua])) {
                $columnTotalKriteria[$kriteriaKedua] = 0;
            }

            $columnTotalKriteria[$kriteriaKedua] += $nilaiKriteria;
        }

        return $columnTotalKriteria;
    }

    public function normalisasiMatriks($perhitunganKriteria, $totalKolomKriteria)
    {
        $normalisasiMatriks = [];
        foreach ($perhitunganKriteria as $item) {
            $kriteriaPertama = $item->kriteriaPertama->id_kriteria;
            $kriteriaKedua = $item->kriteriaKedua->id_kriteria;
            $nilaiKriteria = $item->nilai_kriteria;

            $normalizedValue = $nilaiKriteria / $totalKolomKriteria[$kriteriaKedua];

            $normalisasiMatriks[$item->kriteriaPertama->id_kriteria][$kriteriaKedua] = $normalizedValue;

            $normalisasiMatriks[$item->kriteriaPertama->id_kriteria][$kriteriaKedua] = substr($normalisasiMatriks[$item->kriteriaPertama->id_kriteria][$kriteriaKedua], 0, 6);
        }

        return $normalisasiMatriks;
    }

    public function totalBarisNormalisasiMatriks($normalisasiMatriks)
    {
        $totalBarisNormalisasiMatriks = [];
        foreach ($normalisasiMatriks as $kriteriaPertama => $kriteriaKedua) {
            foreach ($kriteriaKedua as $kriteria => $nilai) {
                if (!isset($totalBarisNormalisasiMatriks[$kriteriaPertama])) {
                    $totalBarisNormalisasiMatriks[$kriteriaPertama] = 0;
                }

                $totalBarisNormalisasiMatriks[$kriteriaPertama] += $nilai;
            }
        }

        return $totalBarisNormalisasiMatriks;
    }

    public function bobotPrioritasKriteria($totalBarisNormaliasiMatriks, $jumlahKriteria)
    {
        $bobotPrioritasKriteria = [];
        foreach ($totalBarisNormaliasiMatriks as $kriteriaPertama => $total) {
            $bobotPrioritasKriteria[$kriteriaPertama] = $total / $jumlahKriteria;
        }

        // Save bobot prioritas kriteria to database
        try {
            BobotPrioritasKriteria::truncate();
            
            foreach ($bobotPrioritasKriteria as $kriteriaPertama => $bobot) {
                BobotPrioritasKriteria::updateOrCreate(
                    ['id_kriteria' => $kriteriaPertama],
                    ['bobot_prioritas' => $bobot]
                );
            }
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data bobot prioritas kriteria');
            return back()->with('notif', $notif);
        }

        return $bobotPrioritasKriteria;
    }

    public function consistencyMeasure($perhitunganKriteria, $bobotPrioritasKriteria)
    {
        $consistencyMeasures = [];
        foreach ($perhitunganKriteria as $item) {
            $kriteriaPertama = $item->kriteriaPertama->id_kriteria;
            $kriteriaKedua = $item->kriteriaKedua->id_kriteria;
            $nilaiKriteria = $item->nilai_kriteria;

            if (!isset($consistencyMeasures[$kriteriaPertama])) {
                $consistencyMeasures[$kriteriaPertama] = 0;
            }

            $consistencyMeasures[$kriteriaPertama] += $nilaiKriteria * $bobotPrioritasKriteria[$kriteriaKedua];
            $consistencyMeasures[$kriteriaPertama] = substr($consistencyMeasures[$kriteriaPertama], 0, 6);
        }

        return $consistencyMeasures;
    }

    public function totalConsistencyMeasures($consistencyMeasures, $jumlahKriteria)
    {
        $totalConsistencyMeasures = array_sum($consistencyMeasures) / $jumlahKriteria;
        $totalConsistencyMeasures = substr($totalConsistencyMeasures, 0, 6);

        return $totalConsistencyMeasures;
    }

    public function consistencyRatio($totalConsistencyMeasures, $jumlahKriteria, $ratioIndex)
    {
        // calulate consistency index
        $consistencyIndex = ($totalConsistencyMeasures - $jumlahKriteria) / ($jumlahKriteria - 1);

        // get ratio index by total kriteria
        $ratioIndexByKriteria = $ratioIndex[$jumlahKriteria - 1]->nilai_ratio_index;

        if ($ratioIndexByKriteria != 0) {
            $consistencyRatio = $consistencyIndex / $ratioIndexByKriteria;
        } else {
            $consistencyRatio = 0;
        }

        $consistencyData = [
            'Consistency Index (CI)' => substr($consistencyIndex, 0, 6),
            'Ratio Index (RI)' => $ratioIndexByKriteria,
            'Consistency Ratio (CR)' => substr($consistencyRatio, 0, 6),
        ];

        return $consistencyData;
    }

    public function consistencyResult($consistencyRatio)
    {
        $consistencyResult = $consistencyRatio['Consistency Ratio (CR)'] <= 0.1 ? 'Konsisten' : 'Tidak Konsisten';

        return $consistencyResult;
    }
}