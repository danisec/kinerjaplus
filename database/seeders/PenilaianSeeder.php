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
        $alternatifPertama = ['A28'];
        $alternatifKedua = ['A28', 'A9', 'A36', 'A45'];

        $penilaian = [];

        foreach ($alternatifPertama as $alternatif) {
            foreach ($alternatifKedua as $alternatif2) {
                $penilaian[] = [
                    'tahun_ajaran' => '2023/2024',
                    'alternatif_pertama' => $alternatif,
                    'alternatif_kedua' => $alternatif2,
                    'status' => 'Disetujui',                    
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        \App\Models\Penilaian::insert($penilaian);
    }
}
