<?php

namespace App\Charts;

use App\Models\Ranking;
use ArielMejiaDev\LarapexCharts\BarChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class RankingKaryawan
{
    protected $chart;
    private $tahunAjaran;
    private $ranking;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
        $this->ranking = Ranking::with('alternatif')->get();

        $currentMonth = date('m');
        $isAfterJune = $currentMonth >= 6;
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;
        $nextYear = $currentYear + 1;
        $this->tahunAjaran = $isAfterJune ? "$currentYear/$nextYear" : "$lastYear/$currentYear";
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $tahunAjaran = $this->tahunAjaran;
        $ranking = $this->ranking;

        $topRanking = $ranking->where('tahun_ajaran', $tahunAjaran)->whereIn('rank', [1, 2, 3, 4, 5])->sortBy('rank');

        // Buatkan array untuk menampung data top ranking
        $dataTopRanking = [];

        foreach ($topRanking as $key => $value) {
            $tahunAjaran = $value->tahun_ajaran;
            $namaAlternatif = $value->alternatif->nama_alternatif;

            // Periksa apakah array $dataTopRanking[$tahunAjaran] sudah ada, jika belum, buat array kosong
            if (!isset($dataTopRanking[$tahunAjaran])) {
                $dataTopRanking[$tahunAjaran] = [];
            }

            // Masukkan data ke dalam array $dataTopRanking[$tahunAjaran]
            $dataTopRanking[$tahunAjaran][] = [
                'nama' => $namaAlternatif,
                'nilai' => substr($value->nilai, 0, 8),
                'rank' => $value->rank,
            ];
        }

        // Mengurutkan data berdasarkan total prioritas
        if (!isset($dataTopRanking[$tahunAjaran])) {
            $dataTopRanking[$tahunAjaran] = [];
        } else {
            usort($dataTopRanking[$tahunAjaran], function ($a, $b) {
                return $b['nilai'] <=> $a['nilai'];
            });
        }

        // Mengambil nama karyawan dan total prioritas untuk grafik
        $namaKaryawan = array_column($dataTopRanking[$tahunAjaran], 'nama');
        $nilaiKaryawan = array_column($dataTopRanking[$tahunAjaran], 'nilai');

        return $this->chart->barChart()
            ->setTitle('5 Top Ranking')
            ->addData('Nilai', $nilaiKaryawan)
            ->setXAxis($namaKaryawan)
            ->setColors(['#34d399']);
    }
}
