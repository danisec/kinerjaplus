<?php

namespace App\Services;

use App\Jobs\BobotPrioritasAlternatifJob;
use App\Models\BobotPrioritasAlternatif;
use Illuminate\Http\Request;

class PerhitunganAlternatifService
{
    public function totalKolomAlternatif($perhitunganAlternatif)
    {
        $totalKolomAlternatif = [];
        foreach ($perhitunganAlternatif as $item) {
            $kodeKriteria = $item->kode_kriteria;
            $alternatifKedua = $item->alternatif_kedua;
            $nilaiAlternatif = $item->nilai_alternatif;

            if (!isset($totalKolomAlternatif[$kodeKriteria][$alternatifKedua])) {
                $totalKolomAlternatif[$kodeKriteria][$alternatifKedua] = 0;
            }

            $totalKolomAlternatif[$kodeKriteria][$alternatifKedua] += $nilaiAlternatif;

            ksort($totalKolomAlternatif);
        }

        return $totalKolomAlternatif;
    }

    public function normalisasiMatriks($perhitunganAlternatif, $totalKolomAlternatif)
    {
        $normalisasiMatriks = [];
        foreach ($perhitunganAlternatif as $item) {
            $kodeKriteria = $item->kode_kriteria;
            $alternatifPertama = $item->alternatif_pertama;
            $alternatifKedua = $item->alternatif_kedua;
            $nilaiAlternatif = $item->nilai_alternatif;

            if (!isset($normalisasiMatriks[$kodeKriteria][$alternatifPertama][$alternatifKedua])) {
                $normalisasiMatriks[$kodeKriteria][$alternatifPertama][$alternatifKedua] = 0;
            }

            $normalisasiMatriks[$kodeKriteria][$alternatifPertama][$alternatifKedua] = $nilaiAlternatif / $totalKolomAlternatif[$kodeKriteria][$alternatifKedua];

            $normalisasiMatriks[$kodeKriteria][$alternatifPertama][$alternatifKedua] = substr($normalisasiMatriks[$kodeKriteria][$alternatifPertama][$alternatifKedua], 0, 6);
        }

        return $normalisasiMatriks;
    }

    public function totalBarisNormalisasiMatriks($normalisasiMatriks)
    {
        $totalBarisNormalisasiMatriks = [];
        foreach ($normalisasiMatriks as $kodeKriteria => $matrixKriteria) {
            foreach ($matrixKriteria as $alternatifPertama => $matrixAlternatif) {
                if (!isset($totalBarisNormalisasiMatriks[$kodeKriteria][$alternatifPertama])) {
                    $totalBarisNormalisasiMatriks[$kodeKriteria][$alternatifPertama] = 0;
                }

                $totalBarisNormalisasiMatriks[$kodeKriteria][$alternatifPertama] = array_sum($matrixAlternatif);

                $totalBarisNormalisasiMatriks[$kodeKriteria][$alternatifPertama] = substr($totalBarisNormalisasiMatriks[$kodeKriteria][$alternatifPertama], 0, 6);
            }
        }

        return $totalBarisNormalisasiMatriks;
    }

    public function bobotPrioritasAlternatif($totalBarisNormalisasiMatriks, $alternatifGroupedByGroupPenilaian, $idTanggalPenilaian)
    {
        // count total alternatif
        $jumlahAlternatif = count($alternatifGroupedByGroupPenilaian);
        $idTanggalPenilaian = $idTanggalPenilaian;
        
        // calculate bobot prioritas alternatif
        $bobotPrioritasAlternatif = [];
        foreach ($totalBarisNormalisasiMatriks as $kodeKriteria => $matrixKriteria) {
            foreach ($matrixKriteria as $alternatifPertama => $total) {
                $bobotPrioritasAlternatif[$idTanggalPenilaian][$kodeKriteria][$alternatifPertama] = $total / $jumlahAlternatif;

                $bobotPrioritasAlternatif[$idTanggalPenilaian][$kodeKriteria][$alternatifPertama] = substr($bobotPrioritasAlternatif[$idTanggalPenilaian][$kodeKriteria][$alternatifPertama], 0, 6);
            }
        }

        // Store bobot prioritas alternatif to database
        try {
            foreach ($bobotPrioritasAlternatif as $keyIdTanggalPenilaian => $valueIdTanggalPenilaian) {
                foreach ($valueIdTanggalPenilaian as $kodeKriteria => $matriksKriteria) {
                    foreach ($matriksKriteria as $dataAlternatif => $bobotPrioritas) {
                        BobotPrioritasAlternatif::updateOrCreate(
                            [
                                'id_tanggal_penilaian' => $keyIdTanggalPenilaian,
                                'kode_kriteria' => $kodeKriteria,
                                'kode_alternatif' => $dataAlternatif,
                            ],
                            ['bobot_prioritas' => $bobotPrioritas]
                        );
                    }
                }
            }
        } catch (\Throwable $th) {
            $notif = notify()->error('Terjadi kesalahan saat menyimpan data bobot prioritas alternatif');
            return back()->with('notif', $notif);
        }

        return $bobotPrioritasAlternatif;
    }
}