<?php

namespace App\Services;

use App\Models\BobotPrioritasKriteria;
use App\Models\BobotPrioritasSubkriteria;
use Illuminate\Http\Request;

class PerhitunganSubkriteriaService
{
    public function totalKolomSubkriteria($perhitunganSubkriteria)
    {
        $totalKolomSubkriteria = [];
        foreach ($perhitunganSubkriteria as $item) {
            $kodeKriteria = $item->kode_kriteria;
            $subkriteriaKedua = $item->subkriteriaKedua->id_subkriteria;
            $nilaiSubkriteria = $item->nilai_subkriteria;

            if (!isset($totalKolomSubkriteria[$kodeKriteria][$subkriteriaKedua])) {
                $totalKolomSubkriteria[$kodeKriteria][$subkriteriaKedua] = 0;
            }

            $totalKolomSubkriteria[$kodeKriteria][$subkriteriaKedua] += $nilaiSubkriteria;
        }

        return $totalKolomSubkriteria;
    }

    public function normalisasiMatriks($perhitunganSubkriteria, $totalKolomSubkriteria)
    {
        $normalisasiMatriks = [];
        foreach ($perhitunganSubkriteria as $item) {
            $kodeKriteria = $item->kode_kriteria;
            $subkriteriaPertama = $item->subkriteriaPertama->id_subkriteria;
            $subkriteriaKedua = $item->subkriteriaKedua->id_subkriteria;
            $nilaiSubkriteria = $item->nilai_subkriteria;

            $normalizedValue = $nilaiSubkriteria / $totalKolomSubkriteria[$kodeKriteria][$subkriteriaKedua];

            $normalisasiMatriks[$kodeKriteria][$item->subkriteriaPertama->id_subkriteria][$subkriteriaKedua] = $normalizedValue;
            $normalisasiMatriks[$kodeKriteria][$item->subkriteriaPertama->id_subkriteria][$subkriteriaKedua] = substr($normalisasiMatriks[$kodeKriteria][$item->subkriteriaPertama->id_subkriteria][$subkriteriaKedua], 0, 6);
        }

        return $normalisasiMatriks;
    }

    public function totalBarisNormalisasiMatriks($normalisasiMatriks)
    {
        $totalBarisNormalisasiMatriks = [];
        foreach ($normalisasiMatriks as $kodeKriteria => $subkriteria) {
            $totalBarisNormalisasiMatriks[$kodeKriteria] = [];

            foreach ($subkriteria as $subkriteriaPertama => $subkriteriaKedua) {
                $totalBarisNormalisasiMatriks[$kodeKriteria][$subkriteriaPertama] = 0;

                foreach ($subkriteriaKedua as $subkriteria => $nilai) {
                    $totalBarisNormalisasiMatriks[$kodeKriteria][$subkriteriaPertama] += $nilai;
                }
            }
        }

        return $totalBarisNormalisasiMatriks;
    }

    public function countSubkriteriaByKriteria($totalBarisNormalisasiMatriks)
    {
        $countSubkriteriaByKriteria = [];
        foreach ($totalBarisNormalisasiMatriks as $kodeKriteria => $subkriteria) {
            $jumlahSubkriteria = count($subkriteria);

            $countSubkriteriaByKriteria[$kodeKriteria] = $jumlahSubkriteria;
        }

        return $countSubkriteriaByKriteria;
    }

    public function bobotPrioritasSubkriteria($totalBarisNormalisasiMatriks, $countSubkriteriaByKriteria)
    {
        $bobotPrioritasSubkriteria = [];
        foreach ($totalBarisNormalisasiMatriks as $kodeKriteria => $subkriteria) {
            $bobotPrioritasSubkriteria[$kodeKriteria] = [];

            foreach ($subkriteria as $subkriteriaPertama => $total) {
                $bobotPrioritasSubkriteria[$kodeKriteria][$subkriteriaPertama] = $total / $countSubkriteriaByKriteria[$kodeKriteria];

                $bobotPrioritasSubkriteria[$kodeKriteria][$subkriteriaPertama] = substr($bobotPrioritasSubkriteria[$kodeKriteria][$subkriteriaPertama], 0, 6);
            }
        }

        return $bobotPrioritasSubkriteria;
    }

