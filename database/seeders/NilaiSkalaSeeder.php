<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiSkalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nilaiSkala = [
            [
                'skala' => '1',
                'nilai_skala' => '70',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'skala' => '2',
                'nilai_skala' => '75',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'skala' => '3',
                'nilai_skala' => '85',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'skala' => '4',
                'nilai_skala' => '100',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($nilaiSkala as $data) {
            \App\Models\NilaiSkala::create($data);
        }
    }
}
