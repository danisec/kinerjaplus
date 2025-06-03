<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('persetujuanPenilaian.index') }}">Persetujuan Penilaian</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 capitalize text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('persetujuanPenilaian.showTahun', ['firstYear' => $tahunAjaran[0], 'secondYear' => $tahunAjaran[1], 'semester' => $tahunAjaran[2]]) }}">Tahun
                Ajaran {!! $tahunAjaran[0] !!}/{!! $tahunAjaran[1] !!} - Semester {!! $tahunAjaran[2] !!}</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span class="capitalize">Review Penilaian</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div
        class="my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <form class="space-y-6" action="{{ route('persetujuanPenilaian.update', $penilaian->id_penilaian) }}"
            method="POST">
            @method('PUT')
            @csrf
            <h4 class="xs:text-base font-semibold capitalize text-gray-900 lg:text-xl">Tinjauan Penilaian
                {{ $penilaian->alternatifPertama->alternatifPertama->nama_alternatif }} Kepada
                {{ $penilaian->alternatifKedua->alternatifPertama->nama_alternatif }} Tahun Ajaran
                {{ $penilaian->tanggalPenilaian->tahun_ajaran }} - Semester {{ $penilaian->tanggalPenilaian->semester }}
            </h4>

            <div class="my-6">
                @php
                    $kriteriaCounter = 1;
                @endphp

                @foreach ($kriteria as $index => $item)
                    @if (!$checkRole || $item->kode_kriteria !== 'K2')
                        <div class="mb-6 rounded-md bg-slate-50 p-4">
                            <h4 class="xs:lg block font-semibold text-gray-900 lg:text-xl">
                                {{ chr(64 + $kriteriaCounter++) . '.' }} {{ $item->nama_kriteria }}
                            </h4>

                            @foreach ($item->subkriteria as $subkriteria)
                                <div class="my-4 bg-white">
                                    <h6 class="xs:text-base ml-5 pb-2 pt-5 font-medium text-gray-900 lg:text-lg">
                                        {{ $loop->iteration . '.' }} {{ $subkriteria->nama_subkriteria }}
                                    </h6>

                                    @foreach ($subkriteria->indikatorSubkriteria as $indikator)
                                        <div class="mb-3">
                                            <p class="xs:text-sm ml-10 font-normal text-gray-900 lg:text-base">
                                                {{ $loop->iteration . ')' }} {{ $indikator->indikator_subkriteria }}
                                            </p>
                                        </div>

                                        @foreach ($indikator->skalaIndikator as $skalaIndikator)
                                            <div
                                                class="my-8 ml-10 overflow-x-auto max-lg:flex max-lg:flex-row max-lg:gap-4">
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
                                                            <div class="h-16 w-12">
                                                                <label
                                                                    class="xs:text-sm mb-2 block font-medium text-gray-900 lg:text-base"
                                                                    for="skala">Skala</label>
                                                                <input
                                                                    class="mx-auto h-full w-full rounded-md border border-gray-300 text-center text-sm dark:border-gray-700"
                                                                    name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                                    type="text"
                                                                    value="{{ optional($penilaianDetail)->skalaIndikatorDetail->skala }}"
                                                                    @disabled(true) @readonly(true)>
                                                            </div>

                                                            <div class="w-full">
                                                                <label
                                                                    class="xs:text-sm mb-2 block font-medium text-gray-900 lg:text-base"
                                                                    for="deskripsi skala">Deskripsi Skala</label>
                                                                <textarea
                                                                    class="textAreaHeight shadow-theme-xs focus:ring-3 focus:outline-hidden h-11 w-full appearance-none rounded-lg border border-gray-300 px-4 py-2.5 pr-11 text-sm capitalize text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                                                    name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]" rows="auto"
                                                                    @disabled(true) @readonly(true)>{{ optional($penilaianDetail)->skalaIndikatorDetail->deskripsi_skala }}</textarea>
                                                            </div>

                                                            <div class="h-16 w-40">
                                                                <label
                                                                    class="xs:text-sm mb-2 block font-medium text-gray-900 lg:text-base"
                                                                    for="nilai skala">Nilai Skala</label>
                                                                <input
                                                                    class="mx-auto h-full w-full rounded-md border border-gray-300 text-center text-sm dark:border-gray-700"
                                                                    name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                                    type="text"
                                                                    value="{{ optional($penilaianDetail)->skalaIndikatorDetail->nilaiSkala->nilai_skala }}"
                                                                    @disabled(true) @readonly(true)>
                                                            </div>

                                                            <div class="w-80 rounded-md bg-white">
                                                                <label
                                                                    class="xs:text-sm mb-2 block font-medium text-gray-900 lg:text-base"
                                                                    for="status">Status</label>

                                                                <div class="flex flex-col gap-4">
                                                                    <div class="flex flex-row items-center gap-2">
                                                                        <input
                                                                            class="h-5 w-5 cursor-pointer appearance-none rounded-sm border border-slate-300 shadow-sm transition-all checked:border-blue-600 checked:bg-blue-600 hover:shadow-md"
                                                                            id="approved"
                                                                            name="status[{{ $penilaianDetail->id_skala_indikator_detail }}]"
                                                                            type="radio" value="Disetujui"
                                                                            @if (optional($penilaianDetail)->status === 'Disetujui') checked @endif
                                                                            @required(true) />

                                                                        <span class="text-sm">Disetujui</span>
                                                                    </div>

                                                                    <div class="flex flex-row items-center gap-2">
                                                                        <input
                                                                            class="h-5 w-5 cursor-pointer appearance-none rounded-sm border border-slate-300 shadow-sm transition-all checked:border-red-600 checked:bg-red-600 hover:shadow-md"
                                                                            id="not-approved"
                                                                            name="status[{{ $penilaianDetail->id_skala_indikator_detail }}]"
                                                                            type="radio" value="Tidak Disetujui"
                                                                            @if (optional($penilaianDetail)->status === 'Tidak Disetujui') checked @endif
                                                                            @required(true) />

                                                                        <span class="text-sm">Tidak
                                                                            Disetujui</span>
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
                                                            <label
                                                                class="mb-2 block text-base font-medium text-gray-900"
                                                                for="skala indikator">Skala</label>
                                                            <input class="w-full text-center"
                                                                name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                                type="text" value=""
                                                                @disabled(true) @readonly(true)>
                                                        </div>

                                                        <div class="w-full">
                                                            <label
                                                                class="mb-2 block text-base font-medium text-gray-900"
                                                                for="skala indikator">Deskripsi Skala</label>
                                                            <textarea class="textAreaHeight mb-4 w-full"
                                                                name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]" rows="auto"
                                                                @disabled(true) @readonly(true)></textarea>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="flex flex-row items-center justify-center gap-4">
                <a href="{{ route('persetujuanPenilaian.index') }}" onclick="window.close()">
                    <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                </a>

                @if ($penilaianDetail->status !== null)
                    <div x-data="{ isOpen: false }">
                        <x-atoms.button.button-primary :type="'button'" :name="'Ubah'" @click="isOpen = true" />
                        <x-molecules.modal.modal-confirm :title="'Apakah Anda yakin ingin mengubah tinjauan penilaian ini?'" />
                    </div>
                @else
                    <div x-data="{ isOpen: false }">
                        <x-atoms.button.button-primary :type="'button'" :name="'Simpan'" @click="isOpen = true" />
                        <x-molecules.modal.modal-confirm :title="'Apakah Anda yakin ingin menyimpan tinjauan penilaian ini?'" />
                    </div>
                @endif

            </div>

        </form>
    </div>


</x-app-dashboard>
