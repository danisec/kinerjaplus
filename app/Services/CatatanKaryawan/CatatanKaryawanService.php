<?php

namespace App\Services\CatatanKaryawan;

use App\Services\CatatanKaryawan\Handlers\CreateCatatanKaryawanHandler;
use App\Services\CatatanKaryawan\Handlers\EditCatatanKaryawanHandler;
use App\Services\CatatanKaryawan\Handlers\IndexCatatanKaryawanForKepalaSekolahHandler;
use App\Services\CatatanKaryawan\Handlers\IndexCatatanKaryawanForYayasanOrDeputiHandler;
use App\Services\CatatanKaryawan\Handlers\ShowTahunAjaranKepalaSekolahHandler;
use App\Services\CatatanKaryawan\Handlers\ShowTahunAjaranYayasanOrDeputiHandler;

class CatatanKaryawanService
{
    public function catatanKaryawanGroupedByTahunAjaranForYayasanOrDeputi()
    {
        return app(IndexCatatanKaryawanForYayasanOrDeputiHandler::class)->handle();
    }

    public function catatanKaryawanGroupedByTahunAjaranForKepalaSekolah()
    {
        return app(IndexCatatanKaryawanForKepalaSekolahHandler::class)->handle();
    }

    public function showTahunAjaranKepalaSekolah($firstYear, $secondYear, $semester)
    {
        return app(ShowTahunAjaranKepalaSekolahHandler::class)->handle($firstYear, $secondYear, $semester);
    }

    public function showTahunAjaranYayasanOrDeputi($idGroupKaryawan, $firstYear, $secondYear, $semester)
    {
        return app(ShowTahunAjaranYayasanOrDeputiHandler::class)->handle($idGroupKaryawan, $firstYear, $secondYear, $semester);
    }

    public function editCatatanKaryawan($id, $firstYear, $secondYear, $semester)
    {
        return app(EditCatatanKaryawanHandler::class)->handle($id, $firstYear, $secondYear, $semester);
    }

    public function createCatatanKaryawan($firstYear, $secondYear, $semester, $id)
    {
        return app(CreateCatatanKaryawanHandler::class)->handle($firstYear, $secondYear, $semester, $id);
    }
}