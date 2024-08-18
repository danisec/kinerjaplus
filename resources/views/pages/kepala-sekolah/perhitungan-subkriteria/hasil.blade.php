<x-app-dashboard title="{{ $title }}">

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

        @foreach ($subkriteria as $kodeKriteria => $subkriteriaItems)
            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ $subkriteriaItems->count() + 1 }}">
                                Perbandingan Antar Subkriteria -
                                {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Nama Sub kriteria
                            </th>

                            @foreach ($subkriteriaItems as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $item->nama_subkriteria }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($subkriteriaItems as $subkriteria1)
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    {{ $subkriteria1->nama_subkriteria }}
                                </th>

                                @foreach ($subkriteriaItems as $subkriteria2)
                                    <td class="px-3 py-3 text-center">
                                        @if ($subkriteria1->id_subkriteria == $subkriteria2->id_subkriteria)
                                            <input
                                                class="w-20 rounded-md border-none bg-slate-100 text-center text-emerald-500 focus:ring-slate-100"
                                                type="text" value="1" readonly>
                                        @else
                                            @php
                                                $nilai = $perhitunganSubkriteria
                                                    ->where('subkriteria_pertama', $subkriteria1->kode_subkriteria)
                                                    ->where('subkriteria_kedua', $subkriteria2->kode_subkriteria)
                                                    ->first();
                                            @endphp
                                            <input
                                                class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                name="matriks[{{ $subkriteria1->kode_subkriteria }}][{{ $subkriteria2->kode_subkriteria }}]"
                                                type="text" value="{{ $nilai ? $nilai->nilai_subkriteria : '' }}"
                                                readonly>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                        <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-semibold text-gray-900">
                            Total Kolom
                        </th>

                        @foreach ($totalKolomSubkriteria[$kodeKriteria] as $item)
                            <td class="bg-slate-100 px-3 py-3 text-center">
                                <input
                                    class="w-24 rounded-md border-none bg-slate-100 text-center font-semibold focus:ring-slate-100"
                                    type="text" value="{{ $item }}" readonly>
                            </td>
                        @endforeach
                    </tbody>

                </table>
            </div>
        @endforeach

        @foreach ($subkriteria as $kodeKriteria => $subkriteriaItems)
            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ $subkriteriaItems->count() + 1 }}">
                                Normalisasi Matriks Sub kriteria -
                                {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Nama Sub kriteria
                            </th>

                            @foreach ($subkriteriaItems as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $item->nama_subkriteria }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($subkriteriaItems as $subkriteria1)
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    {{ $subkriteria1->nama_subkriteria }}
                                </th>

                                @foreach ($subkriteriaItems as $subkriteria2)
                                    <td class="px-3 py-3 text-center">
                                        @php
                                            $normalisasiValue =
                                                $normalisasiMatriks[$kodeKriteria][$subkriteria1->id_subkriteria][
                                                    $subkriteria2->id_subkriteria
                                                ];
                                        @endphp

                                        <input
                                            class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                            name="matriks[{{ $kodeKriteria }}][{{ $subkriteria1->id_subkriteria }}][{{ $subkriteria2->id_subkriteria }}]"
                                            type="text" value="{{ number_format($normalisasiValue, 4) }}" readonly>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        @endforeach

        @foreach ($subkriteria as $kodeKriteria => $subkriteriaItems)
            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ $subkriteriaItems->count() + 1 }}">
                                Perhitungan Prioritas dan Consistency Measure (CM) -
                                {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Nama Sub kriteria
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                Bobot Prioritas
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                Consistency Measure
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($subkriteriaItems as $subkriteria1)
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    {{ $subkriteria1->nama_subkriteria }}
                                </th>

                                <td class="px-3 py-3 text-center">
                                    <input
                                        class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                        type="text"
                                        value="{{ $bobotPrioritasSubkriteria[$kodeKriteria][$subkriteria1->id_subkriteria] }}"
                                        readonly>
                                </td>

                                <td class="px-3 py-3 text-center">
                                    <input
                                        class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                        type="text"
                                        value="{{ $consistencyMeasures[$kodeKriteria][$subkriteria1->id_subkriteria] }}"
                                        readonly>
                                </td>
                            </tr>
                        @endforeach

                        <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-semibold text-gray-900">
                            Total Kolom
                        </th>

                        <td class="bg-slate-100 px-3 py-3 text-center">
                            <input
                                class="w-20 rounded-md border-none bg-slate-100 text-center font-semibold focus:ring-slate-100"
                                type="text" value="{{ number_format($totalBobotPrioritas[$kodeKriteria], 4) }}"
                                readonly>
                        </td>

                        <td class="bg-slate-100 px-3 py-3 text-center">
                            <input
                                class="w-20 rounded-md border-none bg-slate-100 text-center font-semibold focus:ring-slate-100"
                                type="text" value="{{ number_format($totalConsistencyMeasures[$kodeKriteria], 4) }}"
                                readonly>
                        </td>
                    </tbody>

                </table>
            </div>
        @endforeach

        @foreach ($subkriteria as $kodeKriteria => $subkriteriaItems)
            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ $subkriteriaItems->count() + 1 }}">
                                Consistency Ratio (CR) - {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($consistencyRatio as $index => $item)
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    {{ $index }}
                                </th>

                                <td class="px-3 py-3">
                                    <input
                                        class="w-full rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                        type="text" value="{{ $item[$kodeKriteria] }}" readonly>
                                </td>
                            </tr>
                        @endforeach

                        <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900">
                            Nilai CR (Consistency Ratio) Dinyatakan
                        </th>

                        <td class="px-3 py-3">
                            <input
                                class="{{ $consistencyRatio['Consistency Ratio (CR)'][$kodeKriteria] <= 0.1 ? 'bg-green-500 focus:ring-green-500' : 'bg-red-500 focus:ring-red-500' }} w-full rounded-md border-none text-center text-white focus:ring-2 focus:ring-offset-1"
                                type="text" value="{{ $consistencyResult[$kodeKriteria] }}" readonly>
                        </td>
                    </tbody>

                </table>
            </div>
        @endforeach

        @if (Auth::user()->hasRole('superadmin'))
            @if ($consistencyRatio['Consistency Ratio (CR)'][$kodeKriteria] >= 0.1)
                <div class="flex justify-start">
                    <a href="{{ route('perhitunganSubkriteria.index') }}">
                        <x-atoms.button.button-primary :customClass="'h-12 w-80 rounded-md'" :type="'button'" :name="'Kembali ke Perbandingan Subkriteria'" />
                    </a>
                </div>
            @endif
        @endif

    </div>

</x-app-dashboard>
