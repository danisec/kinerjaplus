<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('riwayatPenilaian.index') }}">Riwayat Penilaian</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium capitalize text-gray-900 hover:text-blue-600"
                    href="{{ route('riwayatPenilaian.showTahun', ['firstYear' => $tahunAjaran[0], 'secondYear' => $tahunAjaran[1], 'semester' => $tahunAjaran[2]]) }}">Tahun
                    Ajaran {!! $tahunAjaran[0] !!}/{!! $tahunAjaran[1] !!} - Semester {!! $tahunAjaran[2] !!}</a>
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
            <h4 class="text-2xl font-semibold capitalize text-gray-900">Detail Penilaian
                {{ $penilaian->alternatifPertama->alternatifPertama->nama_alternatif }} Kepada
                {{ $penilaian->alternatifKedua->alternatifPertama->nama_alternatif }} Tahun Ajaran
                {{ $penilaian->tanggalPenilaian->tahun_ajaran }} - Semester {{ $penilaian->tanggalPenilaian->semester }}
            </h4>

            <div>
                @php
                    $kriteriaCounter = 1;
                @endphp

                @foreach ($kriteria as $item)
                    @if (!$checkRole || $item->kode_kriteria != 'K2')
                        <div class="mb-6 rounded-md bg-slate-50 p-4">
                            <h4 class="block text-xl font-semibold text-gray-900">
                                {{ chr(64 + $kriteriaCounter++) . '.' }} {{ $item->nama_kriteria }}
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
                                        <div class="my-8 ml-10 flex flex-row gap-4">
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
                                                        {{ $selectedSkala ? 'checked' : '' }}
                                                        @disabled(true)>

                                                    <label for="{{ $skalaIndikatorDetail->skala }}">
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
                <a href="{{ route('riwayatPenilaian.index') }}" onclick="window.close()">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
            </div>

        </div>
    </div>


</x-app-dashboard>
