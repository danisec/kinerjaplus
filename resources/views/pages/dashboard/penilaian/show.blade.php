<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('penilaian.index') }}">Data Penilaian</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Detail Penilaian</span>
            </div>
        </li>
    </x-molecules.breadcrumb>


    <div class="mx-auto my-8 w-full">

        <div class="mt-8 space-y-6">
            <h4 class="text-2xl font-semibold text-gray-900">Detail Penilaian
                {{ $penilaian->alternatifPertama->nama_alternatif }} Kepada
                {{ $penilaian->alternatifKedua->nama_alternatif }} Tahun Ajaran {{ $penilaian->tahun_ajaran }}</h4>

            <div>
                @foreach ($kriteria as $item)
                    <div class="mb-6 rounded-md bg-slate-50 p-4">
                        <h4 class="block text-xl font-semibold text-gray-900">
                            {{ chr(64 + $loop->iteration) . '.' }} {{ $item->nama_kriteria }}
                        </h4>

                        @foreach ($item->subkriteria as $subkriteria)
                            <h6 class="ml-5 pb-2 pt-5 text-lg font-semibold text-gray-900">
                                {{ $loop->iteration . '.' }} {{ $subkriteria->nama_subkriteria }}
                            </h6>

                            @foreach ($subkriteria->indikatorSubkriteria as $indikator)
                                <div class="mb-3">
                                    <p class="ml-10 text-base font-medium text-gray-900">
                                        {{ $loop->iteration . ')' }} {{ $indikator->indikator_subkriteria }}
                                    </p>
                                </div>

                                @foreach ($indikator->skalaIndikator as $skalaIndikator)
                                    <div class="my-8 ml-10">
                                        @php
                                            $foundInputValue = false;
                                        @endphp

                                        @foreach ($skalaIndikator->skalaIndikatorDetail as $skalaIndikatorDetail)
                                            @php
                                                $penilaianDetail = $penilaian ? $penilaian->penilaianIndikator->where('id_skala_indikator_detail', $skalaIndikatorDetail->id_skala_indikator_detail)->first() : null;
                                            @endphp

                                            @if ($penilaianDetail && $penilaianDetail->id_skala_indikator_detail)
                                                <div class="flex flex-row gap-4">
                                                    <div class="h-12 w-12">
                                                        <label class="mb-2 block text-base font-medium text-gray-900"
                                                            for="skala indikator">Skala</label>
                                                        <input class="field-input-slate w-full text-center"
                                                            name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                            type="text"
                                                            value="{{ optional($penilaianDetail)->skalaIndikatorDetail->skala }}"
                                                            @disabled(true) @readonly(true)>
                                                    </div>

                                                    <div class="w-full">
                                                        <label class="mb-2 block text-base font-medium text-gray-900"
                                                            for="skala indikator">Deskripsi Skala</label>
                                                        <textarea class="textAreaHeight field-input-slate mb-4 w-full"
                                                            name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]" rows="auto"
                                                            @disabled(true) @readonly(true)>{{ optional($penilaianDetail)->skalaIndikatorDetail->deskripsi_skala }}</textarea>
                                                    </div>
                                                </div>

                                                @php
                                                    $foundInputValue = true;
                                                    break;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if (!$foundInputValue)
                                            <div class="flex flex-row gap-4">
                                                <div class="h-12 w-12">
                                                    <label class="mb-2 block text-base font-medium text-gray-900"
                                                        for="skala indikator">Skala</label>
                                                    <input class="field-input-slate w-full text-center"
                                                        name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                        type="text" value="" @disabled(true)
                                                        @readonly(true)>
                                                </div>

                                                <div class="w-full">
                                                    <label class="mb-2 block text-base font-medium text-gray-900"
                                                        for="skala indikator">Deskripsi Skala</label>
                                                    <textarea class="textAreaHeight field-input-slate mb-4 w-full"
                                                        name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]" rows="auto"
                                                        @disabled(true) @readonly(true)></textarea>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center">
                <a href="{{ route('penilaian.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
            </div>

        </div>
    </div>


</x-layouts.app-dashboard>
