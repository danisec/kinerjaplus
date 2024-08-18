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
        $alternatifPertama = ['A5'];
        $alternatifKedua = ['A5', 'A2', 'A9', 'A4', 'A3', 'A8', 'A10'];

        $penilaian = [];

        foreach ($alternatifPertama as $alternatif) {
            foreach ($alternatifKedua as $alternatif2) {
                $penilaian[] = [
                    'id_tanggal_penilaian' => '1',
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
