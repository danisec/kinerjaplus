<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Perbandingan Kriteria</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="xs:bg-slate-50 my-6 w-full rounded-md p-4 lg:bg-white">
        <a class="xs:text-xs font-medium text-gray-900 underline hover:text-blue-600 sm:text-base"
            href="{{ route('perhitunganKriteria.pedoman') }}" target="_blank" rel="noopener noreferrer">
            Pedoman cara pengisian matriks perbandingan berpasangan
            (<span class="italic">pairwise comparison</span>).
        </a>
    </div>

    <div class="my-8">
        <div class="flex flex-row items-center justify-end">
            @can('direct.permission', 'perbandingan kriteria')
                <div x-data="{ isOpen: false }">
                    <x-atoms.button.button-secondary :customClass="'h-12 w-64 rounded-md'" :type="'button'" :name="'Reset Perbandingan Kriteria'"
                        @click="isOpen = true" />

                    <x-molecules.modal.modal-delete :heading="'Konfirmasi Reset'" :title="'Apakah Anda yakin ingin reset perbandingan kriteria?'" :deleteNameButton="'Reset'"
                        :action="route('perhitunganKriteria.destroy')" />
                </div>
            @endcan
        </div>
    </div>

    <form action="{{ route('perhitunganKriteria.store') }}" method="POST">
        @csrf
        <div
            class="my-8 overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="text-base capitalize text-gray-900">
                    <tr>
                        <th class="border-b py-2 text-center font-bold text-gray-900"
                            colspan="{{ count($kriteria) + 1 }}">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Perbandingan Antar Kriteria
                            </p>
                        </th>
                    </tr>

                    <tr>
                        <th class="px-6 py-3" scope="col">
                            <p class="xs:text-sm sm:text-theme-md whitespace-nowrap font-medium text-gray-800">Nama
                                Kriteria</p>
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

                @if ($perhitunganKriteria->isEmpty())
                    <tbody>
                        @foreach ($kriteria as $item)
                            <tr class="border-b bg-white">
                                <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 lg:w-72" scope="row">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $item->nama_kriteria }}
                                    </p>
                                </th>

                                @foreach ($kriteria as $comparison)
                                    <td class="border px-3 py-4 text-center">
                                        @if ($item->id_kriteria == $comparison->id_kriteria)
                                            <input
                                                class="h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                                name="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                type="text" value="1" @readonly(true)>
                                        @else
                                            @if ($item->id_kriteria < $comparison->id_kriteria)
                                                <input
                                                    class="matriksHasil h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                    name="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    data-row="{{ $item->kode_kriteria }}"
                                                    data-col="{{ $comparison->kode_kriteria }}" type="text"
                                                    value="" @readonly(true)>

                                                <select
                                                    class="matriksHasil h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                    id="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    name="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    data-row="{{ $item->kode_kriteria }}"
                                                    data-col="{{ $comparison->kode_kriteria }}">

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
                                                    name="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    data-row="{{ $item->kode_kriteria }}"
                                                    data-col="{{ $comparison->kode_kriteria }}" type="text"
                                                    value="" @readonly(true)>

                                                <select
                                                    class="matriksHasil h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                    id="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    name="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    data-row="{{ $item->kode_kriteria }}"
                                                    data-col="{{ $comparison->kode_kriteria }}">

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
                        @foreach ($kriteria as $kriteria1)
                            <tr class="border-b bg-white">
                                <th class="w-96 bg-slate-50 px-6 py-4 font-medium text-gray-900" scope="row">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $kriteria1->nama_kriteria }}
                                    </p>
                                </th>
                                @foreach ($kriteria as $kriteria2)
                                    <td class="px-3 py-3 text-center">
                                        @if ($kriteria1->id_kriteria == $kriteria2->id_kriteria)
                                            <input
                                                class="h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                                name="matriks[{{ $kriteria1->kode_kriteria }}][{{ $kriteria2->kode_kriteria }}]"
                                                type="text" value="1" @readonly(true)>
                                        @else
                                            @php
                                                $nilai = $perhitunganKriteria
                                                    ->where('kriteria_pertama', $kriteria1->kode_kriteria)
                                                    ->where('kriteria_kedua', $kriteria2->kode_kriteria)
                                                    ->first();
                                            @endphp

                                            @if ($kriteria1->id_kriteria < $kriteria2->id_kriteria && $nilai == null)
                                                <select
                                                    class="h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                    id="matriks[{{ $kriteria1->kode_kriteria }}][{{ $kriteria2->kode_kriteria }}]"
                                                    name="matriks[{{ $kriteria1->kode_kriteria }}][{{ $kriteria2->kode_kriteria }}]"
                                                    data-row="{{ $kriteria1->kode_kriteria }}"
                                                    data-col="{{ $kriteria2->kode_kriteria }}">

                                                    <option selected disabled></option>
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
                                                    name="matriks[{{ $kriteria1->kode_kriteria }}][{{ $kriteria2->kode_kriteria }}]"
                                                    data-row="{{ $kriteria1->kode_kriteria }}"
                                                    data-col="{{ $kriteria2->kode_kriteria }}" type="text"
                                                    value="{{ $nilai ? $nilai->nilai_kriteria : '0' }}"
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

        <div class="flex justify-end">
            @if ($perhitunganKriteria->isEmpty())
                <div x-data="{ isOpen: false }">
                    <x-atoms.button.button-primary :customClass="'h-12 w-64 rounded-md'" :type="'button'" :name="'Hitung Perbandingan Kriteria'"
                        @click="isOpen = true" />

                    <x-molecules.modal.modal-confirm :title="'Perbandingan antar kriteria hanya dapat dilakukan 1 kali simpan. Setelahnya Anda tidak dapat melakukan ubah nilai pada perbandingan antar kriteria.'" />
                </div>
            @else
                <a href="{{ route('perhitunganKriteria.hasil') }}">
                    <x-atoms.button.button-primary :customClass="'h-12 w-72 rounded-md'" :type="'button'" :name="'Hasil Perbandingan Kriteria'" />
                </a>
            @endif
        </div>
    </form>

</x-app-dashboard>
