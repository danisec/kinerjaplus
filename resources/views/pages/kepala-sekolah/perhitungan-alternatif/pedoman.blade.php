<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('perhitunganAlternatif.introduction') }}">Perbandingan Alternatif</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Pedoman Pengisian Matriks Perbandingan
                    Berpasangan</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="relative my-8 overflow-x-auto">
        <ul class="list-inside text-gray-900">
            <li class="text-lg font-bold">A. Pedoman Pengisian Matriks Perbandingan Berpasangan
                <p class="mt-2 text-base font-normal leading-normal">Instrumen pengisian evaluasi kinerja pegawai
                    menggunakan metode
                    Analytical
                    Hierarchy Process (AHP)
                    yaitu berbentuk matriks perbandingan berpasangan, skala yang digunakan yaitu 1 — 9. Nilai dan
                    definisi pendapat kualitatif dalam skala perbandingan Saaty ada pada Tabel di bawah ini.</p>
            </li>
        </ul>

        <table class="mt-8 w-full text-left text-base text-gray-900">
            <thead class="bg-slate-100 text-sm uppercase text-gray-900">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        Intensitas Kepentingan
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Definisi
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($intensitasKepentingan as $itemIntensitasKepentingan)
                    <tr class="border-b bg-white hover:bg-slate-100">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                            {{ $itemIntensitasKepentingan['nilai'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $itemIntensitasKepentingan['definisi'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-8">
            <h2 class="my-4 text-lg font-bold">Contoh Pengisian Matriks Perbandingan Berpasangan Antar Pegawai
                Berdasarkan Kriteria</h2>
            <img src="{{ asset('storage/images/pedoman-pengisian-matriks-perbandingan-berpasangan-alternatif.png') }}"
                alt="Pedoman Pengisian Matriks Perbandingan Berpasangan Kriteria">

            <h4 class="my-4 text-lg font-semibold">Cara Mengisi Tingkat Kepentingan Skala Saaty:</h4>
            <ul class="list-inside list-decimal text-gray-900">
                <li class="my-4 list-decimal">
                    <span class="font-semibold">Baris 1 (Lucia Sutarni, S.Pd) Berdasarkan Kriteria: Kompetensi</span>
                    <ul class="ml-5 list-inside list-disc">
                        <li class="mt-2">Baris Lucia Sutarni, S.Pd dibandingkan dengan Lucia Sutarni, S.Pd: nilai 1
                            (karena
                            membandingkan diri
                            sendiri sama pentingnya / equal).
                        </li>
                        <li class="mt-2">Baris Lucia Sutarni, S.Pd dibandingkan dengan Irmina Sihura: nilai 3 (karena
                            Lucia Sutarni, S.Pd pada kriteria kompetensi sedikit lebih penting / sedikit lebih unggul
                            dibanding dengan
                            Irmina
                            Sihura).
                        </li>
                        <li class="mt-2">Baris Lucia Sutarni, S.Pd dibandingkan dengan Hendriette Aphrodite Naomi
                            Angelique Salakory: nilai 0.2 (karena
                            Hendriette Aphrodite Naomi Angelique Salakory pada kriteria kompetensi
                            lebih
                            penting / lebih unggul dibanding dengan Lucia Sutarni, S.Pd dengan rasio 1/5).
                        </li>
                    </ul>
                </li>

                <li class="my-4 list-decimal"><span class="font-semibold">Baris 2 (Irmina Sihura) Berdasarkan Kriteria:
                        Kompetensi</span>
                    <ul class="ml-5 list-inside list-disc">
                        <li class="mt-2">Baris Irmina Sihura dibandingkan dengan
                            Lucia Sutarni, S.Pd: nilai 0.33 (karena Irmina Sihura pada kriteria kompetensi kurang
                            penting / kurang unggul
                            dari
                            Lucia Sutarni, S.Pd dengan rasio 1/3).
                        </li>
                        <li class="mt-2">Baris Irmina Sihura dibandingkan dengan Irmina Sihura: nilai 1 (karena
                            membandingkan diri
                            sendiri sama pentingnya / equal).
                        </li>
                        <li class="mt-2">Baris Irmina Sihura dibandingkan dengan Hendriette Aphrodite Naomi Angelique
                            Salakory:
                            nilai 1 (karena Irmina Sihura pada kriteria kompetensi sama penting / sama unggul
                            dengan Hendriette Aphrodite Naomi Angelique
                            Salakory).
                        </li>
                    </ul>
                </li>

                <li class="my-4 list-decimal"><span class="font-semibold">Baris 3 (Hendriette Aphrodite Naomi Angelique
                        Salakory) Berdasarkan Kriteria:
                        Kompetensi</span>
                    <ul class="ml-5 list-inside list-disc">
                        <li class="mt-2">Baris Hendriette Aphrodite Naomi Angelique Salakory dibandingkan dengan
                            Lucia Sutarni, S.Pd: nilai 5 (karena Hendriette Aphrodite Naomi Angelique Salakory pada
                            kriteria kompetensi lebih
                            penting / lebih unggul dari
                            Lucia Sutarni, S.Pd).
                        </li>
                        <li class="mt-2">Baris Hendriette Aphrodite Naomi Angelique Salakory dibandingkan dengan
                            Irmina Sihura: nilai 1 (karena Hendriette Aphrodite Naomi Angelique Salakory sama penting /
                            sama unggul
                            dengan Irmina Sihura dengan rasio 1/1).
                        </li>
                        <li class="mt-2">Baris Hendriette Aphrodite Naomi Angelique Salakory dibandingkan dengan
                            Hendriette Aphrodite Naomi Angelique Salakory:
                            nilai 1 (karena
                            membandingkan diri
                            sendiri sama pentingnya / equal).
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

</x-app-dashboard>
