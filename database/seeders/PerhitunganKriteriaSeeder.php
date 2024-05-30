<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerhitunganKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perhitunganKriteria = [
            [
                'kriteria_pertama' => 'K1',
                'kriteria_kedua' => 'K1',
                'nilai_kriteria' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_pertama' => 'K1',
                'kriteria_kedua' => 'K2',
                'nilai_kriteria' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_pertama' => 'K1',
                'kriteria_kedua' => 'K3',
                'nilai_kriteria' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_pertama' => 'K2',
                'kriteria_kedua' => 'K1',
                'nilai_kriteria' => '0.3333',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_pertama' => 'K2',
                'kriteria_kedua' => 'K2',
                'nilai_kriteria' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_pertama' => 'K2',
                'kriteria_kedua' => 'K3',
                'nilai_kriteria' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_pertama' => 'K3',
                'kriteria_kedua' => 'K1',
                'nilai_kriteria' => '0.2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_pertama' => 'K3',
                'kriteria_kedua' => 'K2',
                'nilai_kriteria' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_pertama' => 'K3',
                'kriteria_kedua' => 'K3',
                'nilai_kriteria' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($perhitunganKriteria as $data) {
            \App\Models\PerhitunganKriteria::create($data);
        }
    }
}
