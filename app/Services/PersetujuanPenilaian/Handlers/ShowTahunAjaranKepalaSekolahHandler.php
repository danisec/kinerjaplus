<?php 

namespace App\Services\PersetujuanPenilaian\Handlers;

use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;

class ShowTahunAjaranKepalaSekolahHandler
{
    public function handle($firstYear, $secondYear, $semester): array
    {
        $tahunAjaranBreadcrumbs = [
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];   

        $checkAuthAlternatif = auth()->user()->alternatif->kode_alternatif;
        $checkGroupKaryawanId = Auth::user()->getGroupKaryawanId();

        $penilaianQuery = Penilaian::with([
                'penilaianIndikator',
                'tanggalPenilaian',
                'catatanKaryawan',
                'alternatifPertama.alternatifPertama'
        ])
        ->whereHas('alternatifPertama', function ($query) use ($checkGroupKaryawanId, $checkAuthAlternatif) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId)
            ->where(function ($subQuery) use ($checkAuthAlternatif) {
                $subQuery->where('alternatif_pertama', '!=', $checkAuthAlternatif)
                    ->where('alternatif_kedua', '!=', $checkAuthAlternatif);
            });
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