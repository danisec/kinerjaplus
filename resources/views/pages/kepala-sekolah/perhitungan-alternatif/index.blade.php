<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Perbandingan Karyawan Tahun Ajaran
                    {!! $tahunAjaran !!}</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form action="{{ route('perhitunganAlternatif.store') }}" method="POST">
        @csrf

        @foreach ($kriteria as $dataKriteria)
            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="table-alternatif w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ count($alternatif) + 1 }}">
                                Perbandingan Antar
                                Karyawan Berdasarkan Kriteria : {{ $dataKriteria->nama_kriteria }}
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Nama Alternatif
                            </th>

                            @foreach ($alternatif as $key => $itemAlternatif)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $itemAlternatif['nama_alternatif'] }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    @if ($perhitunganAlternatif == null)
                        <tbody>
                            @foreach ($alternatif as $item)
                                <tr class="border-b bg-white">
                                    <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                        scope="row">
                                        {{ $item['nama_alternatif'] }}
                                    </th>

                                    @foreach ($alternatif as $comparison)
                                        <td class="border px-3 py-4 text-center">
                                            @if ($item['id_alternatif'] == $comparison['id_alternatif'])
                                                <input
                                                    class="w-20 rounded-md border-none bg-slate-100 text-center text-emerald-500 focus:ring-slate-100"
                                                    name="matriks[{{ $tahunAjaran }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                    type="text" value="1" @readonly(true)>
                                            @else
                                                @if ($item['id_alternatif'] < $comparison['id_alternatif'])
                                                    <select
                                                        class="matriks w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                        id="matriks[{{ $tahunAjaran }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                        name="matriks[{{ $tahunAjaran }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                        data-row="{{ $item['kode_alternatif'] }}"
                                                        data-col="{{ $comparison['kode_alternatif'] }}"
                                                        @required(true)>

                                                        <option selected disabled></option>
                                                        @for ($i = 1; $i <= 9; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                @else
                                                    <input
                                                        class="matriksHasil w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                        name="matriks[{{ $tahunAjaran }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                        data-row="{{ $item['kode_alternatif'] }}"
                                                        data-col="{{ $comparison['kode_alternatif'] }}" type="text"
                                                        value="0" @readonly(true)>
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
                                    <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                        scope="row">
                                        {{ $alternatif1['nama_alternatif'] }}
                                    </th>
                                    @foreach ($alternatif as $alternatif2)
                                        <td class="px-3 py-3 text-center">
                                            @if ($alternatif1['id_alternatif'] == $alternatif2['id_alternatif'])
                                                <input
                                                    class="w-20 rounded-md border-none bg-slate-100 text-center text-emerald-500 focus:ring-slate-100"
                                                    name="matriks[{{ $tahunAjaran }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
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
                                                    <select
                                                        class="matriks w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                        id="matriks[{{ $tahunAjaran }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]""
                                                        name="matriks[{{ $tahunAjaran }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
                                                        data-row="{{ $alternatif1['kode_alternatif'] }}"
                                                        data-col="{{ $alternatif2['kode_alternatif'] }}">

                                                        <option selected disabled></option>
                                                        @for ($i = 1; $i <= 9; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $nilai && $nilai->nilai_alternatif == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                @else
                                                    <input
                                                        class="matriksHasil w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                        name="matriks[{{ $tahunAjaran }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
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
                        </tbody>
                    @endif

                </table>
            </div>
        @endforeach

        <div class="flex justify-end">
            <x-atoms.button.button-primary :customClass="'h-12 w-64 rounded-md'" :type="'submit'" :name="'Hitung Perbandingan Karyawan'" />
        </div>
    </form>

</x-layouts.app-dashboard>
