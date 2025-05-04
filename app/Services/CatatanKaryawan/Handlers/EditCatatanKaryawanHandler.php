<?php 

namespace App\Services\CatatanKaryawan\Handlers;

use App\Models\CatatanKaryawan;

class EditCatatanKaryawanHandler
{
    public function handle($id, $firstYear, $secondYear, $semester): array
    {
        $tahunAjaranBreadcrumbs = [
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        $catatanKaryawan = CatatanKaryawan::with([
            'penilaian', 'penilaian.alternatifPertama', 
            'penilaian.alternatifKedua.alternatifPertama'
        ])
        ->where('id_catatan_karyawan', $id)
        ->first();

        return [
            'catatanKaryawan' => $catatanKaryawan,
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
        ];
    }
}