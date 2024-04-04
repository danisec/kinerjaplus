<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatif = ['A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8'];

        $penilaian = [];

        foreach ($alternatif as $alternatifPertama) {
            foreach ($alternatif as $alternatifKedua) {
                $penilaian[] = [
                    'tahun_ajaran' => '2023/2024',
                    'alternatif_pertama' => $alternatifPertama,
                    'alternatif_kedua' => $alternatifKedua,
                    'status' => 'Disetujui',                    
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        \App\Models\Penilaian::insert($penilaian);
    }
}
