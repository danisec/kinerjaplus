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
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'nama_kriteria' => 'Keterampilan Mengelola Proses Belajar Mengajar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K3',
                'nama_kriteria' => 'Kepatuhan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($kriteria as $data) {
            \App\Models\Subkriteria::create($data);
        }
    }
}
