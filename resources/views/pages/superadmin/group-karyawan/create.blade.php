<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('groupKaryawan.index') }}">
                    Data Group Karyawan
                </a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">
                    Tambah Group Karyawan
                </span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">
            Tambah Group Karyawan
        </h4>

        <form class="mt-8 space-y-6" action="{{ route('groupKaryawan.store') }}" method="POST">
            @csrf

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama group karyawan">
                    Nama Group Karyawan
                </label>
                <input
                    class="@error('nama_group_karyawan') border-red-500 @enderror field-input-slate w-full capitalize"
                    name="nama_group_karyawan" type="text" autofocus placeholder="Nama Group Karyawan" required />

                @error('nama_group_karyawan')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama kepala sekolah">
                    Nama Kepala Sekolah
                </label>
                <select class="@error('kepala_sekolah') border-red-500 @enderror field-input-slate w-full"
                    name="kepala_sekolah" required>
                    <option selected disabled hidden>
                        Pilih Kepala Sekolah
                    </option>
                    @foreach ($kepalaSekolah as $item)
                        <option value="{{ $item->kode_alternatif }}"
                            {{ old('kepala_sekolah') == $item->kode_alternatif ? 'selected' : '' }}>
                            {{ $item->nama_alternatif . ' - ' . $item->jabatan }}
                        </option>
                    @endforeach
                </select>

                @error('kepala_sekolah')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama karyawan">
                    Nama Karyawan
                </label>
                <select class="@error('nama_alternatif') border-red-500 @enderror field-input-slate w-full"
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

            <div class="flex flex-row gap-4">
                <a href="{{ route('groupKaryawan.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Selanjutnya'" />
            </div>
        </form>
    </div>

</x-layouts.app-dashboard>
