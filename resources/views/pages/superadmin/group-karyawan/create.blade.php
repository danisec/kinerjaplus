<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('groupKaryawan.index') }}">Group Pegawai</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Tambah Group Pegawai</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('groupKaryawan.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Tambah Group Pegawai
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div>
                        <x-molecules.input.input name="nama_group_karyawan" label="Nama Group Pegawai" :type="'text'"
                            :placeholder="'Nama Group Pegawai'" required />
                    </div>

                    <div>
                        <x-molecules.select.select name="kepala_sekolah" label="Kepala Sekolah / Pimpinan"
                            :options="$kepalaSekolah->mapWithKeys(function ($item) {
                                return [$item->kode_alternatif => $item->nama_alternatif . ' - ' . $item->jabatan];
                            })" required />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                            for="nama karyawan">
                            Nama Pegawai
                        </label>
                        <select
                            class="@error('nama_alternatif') border-red-500 @enderror shadow-theme-xs focus:ring-3 focus:outline-hidden h-11 w-full appearance-none rounded-lg border border-gray-300 px-4 py-2.5 pr-11 text-sm capitalize text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            id="namaKaryawan" name="kode_alternatif[]" multiple required>
                            @foreach ($namaKaryawan as $item)
                                <option value="{{ $item->kode_alternatif }}"
                                    {{ old('nama_alternatif') == $item->nama_alternatif ? 'selected' : '' }}>
                                    {{ $item->nama_alternatif . ' - ' . $item->jabatan }}
                                </option>
                            @endforeach
                        </select>

                        @error('kode_alternatif')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-row justify-center gap-4">
                        <a href="{{ route('groupKaryawan.index') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                        <x-atoms.button.button-primary :type="'submit'" :name="'Selanjutnya'" />
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
