<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('alternatif.index') }}">Pegawai</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Tambah Pegawai</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('alternatif.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Tambah Pegawai
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div class="hidden">
                        <x-molecules.input.input name="kode_alternatif" label="" :type="'hidden'"
                            :value="encrypt($newKodeAlternatif)" required />
                    </div>

                    <div>
                        <x-molecules.select.select name="nama_alternatif" label="Nama Pegawai" :options="$namaKaryawan
                            ->reject(fn($item) => in_array($item->fullname, $pluckAlternatif))
                            ->pluck('fullname', 'fullname')
                            ->map(function ($name, $key) use ($namaKaryawan) {
                                $role = $namaKaryawan->firstWhere('fullname', $key)?->getRoleNames()?->first();
                                return $name . ' - ' . $role;
                            })"
                            :value="$namaKaryawan" required />
                    </div>

                    <div>
                        <x-molecules.select.select name="jenis_kelamin" label="Jenis Kelamin" :options="collect($jenisKelamin)->mapWithKeys(fn($item) => [$item => $item])"
                            :value="$jenisKelamin" required />
                    </div>

                    <div>
                        <x-molecules.input.input name="tanggal_masuk_kerja" label="Tanggal Masuk Kerja"
                            :type="'date'" :value="old('tanggal_masuk_kerja')" required />
                    </div>

                    <div>
                        <x-molecules.input.input name="nip" label="Nomor Induk Pegawai" :type="'number'"
                            inputmode="numeric" :value="old('nip')" placeholder="12345" required />
                    </div>

                    <div>
                        <x-molecules.input.input name="jabatan" label="Jabatan" :type="'text'" :value="old('jabatan')"
                            placeholder="Guru / Kepala Sekolah / Lainnya" required />
                    </div>

                    <div>
                        <x-molecules.input.input name="pendidikan" label="Pendidikan Terakhir" :type="'text'"
                            :value="old('pendidikan')" placeholder="Sarjana Pendidikan / Lainnya" required />
                    </div>

                    <div class="flex flex-row justify-center gap-4">
                        <a href="{{ route('alternatif.index') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                        <x-atoms.button.button-primary :type="'submit'" :name="'Simpan'" />
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
