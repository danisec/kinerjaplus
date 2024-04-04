<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Perbandingan Subkriteria</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form action="{{ route('perhitunganSubkriteria.store') }}" method="POST">
        @csrf

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
                                Nama Subkriteria
                            </th>

                            @foreach ($subkriteriaItems as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $item->nama_subkriteria }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    @if ($perhitunganSubkriteria == null || $perhitunganSubkriteria->count() == 0)
                        <tbody>
                            @foreach ($subkriteriaItems as $item)
                                <tr class="border-b bg-white">
                                    <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                        scope="row">
                                        {{ $item->nama_subkriteria }}
                                    </th>

                                    @foreach ($subkriteriaItems as $comparison)
                                        <td class="border px-3 py-4 text-center">
                                            @if ($item->id_subkriteria == $comparison->id_subkriteria)
                                                <input
                                                    class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                    name="matriks[{{ $item->kode_kriteria }}][{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                    type="text" value="1" @readonly(true)>
                                            @else
                                                @if ($item->id_subkriteria < $comparison->id_subkriteria)
                                                    <select
                                                        class="w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                        id="matriks[{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        name="matriks[{{ $item->kode_kriteria }}][{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        data-row="{{ $item->kode_subkriteria }}"
                                                        data-col="{{ $comparison->kode_subkriteria }}"
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
                                                        name="matriks[{{ $item->kode_kriteria }}][{{ $item->kode_subkriteria }}][{{ $comparison->kode_subkriteria }}]"
                                                        data-row="{{ $item->kode_subkriteria }}"
                                                        data-col="{{ $comparison->kode_subkriteria }}" type="text"
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
                                                    class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
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
                                                        class="w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                        id="matriks[{{ $subkriteria1->kode_subkriteria }}][{{ $subkriteria2->kode_subkriteria }}]"
                                                        name="matriks[{{ $subkriteria1->kode_subkriteria }}][{{ $subkriteria2->kode_subkriteria }}]"
                                                        data-row="{{ $subkriteria1->kode_subkriteria }}"
                                                        data-col="{{ $subkriteria2->kode_subkriteria }}">

                                                        <option selected disabled></option>
                                                        @for ($i = 1; $i <= 9; $i++)
                                                            <option value="{{ $i }}"
                                                                {{ $nilai && $nilai->nilai_subkriteria == $i ? 'selected' : '' }}>
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                @else
                                                    <input
                                                        class="matriksHasil w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
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
            @if ($perhitunganSubkriteria == null || $perhitunganSubkriteria->count() == 0)
                <div x-data="{ isOpen: false }">
                    <x-atoms.button.button-primary :customClass="'h-12 w-72 rounded-md'" :type="'button'" :name="'Hitung Perbandingan Subkriteria'"
                        @click="isOpen = true" />

                    <x-molecules.modal-confirm :title="'Nilai perbandingan antar sub kriteria hanya dapat dilakukan 1 kali penyimpanan. Setelahnya Anda tidak dapat melakukan ubah nilai pada perbandingan antar subkriteria.'" />
                </div>
            @else
                <a href="{{ route('perhitunganSubkriteria.hasil') }}">
                    <x-atoms.button.button-primary :customClass="'h-12 w-80 rounded-md'" :type="'button'" :name="'Lihat Hasil Perbandingan Subkriteria'" />
                </a>
            @endif
        </div>
    </form>

</x-layouts.app-dashboard>
