<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('subkriteria.index') }}">Subkriteria</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Ubah Subkriteria</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('subkriteria.update', $subkriteria->id_subkriteria) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Ubah Subkriteria
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div>
                        <x-molecules.select.select name="kode_kriteria" label="Nama Kriteria" :options="$kriteria->mapWithKeys(function ($item) {
                            return [$item->kode_kriteria => $item->nama_kriteria];
                        })"
                            :value="$subkriteria->kode_kriteria" required />
                    </div>

                    <div>
                        <x-molecules.input.input name="kode_subkriteria" label="Kode Subkriteria" :type="'text'"
                            :value="$subkriteria->kode_subkriteria" required />
                    </div>

                    <div>
                        <x-molecules.input.input name="nama_subkriteria" label="Nama Subkriteria" :type="'text'"
                            :value="$subkriteria->nama_subkriteria" required />
                    </div>

                    <div>
                        <x-molecules.textarea.textarea name="deskripsi_subkriteria" label="Deskripsi Subkriteria"
                            :type="'text'" :value="$subkriteria->deskripsi_subkriteria" rows="6" />
                    </div>

                    <div class="flex flex-row items-center justify-between gap-4">
                        <div class="w-full">
                            <x-molecules.input.input name="bobot_subkriteria" label="Bobot Subkriteria"
                                :type="'number'" min="1" maxlength="3" minlength="1" max="100"
                                :value="$subkriteria->bobot_subkriteria" required />
                        </div>

                        <div class="mt-5 w-14">
                            <x-molecules.input.input name="" label="" :type="'text'" :value="'%'"
                                readonly disabled />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-8">
            <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="px-5 py-4 sm:px-6 sm:py-5">
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                            Indikator Subkriteria
                        </h3>
                    </div>

                    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                        <div id="kolom-subkriteria">
                            <div class="flex flex-col gap-6">
                                @foreach ($subkriteria->indikatorSubkriteria as $item)
                                    <textarea
                                        class="textAreaHeight dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 focus:ring-3 focus:outline-hidden w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                        name="indikator_subkriteria[]" placeholder="Indikator Subkriteria" rows="6" required>{{ $item->indikator_subkriteria }}</textarea>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex flex-row justify-center gap-4">
                            <a href="{{ route('subkriteria.index') }}">
                                <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                            </a>
                            <x-atoms.button.button-primary :type="'submit'" :name="'Ubah'" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
