<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkalaIndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skalaIndikator = [
            [
                'id_indikator_subkriteria' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 13,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 14,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 16,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 17,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 19,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 21,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 23,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 24,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_indikator_subkriteria' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($skalaIndikator as $data) {
            \App\Models\SkalaIndikator::create($data);
        }
    }
}
