<?php 

namespace App\Services\PersetujuanPenilaian\Handlers;

use App\Models\Kriteria;
use App\Models\Penilaian;

class ShowReviewPenilaianHandler
{
    public function handle($id): array
    {
        $idPenilaian = Penilaian::with([
            'tanggalPenilaian'
        ])->where('id_penilaian', $id)
        ->get();

        $tanggalPenilaian = $idPenilaian->first()->tanggalPenilaian;

        $tahunAjaran = array_merge(
            explode('/', $tanggalPenilaian->tahun_ajaran),
            [$tanggalPenilaian->semester]
        );

        $kriteria = Kriteria::with([
            'subkriteria', 'subkriteria.indikatorSubkriteria'
        ])
        ->orderBy('kode_kriteria', 'ASC')
        ->get();

        $penilaian = Penilaian::with([
            'tanggalPenilaian', 
            'alternatifPertama.alternatifPertama', 
            'alternatifKedua', 
            'penilaianIndikator', 
            'penilaianIndikator.skalaIndikatorDetail'
        ])->where('id_penilaian', $id)
        ->first();

        // Check role user
        $checkUser = $penilaian->alternatifKedua->alternatifPertama->users;
        $checkRole = $checkUser->hasAnyRole([
            'tata usaha non tenaga pendidikan', 
            'kerohanian non tenaga pendidikan'
        ]);

        return [
            'kriteria' => $kriteria,
            'penilaian' => $penilaian,
            'checkRole' => $checkRole,
            'tahunAjaran' => $tahunAjaran,
        ];
    }
}