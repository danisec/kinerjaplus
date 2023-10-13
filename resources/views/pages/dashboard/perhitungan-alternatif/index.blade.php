<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Perbandingan Alternatif</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form action="{{ route('perhitunganAlternatif.store') }}" method="POST">
        @csrf

        @foreach ($kriteria as $dataKriteria)
            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="table-alternatif w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <p class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900">Perbandingan Antar
                            Alternatif Pada Kriteria : {{ $dataKriteria->nama_kriteria }}
                        </p>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                                Nama Alternatif
                            </th>

                            @foreach ($alternatif as $item)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $item->nama_alternatif }}
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
                                        {{ $item->nama_alternatif }}
                                    </th>

                                    @foreach ($alternatif as $comparison)
                                        <td class="border px-3 py-4 text-center">
                                            @if ($item->kode_alternatif == $comparison->kode_alternatif)
                                                <input
                                                    class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                    name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $item->kode_alternatif }}][{{ $comparison->kode_alternatif }}]"
                                                    type="text" value="1" @readonly(true)>
                                            @else
                                                @if ($item->kode_alternatif < $comparison->kode_alternatif)
                                                    <select
                                                        class="matriks w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                        name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $item->kode_alternatif }}][{{ $comparison->kode_alternatif }}]"
                                                        data-row="{{ $item->kode_alternatif }}"
                                                        data-col="{{ $comparison->kode_alternatif }}"
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
                                                        name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $item->kode_alternatif }}][{{ $comparison->kode_alternatif }}]"
                                                        data-row="{{ $item->kode_alternatif }}"
                                                        data-col="{{ $comparison->kode_alternatif }}" type="text"
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
                                        {{ $alternatif1->nama_alternatif }}
                                    </th>
                                    @foreach ($alternatif as $alternatif2)
                                        <td class="px-3 py-3 text-center">
                                            @if ($alternatif1->kode_alternatif == $alternatif2->kode_alternatif)
                                                <input
                                                    class="w-20 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                    name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1->kode_alternatif }}][{{ $alternatif2->kode_alternatif }}]"
                                                    type="text" value="1" @readonly(true)>
                                            @else
                                                @php
                                                    $nilai = $perhitunganAlternatif
                                                        ->where('kode_kriteria', $dataKriteria->kode_kriteria)
                                                        ->where('alternatif_pertama', $alternatif1->kode_alternatif)
                                                        ->where('alternatif_kedua', $alternatif2->kode_alternatif)
                                                        ->first();
                                                @endphp

                                                @if ($alternatif1->kode_alternatif < $alternatif2->kode_alternatif)
                                                    <select
                                                        class="matriks w-20 rounded-md border border-slate-300 focus:bg-slate-100 focus:ring-slate-100"
                                                        name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1->kode_alternatif }}][{{ $alternatif2->kode_alternatif }}]"
                                                        data-row="{{ $alternatif1->kode_alternatif }}"
                                                        data-col="{{ $alternatif2->kode_alternatif }}">

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
                                                        name="matriks[{{ $dataKriteria->kode_kriteria }}][{{ $alternatif1->kode_alternatif }}][{{ $alternatif2->kode_alternatif }}]"
                                                        data-row="{{ $alternatif1->kode_alternatif }}"
                                                        data-col="{{ $alternatif2->kode_alternatif }}" type="text"
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
            <x-atoms.button.button-primary :customClass="'h-12 w-64 rounded-md'" :type="'submit'" :name="'Hitung Perbandingan Alternatif'" />
        </div>
    </form>

    <script type="module">
        $(document).ready(function() {
            // Event listener saat elemen select berubah
            $("select").change(function() {
                let row = $(this).data("row"); // Dapatkan kode baris dari atribut data-row
                let col = $(this).data("col"); // Dapatkan kode kolom dari atribut data-col
                let selectedValue = parseFloat($(this).val()); // Dapatkan nilai yang dipilih

                // Temukan tabel yang berada dalam konteks yang sama dengan elemen yang dipilih
                let tableAlternatif = $(this).closest(".table-alternatif");
                let calculatedInput = tableAlternatif.find(".matriksHasil[data-row='" + col +
                    "'][data-col='" +
                    row + "']");

                // Set nilai pada kolom pertama
                tableAlternatif.find(".matriks[data-row='" + col + "'][data-col='" + row + "']").val(
                    selectedValue);

                // Hitung nilai kolom pertama dengan rumus 1 / nilai yang dipilih
                let calculatedValue = (1 / selectedValue).toFixed(4); // Batasi hingga 4 desimal
                calculatedInput.val(calculatedValue);

                // Jika nilai awal adalah 0, ganti dengan hasil perhitungan
                if (calculatedInput.val() === "0") {
                    calculatedInput.val(calculatedValue);
                }
            });
        });
    </script>

</x-layouts.app-dashboard>
