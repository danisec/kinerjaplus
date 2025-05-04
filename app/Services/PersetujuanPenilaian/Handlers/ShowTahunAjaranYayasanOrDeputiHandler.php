<?php 

namespace App\Services\PersetujuanPenilaian\Handlers;

use App\Models\GroupKaryawan;
use App\Models\Penilaian;

class ShowTahunAjaranYayasanOrDeputiHandler
{
    public function handle($idGroupKaryawan, $firstYear, $secondYear, $semester): array
    {
        $namaGroupKaryawan = GroupKaryawan::where('id_group_karyawan', $idGroupKaryawan)->first();

        $tahunAjaranBreadcrumbs = [
            'nama_group_karyawan' => $namaGroupKaryawan->nama_group_karyawan,
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        $penilaianQuery = Penilaian::with([
                'penilaianIndikator',
                'tanggalPenilaian',
                'catatanKaryawan',
                'alternatifPertama.alternatifPertama'
        ])
        ->whereHas('alternatifPertama', function ($query) use ($idGroupKaryawan) {
            $query->where('id_group_karyawan', $idGroupKaryawan);
        })
        ->whereIn('id_tanggal_penilaian', function ($query) use ($firstYear, $secondYear, $semester) {
            $query->select('id_tanggal_penilaian')
                ->from('tanggal_penilaian')
                ->where('tahun_ajaran', $firstYear . '/' . $secondYear)
                ->where('semester', $semester);
        })
        ->filter(request(['search']));
        
        $totalReviewPenilaian = (clone $penilaianQuery)->count();

        $notApprovedPenilaian = (clone $penilaianQuery)->whereHas('penilaianIndikator', function ($query) {
        $query->whereNotNULL('status');
        })->count();

        $penilaian = $penilaianQuery->paginate(10)->withQueryString();

        return [
            'penilaian' => $penilaian,
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
            'totalReviewPenilaian' => $totalReviewPenilaian,
            'notApprovedPenilaian' => $notApprovedPenilaian,
        ];
    }
}