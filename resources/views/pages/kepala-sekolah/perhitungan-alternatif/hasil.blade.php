<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 capitalize text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('perhitunganAlternatif.introduction') }}">Perbandingan Pegawai Tahun Ajaran
                {!! $tahunAjaran->tahun_ajaran . ' - Semester ' . $tahunAjaran->semester !!}</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Hasil Perbandingan Pegawai</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div>

        @foreach ($kriteria as $dataKriteria)
            <div
                class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <table class="table-alternatif w-full text-left">
                    <thead class="capitalize">
                        <tr>
                            <th class="border-b py-2 text-center font-bold text-gray-900"
                                colspan="{{ count($alternatif) + 1 }}">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Perbandingan Antar
                                    Alternatif Berdasarkan Kriteria: {{ $dataKriteria->nama_kriteria }}</p>
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Alternatif</p>
                            </th>

                            @foreach ($alternatif as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $item['nama_alternatif'] }}</p>
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatif as $alternatif1)
                            <tr class="border-b bg-white">
                                <th class="h-12 w-28 whitespace-nowrap bg-slate-50 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $alternatif1['nama_alternatif'] }}
                                    </p>
                                </th>
                                @foreach ($alternatif as $alternatif2)
                                    <td class="px-3 py-3 text-center">
                                        @if ($alternatif1['id_alternatif'] == $alternatif2['id_alternatif'])
                                            <input
                                                class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                                name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
                                                type="text" value="1" @readonly(true)>
                                        @else
                                            @php
                                                $nilai = $perhitunganAlternatif
                                                    ->where('kode_kriteria', $dataKriteria->kode_kriteria)
                                                    ->where('alternatif_pertama', $alternatif1['kode_alternatif'])
                                                    ->where('alternatif_kedua', $alternatif2['kode_alternatif'])
                                                    ->first();
                                            @endphp

                                            @if ($alternatif1['id_alternatif'] < $alternatif2['id_alternatif'])
                                                <input
                                                    class="xs:text-xs sm:text-theme-md matriks h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                    type="text"
                                                    id="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]""
                                                    name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
                                                    data-row="{{ $alternatif1['kode_alternatif'] }}"
                                                    data-col="{{ $alternatif2['kode_alternatif'] }}"
                                                    value="{{ $nilai ? $nilai->nilai_alternatif : '0' }}"
                                                    @readonly(true)>
                                            @else
                                                <input
                                                    class="xs:text-xs sm:text-theme-md matriksHasil h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                    name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
                                                    data-row="{{ $alternatif1['kode_alternatif'] }}"
                                                    data-col="{{ $alternatif2['kode_alternatif'] }}" type="text"
                                                    value="{{ $nilai ? $nilai->nilai_alternatif : '0' }}"
                                                    @readonly(true)>
                                            @endif
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                        <th
                            class="xs:text-sm sm:text-theme-md h-12 w-28 whitespace-nowrap bg-slate-50 px-6 py-4 font-semibold text-gray-900">
                            Total Kolom
                        </th>

                        @foreach ($alternatif as $alternatif1)
                            <td class="bg-slate-50 px-3 py-3 text-center">
                                <input
                                    class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center font-semibold focus:ring-slate-100"
                                    type="text"
                                    value="{{ $perhitunganAlternatif->where('kode_kriteria', $dataKriteria->kode_kriteria)->where('alternatif_kedua', $alternatif1['kode_alternatif'])->sum('nilai_alternatif') }}"
                                    @readonly(true)>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div
                class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <table class="table-alternatif w-full text-left text-base text-gray-900">
                    <thead class="text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b py-2 text-center font-bold text-gray-900"
                                colspan="{{ count($alternatif) + 2 }}">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Perhitungan Bobot
                                    Prioritas Alternatif Berdasarkan Kriteria: {{ $dataKriteria->nama_kriteria }}</p>
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Alternatif</p>
                            </th>

                            @foreach ($alternatif as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $item['nama_alternatif'] }}</p>
                                </th>
                            @endforeach

                            <th class="px-6 py-3" scope="col">
                                <p class="xs:text-sm sm:text-theme-md text-center text-gray-700 dark:text-gray-400">
                                    Bobot</p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatif as $alternatif1)
                            <tr class="border-b bg-white">
                                <th class="h-12 w-28 whitespace-nowrap bg-slate-50 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $alternatif1['nama_alternatif'] }}
                                    </p>
                                </th>

                                @foreach ($alternatif as $alternatif2)
                                    <td class="px-3 py-3 text-center">
                                        @php
                                            $normalizedValue =
                                                $normalisasiMatriks[$dataKriteria->kode_kriteria][
                                                    $alternatif1['kode_alternatif']
                                                ][$alternatif2['kode_alternatif']];
                                        @endphp

                                        <input
                                            class="xs:text-xs sm:text-theme-md matriks h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                            name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
                                            data-row="{{ $alternatif1['kode_alternatif'] }}"
                                            data-col="{{ $alternatif2['kode_alternatif'] }}" type="text"
                                            value="{{ $normalizedValue
                                                ? $normalizedValue
                                                : $normalisasiMatriks[$dataKriteria->kode_kriteria][$alternatif2['kode_alternatif']][
                                                    $alternatif1['kode_alternatif']
                                                ] }}"
                                            @readonly(true)>
                                    </td>
                                @endforeach

                                <td class="px-3 py-3">
                                    <input
                                        class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                        type="text"
                                        value="{{ $bobotPrioritasAlternatif[$idTanggalPenilaian][$dataKriteria->kode_kriteria][$alternatif1['kode_alternatif']] }}"
                                        @readonly(true)>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        <div class="flex justify-end">
            <a href="{{ route('ranking.index') }}">
                <x-atoms.button.button-primary :customClass="'h-12 w-60 rounded-md'" :type="'submit'" :name="'Lanjutkan ke Perankingan'" />
            </a>
        </div>
    </div>

</x-app-dashboard>
