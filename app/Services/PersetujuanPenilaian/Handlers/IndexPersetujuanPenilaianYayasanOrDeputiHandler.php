<?php 

namespace App\Services\PersetujuanPenilaian\Handlers;

use App\Models\GroupKaryawan;
use App\Models\Penilaian;

class IndexPersetujuanPenilaianYayasanOrDeputiHandler
{
    public function handle(): array
    {
        $penilaianGroupedByTahunAjaran = Penilaian::with([
            'tanggalPenilaian','alternatifPertama'
        ])
        ->join('tanggal_penilaian', 'penilaian.id_tanggal_penilaian', '=', 'tanggal_penilaian.id_tanggal_penilaian')
        ->orderBy('tanggal_penilaian.tahun_ajaran', 'DESC')
        ->when(request()->has('search'), function ($query) {
            $query->where('tanggal_penilaian.tahun_ajaran', 'like', '%' . request('search') . '%')
                ->orWhere('tanggal_penilaian.semester', 'like', '%' . request('search') . '%');
        })
        ->get()
        ->unique('id_tanggal_penilaian');

        $paginated = $penilaianGroupedByTahunAjaran->paginate(10);

        $mappingPenilaian = $paginated->map(function ($penilaian) {
            $nameGroupEmployee = GroupKaryawan::find($penilaian->alternatifPertama->id_group_karyawan);

            return [
                'id_group_employee' => $penilaian->alternatifPertama->id_group_karyawan,
                'tahun_ajaran' => $penilaian->tahun_ajaran,
                'semester' => $penilaian->semester,
                'name_group_employee' => $nameGroupEmployee->nama_group_karyawan,
            ];
        });

        return [
            'penilaianGroupedByTahunAjaran' => $paginated,
            'penilaianWithGroupKaryawan' => $mappingPenilaian,
        ];
    }
}