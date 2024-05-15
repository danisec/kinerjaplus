<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('penilaian.welcome') }}">Penilaian Tahun Ajaran {!! $tahunAjaran !!}</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Tambah Penilaian</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-full">

        @if ($alternatifPenilaianArray == null)
            <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                <h2 class="text-center font-normal text-gray-900">Terima kasih Anda telah menyelesaikan penilaian untuk
                    semua karyawan.
                </h2>
            </div>
        @else
            <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                <p class="text-base font-bold uppercase tracking-wider text-gray-900">Petunjuk Pengisian</p>
                <p class="my-6 text-base font-normal text-gray-900">Pada setiap pernyataan dari skala 1 hingga 4,
                    pilihlah satu jawaban yang
                    paling menggambarkan diri Anda.</p>
            </div>

            <form class="mt-12 space-y-6" action="{{ route('penilaian.store') }}" method="POST">
                @csrf

                <input name="tahun_ajaran" type="hidden" value="{{ $tahunAjaran }}" @required(true)>
                <div class="flex flex-row items-center gap-4">
                    <h4 class="text-2xl font-semibold text-gray-900">Berikan Penilaian Kepada</h4>

                    <div class="w-96">
                        <input name="alternatif_pertama" type="hidden"
                            value="{{ Auth::user()->alternatif->kode_alternatif }}">
                        <input name="status" type="hidden" value="">

                        <select
                            class="@error('alternatif_kedua') border-red-500 @enderror field-input-slate w-full font-semibold"
                            name="alternatif_kedua" autofocus required>

                            <option selected disabled hidden>Pilih Nama Karyawan</option>

                            @foreach ($alternatifPenilaianArray as $item)
                                <optgroup
                                    label="{{ $item['kode_alternatif'] == Auth::user()->alternatif->kode_alternatif ? 'Diri Sendiri' : $item['jabatan'] }}">
                                    <option value="{{ $item['kode_alternatif'] }}">
                                        {{ $item['nama_alternatif'] }}
                                    </option>
                                </optgroup>
                            @endforeach
                        </select>

                        @error('alternatif_kedua')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

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
                                        <div class="my-8 ml-10 flex flex-row gap-4">
                                            @foreach ($skalaIndikator->skalaIndikatorDetail as $skalaIndikatorDetail)
                                                <div
                                                    class="flex h-max w-auto flex-col items-center justify-center gap-3 rounded-md bg-white p-3 shadow-slate-50 hover:shadow-md">
                                                    <input
                                                        name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                        type="radio"
                                                        value="{{ $skalaIndikatorDetail->id_skala_indikator_detail }}"
                                                        {{ old('id_indikator_subkriteria.' . $skalaIndikator->id_indikator_subkriteria) == $skalaIndikatorDetail->skala
                                                            ? 'checked'
                                                            : '' }}
                                                        required>

                                                    <label
                                                        class="text-left text-base font-normal leading-normal text-gray-900"
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
                    @endforeach
                </div>

                <div class="flex flex-row items-center justify-center gap-4">
                    <a href="{{ route('penilaian.welcome') }}">
                        <x-atoms.button.button-gray :customClass="'w-80 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                    </a>

                    <div x-data="{ isOpen: false }">
                        <x-atoms.button.button-primary :customClass="'h-12 w-64 rounded-md'" :type="'button'" :name="'Simpan'"
                            @click="isOpen = true" />

                        <x-molecules.modal-confirm :title="'Apakah Anda yakin ingin menyimpan penilaian ini?'" />
                    </div>
                </div>

            </form>
        @endif

    </div>

</x-layouts.app-dashboard>
