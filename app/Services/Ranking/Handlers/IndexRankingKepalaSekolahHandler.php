<?php 

namespace App\Services\Ranking\Handlers;

use App\Models\Penilaian;
use App\Models\TanggalPenilaian;
use Illuminate\Support\Facades\Auth;

class IndexRankingKepalaSekolahHandler
{
    protected AlgorithmAhpHandler $algorithmAhpHandler;

    public function __construct(AlgorithmAhpHandler $algorithmAhpHandler)
    {
        $this->algorithmAhpHandler = $algorithmAhpHandler;
    }

    public function handle($tahunAjaran, $kriteria, $bobotPrioritasSubkriteria): array
    {
        $checkAuthAlternatif = Auth::user()->alternatif->kode_alternatif;
        $checkGroupKaryawanId = Auth::user()->getGroupKaryawanId();

        $tanggalPenilaian = TanggalPenilaian::where('tahun_ajaran', $tahunAjaran ?? null)
        ->where('id_group_karyawan', $checkGroupKaryawanId)
        ->orderBy('akhir_tanggal_penilaian', 'desc')
        ->first();

        $idTanggalPenilaian = $tanggalPenilaian->id_tanggal_penilaian ?? null;

        // Get penilaian have same group karyawan as the group karyawan owned by auth user
        $alternatifPenilaian = Penilaian::with([
            'tanggalPenilaian', 
            'penilaianIndikator' => function ($query) {
                $query->where('status', 'Disetujui');
            },
            'penilaianIndikator.skalaIndikatorDetail.skalaIndikator.indikatorSubkriteria', 
            'penilaianIndikator.skalaIndikatorDetail.nilaiSkala', 
            'alternatifKedua', 
            'alternatifKedua.alternatifPertama'
        ])
        ->whereHas('alternatifKedua', function ($query) use ($checkGroupKaryawanId) {
            $query->where('id_group_karyawan', $checkGroupKaryawanId);
        })
        ->whereHas('penilaianIndikator', function ($query) {
            $query->where('status', 'Disetujui');
        })
        ->get();

        $uniqueAlternatifPenilaianByTahunIdTanggalPenilaian = $alternatifPenilaian->filter(function ($item) use ($idTanggalPenilaian, $checkGroupKaryawanId) {
            if ($item && $item->tanggalPenilaian && $item->alternatifKedua) {
                return $item->tanggalPenilaian->id_tanggal_penilaian == $idTanggalPenilaian &&
                    $item->alternatifKedua->id_group_karyawan == $checkGroupKaryawanId;
            }
            return false;
        })->unique('alternatif_kedua');

        $data = $this->algorithmAhpHandler->handle($idTanggalPenilaian, $kriteria, $bobotPrioritasSubkriteria, $alternatifPenilaian, $uniqueAlternatifPenilaianByTahunIdTanggalPenilaian);

        return [
            'checkAuthAlternatif' => $checkAuthAlternatif,
            'checkTanggalPenilaian' => $tanggalPenilaian,
            'alternatifPenilaian' => $data['alternatifPenilaian'],
            'checkPerhitunganAlternatif' => $data['checkPerhitunganAlternatif'],
            'bobotAlternatif' => $data['bobotAlternatif'],
            'totalBobotKriteria' => $data['totalBobotKriteria'],
            'avgNilaiKriteria' => $data['avgNilaiKriteria'],
            'nilaiAlternatif' => $data['nilaiAlternatif'],
            'rankAlternatif' => $data['rankAlternatif'],
            'totalNilaiAlternatifAndRankAlternatif' => $data['totalNilaiAlternatifAndRankAlternatif'],
        ];
    }
}