<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                @if ($checkTanggalPenilaian != null)
                    <span class="mx-2 text-base font-medium capitalize text-gray-500">Perbandingan Pegawai Tahun Ajaran
                        {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</span>
                @else
                    <span class="mx-2 text-base font-medium text-gray-500">Perbandingan Pegawai Tahun Ajaran
                        {!! $tahunAjaran !!}</span>
                @endif
            </div>
        </li>
    </x-molecules.breadcrumb>

    @if ($checkTanggalPenilaian == null)
        <div class="my-8 w-full rounded-md bg-slate-100 p-8">
            <p class="text-base font-medium text-gray-900">Perbandingan Antar Pegawai Berdasarkan Kriteria Telah
                Berakhir.</p>
        </div>
    @else
        <form action="{{ route('perhitunganAlternatif.store') }}" method="POST">
            @csrf

            <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                <a class="text-base font-medium text-gray-900 underline hover:text-blue-600"
                    href="{{ route('perhitunganAlternatif.pedoman') }}" target="_blank" rel="noopener noreferrer">
                    Lihat pedoman cara pengisian matriks perbandingan berpasangan
                    (<span class="italic">pairwise comparison</span>).
                </a>
            </div>

            @foreach ($kriteria as $dataKriteria)
                <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                    <table class="table-alternatif w-full text-left text-base text-gray-900">
                        <thead class="bg-slate-100 text-base capitalize text-gray-900">
                            <tr>
                                <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                    colspan="{{ count($alternatif) + 1 }}">
                                    Perbandingan Antar
                                    Pegawai Berdasarkan Kriteria : {{ $dataKriteria->nama_kriteria }}
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

                        @if ($perhitunganAlternatif->isEmpty())
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
                                                        name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                        type="text" value="1" @readonly(true)>
                                                @else
                                                    @if ($item['id_alternatif'] < $comparison['id_alternatif'])
                                                        <input
                                                            class="matriksHasil w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            data-row="{{ $item['kode_alternatif'] }}"
                                                            data-col="{{ $comparison['kode_alternatif'] }}"
                                                            type="text" value="" @readonly(true)>

                                                        <select
                                                            class="matriksHasil matriks w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                            id="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            data-row="{{ $item['kode_alternatif'] }}"
                                                            data-col="{{ $comparison['kode_alternatif'] }}">

                                                            <option selected></option>
                                                            @for ($i = 1; $i <= 9; $i++)
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
                                                        </select>
                                                    @else
                                                        <input
                                                            class="matriksHasil w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            data-row="{{ $item['kode_alternatif'] }}"
                                                            data-col="{{ $comparison['kode_alternatif'] }}"
                                                            type="text" value="" @readonly(true)>

                                                        <select
                                                            class="matriksHasil matriks w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                            id="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $item['kode_alternatif'] }}][{{ $comparison['kode_alternatif'] }}]"
                                                            data-row="{{ $item['kode_alternatif'] }}"
                                                            data-col="{{ $comparison['kode_alternatif'] }}">

                                                            <option selected></option>
                                                            @for ($i = 1; $i <= 9; $i++)
                                                                <option value="{{ $i }}">
                                                                    {{ $i }}
                                                                </option>
                                                            @endfor
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
                                        <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                            scope="row">
                                            {{ $alternatif1['nama_alternatif'] }}
                                        </th>
                                        @foreach ($alternatif as $alternatif2)
                                            <td class="px-3 py-3 text-center">
                                                @if ($alternatif1['id_alternatif'] == $alternatif2['id_alternatif'])
                                                    <input
                                                        class="w-20 rounded-md border-none bg-slate-100 text-center text-emerald-500 focus:ring-slate-100"
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
                                                            class="matriks w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                            id="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]""
                                                            name="matriks[{{ $idTanggalPenilaian }}][{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1['kode_alternatif'] }}][{{ $alternatif2['kode_alternatif'] }}]"
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
                <x-atoms.button.button-primary :customClass="'h-12 w-72 rounded-md'" :type="'submit'" :name="'Hitung Perbandingan Pegawai'" />
            </div>
        </form>
    @endif


</x-app-dashboard>
