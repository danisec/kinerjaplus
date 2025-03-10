<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('kriteria.index') }}">Data Kriteria</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Tambah Kriteria</span>
            </div>
        </li>
    </x-molecules.breadcrumb>


    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Tambah Kriteria</h4>

        <form class="mt-8 space-y-6" action="{{ route('kriteria.store') }}" method="POST">
            @csrf

            <div class="hidden">
                <label class="mb-2 block text-base font-medium text-gray-900" for="kode kriteria">
                    Kode Kriteria</label>
                <input class="@error('kode_kriteria') border-red-500 @enderror field-input-slate w-full"
                    name="kode_kriteria" type="hidden" type="text" value="{{ $newKodeKriteria }}"
                    placeholder="Contoh: K1" required @readonly(true)>

                @error('kode_kriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama kriteria">
                    Nama Kriteria</label>
                <input class="@error('nama_kriteria') border-red-500 @enderror field-input-slate w-full"
                    name="nama_kriteria" type="text" value="{{ old('nama_kriteria') }}" placeholder="Nama Kriteria"
                    required autofocus>

                @error('nama_kriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="bobot kriteria">
                    Bobot Kriteria</label>

                <div class="flex flex-row justify-between gap-4">
                    <input class="@error('bobot_kriteria') border-red-500 @enderror field-input-slate w-full"
                        name="bobot_kriteria" type="number" value="{{ old('bobot_kriteria') }}" min="1"
                        maxlength="3" minlength="1" max="100" placeholder="1 - 100">

                    <input class="field-input-slate w-10 text-center" type="text" value="%"
                        @disabled(true) @readonly(true)>
                </div>

                @error('bobot_kriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-row gap-4">
                <a href="{{ route('kriteria.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Simpan'" />
            </div>

        </form>
    </div>


</x-app-dashboard>
