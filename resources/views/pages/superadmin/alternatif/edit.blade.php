<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('alternatif.index') }}">Data Karyawan</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Ubah Karyawan</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Ubah Karyawan</h4>

        <form class="mt-8 space-y-6" action="{{ route('alternatif.update', $alternatif->id_alternatif) }}"
            method="POST">
            @method('PUT')
            @csrf

            <div class="hidden">
                <label class="mb-2 block text-base font-medium text-gray-900" for="kode_alternatif">
                    Kode Alternatif</label>
                <input class="@error('kode_alternatif') border-red-500 @enderror field-input-slate w-full"
                    name="kode_alternatif" type="text" value="{{ $alternatif->kode_alternatif }}" required
                    @readonly(true)>

                @error('kode_alternatif')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama karyawan">
                    Nama Karyawan</label>
                <select class="@error('nama_alternatif') border-red-500 @enderror field-input-slate w-full"
                    name="nama_alternatif" required>

                    @foreach ($namaKaryawan as $item)
                        @if (!in_array($item->role, ['superadmin', 'admin', 'IT']))
                            <option class="capitalize" value="{{ $item->fullname }}"
                                {{ $alternatif->nama_alternatif == $item->fullname ? 'selected' : '' }}>
                                {{ $item->fullname . ' - ' . $item->role }}
                            </option>
                        @endif
                    @endforeach
                </select>

                @error('nama_alternatif')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="jenis_kelamin">
                    Jenis Kelamin</label>
                <select class="@error('jenis_kelamin') border-red-500 @enderror field-input-slate w-full"
                    name="jenis_kelamin" required>

                    <option selected disabled hidden>Pilih Jenis Kelamin</option>
                    @foreach ($jenisKelamin as $item)
                        <option value="{{ $item }}"
                            {{ $alternatif->jenis_kelamin == $item ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>

                @error('jenis_kelamin')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="tanggal_masuk_kerja">
                    Tanggal Masuk Kerja</label>
                <input class="@error('tanggal_masuk_kerja') border-red-500 @enderror field-input-slate w-full"
                    name="tanggal_masuk_kerja" type="date" value="{{ $alternatif->tanggal_masuk_kerja }}" required>

                @error('tanggal_masuk_kerja')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nip">
                    Nomor Induk Pegawai</label>
                <input class="@error('nip') border-red-500 @enderror field-input-slate w-full" name="nip"
                    type="number" value="{{ $alternatif->nip }}" required>

                @error('nip')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="jabatan">
                    Jabatan</label>
                <input class="@error('jabatan') border-red-500 @enderror field-input-slate w-full" name="jabatan"
                    type="text" value="{{ $alternatif->jabatan }}" required>

                @error('jabatan')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="pendidikan">
                    Pendidikan Terakhir</label>
                <input class="@error('pendidikan') border-red-500 @enderror field-input-slate w-full" name="pendidikan"
                    type="text" value="{{ $alternatif->pendidikan }}" required>

                @error('pendidikan')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-row gap-4">
                <a href="{{ route('alternatif.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Ubah'" />
            </div>
        </form>
    </div>

</x-layouts.app-dashboard>
