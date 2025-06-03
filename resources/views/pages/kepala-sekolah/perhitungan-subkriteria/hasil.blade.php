<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('perhitunganSubkriteria.index') }}">Perbandingan Subriteria</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Hasil Perbandingan Subkriteria</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div>
        @foreach ($subkriteria as $kodeKriteria => $subkriteriaItems)
            <div
                class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b py-2 text-center font-bold text-gray-900"
                                colspan="{{ $subkriteriaItems->count() + 1 }}">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Perbandingan Antar
                                    Subkriteria -
                                    {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}</p>
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Subkriteria</p>
                            </th>

                            @foreach ($subkriteriaItems as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $item->nama_subkriteria }}
                                    </p>
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($subkriteriaItems as $subkriteria1)
                            <tr class="border-b bg-white">
                                <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72" scope="row">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $subkriteria1->nama_subkriteria }}
                                    </p>
                                </th>

                                @foreach ($subkriteriaItems as $subkriteria2)
                                    <td class="px-3 py-3 text-center">
                                        @if ($subkriteria1->id_subkriteria == $subkriteria2->id_subkriteria)
                                            <input
                                                class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                                type="text" value="1" readonly>
                                        @else
                                            @php
                                                $nilai = $perhitunganSubkriteria
                                                    ->where('subkriteria_pertama', $subkriteria1->kode_subkriteria)
                                                    ->where('subkriteria_kedua', $subkriteria2->kode_subkriteria)
                                                    ->first();
                                            @endphp
                                            <input
                                                class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                name="matriks[{{ $subkriteria1->kode_subkriteria }}][{{ $subkriteria2->kode_subkriteria }}]"
                                                type="text" value="{{ $nilai ? $nilai->nilai_subkriteria : '' }}"
                                                readonly>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach

                        <th class="w-12 whitespace-nowrap bg-slate-50 px-6 py-4 font-semibold">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                Total Kolom
                            </p>
                        </th>

                        @foreach ($totalKolomSubkriteria[$kodeKriteria] as $item)
                            <td class="bg-slate-50 px-3 py-3 text-center">
                                <input
                                    class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center font-semibold focus:ring-slate-100"
                                    type="text" value="{{ $item }}" readonly>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

        @foreach ($subkriteria as $kodeKriteria => $subkriteriaItems)
            <div
                class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b py-2 text-center font-bold text-gray-900"
                                colspan="{{ $subkriteriaItems->count() + 1 }}">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Normalisasi Matriks
                                    Subkriteria -
                                    {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}</p>
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Subkriteria</p>
                            </th>

                            @foreach ($subkriteriaItems as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $item->nama_subkriteria }}
                                    </p>
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($subkriteriaItems as $subkriteria1)
                            <tr class="border-b bg-white">
                                <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72" scope="row">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $subkriteria1->nama_subkriteria }}
                                    </p>
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
                                            class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
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
            <div
                class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b py-2 text-center font-bold"
                                colspan="{{ $subkriteriaItems->count() + 2 }}">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Perhitungan Prioritas
                                    dan Consistency Measure (CM) -
                                    {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}</p>
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Subkriteria</p>
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    Bobot Prioritas
                                </p>
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    Consistency Measure
                                </p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($subkriteriaItems as $subkriteria1)
                            <tr class="border-b bg-white">
                                <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72" scope="row">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $subkriteria1->nama_subkriteria }}
                                    </p>
                                </th>

                                <td class="px-3 py-3 text-center">
                                    <input
                                        class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                        type="text"
                                        value="{{ $bobotPrioritasSubkriteria[$kodeKriteria][$subkriteria1->id_subkriteria] }}"
                                        readonly>
                                </td>

                                <td class="px-3 py-3 text-center">
                                    <input
                                        class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                        type="text"
                                        value="{{ $consistencyMeasures[$kodeKriteria][$subkriteria1->id_subkriteria] }}"
                                        readonly>
                                </td>
                            </tr>
                        @endforeach

                        <th class="w-12 whitespace-nowrap bg-slate-50 px-6 py-4 font-semibold">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                Total Kolom
                            </p>
                        </th>

                        <td class="bg-slate-50 px-3 py-3 text-center">
                            <input
                                class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center font-semibold focus:ring-slate-100"
                                type="text" value="{{ number_format($totalBobotPrioritas[$kodeKriteria], 4) }}"
                                readonly>
                        </td>

                        <td class="bg-slate-50 px-3 py-3 text-center">
                            <input
                                class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center font-semibold focus:ring-slate-100"
                                type="text" value="{{ number_format($totalConsistencyMeasures[$kodeKriteria], 4) }}"
                                readonly>
                        </td>
                    </tbody>
                </table>
            </div>
        @endforeach

        @foreach ($subkriteria as $kodeKriteria => $subkriteriaItems)
            <div
                class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b py-2 text-center font-bold text-gray-900"
                                colspan="{{ $subkriteriaItems->count() + 1 }}">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Consistency Ratio (CR)
                                    - {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}</p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($consistencyRatio as $index => $item)
                            <tr class="border-b bg-white">
                                <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72" scope="row">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $index }}
                                    </p>
                                </th>

                                <td class="px-3 py-3 text-center">
                                    <input
                                        class="xs:text-xs sm:text-theme-md h-12 w-96 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                        type="text" value="{{ $item[$kodeKriteria] }}" readonly>
                                </td>
                            </tr>
                        @endforeach

                        <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                Nilai CR (Consistency Ratio) Dinyatakan
                            </p>
                        </th>

                        <td class="px-3 py-3 text-center">
                            <input
                                class="{{ $consistencyRatio['Consistency Ratio (CR)'][$kodeKriteria] <= 0.1 ? 'bg-green-500 focus:ring-green-500' : 'bg-red-500 focus:ring-red-500' }} xs:text-xs sm:text-theme-md h-12 w-96 rounded-md border-none text-center text-white focus:ring-2 focus:ring-offset-1"
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
                        <x-atoms.button.button-primary :type="'button'" :name="'Kembali ke Perbandingan Subkriteria'" />
                    </a>
                </div>
            @endif
        @endif

    </div>

</x-app-dashboard>
