<?php 

namespace App\Services\PersetujuanPenilaian\Handlers;

use App\Models\GroupKaryawan;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Auth;

class IndexPersetujuanPenilaianKepalaSekolahHandler
{
    public function handle(): array
    {
        $checkGroupKaryawanId = Auth::user()->getGroupKaryawanId();

        $penilaianGroupedByTahunAjaran = Penilaian::with([
            'tanggalPenilaian','alternatifPertama'
        ])
        ->whereHas('alternatifPertama', function ($query) use ($checkGroupKaryawanId) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId);
        })
        ->join('tanggal_penilaian', 'penilaian.id_tanggal_penilaian', '=', 'tanggal_penilaian.id_tanggal_penilaian')
        ->orderBy('tanggal_penilaian.tahun_ajaran', 'DESC')
        ->when(!empty(request('search')), function ($query) {
            $query->where(function ($q) {
                $q->where('tanggal_penilaian.tahun_ajaran', 'like', '%' . request('search') . '%')
                    ->orWhere('tanggal_penilaian.semester', 'like', '%' . request('search') . '%')
                    ->orWhereHas('tanggalPenilaian.groupKaryawan', function ($subQuery) {
                        $subQuery->where('nama_group_karyawan', 'like', '%' . request('search') . '%');
                    });
            });
        })
        ->get()
        ->unique('id_tanggal_penilaian');

        $paginated = $penilaianGroupedByTahunAjaran->paginate(10);

        $mappingPenilaian = $paginated->getCollection()->map(function ($penilaian) {
            $nameGroupEmployee = GroupKaryawan::find($penilaian->tanggalPenilaian->id_group_karyawan);

            return [
                'name_group_employee' => $nameGroupEmployee->nama_group_karyawan,
                'tahun_ajaran' => $penilaian->tahun_ajaran,
                'semester' => $penilaian->semester,
            ];
        });

        return [
            'penilaianGroupedByTahun' => $paginated,
            'penilaianWithGroupKaryawan' => $mappingPenilaian,
        ];
    }
}