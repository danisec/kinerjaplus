<?php

namespace App\Charts;

use App\Models\Ranking;
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
        $ranking = Ranking::with('alternatif')->orderBy('created_at', 'DESC')->get();

        $rankingByDate = $ranking->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->created_at)->format('d-m-Y');
        });

        // Inisialisasi array untuk menyimpan data
        $dataByDate = [];

        // Loop melalui data yang dikelompokkan
        foreach ($rankingByDate as $date => $rankings) {
            // Dapatkan nama alternatif
            $namaKaryawan = $rankings->pluck('alternatif.nama_alternatif')->toArray();

            // Dapatkan nilai setiap alternatif
            $nilai = $rankings->pluck('nilai')->toArray();

            // Dapatkan rank setiap alternatif
            $rank = $rankings->pluck('rank')->toArray();

            // Tambahkan data ke array
            $dataByDate[] = [
                'TanggalTahun' => $date,
                'nama_alternatif' => $namaKaryawan,
                'nilai' => $nilai,
                'rank' => $rank,
            ];
        }

        // Mengurutkan data berdasarkan tanggal
        usort($dataByDate, function ($a, $b) {
            return strtotime($a['TanggalTahun']) - strtotime($b['TanggalTahun']);
        });

        
        // Dapatkan nama alternatif unik
        $uniqueAlternatives = [];

        foreach ($dataByDate as $data) {
            $namaAlternatif = $data['nama_alternatif'];

            foreach ($namaAlternatif as $nama) {
                if (!in_array($nama, $uniqueAlternatives)) {
                    $uniqueAlternatives[] = $nama;
                }
            }
        }

        // Inisialisasi array untuk data chart
        $chartData = [];

        // Loop melalui data yang sudah diurutkan
        foreach ($dataByDate as $data) {
            // Dapatkan tanggal
            $tanggal = $data['TanggalTahun'];

            $namaAlternatif = $uniqueAlternatives;
            $nilai = $data['nilai'];
            $rank = $data['rank'];

            // Tambahkan data ke array
            $chartData[] = [
                'tanggal' => $tanggal,
                'nama_alternatif' => $namaAlternatif,
                'nilai' => $nilai,
                'rank' => $rank,
            ];
        }

        $chart = $this->chart->barChart()
            ->setTitle('Top Ranking');

        // Inisialisasi array untuk menyimpan data
        $chartDataByAlternatives = [];

        // Loop melalui data yang sudah diurutkan
        foreach ($dataByDate as $data) {
            // Dapatkan tanggal
            $tanggal = $data['TanggalTahun'];

            $namaAlternatif = $data['nama_alternatif'];
            $nilai = $data['nilai'];
            $rank = $data['rank'];

            // Loop melalui setiap nama alternatif
            foreach ($namaAlternatif as $index => $nama) {
                $chartDataByAlternatives[$nama][] = [
                    'tanggal' => $tanggal,
                    'nilai' => $nilai[$index], // Ambil nilai sesuai dengan indeks nama
                    'rank' => $rank[$index], // Ambil rank sesuai dengan indeks nama
                ];
            }
        }

        // Loop melalui data alternatif yang telah dikelompokkan
        foreach ($chartDataByAlternatives as $namaAlternatif => $dataAlternatif) {
            // Tambahkan data dinamis berdasarkan tanggal
            $chart->addData($namaAlternatif, collect($dataAlternatif)->pluck('nilai')->toArray());
        }

        // Set label sumbu X dengan nama alternatif dari data pertama
        $chart->setXAxis(collect($dataByDate)->pluck('TanggalTahun')->toArray());

        // $chart->setColors(['#00e396', '#46b284']);

        return $chart;
    }
}
