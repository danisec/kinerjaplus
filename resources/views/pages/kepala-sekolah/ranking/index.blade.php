<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            @if ($checkTanggalPenilaian !== null)
                <span class="capitalize">Perankingan Kinerja Pegawai Tahun Ajaran {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester
                    {!! $checkTanggalPenilaian->semester !!}</span>
            @else
                <span>Perankingan {!! $tahunAjaran !!}</span>
            @endif
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="my-8">
        @if ($checkTanggalPenilaian !== null)
            <h4 class="xs:text-base mb-6 font-semibold capitalize text-gray-800 sm:text-lg dark:text-white/90">Hasil
                Ranking Kinerja
                Pegawai Tahun Ajaran
                {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</h4>

            <div
                class="overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                @if ($checkPerhitunganAlternatif->isEmpty())
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="border-b py-2 text-left" colspan="{{ $kriteria->count() + 2 }}">
                                    <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Bobot Prioritas
                                        Kriteria</p>
                                </th>
                            </tr>

                            <tr>
                                <th class="px-6 py-3" scope="col">
                                </th>

                                @foreach ($kriteria as $dataKriteria)
                                    <th class="px-3 py-3 text-left" scope="col">
                                        <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">
                                            {{ $dataKriteria->nama_kriteria }}</p>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="border-b bg-white">
                                <th class="h-12 w-28 whitespace-nowrap px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    <p
                                        class="xs:text-sm sm:text-theme-md flex flex-row items-center justify-center gap-0.5 font-medium text-gray-800">
                                        Bobot Prioritas Kriteria</p>
                                </th>

                                @foreach ($bobotPrioritasSubkriteria as $bobotSubkriteria)
                                    <td class="px-3 py-3 text-center">
                                        <input
                                            class="xs:text-xs sm:text-theme-md flex h-12 w-28 flex-row items-center justify-center gap-0.5 rounded-md border-none bg-slate-50 text-center font-medium text-gray-800 focus:ring-slate-100"
                                            type="text" value="{{ $bobotSubkriteria->bobot_prioritas }}" readonly>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                @else
                    <table class="w-full">
                        <thead class="text-left text-base capitalize text-gray-900">
                            <tr>
                                <th class="border-b py-2 text-center text-gray-900"
                                    colspan="{{ $kriteria->count() + 2 }}">
                                    <p
                                        class="xs:text-sm sm:text-theme-md font-semibold capitalize text-gray-700 dark:text-gray-400">
                                        Perhitungan Bobot Prioritas Pegawai Terhadap Bobot Prioritas Kriteria</p>
                                </th>
                            </tr>

                            <tr>
                                <th class="px-6 py-3" scope="col">
                                </th>

                                @foreach ($kriteria as $dataKriteria)
                                    <th class="px-3 py-3 text-left" scope="col">
                                        <p
                                            class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                            {{ $dataKriteria->nama_kriteria }}</p>
                                    </th>
                                @endforeach

                                <th class="px-3 py-3 text-center" scope="col">
                                    <p class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                        Total Bobot</p>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                    <p
                                        class="xs:text-sm sm:text-theme-md flex flex-row items-center justify-center gap-0.5 font-medium text-gray-800">
                                        Bobot Prioritas Kriteria</p>
                                </th>

                                @foreach ($bobotPrioritasSubkriteria as $bobotSubkriteria)
                                    <td class="px-3 py-3 text-center">
                                        <input
                                            class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center capitalize text-gray-700 focus:ring-slate-100 dark:text-gray-400"
                                            type="text" value="{{ $bobotSubkriteria->bobot_prioritas }}" readonly>
                                    </td>
                                @endforeach
                            </tr>

                            @foreach ($alternatifPenilaian as $dataAlternatif)
                                <tr class="border-b bg-white">
                                    <th class="whitespace-nowrap bg-slate-50 px-6 py-4" scope="row">
                                        <p
                                            class="xs:text-sm sm:text-theme-md text-left font-medium capitalize text-gray-700 dark:text-gray-400">
                                            {{ $dataAlternatif->alternatifKedua->alternatifPertama->nama_alternatif }}
                                        </p>
                                    </th>

                                    @foreach ($bobotAlternatif as $bobot)
                                        @if ($bobot->kode_alternatif === $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif)
                                            <td class="px-3 py-3 text-center">
                                                <input
                                                    class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center capitalize text-gray-700 focus:ring-slate-100 dark:text-gray-400"
                                                    type="text" value="{{ $bobot->bobot_prioritas }}" readonly>
                                            </td>
                                        @endif
                                    @endforeach

                                    @foreach ($totalBobotKriteria as $keyAlternatif => $totalBobot)
                                        @if ($keyAlternatif === $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif)
                                            <td class="px-3 py-3 text-center">
                                                <input
                                                    class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center capitalize text-gray-700 focus:ring-slate-100 dark:text-gray-400"
                                                    type="text" value="{{ $totalBobot }}" readonly>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div
                class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b py-2 text-center font-bold text-gray-900"
                                colspan="{{ $kriteria->count() + 2 }}">
                                <p
                                    class="xs:text-sm sm:text-theme-md font-semibold capitalize text-gray-700 dark:text-gray-400">
                                    Rata-rata Nilai Pegawai Terhadap Kriteria</p>
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                            </th>

                            @foreach ($kriteria as $dataKriteria)
                                <th class="px-3 py-3 text-center" scope="col">
                                    <p
                                        class="xs:text-sm sm:text-theme-md font-bold capitalize text-gray-700 dark:text-gray-400">
                                        {{ $dataKriteria->nama_kriteria }}</p>
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatifPenilaian as $dataAlternatif)
                            <tr class="border-b bg-white">
                                <th class="h-12 w-28 whitespace-nowrap bg-slate-50 px-6 py-4" scope="row">
                                    <p
                                        class="xs:text-sm sm:text-theme-md text-left font-medium capitalize text-gray-700 dark:text-gray-400">
                                        {{ $dataAlternatif->alternatifKedua->alternatifPertama->nama_alternatif }}</p>
                                </th>

                                @foreach ($avgNilaiKriteria[$dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif] as $kodeSubkriteria => $nilai)
                                    <td class="px-3 py-3 text-center">
                                        <input
                                            class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                            type="text" value="{{ substr($nilai, 0, 8) }}" readonly>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div
                class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b py-2 text-center font-bold text-gray-900"
                                colspan="{{ $kriteria->count() + 2 }}">
                                <p
                                    class="xs:text-sm sm:text-theme-md font-semibold capitalize text-gray-700 dark:text-gray-400">
                                    Ranking Kinerja Pegawai</p>
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                <p
                                    class="xs:text-sm sm:text-theme-md font-semibold capitalize text-gray-700 dark:text-gray-400">
                                    Total Nilai</p>
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                <p
                                    class="xs:text-sm sm:text-theme-md font-semibold capitalize text-gray-700 dark:text-gray-400">
                                    Rank</p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatifPenilaian as $dataAlternatif)
                            <tr class="border-b bg-white">
                                <th class="h-12 w-28 whitespace-nowrap bg-slate-50 px-6 py-4" scope="row">
                                    <p
                                        class="xs:text-sm sm:text-theme-md text-left font-medium capitalize text-gray-700 dark:text-gray-400">
                                        {{ $dataAlternatif->alternatifKedua->alternatifPertama->nama_alternatif }}</p>
                                </th>

                                @foreach ($nilaiAlternatif as $keyAlternatif => $nilai)
                                    @if ($keyAlternatif == $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif)
                                        <td class="px-3 py-3 text-center">
                                            <input
                                                class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                type="text" value="{{ substr($nilai, 0, 8) }}" readonly>
                                        </td>
                                    @endif
                                @endforeach

                                @foreach ($rankAlternatif as $keyAlternatif => $rank)
                                    @if ($keyAlternatif == $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif)
                                        <td class="px-3 py-3 text-center">
                                            <input
                                                class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                type="text" value="{{ $rank }}" readonly>
                                        </td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="my-6 w-full rounded-md bg-slate-50 p-8">
                <p class="text-base font-medium text-gray-900">Silakan buat tanggal penilaian dahulu
                    pada <a class="text-blue-600" href="{{ route('penilaian.welcome') }}">menu
                        penilaian</a>
                    untuk dapat
                    melakukan perankingan.</p>
            </div>
        @endif
    </div>

</x-app-dashboard>
