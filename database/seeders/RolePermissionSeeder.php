<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar izin yang akan dibuat
        $permissions = [
            'dashboard',
            'view pegawai',
            'kelola pegawai',
            'view group pegawai',
            'kelola group pegawai',
            'view kriteria',
            'kelola kriteria',
            'view subkriteria',
            'kelola subkriteria',
            'view skala indikator',
            'kelola skala indikator',
            'perbandingan kriteria',
            'perbandingan subkriteria',
            'view kelola akun',
            'kelola akun',
            'penilaian',
            'riwayat penilaian',
            'persetujuan penilaian',
            'catatan pegawai',
            'view perbandingan kriteria',
            'view perbandingan subkriteria',
            'perbandingan pegawai',
            'perankingan',
        ];

        // Buat izin jika belum ada
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat peran dan berikan izin
        $roleSuperadmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleIT = Role::create(['name' => 'IT']);
        $roleYayasan = Role::create(['name' => 'yayasan']);
        $roleDeputi = Role::create(['name' => 'deputi']);
        $roleKepalaSekolah = Role::create(['name' => 'kepala sekolah']);
        $roleGuru = Role::create(['name' => 'guru']);
        $roleTataUsahaTenagaPendidikan = Role::create(['name' => 'tata usaha tenaga pendidikan']);
        $roleTataUsahaNonTenagaPendidikan = Role::create(['name' => 'tata usaha non tenaga pendidikan']);
        $roleKerohanianTenagaPendidikan = Role::create(['name' => 'kerohanian tenaga pendidikan']);
        $roleKerohanianNonTenagaPendidikan = Role::create(['name' => 'kerohanian non tenaga pendidikan']);

        $roleSuperadmin->givePermissionTo([
            'dashboard',
            'view pegawai',
            'kelola pegawai',
            'view group pegawai',
            'kelola group pegawai',
            'view kriteria',
            'kelola kriteria',
            'view subkriteria',
            'kelola subkriteria',
            'view skala indikator',
            'kelola skala indikator',
            'perbandingan kriteria',
            'perbandingan subkriteria',
            'view kelola akun',
            'kelola akun',
        ]);

        $roleAdmin->givePermissionTo([
            'dashboard',
            'view pegawai',
            'kelola pegawai',
            'view group pegawai',
            'kelola group pegawai',
            'view kriteria',
            'kelola kriteria',
            'view subkriteria',
            'kelola subkriteria',
            'view skala indikator',
            'kelola skala indikator',
        ]);

        $roleIT->givePermissionTo([
            'dashboard',
            'view kelola akun',
            'kelola akun',
        ]);

        $roleYayasan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat penilaian',
        ]);

        $roleDeputi->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat penilaian',
        ]);

        $roleKepalaSekolah->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat penilaian',
            'persetujuan penilaian',
            'catatan pegawai',
            'view perbandingan kriteria',
            'view perbandingan subkriteria',
            'perbandingan pegawai',
            'perankingan',
        ]);

        $roleGuru->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat penilaian',
        ]);

        $roleTataUsahaTenagaPendidikan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat penilaian',
        ]);

        $roleTataUsahaNonTenagaPendidikan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat penilaian',
        ]);

        $roleKerohanianTenagaPendidikan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat penilaian',
        ]);

        $roleKerohanianNonTenagaPendidikan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat penilaian',
        ]);
    }
}
