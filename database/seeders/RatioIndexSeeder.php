<?php

namespace Database\Seeders;

use App\Models\RatioIndex;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatioIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RatioIndex::factory(
            [
                'ordo_matriks' => 1,
                'nilai_ratio_index' => 0,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 2,
                'nilai_ratio_index' => 0,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 3,
                'nilai_ratio_index' => 0.58,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 4,
                'nilai_ratio_index' => 0.9,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 5,
                'nilai_ratio_index' => 1.12,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 6,
                'nilai_ratio_index' => 1.24,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 7,
                'nilai_ratio_index' => 1.32,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 8,
                'nilai_ratio_index' => 1.41,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 9,
                'nilai_ratio_index' => 1.45,
            ]
        )->create();

        RatioIndex::factory(
            [
                'ordo_matriks' => 10,
                'nilai_ratio_index' => 1.49,
            ]
        )->create();
    }
}
