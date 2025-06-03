<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('alternatif.index') }}">Pegawai</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Detail Pegawai</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="my-8">
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Detail Pegawai
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div>
                        <x-molecules.input.input name="kode_alternatif" label="Kode Alternatif" :type="'text'"
                            :value="$alternatif->kode_alternatif" readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="nama_alternatif" label="Nama Pegawai" :type="'text'"
                            :value="$alternatif->nama_alternatif .
                                ' - ' .
                                $alternatif->users->getRoleNames()->first()" readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="jenis_kelamin" label="Jenis Kelamin" :type="'text'"
                            :value="$alternatif->jenis_kelamin" readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="tanggal_masuk_kerja" label="Tanggal Masuk Kerja"
                            :type="'text'" :value="$alternatif->tanggal_masuk_kerja" readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="nip" label="Nomor Induk Pegawai" :type="'text'"
                            :value="$alternatif->nip" readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="jabatan" label="Jabatan" :type="'text'" :value="$alternatif->jabatan"
                            readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="pendidikan" label="Pendidikan Terakhir" :type="'text'"
                            :value="$alternatif->pendidikan" readonly />
                    </div>

                    <div class="flex justify-center">
                        <a href="{{ route('alternatif.index') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-dashboard>
