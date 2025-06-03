<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            @if ($checkTanggalPenilaian !== null)
                <span class="capitalize">Perbandingan Pegawai Tahun Ajaran
                    {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</span>
            @else
                <span>Perbandingan Pegawai Tahun Ajaran
                    {!! $tahunAjaran !!}</span>
            @endif
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="xs:bg-slate-50 my-6 w-full rounded-md p-4 lg:bg-white">
        <a class="xs:text-xs font-medium text-gray-900 underline hover:text-blue-600 sm:text-base"
            href="{{ route('perhitunganAlternatif.pedoman') }}" target="_blank" rel="noopener noreferrer">
            Pedoman cara pengisian matriks perbandingan berpasangan
            (<span class="italic">pairwise comparison</span>).
        </a>
    </div>

    @if ($checkTanggalPenilaian === null)
        <div
            class="my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <p class="xs:text-sm font-normal text-gray-900 lg:text-base">Perbandingan Antar Pegawai Berdasarkan
                Kriteria Telah Berakhir.</p>
        </div>
    @else
        <form action="{{ route('perhitunganAlternatif.store') }}" method="POST">
            @csrf
            @foreach ($kriteria as $dataKriteria)
                <div
                    class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <table class="table-alternatif w-full text-left text-base text-gray-900">
                        <thead class="text-base capitalize text-gray-900">
                            <tr>
                                <th class="border-b py-2 text-center font-bold text-gray-900"
                                    colspan="{{ count($alternatif) + 1 }}">
                                    <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Perbandingan Antar
                                        Pegawai Berdasarkan Kriteria: {{ $dataKriteria->nama_kriteria }}</p>
                                </th>
                            </tr>

                            <tr>
                                <th class="px-6 py-3" scope="col">
                                    <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Alternatif
                                    </p>
                                </th>

                                @foreach ($alternatif as $key => $itemAlternatif)
                                    <th class="px-3 py-3 text-center" scope="col">
                                        <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                            {{ $itemAlternatif['nama_alternatif'] }}</p>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>

                        @if ($perhitunganAlternatif->isEmpty())
                            <tbody>
                                @foreach ($alternatif as $item)
                                    <tr class="border-b bg-white">
                                        <th class="xs:text-xs sm:text-theme-md whitespace-nowrap bg-slate-50 px-6 py-4 font-medium text-gray-900"
                                            scope="row">
                                            {{ $item['nama_alternatif'] }}
                                        </th>

                                        @foreach ($alternatif as $comparison)
                                            <td class="border px-3 py-4 text-center">
                                                @if ($item['id_alternatif'] == $comparison['id_alternatif'])
                                                    <input
                                                        class="h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                                        name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                        type="text" value="1" @readonly(true)>
                                                @else
                                                    @if ($item['id_alternatif'] < $comparison['id_alternatif'])
                                                        <input
                                                            class="matriksHasil h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            data-row="{{ $item['kode_alternatif'] }}"
                                                            data-col="{{ $comparison['kode_alternatif'] }}"
                                                            type="text" value="" @readonly(true)>

                                                        <select
                                                            class="matriksHasil matriks h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                            id="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            data-row="{{ $item['kode_alternatif'] }}"
                                                            data-col="{{ $comparison['kode_alternatif'] }}">

                                                            <option selected></option>
                                                            @foreach ($intensitasKepentingan as $itemIntesitasKepentingan)
                                                                <option value="{{ $itemIntesitasKepentingan['key'] }}"
                                                                    {{ $itemIntesitasKepentingan['key'] == $itemIntesitasKepentingan['value'] ? 'selected' : '' }}>
                                                                    {{ $itemIntesitasKepentingan['value'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <input
                                                            class="matriksHasil h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            data-row="{{ $item['kode_alternatif'] }}"
                                                            data-col="{{ $comparison['kode_alternatif'] }}"
                                                            type="text" value="" @readonly(true)>

                                                        <select
                                                            class="matriksHasil matriks h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                            id="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            data-row="{{ $item['kode_alternatif'] }}"
                                                            data-col="{{ $comparison['kode_alternatif'] }}">

                                                            <option selected></option>
                                                            @foreach ($intensitasKepentingan as $itemIntesitasKepentingan)
                                                                <option value="{{ $itemIntesitasKepentingan['key'] }}"
                                                                    {{ $itemIntesitasKepentingan['key'] == $itemIntesitasKepentingan['value'] ? 'selected' : '' }}>
                                                                    {{ $itemIntesitasKepentingan['value'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody>
                                @foreach ($alternatif as $alternatif1)
                                    <tr class="border-b bg-white">
                                        <th class="xs:text-xs sm:text-theme-md whitespace-nowrap bg-slate-50 px-6 py-4 font-medium text-gray-900"
                                            scope="row">
                                            {{ $alternatif1['nama_alternatif'] }}
                                        </th>
                                        @foreach ($alternatif as $alternatif2)
                                            <td class="px-3 py-3 text-center">
                                                @if ($alternatif1['id_alternatif'] == $alternatif2['id_alternatif'])
                                                    <input
                                                        class="h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                                        name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
                                                        type="text" value="1" @readonly(true)>
                                                @else
                                                    @php
                                                        $nilai = $perhitunganAlternatif
                                                            ->where('kode_kriteria', $dataKriteria->kode_kriteria)
                                                            ->where(
                                                                'alternatif_pertama',
                                                                $alternatif1['kode_alternatif'],
                                                            )
                                                            ->where('alternatif_kedua', $alternatif2['kode_alternatif'])
                                                            ->first();
                                                    @endphp

                                                    @if ($alternatif1['id_alternatif'] < $alternatif2['id_alternatif'])
                                                        <select
                                                            class="matriks h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                            id="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]""
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
                                                            data-row="{{ $alternatif1['kode_alternatif'] }}"
                                                            data-col="{{ $alternatif2['kode_alternatif'] }}">

                                                            <option selected></option>
                                                            @foreach ($intensitasKepentingan as $itemIntesitasKepentingan)
                                                                <option value="{{ $itemIntesitasKepentingan['key'] }}"
                                                                    {{ $itemIntesitasKepentingan['key'] == $itemIntesitasKepentingan['value'] ? 'selected' : '' }}>
                                                                    {{ $itemIntesitasKepentingan['value'] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <input
                                                            class="matriksHasil h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
                                                            data-row="{{ $alternatif1['kode_alternatif'] }}"
                                                            data-col="{{ $alternatif2['kode_alternatif'] }}"
                                                            type="text"
                                                            value="{{ $nilai ? $nilai->nilai_alternatif : '0' }}"
                                                            @readonly(true)>
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            @endforeach

            <div class="flex justify-end">
                <x-atoms.button.button-primary :type="'submit'" :name="'Hitung Perbandingan Pegawai'" />
            </div>
        </form>
    @endif

</x-app-dashboard>
