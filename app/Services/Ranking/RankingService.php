<?php

namespace App\Services\Ranking;

use App\Services\Ranking\Handlers\IndexRankingKepalaSekolahHandler;
use App\Services\Ranking\Handlers\ShowRankingHandler;

class RankingService
{
    public function indexRankingKepalaSekolah($tahunAjaran, $kriteria, $bobotPrioritasSubkriteria)
    {
        return app(IndexRankingKepalaSekolahHandler::class)->handle($tahunAjaran, $kriteria, $bobotPrioritasSubkriteria);
    }

    public function showRanking($idTanggalPenilaian, $firstYear, $secondYear, $semester,  $kriteria, $bobotPrioritasSubkriteria)
    {
        return app(ShowRankingHandler::class)->handle($idTanggalPenilaian, $firstYear, $secondYear, $semester,  $kriteria, $bobotPrioritasSubkriteria);
    }
}