<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('riwayatPenilaian.index') }}">Riwayat Penilaian</a>
        </li>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('riwayatPenilaian.showTahun', [
                    'firstYear' => $tahunAjaran[0],
                    'secondYear' => $tahunAjaran[1],
                    'semester' => $tahunAjaran[2],
                ]) }}">
                Tahun
                Ajaran {!! $tahunAjaran[0] !!}/{!! $tahunAjaran[1] !!} - Semester
                <span class="capitalize">{!! $tahunAjaran[2] !!}</span>
            </a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Detail Penilaian</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div
        class="my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <h4 class="xs:text-base font-semibold capitalize text-gray-900 lg:text-xl">Detail Penilaian
            {{ $penilaian->alternatifPertama->alternatifPertama->nama_alternatif }} Kepada
            {{ $penilaian->alternatifKedua->alternatifPertama->nama_alternatif }} Tahun Ajaran
            {{ $penilaian->tanggalPenilaian->tahun_ajaran }} - Semester {{ $penilaian->tanggalPenilaian->semester }}
        </h4>

        <div class="my-6">
            @php
                $kriteriaCounter = 1;
            @endphp

            @foreach ($kriteria as $item)
                @if (!$checkRole || $item->kode_kriteria != 'K2')
                    <div class="mb-6 rounded-md bg-slate-50 p-4">
                        <h4 class="xs:lg block font-semibold text-gray-900 lg:text-xl">
                            {{ chr(64 + $kriteriaCounter++) . '.' }} {{ $item->nama_kriteria }}
                        </h4>

                        @foreach ($item->subkriteria as $subkriteria)
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
                                    <div class="my-8 ml-10 flex flex-row gap-4 overflow-x-auto">
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

                                                $selectedSkala = $penilaianDetail
                                                    ? $penilaianDetail->id_skala_indikator_detail ==
                                                        $skalaIndikatorDetail->id_skala_indikator_detail
                                                    : false;
                                            @endphp

                                            <div
                                                class="flex h-max w-auto flex-col items-center justify-center gap-3 rounded-md bg-white p-3 shadow-slate-50 hover:shadow-md">
                                                <input
                                                    name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                    type="radio"
                                                    value="{{ $skalaIndikatorDetail->id_skala_indikator_detail }}"
                                                    {{ $selectedSkala ? 'checked' : '' }} @disabled(true)>

                                                <label
                                                    class="xs:text-sm text-left font-normal leading-normal text-gray-900 md:text-base"
                                                    for="{{ $skalaIndikatorDetail->skala }}">
                                                    {{ $skalaIndikatorDetail->skala == 1 ? $skalaIndikatorDetail->deskripsi_skala : '' }}
                                                    {{ $skalaIndikatorDetail->skala == 2 ? $skalaIndikatorDetail->deskripsi_skala : '' }}
                                                    {{ $skalaIndikatorDetail->skala == 3 ? $skalaIndikatorDetail->deskripsi_skala : '' }}
                                                    {{ $skalaIndikatorDetail->skala == 4 ? $skalaIndikatorDetail->deskripsi_skala : '' }}
                                                </label>

                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                @endif
            @endforeach
        </div>

        <div class="flex justify-center">
            <a href="{{ route('riwayatPenilaian.showTahun', [
                'firstYear' => $tahunAjaran[0],
                'secondYear' => $tahunAjaran[1],
                'semester' => $tahunAjaran[2],
            ]) }}"
                onclick="window.close()">
                <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
            </a>
        </div>
    </div>


</x-app-dashboard>
