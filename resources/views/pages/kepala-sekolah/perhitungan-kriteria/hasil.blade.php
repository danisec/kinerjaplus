<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('perhitunganKriteria.index') }}">Perbandingan Kriteria</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Hasil Perbandingan Kriteria</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div>
        <div
            class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="text-base capitalize text-gray-900">
                    <tr>
                        <th class="border-b py-2 text-center" colspan="{{ count($kriteria) + 1 }}">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Perhitungan Perbandingan
                                Antar Kriteria</p>
                        </th>
                    </tr>

                    <tr>
                        <th class="px-6 py-3" scope="col">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Kriteria</p>
                        </th>

                        @foreach ($kriteria as $item)
                            <th class="px-3 py-3 text-center" scope="col">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    {{ $item->nama_kriteria }}
                                </p>
                            </th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kriteria as $kriteria1)
                        <tr class="border-b bg-white">
                            <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72" scope="row">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    {{ $kriteria1->nama_kriteria }}
                                </p>
                            </th>

                            @foreach ($kriteria as $kriteria2)
                                <td class="px-3 py-3 text-center">
                                    @if ($kriteria1->id_kriteria == $kriteria2->id_kriteria)
                                        <input
                                            class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                            type="text" value="1" readonly>
                                    @else
                                        @php
                                            $nilai = $perhitunganKriteria
                                                ->where('kriteria_pertama', $kriteria1->kode_kriteria)
                                                ->where('kriteria_kedua', $kriteria2->kode_kriteria)
                                                ->first();
                                        @endphp
                                        <input
                                            class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                            name="matriks[{{ $kriteria1->kode_kriteria }}][{{ $kriteria2->kode_kriteria }}]"
                                            type="text" value="{{ $nilai ? $nilai->nilai_kriteria : '' }}" readonly>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach

                    <th class="h-12 w-28 whitespace-nowrap bg-slate-50 px-6 py-4 font-semibold">
                        <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                            Total Kolom
                        </p>
                    </th>

                    @foreach ($totalKolomKriteria as $item)
                        <td class="bg-slate-50 px-3 py-3 text-center">
                            <input
                                class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center font-semibold text-gray-700 focus:ring-slate-100 dark:text-gray-400"
                                type="text" value="{{ $item }}" readonly>
                        </td>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div
            class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="text-base capitalize text-gray-900">
                    <tr>
                        <th class="border-b py-2 text-center" colspan="{{ count($kriteria) + 1 }}">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Normalisasi Matriks
                                Kriteria</p>
                        </th>
                    </tr>

                    <tr>
                        <th class="px-6 py-3" scope="col">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Kriteria</p>
                        </th>

                        @foreach ($kriteria as $item)
                            <th class="px-3 py-3 text-center" scope="col">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    {{ $item->nama_kriteria }}
                                </p>
                            </th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kriteria as $kriteria1)
                        <tr class="border-b bg-white">
                            <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72" scope="row">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    {{ $kriteria1->nama_kriteria }}
                                </p>
                            </th>

                            @foreach ($kriteria as $kriteria2)
                                <td class="px-3 py-3 text-center">
                                    @php
                                        $normalisasiValue =
                                            $normalisasiMatriks[$kriteria1->id_kriteria][$kriteria2->id_kriteria] ?? '';
                                    @endphp

                                    <input
                                        class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                        name="matriks[{{ $kriteria1->id_kriteria }}][{{ $kriteria2->id_kriteria }}]"
                                        type="text" value="{{ $normalisasiValue }}" readonly>
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
                        <th class="border-b py-2 text-center" colspan="{{ count($kriteria) + 1 }}">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Perhitungan Prioritas dan
                                Consistency Measure (CM)</p>
                        </th>
                    </tr>

                    <tr>
                        <th class="px-6 py-3" scope="col">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Kriteria</p>
                        </th>

                        <th class="px-3 py-3 text-center" scope="col">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">Bobot Prioritas</p>
                        </th>

                        <th class="px-3 py-3 text-center" scope="col">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">Consistency Measure
                            </p>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($kriteria as $kriteria1)
                        <tr class="border-b bg-white">
                            <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72" scope="row">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    {{ $kriteria1->nama_kriteria }}
                                </p>
                            </th>

                            <td class="px-3 py-3 text-center">
                                <input
                                    class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                    type="text" value="{{ $bobotPrioritasKriteria[$kriteria1->id_kriteria] }}"
                                    readonly>
                            </td>

                            <td class="px-3 py-3 text-center">
                                <input
                                    class="xs:text-xs sm:text-theme-md h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                    type="text" value="{{ $consistencyMeasures[$kriteria1->id_kriteria] }}"
                                    readonly>
                            </td>

                        </tr>
                    @endforeach

                    <th
                        class="xs:text-sm sm:text-theme-md w-12 whitespace-nowrap bg-slate-50 px-6 py-4 font-semibold text-gray-700 dark:text-gray-400">
                        Total Kolom
                    </th>

                    <td class="bg-slate-50 px-3 py-3 text-center">
                    </td>

                    <td class="bg-slate-50 px-3 py-3 text-center">
                        <input
                            class="xs:text-xs sm:text-theme-md w-20 rounded-md border-none bg-slate-50 text-center font-semibold text-gray-700 focus:ring-slate-100 dark:text-gray-400"
                            type="text" value="{{ $totalConsistencyMeasures }}" readonly>
                    </td>
                </tbody>
            </table>
        </div>

        <div
            class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="text-base capitalize text-gray-900">
                    <tr>
                        <th class="border-b py-2 text-center font-bold text-gray-900"
                            colspan="{{ count($kriteria) + 1 }}">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Consistency Ratio (CR)</p>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($consistencyData as $keyConsistency => $valueConsistency)
                        <tr class="border-b bg-white">
                            <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium lg:w-72" scope="row">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    {{ $keyConsistency }}
                                </p>
                            </th>

                            <td class="px-3 py-3 text-center">
                                <input
                                    class="xs:text-xs sm:text-theme-md h-12 w-96 rounded-md border-none bg-slate-50 text-center text-gray-700 focus:ring-slate-100 dark:text-gray-400"
                                    type="text" value="{{ $valueConsistency }}" readonly>
                            </td>
                        </tr>
                    @endforeach

                    <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium text-gray-900 lg:w-72">
                        <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nilai CR (Consistency Ratio)
                            Dinyatakan</p>
                    </th>

                    <td class="px-3 py-3 text-center">
                        <input
                            class="{{ $consistencyData['Consistency Ratio (CR)'] <= 0.1 ? 'bg-green-500 focus:ring-green-500' : 'bg-red-500 focus:ring-red-500' }} xs:text-xs sm:text-theme-md h-12 w-96 rounded-md border-none text-center text-white focus:ring-2 focus:ring-offset-1"
                            type="text" value="{{ $consistencyResult }}" readonly>
                    </td>
                </tbody>
            </table>
        </div>

        @if (Auth::user()->hasRole('superadmin'))
            @if ($consistencyData['Consistency Ratio (CR)'] <= 0.1)
                <div class="flex justify-end">
                    <a href="{{ route('perhitunganSubkriteria.index') }}">
                        <x-atoms.button.button-primary :type="'button'" :name="'Lanjutkan ke Perbandingan Subkriteria'" />
                    </a>
                </div>
            @else
                <div class="flex justify-start">
                    <a href="{{ route('perhitunganKriteria.index') }}">
                        <x-atoms.button.button-primary :type="'button'" :name="'Kembali ke Perbandingan Kriteria'" />
                    </a>
                </div>
            @endif
        @endif
    </div>

</x-app-dashboard>
