<?php 

namespace App\Services\Ranking\Handlers;

class TotalBobotKriteriaHandler
{
    public function handle($uniqueAlternatifPenilaianByTahunAjaran, $kriteria, $bobotPrioritasSubkriteria, $bobotAlternatif): array
    {
        $totalBobotKriteria = [];
        foreach ($uniqueAlternatifPenilaianByTahunAjaran as $alternatifItem) {
            $total = 0;

            foreach ($kriteria as $kriteriaItem) {
                $bobotPrioritasSubkriteriaItem = $bobotPrioritasSubkriteria->where('kriteria.kode_kriteria', $kriteriaItem->kode_kriteria)->first();

                $bobotPrioritasAlternatifItem = $bobotAlternatif->where('kode_kriteria', $kriteriaItem->kode_kriteria)->where('kode_alternatif', $alternatifItem->alternatifKedua->alternatifPertama->kode_alternatif)->first();

                if ($bobotPrioritasSubkriteriaItem && $bobotPrioritasAlternatifItem) {
                    $total += ($bobotPrioritasSubkriteriaItem->bobot_prioritas * $bobotPrioritasAlternatifItem->bobot_prioritas);
                }
            }

            $totalBobotKriteria[$alternatifItem->alternatifKedua->alternatifPertama->kode_alternatif] = $total;
            $totalBobotKriteria[$alternatifItem->alternatifKedua->alternatifPertama->kode_alternatif] = substr($total, 0, 6);
        }

        return $totalBobotKriteria;
    }
}