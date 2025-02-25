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
                <span class="mx-2 text-base font-medium text-gray-500">Tambah Pegawai</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Tambah Pegawai</h4>

        <form class="mt-8 space-y-6" action="{{ route('alternatif.store') }}" method="POST">
            @csrf

            <div class="hidden">
                <label class="mb-2 block text-base font-medium text-gray-900" for="kode_alternatif">
                    Kode Alternatif</label>
                <input class="@error('kode_alternatif') border-red-500 @enderror field-input-slate w-full"
                    name="kode_alternatif" type="hidden" type="text" value="{{ $newKodeAlternatif }}" autofocus
                    placeholder="A1" required>

                @error('kode_alternatif')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama karyawan">
                    Nama Pegawai</label>
                <select class="@error('nama_alternatif') border-red-500 @enderror field-input-slate w-full capitalize"
                    name="nama_alternatif" required>

                    <option selected disabled hidden>Pilih Nama Pegawai</option>
                    @foreach ($namaKaryawan as $item)
                        @if (!in_array($item->fullname, $pluckAlternatif))
                            <option class="capitalize" value="{{ $item->fullname }}"
                                {{ old('nama_alternatif') == $item->fullname ? 'selected' : '' }}>
                                {{ $item->fullname . ' - ' . $item->getRoleNames()->first() }}
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
                        <option value="{{ $item }}" {{ old('jenis_kelamin') == $item ? 'selected' : '' }}>
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
                    name="tanggal_masuk_kerja" type="date" value="{{ old('tanggal_masuk_kerja') }}" required>

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
                    type="number" value="{{ old('nip') }}" placeholder="1234567890" required>

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
                    type="text" value="{{ old('jabatan') }}" placeholder="Jabatan" required>

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
                    type="text" value="{{ old('pendidikan') }}" placeholder="Pendidikan" required>

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
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Simpan'" />
            </div>
        </form>
    </div>

</x-app-dashboard>
