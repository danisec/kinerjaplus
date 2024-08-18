<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('skalaIndikator.index') }}">Data Skala Indikator</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Tambah Skala Indikator</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form class="mx-auto my-8 w-8/12" action="{{ route('skalaIndikator.store') }}" method="POST">
        @csrf

        <div class="mt-8 space-y-6">
            <h4 class="mb-6 text-2xl font-semibold text-gray-900">Tambah Skala Indikator</h4>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama subkriteria">
                    Nama Subkriteria</label>

                <select class="@error('nama_subkriteria') border-red-500 @enderror field-input-slate w-full"
                    id="subkriteria" name="kode_subkriteria" autofocus required>

                    <option selected disabled hidden>Pilih Subkriteria</option>
                    @foreach ($subkriteria as $item)
                        <option value="{{ $item->kode_subkriteria }}"
                            {{ old('nama_subkriteria') == $item->nama_subkriteria ? 'selected' : '' }}>
                            {{ $item->kriteria->nama_kriteria . ' — ' . $item->nama_subkriteria }}
                        </option>
                    @endforeach
                </select>

                @error('kode_subkriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="indikator subkriteria">
                    Indikator Subkriteria</label>

                <select class="@error('id_indikator_subkriteria') border-red-500 @enderror field-input-slate w-full"
                    id="indikatorSubkriteria" name="id_indikator_subkriteria" autofocus required>

                    <option selected disabled hidden>Pilih Indikator Subkriteria</option>
                </select>

                @error('id_indikator_subkriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

        <div class="mt-12 space-y-6">
            <div class="flex flex-row items-center justify-end">
                <x-atoms.button.button-emerald id="add-skala-indikator-btn" :customClass="'w-auto text-center rounded-lg px-5 py-3 add-skala-indikator-btn'" :type="'button'"
                    :name="'Tambah Kolom Skala Indikator'" />

            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="skala indikator">
                    Skala Indikator</label>

                <div id="kolom-skala-indikator">
                    <div class="kolom-skala-indikator my-4 flex flex-row items-center justify-between gap-4">
                        <input name="skala[]" type="hidden" value="1">
                        <textarea class="field-input-slate w-full" name="deskripsi_skala[]" placeholder="Deskripsi Skala 1" rows="3"
                            required></textarea>

                        @error('deskripsi_skala')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror

                        <button class="delete-skala-indikator-btn text-red-600 focus:outline-none" type="button">
                            <x-atoms.svg.trash />
                        </button>
                    </div>
                </div>

            </div>

            <div class="flex flex-row gap-4">
                <a href="{{ route('skalaIndikator.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Simpan'" />
            </div>

        </div>
    </form>

</x-app-dashboard>
