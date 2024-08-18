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
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'karyawan']);
        Permission::create(['name' => 'group-karyawan']);
        Permission::create(['name' => 'kriteria']);
        Permission::create(['name' => 'subkriteria']);
        Permission::create(['name' => 'skala-indikator']);
        Permission::create(['name' => 'perbandingan-kriteria']);
        Permission::create(['name' => 'perbandingan-subkriteria']);
        Permission::create(['name' => 'kelola-akun']);

        Permission::create(['name' => 'penilaian']);
        Permission::create(['name' => 'riwayat-penilaian']);
        Permission::create(['name' => 'persetujuan-penilaian']);
        Permission::create(['name' => 'catatan-karyawan']);
        Permission::create(['name' => 'view perbandingan-kriteria']);
        Permission::create(['name' => 'view perbandingan-subkriteria']);
        Permission::create(['name' => 'perbandingan-karyawan']);
        Permission::create(['name' => 'perankingan']);

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
            'karyawan',
            'group-karyawan',
            'kriteria',
            'subkriteria',
            'skala-indikator',
            'perbandingan-kriteria',
            'perbandingan-subkriteria',
            'kelola-akun',
        ]);

        $roleAdmin->givePermissionTo([
            'dashboard',
            'karyawan',
            'group-karyawan',
            'kriteria',
            'subkriteria',
            'skala-indikator',
        ]);

        $roleIT->givePermissionTo([
            'dashboard',
            'kelola-akun',
        ]);

        $roleYayasan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat-penilaian',
        ]);

        $roleDeputi->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat-penilaian',
        ]);

        $roleKepalaSekolah->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat-penilaian',
            'persetujuan-penilaian',
            'catatan-karyawan',
            'view perbandingan-kriteria',
            'view perbandingan-subkriteria',
            'perbandingan-karyawan',
            'perankingan',
        ]);

        $roleGuru->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat-penilaian',
        ]);

        $roleTataUsahaTenagaPendidikan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat-penilaian',
        ]);

        $roleTataUsahaNonTenagaPendidikan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat-penilaian',
        ]);

        $roleKerohanianTenagaPendidikan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat-penilaian',
        ]);

        $roleKerohanianNonTenagaPendidikan->givePermissionTo([
            'dashboard',
            'penilaian',
            'riwayat-penilaian',
        ]);
    }
}
