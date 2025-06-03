<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 capitalize text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('perhitunganAlternatif.introduction') }}">Perbandingan Pegawai</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Pedoman Pengisian Matriks Perbandingan Berpasangan</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div
        class="relative my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <h1 class="text-base font-bold leading-normal text-gray-700 dark:text-gray-400">A. Pedoman Pengisian
            Matriks Perbandingan Berpasangan</h1>
        <p class="mb-6 mt-6 text-sm font-normal leading-normal text-gray-700 sm:text-base dark:text-gray-400">
            Instrumen pengisian evaluasi kinerja pegawai
            menggunakan metode
            Analytical
            Hierarchy Process (AHP)
            yaitu berbentuk matriks perbandingan berpasangan, skala yang digunakan yaitu 1 — 9. Nilai dan
            definisi pendapat kualitatif dalam skala perbandingan Saaty terdapat pada Tabel di bawah ini.</p>

        <div>
            <table class="min-w-full">
                <thead>
                    <tr class="border-y border-gray-100 dark:border-gray-800">
                        <th class="py-3">
                            <div class="flex items-center">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Intensitas Kepentingan
                                </p>
                            </div>
                        </th>
                        <th class="flex justify-center px-6 py-3">
                            <div class="flex items-center">
                                <p class="xs:text-xs sm:text-theme-md text-center font-medium text-gray-800">Definisi
                                </p>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($intensitasKepentingan as $itemIntensitasKepentingan)
                        <tr class="border-b bg-white hover:bg-slate-100">
                            <td class="py-3">
                                <div class="flex items-center justify-center text-center">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $itemIntensitasKepentingan['nilai'] }}
                                    </p>
                                </div>
                            </td>
                            <td class="py-3">
                                <div class="flex items-center">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $itemIntensitasKepentingan['definisi'] }}
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8 space-y-6">
            <h2 class="mb-2 text-base font-bold leading-normal text-gray-700 dark:text-gray-400">B. Cara Mengisi Tingkat
                Kepentingan Skala Saaty</h2>

            <img src="https://raw.githubusercontent.com/danisec/assets/refs/heads/main/images/kinerjaplus/images/pedoman-pengisian-matriks-perbandingan-berpasangan-alternatif.png"
                alt="Pedoman Pengisian Matriks Perbandingan Berpasangan Kriteria">

            <ul
                class="list-inside list-decimal text-sm font-normal leading-normal text-gray-700 sm:text-base dark:text-gray-400">
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
