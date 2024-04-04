<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('perhitunganAlternatif.index') }}">Perbandingan Alternatif</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Hasil Perbandingan Alternatif</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div>

        @foreach ($kriteria as $dataKriteria)
            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="table-alternatif w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ count($alternatif) + 1 }}">
                                Perbandingan Antar Alternatif Berdasarkan Kriteria : {{ $dataKriteria->nama_kriteria }}
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Nama Alternatif
                            </th>

                            @foreach ($alternatif as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $item->nama_alternatif }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatif as $alternatif1)
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    {{ $alternatif1->nama_alternatif }}
                                </th>
                                @foreach ($alternatif as $alternatif2)
                                    <td class="px-3 py-3 text-center">
                                        @if ($alternatif1->kode_alternatif == $alternatif2->kode_alternatif)
                                            <input
                                                class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1->kode_alternatif }}][{{ $alternatif2->kode_alternatif }}]"
                                                type="text" value="1" @readonly(true)>
                                        @else
                                            @php
                                                $nilai = $perhitunganAlternatif
                                                    ->where('kode_kriteria', $dataKriteria->kode_kriteria)
                                                    ->where('alternatif_pertama', $alternatif1->kode_alternatif)
                                                    ->where('alternatif_kedua', $alternatif2->kode_alternatif)
                                                    ->first();
                                            @endphp

                                            <input
                                                class="matriks w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1->kode_alternatif }}][{{ $alternatif2->kode_alternatif }}]"
                                                data-row="{{ $alternatif1->kode_alternatif }}"
                                                data-col="{{ $alternatif2->kode_alternatif }}"
                                                value="{{ $nilai ? $nilai->nilai_alternatif : '' }}" @readonly(true)>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                        <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-semibold text-gray-900">
                            Total Kolom
                        </th>

                        @foreach ($alternatif as $alternatif1)
                            <td class="bg-slate-100 px-3 py-3 text-center">
                                <input
                                    class="w-20 rounded-md border-none bg-slate-100 text-center font-semibold focus:ring-slate-100"
                                    type="text"
                                    value="{{ $perhitunganAlternatif->where('kode_kriteria', $dataKriteria->kode_kriteria)->where('alternatif_kedua', $alternatif1->kode_alternatif)->sum('nilai_alternatif') }}"
                                    @readonly(true)>
                            </td>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="table-alternatif w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ count($alternatif) + 2 }}">
                                Perhitungan Bobot Prioritas Alternatif Berdasarkan Kriteria :
                                {{ $dataKriteria->nama_kriteria }}
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Nama Alternatif
                            </th>

                            @foreach ($alternatif as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $item->nama_alternatif }}
                                </th>
                            @endforeach

                            <th class="px-6 py-3" scope="col">
                                Bobot
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatif as $alternatif1)
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    {{ $alternatif1->nama_alternatif }}
                                </th>

                                @foreach ($alternatif as $alternatif2)
                                    <td class="px-3 py-3 text-center">
                                        @php
                                            $normalizedValue =
                                                $normalisasiMatriks[$dataKriteria->kode_kriteria][
                                                    $alternatif1->kode_alternatif
                                                ][$alternatif2->kode_alternatif];
                                        @endphp

                                        <input
                                            class="matriks w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                            name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1->kode_alternatif }}][{{ $alternatif2->kode_alternatif }}]"
                                            data-row="{{ $alternatif1->kode_alternatif }}"
                                            data-col="{{ $alternatif2->kode_alternatif }}" type="text"
                                            value="{{ $normalizedValue
                                                ? $normalizedValue
                                                : $normalisasiMatriks[$dataKriteria->kode_kriteria][$alternatif2->kode_alternatif][$alternatif1->kode_alternatif] }}"
                                            @readonly(true)>
                                    </td>
                                @endforeach

                                <td class="px-3 py-3">
                                    <input
                                        class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                        type="text"
                                        value="{{ $bobotPrioritasAlternatif[$dataKriteria->kode_kriteria][$alternatif1->kode_alternatif] }}"
                                        @readonly(true)>
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

</x-layouts.app-dashboard>
