<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 capitalize text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('penilaian.welcome') }}">
                @if ($checkTanggalPenilaian !== null)
                    Penilaian Tahun Ajaran
                    {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}
                @else
                    Penilaian Tahun Ajaran
                    {!! $tahunAjaran !!}
                @endif
            </a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Tambah Penilaian</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="mx-auto my-8 w-full">

        @if ($alternatifPenilaianArray === null)
            <div class="my-6 w-full rounded-md bg-slate-100 p-4">
                <h2 class="text-center font-normal text-gray-900">Terima kasih Anda telah menyelesaikan penilaian untuk
                    semua pegawai.
                </h2>
            </div>
        @else
            <div class="xs:bg-slate-100 my-6 w-full rounded-md p-4 lg:bg-white">
                <p class="text-base font-bold uppercase tracking-wider text-gray-900">Petunjuk Pengisian</p>
                <p class="xs:text-sm mt-4 font-normal text-gray-900 lg:text-base">Pada setiap pernyataan di
                    masing-masing
                    kriteria,
                    pilih salah satu jawaban yang paling sesuai dengan penilaian Anda terhadap diri Anda dan pegawai
                    yang
                    bersangkutan.
                </p>
            </div>

            <form
                class="my-8 space-y-6 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]"
                action="{{ route('penilaian.store') }}" method="POST">
                @csrf

                <input name="id_tanggal_penilaian" type="hidden"
                    value="{{ $checkTanggalPenilaian->id_tanggal_penilaian }}" @required(true)>
                <div class="xs:flex-col flex gap-4 lg:flex-row lg:items-center">
                    <h4 class="xs:text-lg font-semibold text-gray-900 lg:text-xl">Berikan Penilaian Kepada</h4>

                    <div class="xs:w-full lg:w-96">
                        <input name="alternatif_pertama" type="hidden"
                            value="{{ Auth::user()->alternatif->kode_alternatif }}">
                        <input name="status" type="hidden" value="">

                        <select
                            class="@error('alternatif_kedua') border-red-500 @enderror shadow-theme-xs focus:ring-3 focus:outline-hidden h-11 w-full rounded-lg border border-gray-300 px-4 py-2.5 pr-11 text-sm capitalize text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            id="alternatif_kedua" name="alternatif_kedua" autofocus required>

                            <option selected disabled hidden>Pilih Nama Pegawai</option>

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

                <div id="kriteriaContainer">
                    @foreach ($kriteria as $index => $item)
                        @if (
                            !in_array(Auth::user()->role, ['tata usaha non tenaga pendidikan', 'kerohanian non tenaga pendidikan']) ||
                                $item->kode_kriteria != 'K2')
                            <div class="kriteria-page mb-6 rounded-md bg-slate-50 p-4" data-page="{{ $index + 1 }}"
                                style="{{ $index > 0 ? 'display: none;' : '' }}">
                                <h4 class="xs:lg block font-semibold text-gray-900 lg:text-xl">
                                    {{ chr(64 + $index + 1) . '.' }} {{ $item->nama_kriteria }}
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
                                                @foreach ($skalaIndikator->skalaIndikatorDetail as $skalaIndikatorDetail)
                                                    <div
                                                        class="flex h-max w-auto flex-col items-center justify-center gap-3 rounded-md bg-white p-3 shadow-slate-50 hover:shadow-md">
                                                        <input class="cursor-pointer"
                                                            name="id_skala_indikator_detail[{{ $skalaIndikator->id_indikator_subkriteria }}]"
                                                            type="radio"
                                                            value="{{ $skalaIndikatorDetail->id_skala_indikator_detail }}"
                                                            {{ old('id_indikator_subkriteria.' . $skalaIndikator->id_indikator_subkriteria) == $skalaIndikatorDetail->skala
                                                                ? 'checked'
                                                                : '' }}
                                                            required>

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

                <!-- Pagination -->
                <div class="mb-6 flex flex-row justify-between gap-4">
                    <x-atoms.button.button-primary id="prevPage" :customClass="'w-full text-center rounded-lg px-5 py-3'" disabled :type="'button'"
                        :name="'Sebelumnya'" />

                    <x-atoms.button.button-primary id="nextPage" :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'button'"
                        :name="'Selanjutnya'" />
                </div>

                <div class="flex flex-row items-center justify-center gap-4 py-8">
                    <a href="{{ route('penilaian.welcome') }}">
                        <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                    </a>

                    <div x-data="{ isOpen: false }">
                        <x-atoms.button.button-primary :type="'button'" :name="'Simpan'" @click="isOpen = true" />
                        <x-molecules.modal.modal-confirm :title="'Apakah Anda yakin ingin menyimpan penilaian ini?'" />
                    </div>
                </div>

            </form>
        @endif

    </div>

    <script>
        window.kriteriaData = @json($kriteria);
    </script>

</x-app-dashboard>
