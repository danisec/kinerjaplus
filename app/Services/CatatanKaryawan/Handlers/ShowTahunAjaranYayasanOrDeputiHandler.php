<?php 

namespace App\Services\CatatanKaryawan\Handlers;

use App\Models\CatatanKaryawan;
use App\Models\GroupKaryawan;

class ShowTahunAjaranYayasanOrDeputiHandler
{
    public function handle($idGroupKaryawan, $firstYear, $secondYear, $semester): array
    {
        $nameGroupKaryawan = GroupKaryawan::where('id_group_karyawan', $idGroupKaryawan)->value('nama_group_karyawan');

        $tahunAjaranBreadcrumbs = [
            'name_group_karyawan' => $nameGroupKaryawan,
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        $catatanKaryawan = CatatanKaryawan::with([
            'tanggalPenilaian', 
            'penilaian', 
            'penilaian.alternatifPertama.alternatifPertama', 
            'penilaian.alternatifKedua.alternatifPertama'
        ])
        ->whereHas('penilaian.alternatifPertama', function ($query) use ($idGroupKaryawan) {
            $query->where('id_group_karyawan', $idGroupKaryawan);
        })
        ->whereIn('id_tanggal_penilaian', function ($query) use ($firstYear, $secondYear, $semester) {
            $query->select('id_tanggal_penilaian')
                ->from('tanggal_penilaian')
                ->where('tahun_ajaran', $firstYear . '/' . $secondYear)
                ->where('semester', $semester);
        })
        ->filter(request(['search']))
        ->paginate(10)
        ->withQueryString();

        return [
            'title' => 'Data Catatan Pegawai Tahun Ajaran ' . $tahunAjaranBreadcrumbs['tahun_ajaran'] . ' Semester ' . $tahunAjaranBreadcrumbs['semester'],
            'catatanKaryawan' => $catatanKaryawan,
            'tahunAjaranBreadcrumbs' => $tahunAjaranBreadcrumbs,
        ];
    }
}