    public function calculateTotalBobotSubkriteria($bobotPrioritasSubkriteria)
    {
        // Sum total bobot prioritas subkriteria by array keys kode_kriteria
        $totalBobotPrioritasSubkriteriabyKodeKriteria = [];
        foreach ($bobotPrioritasSubkriteria as $kodeKriteria => $subkriteria) {
            $totalBobotPrioritasSubkriteriabyKodeKriteria[$kodeKriteria] = array_sum($subkriteria);
        }

        // Destructuring $totalBobotPrioritasSubkriteriabyKodeKriteria array keys to default
        $totalBobotPrioritasSubkriteria = [];
        foreach ($bobotPrioritasSubkriteria as $kodeKriteria => $subkriteria) {
            $totalBobotPrioritasSubkriteria[] = array_sum($subkriteria);
        }

        // Get bobot prioritas kriteria
        $bobotPrioritasKriteria = BobotPrioritasKriteria::pluck('bobot_prioritas', 'id_kriteria')->toArray();
        $totalBobotKriteria = [];
        foreach ($bobotPrioritasKriteria as $idKriteria => $bobot) {
            $totalBobotKriteria[] = $bobot;
        }

        // Calculate total bobot prioritas subkriteria
        $calculateTotalBobotPrioritasSubkriteria = [];
        foreach ($totalBobotPrioritasSubkriteria as $key => $total) {
            $calculateTotalBobotPrioritasSubkriteria[] = $total * $totalBobotKriteria[$key];
        }

        // Destructuring $calculateTotalBobotPrioritasSubkriteria array keys to kode_kriteria
        $calculateTotalBobotPrioritasSubkriteria = array_combine(array_keys($bobotPrioritasSubkriteria), $calculateTotalBobotPrioritasSubkriteria);

        // Save bobot prioritas subkriteria to database
        try {
            BobotPrioritasSubkriteria::truncate();

            foreach ($calculateTotalBobotPrioritasSubkriteria as $kodeKriteria => $total) {
                BobotPrioritasSubkriteria::updateOrCreate(
                    ['kode_kriteria' => $kodeKriteria],
                    ['bobot_prioritas' => $total]
                );
            }
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data bobot prioritas kriteria');
            return back()->with('notif', $notif);
        }

        return $totalBobotPrioritasSubkriteriabyKodeKriteria;
    }

    public function consistencyMeasures($perhitunganSubkriteria, $bobotPrioritasSubkriteria)
    {
        $consistencyMeasures = [];
        foreach ($perhitunganSubkriteria as $item) {
            $kodeKriteria = $item->kode_kriteria;
            $subkriteriaPertama = $item->subkriteriaPertama->id_subkriteria;
            $subkriteriaKedua = $item->subkriteriaKedua->id_subkriteria;
            $nilaiSubkriteria = $item->nilai_subkriteria;

            if (!isset($consistencyMeasures[$kodeKriteria][$subkriteriaPertama])) {
                $consistencyMeasures[$kodeKriteria][$subkriteriaPertama] = 0;
            }

            $consistencyMeasures[$kodeKriteria][$subkriteriaPertama] += $nilaiSubkriteria * $bobotPrioritasSubkriteria[$kodeKriteria][$subkriteriaKedua];

            $consistencyMeasures[$kodeKriteria][$subkriteriaPertama] = substr($consistencyMeasures[$kodeKriteria][$subkriteriaPertama], 0, 6);
        }

        return $consistencyMeasures;
    }

    public function totalConsistencyMeasures($consistencyMeasures, $countSubkriteriaByKriteria)
    {
        $totalConsistencyMeasures = [];
        foreach ($consistencyMeasures as $kodeKriteria => $subkriteria) {
            $totalConsistencyMeasures[$kodeKriteria] = array_sum($subkriteria) / $countSubkriteriaByKriteria[$kodeKriteria];
        }

        return $totalConsistencyMeasures;
    }

    public function consistencyRatio($totalConsistencyMeasures, $countSubkriteriaByKriteria, $ratioIndex)
    {
        // calculate consistency index
        $consistencyIndex = [];
        foreach ($totalConsistencyMeasures as $kodeKriteria => $total) {
            
            // Avoid division by zero
            if ($countSubkriteriaByKriteria[$kodeKriteria] == 1) {
                $consistencyIndex[$kodeKriteria] = 0;
                continue;
            }

            $consistencyIndex[$kodeKriteria] = ($total - $countSubkriteriaByKriteria[$kodeKriteria]) / ($countSubkriteriaByKriteria[$kodeKriteria] - 1);

            $consistencyIndex[$kodeKriteria] = substr($consistencyIndex[$kodeKriteria], 0, 6);
        }

        // Get ratio index by count subkriteria
        $ratioIndexBySubkriteria = [];
        foreach ($countSubkriteriaByKriteria as $kodeKriteria => $jumlahSubkriteria) {
            $ratioIndexBySubkriteria[$kodeKriteria] = $ratioIndex[$jumlahSubkriteria - 1]->nilai_ratio_index;
        }

        // calculate consistency ratio
        $consistencyRatio = [];
        foreach ($consistencyIndex as $kodeKriteria => $index) {

            // Avoid division by zero
            if ($ratioIndexBySubkriteria[$kodeKriteria] == 0) {
                $consistencyRatio[$kodeKriteria] = 0;
                continue;
            }
            
            $consistencyRatio[$kodeKriteria] = $index / $ratioIndexBySubkriteria[$kodeKriteria];

            $consistencyRatio[$kodeKriteria] = substr($consistencyRatio[$kodeKriteria], 0, 6);
        }

        // Destructuring to array
        $consistencyData = [
            'Consistency Index (CI)' => $consistencyIndex,
            'Ratio Index (RI)' => $ratioIndexBySubkriteria,
            'Consistency Ratio (CR)' => $consistencyRatio,
        ];

        return $consistencyData;
    }

    public function consistencyResult($consistencyRatio)
    {
        $consistencyResult = [];
        foreach ($consistencyRatio['Consistency Ratio (CR)'] as $kodeKriteria => $ratio) {
            $consistencyResult[$kodeKriteria] = $ratio <= 0.1 ? 'Konsisten' : 'Tidak Konsisten';
        }

        return $consistencyResult;
    }
}