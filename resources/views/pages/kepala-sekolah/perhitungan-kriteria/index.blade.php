<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Perbandingan Kriteria</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form action="{{ route('perhitunganKriteria.store') }}" method="POST">
        @csrf

        <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
            <table class="w-full text-left text-base text-gray-900">
                <thead class="bg-slate-100 text-base capitalize text-gray-900">
                    <tr>
                        <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                            colspan="{{ count($kriteria) + 1 }}">Perbandingan Antar Kriteria
                        </th>
                    </tr>

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

                @if ($perhitunganKriteria == null || $perhitunganKriteria->count() == 0)
                    <tbody>
                        @foreach ($kriteria as $item)
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    {{ $item->nama_kriteria }}
                                </th>

                                @foreach ($kriteria as $comparison)
                                    <td class="border px-3 py-4 text-center">
                                        @if ($item->id_kriteria == $comparison->id_kriteria)
                                            <input
                                                class="w-20 rounded-md border-none bg-slate-100 text-center text-emerald-500 focus:ring-slate-100"
                                                name="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                type="text" value="1" @readonly(true)>
                                        @else
                                            @if ($item->id_kriteria < $comparison->id_kriteria)
                                                <select
                                                    class="w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                    id="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    name="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    data-row="{{ $item->kode_kriteria }}"
                                                    data-col="{{ $comparison->kode_kriteria }}" @required(true)>

                                                    <option selected disabled></option>
                                                    @for ($i = 1; $i <= 9; $i++)
                                                        <option value="{{ $i }}">{{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            @else
                                                <input
                                                    class="matriksHasil w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                    name="matriks[{{ $item->kode_kriteria }}][{{ $comparison->kode_kriteria }}]"
                                                    data-row="{{ $item->kode_kriteria }}"
                                                    data-col="{{ $comparison->kode_kriteria }}" type="text"
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
                                                class="w-20 rounded-md border-none bg-slate-100 text-center text-emerald-500 focus:ring-slate-100"
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
                                                    class="w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                    id="matriks[{{ $kriteria1->kode_kriteria }}][{{ $kriteria2->kode_kriteria }}]"
                                                    name="matriks[{{ $kriteria1->kode_kriteria }}][{{ $kriteria2->kode_kriteria }}]"
                                                    data-row="{{ $kriteria1->kode_kriteria }}"
                                                    data-col="{{ $kriteria2->kode_kriteria }}">

                                                    <option selected disabled></option>
                                                    @for ($i = 1; $i <= 9; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $nilai && $nilai->nilai_kriteria == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            @else
                                                <input
                                                    class="matriksHasil w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
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
            @if ($perhitunganKriteria == null || $perhitunganKriteria->count() == 0)
                <div x-data="{ isOpen: false }">
                    <x-atoms.button.button-primary :customClass="'h-12 w-64 rounded-md'" :type="'button'" :name="'Hitung Perbandingan Kriteria'"
                        @click="isOpen = true" />

                    <x-molecules.modal-confirm :title="'Nilai perbandingan antar kriteria hanya dapat dilakukan 1 kali penyimpanan. Setelahnya Anda tidak dapat melakukan ubah nilai pada perbandingan antar kriteria.'" />
                </div>
            @else
                <a href="{{ route('perhitunganKriteria.hasil') }}">
                    <x-atoms.button.button-primary :customClass="'h-12 w-72 rounded-md'" :type="'button'" :name="'Lihat Hasil Perbandingan Kriteria'" />
                </a>
            @endif
        </div>
    </form>

</x-layouts.app-dashboard>
