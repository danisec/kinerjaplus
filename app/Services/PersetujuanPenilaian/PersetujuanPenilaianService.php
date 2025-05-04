<?php

namespace App\Services\PersetujuanPenilaian;

use App\Services\PersetujuanPenilaian\Handlers\IndexPersetujuanPenilaianKepalaSekolahHandler;
use App\Services\PersetujuanPenilaian\Handlers\IndexPersetujuanPenilaianYayasanOrDeputiHandler;
use App\Services\PersetujuanPenilaian\Handlers\ShowReviewPenilaianHandler;
use App\Services\PersetujuanPenilaian\Handlers\ShowTahunAjaranKepalaSekolahHandler;
use App\Services\PersetujuanPenilaian\Handlers\ShowTahunAjaranYayasanOrDeputiHandler;

class PersetujuanPenilaianService
{
    public function indexPersetujuanPenilaianKepalaSekolah()
    {
        return app(IndexPersetujuanPenilaianKepalaSekolahHandler::class)->handle();
    }

    public function indexPersetujuanPenilaianYayasanOrDeputi()
    {
        return app(IndexPersetujuanPenilaianYayasanOrDeputiHandler::class)->handle();
    }

    public function showTahunAjaranKepalaSekolah($firstYear, $secondYear, $semester)
    {
        return app(ShowTahunAjaranKepalaSekolahHandler::class)->handle($firstYear, $secondYear, $semester);
    }

    public function showTahunAjaranYayasanOrDeputi($idGroupKaryawan, $firstYear, $secondYear, $semester)
    {
        return app(ShowTahunAjaranYayasanOrDeputiHandler::class)->handle($idGroupKaryawan, $firstYear, $secondYear, $semester);
    }

    public function showReviewPenilaian($id)
    {
        return app(ShowReviewPenilaianHandler::class)->handle($id);
    }
}