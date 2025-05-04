<?php 

namespace App\Services\CatatanKaryawan\Handlers;

use App\Models\CatatanKaryawan;
use Illuminate\Support\Facades\Auth;

class ShowTahunAjaranKepalaSekolahHandler
{
    public function handle($firstYear, $secondYear, $semester): array
    {
        $tahunAjaranBreadcrumbs = [
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        $checkGroupKaryawanId = Auth::user()->getGroupKaryawanId();

        $catatanKaryawan = CatatanKaryawan::with([
            'tanggalPenilaian', 
            'penilaian', 
            'penilaian.alternatifPertama.alternatifPertama', 
            'penilaian.alternatifKedua.alternatifPertama'
        ])
        ->whereHas('penilaian.alternatifPertama', function ($query) use ($checkGroupKaryawanId) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId);
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