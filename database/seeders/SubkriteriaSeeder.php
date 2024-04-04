<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subkriteria = [
            [
                'kode_kriteria' => 'K1',
                'kode_subkriteria' => 'SK1.1',
                'nama_subkriteria' => 'Spiritualitas dan Integritas',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K1',
                'kode_subkriteria' => 'SK1.2',
                'nama_subkriteria' => 'Kepemimpinan dan Keteladanan dalam tanggung jawab kerja',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K1',
                'kode_subkriteria' => 'SK1.3',
                'nama_subkriteria' => 'Keterampilan Interpersonal',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.1',
                'nama_subkriteria' => 'Orientasi',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.2',
                'nama_subkriteria' => 'Motivasi',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.3',
                'nama_subkriteria' => 'Apersepsi',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.4',
                'nama_subkriteria' => 'Penguasaan materi pembelajaran',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.5',
                'nama_subkriteria' => 'Penerapan strategi pembelajaran yang mendidik',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.6',
                'nama_subkriteria' => 'Aktivitas Pembelajaran HOTS dan Kecakapan Abad 21 (4C)',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.7',
                'nama_subkriteria' => 'Manajemen Kelas',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.8',
                'nama_subkriteria' => 'Pembelajaran Literasi Dan Numerasi',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K2',
                'kode_subkriteria' => 'SK2.9',
                'nama_subkriteria' => 'Proses rangkuman, refleksi, dan tindak lanjut',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode_kriteria' => 'K3',
                'kode_subkriteria' => 'SK3.1',
                'nama_subkriteria' => 'Pelaksanaan Penilaian Hasil Belajar',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kriteria' => 'K3',
                'kode_subkriteria' => 'SK3.2',
                'nama_subkriteria' => 'Kepatuhan terhadap Proses Kerja yang berlaku',
                'deskripsi_subkriteria' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($subkriteria as $data) {
            \App\Models\Subkriteria::create($data);
        }
    }
}
