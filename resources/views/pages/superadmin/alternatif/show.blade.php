<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('alternatif.index') }}">Data Pegawai</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Detail Pegawai</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Detail Pegawai</h4>

        <div class="mt-8 space-y-6">
            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="kode_alternatif">
                    Kode Alternatif</label>
                <input class="field-input-slate w-full" name="kode_alternatif" type="text"
                    value="{{ $alternatif->kode_alternatif }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama_alternatif">
                    Nama Pegawai</label>
                <input class="field-input-slate w-full capitalize" name="nama_alternatif" type="text"
                    value="{{ $alternatif->nama_alternatif . ' - ' . $alternatif->users->getRoleNames()->first() }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="jenis_kelamin">
                    Jenis Kelamin</label>
                <input class="field-input-slate w-full" name="jenis_kelamin" value="{{ $alternatif->jenis_kelamin }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="tanggal_masuk_kerja">
                    Tanggal Masuk Kerja</label>
                <input class="field-input-slate w-full" name="tanggal_masuk_kerja" type="date"
                    value="{{ $alternatif->tanggal_masuk_kerja }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nip">
                    Nomor Induk Pegawai</label>
                <input class="field-input-slate w-full" name="nip" type="number" value="{{ $alternatif->nip }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="jabatan">
                    Jabatan</label>
                <input class="field-input-slate w-full" name="jabatan" type="text" value="{{ $alternatif->jabatan }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="pendidikan">
                    Pendidikan Terakhir</label>
                <input class="field-input-slate w-full" name="pendidikan" type="text"
                    value="{{ $alternatif->pendidikan }}" @disabled(true) @readonly(true)>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('alternatif.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
            </div>
        </div>
    </div>

</x-app-dashboard>
