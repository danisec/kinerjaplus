<?php 

namespace App\Services\Ranking\Handlers;

use App\Models\Penilaian;
use App\Models\PerhitunganAlternatif;
use App\Models\TanggalPenilaian;
use Illuminate\Support\Facades\Auth;

class ShowRankingHandler
{
    protected AlgorithmAhpHandler $algorithmAhpHandler;

    public function __construct(AlgorithmAhpHandler $algorithmAhpHandler)
    {
        $this->algorithmAhpHandler = $algorithmAhpHandler;
    }

    public function handle($idTanggalPenilaian, $firstYear, $secondYear, $semester, $kriteria, $bobotPrioritasSubkriteria): array
    {
        $tanggalPenilaian = TanggalPenilaian::with(['groupKaryawan'])
        ->where('id_tanggal_penilaian', $idTanggalPenilaian)
        ->first();

        $tahunAjaranBreadcrumbs = [
            'name_employee' => $tanggalPenilaian->groupKaryawan->nama_group_karyawan,
            'tahun_ajaran' => $firstYear . '/' . $secondYear,
            'semester' => $semester,
        ];

        // Get alternatif penilaian by id_tanggal_penilaian
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
        ->whereHas('alternatifKedua', function ($query) use ($idTanggalPenilaian) {
            $query->where('id_tanggal_penilaian', $idTanggalPenilaian);
        })
        ->whereHas('penilaianIndikator', function ($query) {
            $query->where('status', 'Disetujui');
        })
        ->get();

        $uniqueAlternatifPenilaianByTahunIdTanggalPenilaian = $alternatifPenilaian->filter(function ($item) use ($idTanggalPenilaian) {
            if ($item && $item->tanggalPenilaian && $item->alternatifKedua) {
                return $item->tanggalPenilaian->id_tanggal_penilaian == $idTanggalPenilaian;
            }
            return false;
        })->unique('alternatif_kedua');

        $data = $this->algorithmAhpHandler->handle($idTanggalPenilaian, $kriteria, $bobotPrioritasSubkriteria, $alternatifPenilaian, $uniqueAlternatifPenilaianByTahunIdTanggalPenilaian);

        return [
            'tahunAjaran' => $tahunAjaranBreadcrumbs,
            'tanggalPenilaian' => $alternatifPenilaian,
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