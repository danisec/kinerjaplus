<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('groupKaryawan.index') }}">Group Pegawai</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Detail Group Pegawai</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="my-8">
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Detail Group Pegawai
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div>
                        <x-molecules.input.input name="nama_group_karyawan" label="Nama Group Pegawai" :type="'text'"
                            :value="$groupKaryawan->nama_group_karyawan" readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="kepala_sekolah" label="Nama Kepala Sekolah / Pimpinan"
                            :type="'text'" :value="$groupKaryawan->alternatif->nama_alternatif" readonly />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                            for="nama karyawan">
                            Nama Pegawai</label>
                        <div
                            class="textAreaHeight shadow-theme-xs focus:ring-3 focus:outline-hidden flex flex-wrap gap-2 rounded-lg border border-gray-300 bg-transparent p-3 text-sm text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            @foreach ($groupKaryawan->groupKaryawanDetail as $item)
                                <span
                                    class="inline-block rounded-md bg-indigo-100/70 px-3 py-1 text-sm text-gray-700 dark:text-gray-400">
                                    {{ $item->alternatif->nama_alternatif . ' - ' . $item->alternatif->jabatan }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-8">
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex flex-row items-center gap-1.5 px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Filter Penilaian
                    </h3>

                    <div class="cursor-pointer pt-0.5" x-data="{ showTooltip: false }">
                        <div @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                            <x-atoms.svg.help-circle width='20' height='20' />
                        </div>

                        <div class="xs:text-xs xs:w-10/12 absolute z-10 -ml-28 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:w-auto sm:text-sm dark:text-gray-400"
                            x-show="showTooltip" x-transition>
                            Filter penilaian digunakan untuk menetapkan siapa saja yang berwenang memberikan penilaian
                            kepada atasan atau rekan kerja.
                        </div>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    @foreach ($groupKaryawan->groupPenilaian as $index => $item)
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                                for="nama karyawan">
                                {!! $loop->iteration . '. ' . $item->alternatifPertama->nama_alternatif !!} sebagai {!! $item->alternatifPertama->jabatan !!} dapat
                                memberikan penilaian kepada:</label>
                            <div
                                class="textAreaHeight shadow-theme-xs focus:ring-3 focus:outline-hidden flex flex-wrap gap-2 rounded-lg border border-gray-300 bg-transparent p-3 text-sm text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                @foreach ($item->groupPenilaianDetail as $itemGroupPenilaian)
                                    <span
                                        class="inline-block rounded-md bg-indigo-100/70 px-3 py-1 text-sm text-gray-700 dark:text-gray-400">
                                        {{ $itemGroupPenilaian->alternatifKedua->nama_alternatif . ' - ' . $itemGroupPenilaian->alternatifKedua->jabatan }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-center">
                        <a href="{{ route('groupKaryawan.index') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-dashboard>
