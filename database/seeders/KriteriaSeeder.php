<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria = [
            [
                'kode_kriteria' => 'K1',
                'nama_kriteria' => 'Kompetensi',
                'bobot_kriteria' => '40',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'nama_kriteria' => 'Keterampilan Mengelola Proses Belajar Mengajar',
                'bobot_kriteria' => '40',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K3',
                'nama_kriteria' => 'Kepatuhan',
                'bobot_kriteria' => '20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($kriteria as $data) {
            \App\Models\Kriteria::create($data);
        }
    }
}
