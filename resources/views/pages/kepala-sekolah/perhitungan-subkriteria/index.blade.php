<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Perbandingan Subkriteria</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="xs:bg-slate-50 my-6 w-full rounded-md p-4 lg:bg-white">
        <a class="xs:text-xs font-medium text-gray-900 underline hover:text-blue-600 sm:text-base"
            href="{{ route('perhitunganSubkriteria.pedoman') }}" target="_blank" rel="noopener noreferrer">
            Pedoman cara pengisian matriks perbandingan berpasangan
            (<span class="italic">pairwise comparison</span>).
        </a>
    </div>

    <div class="my-8">
        <div class="flex flex-row items-center justify-end">
            @can('direct.permission', 'perbandingan subkriteria')
                <div x-data="{ isOpen: false }">
                    <x-atoms.button.button-secondary :customClass="'h-12 w-64 rounded-md'" :type="'button'" :name="'Reset Perbandingan Subkriteria'"
                        @click="isOpen = true" />

                    <x-molecules.modal.modal-delete :heading="'Konfirmasi Reset'" :title="'Apakah Anda yakin ingin reset perbandingan subkriteria?'" :deleteNameButton="'Reset'"
                        :action="route('perhitunganSubkriteria.destroy')" />
                </div>
            @endcan
        </div>
    </div>

    <form action="{{ route('perhitunganSubkriteria.store') }}" method="POST">
        @csrf
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
                                    {{ $subkriteriaItems->first()->kriteria->nama_kriteria }}
                                </p>
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Subkriteria
                                </p>
                            </th>

                            @foreach ($subkriteriaItems as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    <p class="xs:text-sm text-gray-700 sm:text-sm dark:text-gray-400">
                                        {{ $item->nama_subkriteria }}
                                    </p>
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    @if ($perhitunganSubkriteria->isEmpty())
                        <tbody>
                            @foreach ($subkriteriaItems as $item)
                                <tr class="border-b bg-white">
                                    <th class="xs:w-28 h-12 bg-slate-50 px-6 py-4 font-medium text-gray-900 lg:w-72"
                                        scope="row">
                                        <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                            {{ $item->nama_subkriteria }}
                                        </p>
                                    </th>

                                    @foreach ($subkriteriaItems as $comparison)
                                        <td class="border px-3 py-4 text-center">
                                            @if ($item->id_subkriteria == $comparison->id_subkriteria)
                                                <input
                                                    class="h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                                    name="matriks[{{ $item->kode_kriteria }}][{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                    type="text" value="1" @readonly(true)>
                                            @else
                                                @if ($item->id_subkriteria < $comparison->id_subkriteria)
                                                    <input
                                                        class="matriksHasil h-12 w-28 rounded-md border-none bg-slate-50 text-center focus:ring-slate-100"
                                                        name="matriks[{{ $item->kode_kriteria }}][{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        data-row="{{ $item->kode_subkriteria }}"
                                                        data-col="{{ $comparison->kode_subkriteria }}" type="text"
                                                        value="" @readonly(true)>

                                                    <select
                                                        class="matriksHasil h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                        id="matriks[{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        name="matriks[{{ $item->kode_kriteria }}][{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        data-row="{{ $item->kode_subkriteria }}"
                                                        data-col="{{ $comparison->kode_subkriteria }}">

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
                                                        name="matriks[{{ $item->kode_kriteria }}][{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        data-row="{{ $item->kode_subkriteria }}"
                                                        data-col="{{ $comparison->kode_subkriteria }}" type="text"
                                                        value="" @readonly(true)>

                                                    <select
                                                        class="matriksHasil h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                        id="matriks[{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        name="matriks[{{ $item->kode_kriteria }}][{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        data-row="{{ $item->kode_subkriteria }}"
                                                        data-col="{{ $comparison->kode_subkriteria }}">

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
                                                    class="h-12 w-28 rounded-md border-none bg-slate-50 text-center text-emerald-500 focus:ring-slate-100"
                                                    name="matriks[{{ $subkriteria1->kode_subkriteria }}][{{ $subkriteria2->kode_subkriteria }}]"
                                                    type="text" value="1" @readonly(true)>
                                            @else
                                                @php
                                                    $nilai = $perhitunganSubkriteria
                                                        ->where('subkriteria_pertama', $subkriteria1->kode_subkriteria)
                                                        ->where('subkriteria_kedua', $subkriteria2->kode_subkriteria)
                                                        ->first();
                                                @endphp

                                                @if ($subkriteria1->id_subkriteria < $subkriteria2->id_subkriteria && $nilai == null)
                                                    <select
                                                        class="h-12 w-28 rounded-md border border-slate-300 focus:bg-slate-50 focus:ring-slate-100"
                                                        id="matriks[{{ $subkriteria1->kode_subkriteria }}][{{ $subkriteria2->kode_subkriteria }}]"
                                                        name="matriks[{{ $subkriteria1->kode_subkriteria }}][{{ $subkriteria2->kode_subkriteria }}]"
                                                        data-row="{{ $subkriteria1->kode_subkriteria }}"
                                                        data-col="{{ $subkriteria2->kode_subkriteria }}">

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
                                                        name="matriks[{{ $subkriteria1->kode_subkriteria }}][{{ $subkriteria2->kode_subkriteria }}]"
                                                        data-row="{{ $subkriteria1->kode_subkriteria }}"
                                                        data-col="{{ $subkriteria2->kode_subkriteria }}" type="text"
                                                        value="{{ $nilai ? $nilai->nilai_subkriteria : '0' }}"
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
            @if ($perhitunganSubkriteria->isEmpty())
                <div x-data="{ isOpen: false }">
                    <x-atoms.button.button-primary :customClass="'h-12 w-72 rounded-md'" :type="'button'" :name="'Hitung Perbandingan Subkriteria'"
                        @click="isOpen = true" />

                    <x-molecules.modal.modal-confirm :title="'Perbandingan antar subkriteria hanya dapat dilakukan 1 kali simpan. Setelahnya Anda tidak dapat melakukan ubah nilai pada perbandingan antar subkriteria.'" />
                </div>
            @else
                <a href="{{ route('perhitunganSubkriteria.hasil') }}">
                    <x-atoms.button.button-primary :customClass="'h-12 w-80 rounded-md'" :type="'button'" :name="'Hasil Perbandingan Subkriteria'" />
                </a>
            @endif
        </div>
    </form>

</x-app-dashboard>
