<?php

namespace Database\Seeders;

use App\Models\Ranking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kodeAlternatif = ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8'];

        foreach ($kodeAlternatif as $kode) {
            $ranking = [
                'tahun_ajaran' => '2024/2025',
                'kode_alternatif' => $kode,
                'nilai' => rand(60, 100),
                'rank' => rand(1, 8),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('ranking')->insert($ranking);
        }
    }
}
