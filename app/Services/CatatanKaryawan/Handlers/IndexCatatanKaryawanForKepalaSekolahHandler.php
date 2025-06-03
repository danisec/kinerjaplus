<?php 

namespace App\Services\CatatanKaryawan\Handlers;

use App\Models\CatatanKaryawan;
use App\Models\GroupKaryawan;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class IndexCatatanKaryawanForKepalaSekolahHandler
{
    public function handle(): array
    {
        $checkGroupKaryawanId = Auth::user()->getGroupKaryawanId();

        $catatanKaryawanGroupedByTahunAjaran = CatatanKaryawan::with([
            'tanggalPenilaian', 
            'penilaian', 
            'penilaian.alternatifPertama'])
        ->whereHas('penilaian.alternatifPertama', function ($query) use ($checkGroupKaryawanId) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId);
        })
        ->join('tanggal_penilaian', 'catatan_karyawan.id_tanggal_penilaian', '=', 'tanggal_penilaian.id_tanggal_penilaian')
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