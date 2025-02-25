<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('perhitunganSubkriteria.index') }}">Perbandingan Subkriteria</a>
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
            <h2 class="mb-2 text-lg font-bold">Contoh Pengisian Matriks Perbandingan Berpasangan Subkriteria</h2>
            <img src="https://raw.githubusercontent.com/danisec/assets/refs/heads/main/images/kinerjaplus/images/pedoman-pengisian-matriks-perbandingan-berpasangan-subkriteria.png"
                alt="Pedoman Pengisian Matriks Perbandingan Berpasangan Subkriteria">

            <h4 class="my-4 text-lg font-semibold">Cara Mengisi Tingkat Kepentingan Skala Saaty:</h4>
            <ul class="list-inside list-decimal text-gray-900">
                <li class="my-4 list-decimal">
                    <span class="font-semibold">Baris 1 (Spiritualitas dan Integritas)</span>
                    <ul class="ml-5 list-inside list-disc">
                        <li class="mt-2">Baris spiritualitas dan integritas dibandingkan dengan spiritualitas dan
                            integritas: nilai 1 (karena
                            membandingkan diri
                            sendiri sama pentingnya / equal).
                        </li>
                        <li class="mt-2">Baris spiritualitas dan integritas dibandingkan dengan kepempinan dan
                            keteladanan dalam tanggung jawab kerja: nilai 5 (karena spiritualitas dan integritas lebih
                            penting
                            dibanding dengan kepempinan dan
                            keteladanan dalam tanggung jawab kerja).
                        </li>
                        <li class="mt-2">Baris spiritualitas dan integritas dibandingkan dengan keterampilan
                            interpersonal: nilai 5
                            (karena spiritualitas dan integritas
                            lebih
                            penting dibanding dengan keterampilan
                            interpersonal).
                        </li>
                    </ul>
                </li>

                <li class="my-4 list-decimal"><span class="font-semibold">Baris 2 (Kepemimpinan dan Keteladanan Dalam
                        Tanggung Jawab Kerja)</span>
                    <ul class="ml-5 list-inside list-disc">
                        <li class="mt-2">Baris kepempinan dan
                            keteladanan dalam tanggung jawab kerja dibandingkan dengan
                            spiritualitas dan integritas: nilai 0.2 (karena kepempinan dan
                            keteladanan dalam tanggung jawab kerja kurang
                            penting dari
                            spiritualitas dan integritas dengan rasio 1/5).
                        </li>
                        <li class="mt-2">Baris kepempinan dan
                            keteladanan dalam tanggung jawab kerja dibandingkan dengan kepempinan dan
                            keteladanan dalam tanggung jawab kerja: nilai 1 (karena
                            membandingkan diri
                            sendiri sama pentingnya / equal).
                        </li>
                        <li class="mt-2">Baris kepempinan dan
                            keteladanan dalam tanggung jawab kerja dibandingkan dengan keterampilan interpersonal:
                            nilai 3 (karena kepemimpinan dan
                            keteladanan dalam tanggung jawab kerja sedikit lebih penting
                            dengan keterampilan interpersonal).
                        </li>
                    </ul>
                </li>

                <li class="my-4 list-decimal"><span class="font-semibold">Baris 3 (Keterampilan Interpersonal)</span>
                    <ul class="ml-5 list-inside list-disc">
                        <li class="mt-2">Baris keterampilan interpersonal dibandingkan dengan
                            spiritualitas dan integritas: nilai 0.2 (karena keterampilan interpersonal kurang
                            penting dari
                            spiritualitas dan integritas dengan rasio 1/5).
                        </li>
                        <li class="mt-2">Baris keterampilan interpersonal dibandingkan dengan kepemimpinan dan
                            keteladanan dalam tanggung jawab kerja: nilai 0.33 (karena keterampilan interpersonal
                            kurang sedikit penting
                            dengan kepemimpinan dan
                            keteladanan dalam tanggung jawab kerja dengan rasio 1/3).
                        </li>
                        <li class="mt-2">Baris keterampilan interpersonal dibandingkan dengan keterampilan
                            interpersonal:
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
