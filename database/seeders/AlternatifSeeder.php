<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        foreach (range(37, 37) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Nakia OConnell',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(38, 38) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Virgie Ebert',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(39, 39) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Kathryn Batz',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(40, 40) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Timmothy Collins V',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(41, 41) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Mable Heidenreich',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(42, 42) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Jailyn Walker',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(43, 43) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Mr. Abraham Krajcik Jr.',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(44, 44) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Carrie Gerhold',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        foreach (range(45, 45) as $index) {
            $kode_alternatif = 'A' . $index;

            DB::table('alternatif')->insert([
                'kode_alternatif' => $kode_alternatif,
                'nama_alternatif' => 'Buck Conn',
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tanggal_masuk_kerja' => $faker->dateTimeBetween('2020-01-01', '2023-12-31')->format('Y-m-d'),
                'nip' => $faker->unique()->randomNumber(9),
                'jabatan' => 'Guru',
                'pendidikan' => $faker->randomElement(['S1', 'S2']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
