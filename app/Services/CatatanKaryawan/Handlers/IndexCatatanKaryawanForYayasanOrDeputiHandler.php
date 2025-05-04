<?php 

namespace App\Services\CatatanKaryawan\Handlers;

use App\Models\CatatanKaryawan;
use App\Models\GroupKaryawan;
use Illuminate\Pagination\LengthAwarePaginator;

class IndexCatatanKaryawanForYayasanOrDeputiHandler
{
    public function handle(): array
    {
        $catatanKaryawanGroupedByTahunAjaran = CatatanKaryawan::with([
            'tanggalPenilaian', 
            'penilaian', 
            'penilaian.alternatifPertama'
        ])
        ->join('tanggal_penilaian', 'catatan_karyawan.id_tanggal_penilaian', '=', 'tanggal_penilaian.id_tanggal_penilaian')
        ->orderBy('tanggal_penilaian.tahun_ajaran', 'DESC')
        ->when(request()->has('search'), function ($query) {
            $query->where('tanggal_penilaian.tahun_ajaran', 'like', '%' . request('search') . '%')
                ->orWhere('tanggal_penilaian.semester', 'like', '%' . request('search') . '%');
        })
        ->get()
        ->unique('id_tanggal_penilaian');

        $paginated = $catatanKaryawanGroupedByTahunAjaran->paginate(10);

        $mappingCatatanKaryawan = $paginated->getCollection()->map(function ($catatanKaryawan) {
            $checkIdGroupKaryawan = GroupKaryawan::find($catatanKaryawan->tanggalPenilaian->id_group_karyawan);

            return [
                'idGroupKaryawan' => $checkIdGroupKaryawan->id_group_karyawan,
                'tahun' => $catatanKaryawan->tahun_ajaran, 
                'semester' => $catatanKaryawan->semester, 
                'namaGroupKaryawan' => $checkIdGroupKaryawan->nama_group_karyawan,
            ];
        });

        return [
            'catatanKaryawan' => $paginated,
            'catatanWithGroupKaryawan' => $mappingCatatanKaryawan,
        ];
    }
}