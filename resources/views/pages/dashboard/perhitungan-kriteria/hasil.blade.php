<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('perhitunganKriteria.index') }}">Perbandingan Kriteria</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Hasil Perbandingan Kriteria</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div>

        <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="bg-slate-100 text-base capitalize text-gray-900">
                    <p class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900">Perhitungan Perbandingan
                        Antar
                        Kriteria
                    </p>

                    <tr>
                        <th class="px-6 py-3" scope="col">
                            Nama Kriteria
                        </th>

                        @foreach ($kriteria as $item)
                            <th class="px-3 py-3 text-center" scope="col">
                                {{ $item->nama_kriteria }}
                            </th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kriteria as $kriteria1)
                        <tr class="border-b bg-white">
                            <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                scope="row">
                                {{ $kriteria1->nama_kriteria }}
                            </th>

                            @foreach ($kriteria as $kriteria2)
                                <td class="px-3 py-3 text-center">
                                    @if ($kriteria1->id_kriteria == $kriteria2->id_kriteria)
                                        <input
                                            class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                            type="text" value="1" readonly>
                                    @else
                                        @php
                                            $nilai = $perhitunganKriteria
                                                ->where('kriteria_pertama', $kriteria1->kode_kriteria)
                                                ->where('kriteria_kedua', $kriteria2->kode_kriteria)
                                                ->first();
                                        @endphp
                                        <input
                                            class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                            name="matriks[{{ $kriteria1->kode_kriteria }}][{{ $kriteria2->kode_kriteria }}]"
                                            type="text" value="{{ $nilai ? $nilai->nilai_kriteria : '' }}" readonly>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                    <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-semibold text-gray-900">
                        Total Kolom
                    </th>

                    @foreach ($columnTotals as $item)
                        <td class="bg-slate-100 px-3 py-3 text-center">
                            <input
                                class="w-20 rounded-md border-none bg-slate-100 text-center font-semibold focus:ring-slate-100"
                                type="text" value="{{ $item }}" readonly>
                        </td>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="bg-slate-100 text-base capitalize text-gray-900">
                    <p class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900">Normalisasi Matriks
                        Kriteria
                    </p>

                    <tr>
                        <th class="px-6 py-3" scope="col">
                            Nama Kriteria
                        </th>

                        @foreach ($kriteria as $item)
                            <th class="px-3 py-3 text-center" scope="col">
                                {{ $item->nama_kriteria }}
                            </th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kriteria as $kriteria1)
                        <tr class="border-b bg-white">
                            <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                scope="row">
                                {{ $kriteria1->nama_kriteria }}
                            </th>

                            @foreach ($kriteria as $kriteria2)
                                <td class="px-3 py-3 text-center">
                                    @php
                                        $normalizedValue = $normalizedMatrix[$kriteria1->id_kriteria][$kriteria2->id_kriteria] ?? '';
                                    @endphp

                                    <input
                                        class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                        name="matriks[{{ $kriteria1->id_kriteria }}][{{ $kriteria2->id_kriteria }}]"
                                        type="text" value="{{ $normalizedValue }}" readonly>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="bg-slate-100 text-base capitalize text-gray-900">
                    <p class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900">Perhitungan Prioritas dan
                        Consistency Measure (CM)
                    </p>

                    <tr>
                        <th class="px-6 py-3" scope="col">
                            Nama Kriteria
                        </th>

                        <th class="px-3 py-3 text-center" scope="col">
                            Prioritas
                        </th>

                        <th class="px-3 py-3 text-center" scope="col">
                            Consistency Measure
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kriteria as $kriteria1)
                        <tr class="border-b bg-white">
                            <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                scope="row">
                                {{ $kriteria1->nama_kriteria }}
                            </th>

                            <td class="px-3 py-3 text-center">
                                <input class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                    type="text" value="{{ number_format($prioritas[$kriteria1->id_kriteria], 4) }}"
                                    readonly>
                            </td>

                            <td class="px-3 py-3 text-center">
                                <input class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                    type="text"
                                    value="{{ number_format($consistencyMeasures[$kriteria1->id_kriteria], 4) }}"
                                    readonly>
                            </td>

                        </tr>
                    @endforeach

                    <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-semibold text-gray-900">
                        Total Kolom
                    </th>

                    <td class="bg-slate-100 px-3 py-3 text-center">
                    </td>

                    <td class="bg-slate-100 px-3 py-3 text-center">
                        <input
                            class="w-20 rounded-md border-none bg-slate-100 text-center font-semibold focus:ring-slate-100"
                            type="text" value="{{ number_format($totalConsistencyMeasures, 4) }}" readonly>
                    </td>
                </tbody>

            </table>
        </div>

        <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="bg-slate-100 text-base capitalize text-gray-900">
                    <tr>
                        <p class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900">Consistency Ratio (CR)
                        </p>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($consistencyData as $index => $item)
                        <tr class="border-b bg-white">
                            <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                scope="row">
                                {{ $index }}
                            </th>

                            <td class="px-3 py-3">
                                <input
                                    class="w-full rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                    type="text" value="{{ $item }}" readonly>
                            </td>
                        </tr>
                    @endforeach

                    <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900">
                        Nilai CR (Consistency Ratio) Dinyatakan
                    </th>

                    <td class="px-3 py-3">
                        <input
                            class="{{ $consistencyData['Consistency Ratio (CR)'] <= 0.1 ? 'bg-green-500 focus:ring-green-500' : 'bg-red-500 focus:ring-red-500' }} w-full rounded-md border-none text-center text-white focus:ring-2 focus:ring-offset-1"
                            type="text" value="{{ $consistencyResult }}" readonly>
                    </td>
                </tbody>

            </table>
        </div>

    </div>

</x-layouts.app-dashboard>
