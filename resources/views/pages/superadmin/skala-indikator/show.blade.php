<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('skalaIndikator.index') }}">Skala Indikator</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Detail Skala Indikator</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="my-8">
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Detail Skala Indikator
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div>
                        <x-molecules.input.input name="kode_subkriteria" label="Nama Subkriteria" :type="'text'"
                            :value="$skalaIndikator->indikatorSubkriteria->subkriteria->kriteria->nama_kriteria .
                                ' — ' .
                                $skalaIndikator->indikatorSubkriteria->subkriteria->nama_subkriteria" readonly />
                    </div>

                    <div>
                        <x-molecules.textarea.textarea name="id_indikator_subkriteria" label="Deskripsi Subkriteria"
                            :type="'text'" :value="$skalaIndikator->indikatorSubkriteria->indikator_subkriteria" rows="auto" readonly />
                    </div>
                </div>
            </div>
        </div>

        <div class="my-8">
            <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="px-5 py-4 sm:px-6 sm:py-5">
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                            Skala Indikator
                        </h3>
                    </div>

                    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                        @foreach ($skalaIndikator->skalaIndikatorDetail as $item)
                            <div class="space-y-6">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                                    for="skala indikator">
                                    Skala {{ $item->skala }}</label>
                                <div id="kolom-skala-indikator">
                                    <textarea
                                        class="textAreaHeight dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 focus:ring-3 focus:outline-hidden w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 disabled:bg-gray-50 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:disabled:bg-white/[0.03]"
                                        name="deskripsi_skala[]" rows="auto" readonly>{{ $item->deskripsi_skala }}</textarea>
                                </div>
                            </div>
                        @endforeach

                        <div class="flex flex-row justify-center">
                            <a href="{{ route('skalaIndikator.index') }}">
                                <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-dashboard>
