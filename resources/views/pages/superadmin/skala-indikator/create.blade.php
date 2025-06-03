<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('skalaIndikator.index') }}">Skala Indikator</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Tambah Skala Indikator</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('skalaIndikator.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Tambah Skala Indikator
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div>
                        <x-molecules.select.select id="subkriteria" name="kode_subkriteria" label="Nama Subkriteria"
                            :options="$subkriteria->mapWithKeys(function ($item) {
                                return [$item->kode_subkriteria => $item->nama_subkriteria];
                            })" required />
                    </div>

                    <div>
                        <x-molecules.select.select id="indikatorSubkriteria" name="id_indikator_subkriteria"
                            label="Indikator Subkriteria" required />
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
                        <div class="flex flex-row items-center justify-end">
                            <x-atoms.button.button-secondary id="add-skala-indikator-btn" :type="'button'"
                                :name="'Tambah Kolom Skala Indikator'" />
                        </div>

                        <div id="kolom-skala-indikator">
                            <div class="kolom-skala-indikator my-4 flex flex-row items-center justify-between gap-4">
                                <input name="skala[]" type="hidden" value="1">
                                <textarea
                                    class="@error('indikator_subkriteria') border-red-500 @enderror dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 focus:ring-3 focus:outline-hidden w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    name="deskripsi_skala[]" placeholder="Deskripsi Skala 1" rows="6" required></textarea>

                                @error('indikator_subkriteria')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div x-data="{ showTooltip: false, isOpen: false }">
                                    <button
                                        class="delete-subkriteria-btn focus:outline-hidden text-gray-600 hover:text-red-600"
                                        type="button" @mouseenter="showTooltip = true"
                                        @mouseleave="showTooltip = false" @click="isOpen = true">
                                        <x-atoms.svg.trash />
                                    </button>

                                    <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                        x-show="showTooltip" x-transition>
                                        <span>Hapus</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row justify-center gap-4">
                            <a href="{{ route('skalaIndikator.index') }}">
                                <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                            </a>
                            <x-atoms.button.button-primary :type="'submit'" :name="'Simpan'" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
