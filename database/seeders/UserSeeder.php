<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'fullname' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin12345'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $superadmin->assignRole('superadmin');

        $admin = User::create([
            'fullname' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $admin->assignRole('admin');

        $deputi = [
            [
                'fullname' => 'Mary Wahyuningsih, S.Kom',
                'username' => 'mary',
                'email' => 'marywahyuningsih@gmail.com',
                'password' => Hash::make('mary2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Selamat, M.Pd',
                'username' => 'selamat',
                'email' => 'selamat@gmail.com',
                'password' => Hash::make('selamat2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($deputi as $userDeputi) {
            $user = User::create($userDeputi);
            $user->assignRole('deputi');
        }

        $kepalaSekolah = [
            [
                'fullname' => 'Lucia Sutarni, S.Pd',
                'username' => 'lucia',
                'email' => 'luciasutarni@gmail.com',
                'password' => Hash::make('lucia2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Ninik Kristoermadiarsih, M.M',
                'username' => 'ninik',
                'email' => 'ninikkristoermadiarsih@gmail.com',
                'password' => Hash::make('ninik2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Sovia Nainggolan, M.Pd',
                'username' => 'sovia',
                'email' => 'sovianainggolan@gmail.com',
                'password' => Hash::make('sovia2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($kepalaSekolah as $userKepalaSekolah) {
            $user = User::create($userKepalaSekolah);
            $user->assignRole('kepala sekolah');
        }

        $guru = [
            [
                'fullname' => 'Irmina Sihura',
                'username' => 'irmina',
                'email' => 'irminasihura@gmail.com',
                'password' => Hash::make('irmina2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Hendriette Aphrodite Naomi Angelique Salakory',
                'username' => 'hendriette',
                'email' => 'hendriette@gmail.com',
                'password' => Hash::make('hendriette2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Tiyas Wulandari, S.Psi',
                'username' => 'tiyas',
                'email' => 'tiyaswulandari@gmail.com',
                'password' => Hash::make('tiyas2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Tek Hok, S.Kom',
                'username' => 'tekhok',
                'email' => 'tekhok@gmail.com',
                'password' => Hash::make('tekhok2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Leni Sihombing, S.Pd',
                'username' => 'leni',
                'email' => 'lenisihombing@gmail.com',
                'password' => Hash::make('leni2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Diyah Kartika S,S.H',
                'username' => 'diyah',
                'email' => 'diyahkartika@gmail.com',
                'password' => Hash::make('diyah2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Muddin Sidabalok, S.Pd',
                'username' => 'muddin',
                'email' => 'muddinsidabalok@gmail.com',
                'password' => Hash::make('muddin2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Christina Puloraran',
                'username' => 'christina',
                'email' => 'christinapuloraran@gmail.com',
                'password' => Hash::make('christina2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Tanasia. S.Th',
                'username' => 'tanasia',
                'email' => 'tanasia@gmail.com',
                'password' => Hash::make('tanasia2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Lusiana Sele, S.Pd',
                'username' => 'lusiana',
                'email' => 'lusiana@gmail.com',
                'password' => Hash::make('lusiana2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Iria Kharisma Joseph, ST',
                'username' => 'iria',
                'email' => 'iriakharismajoseph@gmail.com',
                'password' => Hash::make('iria2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Lisa Julita Mokosandi, S.Th',
                'username' => 'lisa',
                'email' => 'lisajulitamokosandi@gmail.com',
                'password' => Hash::make('lisa2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Theresia Rusmiyati',
                'username' => 'theresia',
                'email' => 'theresia@gmail.com',
                'password' => Hash::make('theresia2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Yacobus Santana, S.Pd',
                'username' => 'yacobus',
                'email' => 'yacobussantana@gmail.com',
                'password' => Hash::make('yacobus2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'R.AB.Susi Hastono, S.E',
                'username' => 'susi',
                'email' => 'susihastono@gmail.com',
                'password' => Hash::make('susi2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Marusaha Samosir, S.Pd',
                'username' => 'marusaha',
                'email' => 'marusahasamosir@gmail.com',
                'password' => Hash::make('marusaha2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Aprilliana Grace Wilma Thenu, S.Sos',
                'username' => 'aprilliana',
                'email' => 'aprillianagrace@gmail.com',
                'password' => Hash::make('aprilliana2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Gani Praditja Sakti, S.Pd',
                'username' => 'gani',
                'email' => 'ganipraditjasakti@gmail.com',
                'password' => Hash::make('gani2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Fransisca X.Suharti, S.Pd',
                'username' => 'fransisca',
                'email' => 'fransisca@gmail.com',
                'password' => Hash::make('fransisca2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Kristiani Dwi Nugrohowati Djatiningsih, S.E',
                'username' => 'kristiana',
                'email' => 'kristiana@gmail.com',
                'password' => Hash::make('kristiana2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Elisabeth, S.Pd',
                'username' => 'elisabeth',
                'email' => 'elisabeth@gmail.com',
                'password' => Hash::make('elisabeth2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Cornelius Wiwit, S.Pd',
                'username' => 'cornelius',
                'email' => 'corneliuswiwit@gmail.com',
                'password' => Hash::make('cornelius2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Artha Maulina Rochendraty, S.Pd',
                'username' => 'artha',
                'email' => 'arthamaulina@gmail.com',
                'password' => Hash::make('artha2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Siti Limaria Silaban, S.Pd',
                'username' => 'siti',
                'email' => 'sitilimariasilaban@gmail.com',
                'password' => Hash::make('siti2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Steven Evan Edifianto, S.Pd',
                'username' => 'stevan',
                'email' => 'stevanevanedifianto@gmail.com',
                'password' => Hash::make('stevan2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Linda Tiur Mauly, M.M',
                'username' => 'linda',
                'email' => 'lindatiurmauly@gmail.com',
                'password' => Hash::make('linda2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Heri Prasetya, S.Pd',
                'username' => 'heri',
                'email' => 'heriprasetya@gmail.com',
                'password' => Hash::make('heri2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Martha Septiningtyas, S.Pd, M.Hum.',
                'username' => 'martha',
                'email' => 'marthaseptiningtyas@gmail.com',
                'password' => Hash::make('martha2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Pesta Maria Siburian, S.Pd',
                'username' => 'pesta',
                'email' => 'pestamariasiburian@gmail.com',
                'password' => Hash::make('pesta2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Ronica Sales Julianti Siahaan, S.Pd',
                'username' => 'ronica',
                'email' => 'ronicasales@gmail.com',
                'password' => Hash::make('ronica2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Roslinah, S.Pd',
                'username' => 'roslinah',
                'email' => 'roslinah@gmail.com',
                'password' => Hash::make('roslinah2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Elvina Br. Manik, S.Pd',
                'username' => 'elvina',
                'email' => 'elvina@gmail.com',
                'password' => Hash::make('elvina2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Rian Hendri Tupamahu, S.Pd',
                'username' => 'rian',
                'email' => 'rianhendritupamahu@gmail.com',
                'password' => Hash::make('rian2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Rachel Oktaviani Hutahaean, S.Pd',
                'username' => 'rachel',
                'email' => 'racheloktavianihutahaean@gmail.com',
                'password' => Hash::make('rachel2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Prima Caesar, B.Ed, S.Pd.',
                'username' => 'prima',
                'email' => 'primacaesar@gmail.com',
                'password' => Hash::make('prima2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Jelda Febrina Sesfaot, S.Pd',
                'username' => 'jelda',
                'email' => 'jeldafebrinasesfaoti@gmail.com',
                'password' => Hash::make('jelda2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Romi Poire Sihotang, S.Kom',
                'username' => 'romi',
                'email' => 'romipoiresihotang@gmail.com',
                'password' => Hash::make('romi2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Sriningsih Hutabarat, S.Pd',
                'username' => 'sriningsih',
                'email' => 'sriningsihhutabarat@gmail.com',
                'password' => Hash::make('sriningsih2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Theresa Christina Yoel, S.Pd',
                'username' => 'theresa',
                'email' => 'theresachristinayoel@gmail.com',
                'password' => Hash::make('theresa2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Erni Maduma BR Marbun, S.Pd',
                'username' => 'erni',
                'email' => 'ernimaduma@gmail.com',
                'password' => Hash::make('erni2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Tanty Chandra Siregar, S.Pd',
                'username' => 'tanty',
                'email' => 'tantychandrasiregar@gmail.com',
                'password' => Hash::make('tanty2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Agnes Paul, S.Pd',
                'username' => 'agnes',
                'email' => 'agnespaul@gmail.com',
                'password' => Hash::make('agnes2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Missy Friska Margaretha',
                'username' => 'missy',
                'email' => 'missyfriskamargaretha@gmail.com',
                'password' => Hash::make('missy2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Andre Saputra Julianto',
                'username' => 'andre',
                'email' => 'andresaputrajulianto@gmail.com',
                'password' => Hash::make('andre2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Ekam Sehari Manalu',
                'username' => 'ekam',
                'email' => 'ekamseharimanalu@gmail.com',
                'password' => Hash::make('ekam2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Odaligo Zega',
                'username' => 'odaligo',
                'email' => 'odaligozega@gmail.com',
                'password' => Hash::make('odaligo2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($guru as $userGuru) {
            $user = User::create($userGuru);
            $user->assignRole('guru');
        }

        $tataUsahaTenagaPendidikan = [
            [
                'fullname' => 'Rita Sofiani',
                'username' => 'rita',
                'email' => 'ritasofiani@gmail.com',
                'password' => Hash::make('rita2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Elna Santosa Manuel',
                'username' => 'elna',
                'email' => 'elna@gmail.com',
                'password' => Hash::make('elna2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Delinda',
                'username' => 'delinda',
                'email' => 'delinda@gmail.com',
                'password' => Hash::make('delinda2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Dhea Khanti Nathali',
                'username' => 'dhea',
                'email' => 'dheakhantinathali@gmail.com',
                'password' => Hash::make('dhea2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fullname' => 'Yeny Irawati',
                'username' => 'yeny',
                'email' => 'yenyirawati@gmail.com',
                'password' => Hash::make('yeny2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($tataUsahaTenagaPendidikan as $userTataUsahaTenagaPendidikan) {
            $user = User::create($userTataUsahaTenagaPendidikan);
            $user->assignRole('tata usaha tenaga pendidikan');
        }

        $kerohanianTenagaPendidikan = [
            [
                'fullname' => 'Triyono, S.E, M.Div',
                'username' => 'triyono',
                'email' => 'triyono@gmail.com',
                'password' => Hash::make('triyono2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($kerohanianTenagaPendidikan as $userKerohanianTenagaPendidikan) {
            $user = User::create($userKerohanianTenagaPendidikan);
            $user->assignRole('kerohanian tenaga pendidikan');
        }

        $kerohanianNonTenagaPendidikan = [
            [
                'fullname' => 'Jaka Winarta,M.Div',
                'username' => 'jaka',
                'email' => 'jakawinarta@gmail.com',
                'password' => Hash::make('jaka2024'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($kerohanianNonTenagaPendidikan as $userKerohanianNonTenagaPendidikan) {
            $user = User::create($userKerohanianNonTenagaPendidikan);
            $user->assignRole('kerohanian non tenaga pendidikan');
        }
    }
}
