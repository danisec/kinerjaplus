<?php 

namespace App\Services\CatatanKaryawan\Handlers;

use App\Models\Penilaian;

class CreateCatatanKaryawanHandler
{
    public function handle($firstYear, $secondYear, $semester, $id): array
    {
        $tahunAjaran = [
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        $penilaian = Penilaian::with([
            'alternatifPertama.alternatifPertama', 
            'alternatifKedua'
        ])
        ->where('id_penilaian', $id)
        ->first();

        return [
            'penilaian' => $penilaian,
            'tahunAjaran' => $tahunAjaran,
        ];
    }
}