<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class RankingKaryawan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $dataTahun2022 = [
            ['nama_karyawan' => 'John Doe, S.Pd.', 'total_prioritas' => 0.85],
            ['nama_karyawan' => 'Agnes, S.Pd.', 'total_prioritas' => 0.92],
            ['nama_karyawan' => 'Narenda, S.Pd.', 'total_prioritas' => 0.78],
        ];

        $dataTahun2023 = [
            ['nama_karyawan' => 'John Doe, S.Pd.', 'total_prioritas' => 0.91],
            ['nama_karyawan' => 'Agnes, S.Pd.', 'total_prioritas' => 0.49],
            ['nama_karyawan' => 'Narenda, S.Pd.', 'total_prioritas' => 0.79],
        ];

        // Mengurutkan data berdasarkan total prioritas
        usort($dataTahun2022, function ($a, $b) {
            return $b['total_prioritas'] <=> $a['total_prioritas'];
        });

        usort($dataTahun2023, function ($a, $b) {
            return $b['total_prioritas'] <=> $a['total_prioritas'];
        });

        // Mengambil nama karyawan dan total prioritas untuk grafik
        $karyawanTahun2022 = array_column($dataTahun2022, 'nama_karyawan');
        $totalPrioritasTahun2022 = array_column($dataTahun2022, 'total_prioritas');

        $karyawanTahun2023 = array_column($dataTahun2023, 'nama_karyawan');
        $totalPrioritasTahun2023 = array_column($dataTahun2023, 'total_prioritas');

        return $this->chart->barChart()
            ->setTitle('Top Ranking Karyawan 2023')
            ->addData('Tahun 2022', $totalPrioritasTahun2022)
            ->addData('Tahun 2023', $totalPrioritasTahun2023)
            ->setColors(['#00e396', '#46b284'])
            ->setXAxis($karyawanTahun2023);
    }
}
