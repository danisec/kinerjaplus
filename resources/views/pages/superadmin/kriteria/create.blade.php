<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('kriteria.index') }}">Kriteria</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Tambah Kriteria</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('kriteria.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Tambah Kriteria
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div class="hidden">
                        <x-molecules.input.input name="kode_kriteria" label="" :type="'hidden'" :value="encrypt($newKodeKriteria)"
                            required />
                    </div>

                    <div>
                        <x-molecules.input.input name="nama_kriteria" label="Nama Kriteria" :type="'text'"
                            :placeholder="'Nama Kriteria'" required />
                    </div>

                    <div class="flex flex-row items-center justify-between gap-4">
                        <div class="w-full">
                            <x-molecules.input.input name="bobot_kriteria" label="Bobot Kriteria" :type="'number'"
                                min="1" maxlength="3" minlength="1" max="100" :placeholder="'1 - 100'"
                                required />
                        </div>

                        <div class="mt-5 w-14">
                            <x-molecules.input.input name="" label="" :type="'text'" :value="'%'"
                                readonly disabled />
                        </div>
                    </div>

                    <div class="flex flex-row justify-center gap-4">
                        <a href="{{ route('kriteria.index') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                        <x-atoms.button.button-primary :type="'submit'" :name="'Simpan'" />
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
