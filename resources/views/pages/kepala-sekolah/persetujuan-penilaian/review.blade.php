<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('persetujuanPenilaian.index') }}">Persetujuan Penilaian</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium capitalize text-gray-900 hover:text-blue-600"
                    href="{{ route('persetujuanPenilaian.showTahun', ['firstYear' => $tahunAjaran[0], 'secondYear' => $tahunAjaran[1], 'semester' => $tahunAjaran[2]]) }}">Tahun
                    Ajaran {!! $tahunAjaran[0] !!}/{!! $tahunAjaran[1] !!} - Semester {!! $tahunAjaran[2] !!}</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Tinjauan Penilaian</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-full">

        <form class="mt-8 space-y-6"
            action="{{ route('persetujuanPenilaian.update_review_penilaian', $penilaian->id_penilaian) }}"
            method="POST">
            @method('PUT')
            @csrf

            <h4 class="text-2xl font-semibold capitalize text-gray-900">Tinjauan Penilaian
                {{ $penilaian->alternatifPertama->alternatifPertama->nama_alternatif }} Kepada
                {{ $penilaian->alternatifKedua->alternatifPertama->nama_alternatif }} Tahun Ajaran
                {{ $penilaian->tanggalPenilaian->tahun_ajaran }} - Semester {{ $penilaian->tanggalPenilaian->semester }}
            </h4>

            <div>
                {{-- @php
                    $kriteriaCounter = 1;
                @endphp --}}

                @foreach ($kriteria as $index => $item)
                    @if (!$checkRole || $item->kode_kriteria != 'K2')
                        <div class="mb-6 rounded-md bg-slate-50 p-4">
                            <h4 class="block text-xl font-semibold text-gray-900">
                                {{ chr(64 + $index + 1) . '.' }} {{ $item->nama_kriteria }}
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
                                                    $penilaianDetail = $penilaian
                                                        ? $penilaian->penilaianIndikator
                                                            ->where(
                                                                'id_skala_indikator_detail',
                                                                $skalaIndikatorDetail->id_skala_indikator_detail,
                                                            )
                                                            ->first()
                                                        : null;
                                                @endphp

                                                @if ($penilaianDetail && $penilaianDetail->id_skala_indikator_detail)
                                                    <div class="flex flex-row gap-4">
                                                        <div class="h-12 w-12">
                                                            <label
                                                                class="mb-2 block text-base font-medium text-gray-900"
                                                                for="skala indikator">Skala</label>
                                                            <input class="field-input-slate w-full text-center"
                                                                name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                                type="text"
                                                                value="{{ optional($penilaianDetail)->skalaIndikatorDetail->skala }}"
                                                                @disabled(true) @readonly(true)>
                                                        </div>

                                                        <div class="w-full">
                                                            <label
                                                                class="mb-2 block text-base font-medium text-gray-900"
                                                                for="skala indikator">Deskripsi Skala</label>
                                                            <textarea class="textAreaHeight field-input-slate mb-4 w-full"
                                                                name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]" rows="auto"
                                                                @disabled(true) @readonly(true)>{{ optional($penilaianDetail)->skalaIndikatorDetail->deskripsi_skala }}</textarea>
                                                        </div>

                                                        <div class="ml-4 w-80 rounded-md bg-white p-4">
                                                            <label
                                                                class="mb-2 block text-base font-medium text-gray-900"
                                                                for="skala indikator">Status</label>

                                                            <div class="flex flex-col gap-4">
                                                                <div class="flex flex-row items-center gap-2">
                                                                    <input
                                                                        class="h-5 w-5 cursor-pointer appearance-none rounded border border-slate-300 shadow transition-all checked:border-blue-600 checked:bg-blue-600 hover:shadow-md"
                                                                        id="approved"
                                                                        name="status[{{ $penilaianDetail->id_skala_indikator_detail }}]"
                                                                        type="radio" value="Disetujui"
                                                                        @if (optional($penilaianDetail)->status === 'Disetujui') checked @endif
                                                                        @required(true) />

                                                                    <span>Disetujui</span>
                                                                </div>

                                                                <div class="flex flex-row items-center gap-2">
                                                                    <input
                                                                        class="h-5 w-5 cursor-pointer appearance-none rounded border border-slate-300 shadow transition-all checked:border-red-600 checked:bg-red-600 hover:shadow-md"
                                                                        id="not-approved"
                                                                        name="status[{{ $penilaianDetail->id_skala_indikator_detail }}]"
                                                                        type="radio" value="Tidak Disetujui"
                                                                        @if (optional($penilaianDetail)->status === 'Tidak Disetujui') checked @endif
                                                                        @required(true) />

                                                                    <span>Tidak Disetujui</span>
                                                                </div>
                                                            </div>
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
                    @endif
                @endforeach
            </div>

            <div class="flex flex-row items-center justify-center gap-4">
                <a href="{{ route('persetujuanPenilaian.index') }}" onclick="window.close()">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>

                @if ($penilaianDetail->status !== null)
                    <div x-data="{ isOpen: false }">
                        <x-atoms.button.button-primary :customClass="'h-12 w-64 rounded-md'" :type="'button'" :name="'Ubah'"
                            @click="isOpen = true" />

                        <x-molecules.modal-confirm :title="'Apakah Anda yakin ingin mengubah tinjauan penilaian ini?'" />
                    </div>
                @else
                    <div x-data="{ isOpen: false }">
                        <x-atoms.button.button-primary :customClass="'h-12 w-64 rounded-md'" :type="'button'" :name="'Simpan'"
                            @click="isOpen = true" />

                        <x-molecules.modal-confirm :title="'Apakah Anda yakin ingin menyimpan tinjauan penilaian ini?'" />
                    </div>
                @endif

            </div>

        </form>
    </div>


</x-app-dashboard>
