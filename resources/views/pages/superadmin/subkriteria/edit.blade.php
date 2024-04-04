<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('subkriteria.index') }}">Data Subkriteria</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Ubah Subkriteria</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form class="mx-auto my-8 w-8/12" action="{{ route('subkriteria.update', $subkriteria->id_subkriteria) }}"
        method="POST">
        @method('PUT')
        @csrf

        <div class="mt-8 space-y-6">
            <h4 class="mb-6 text-2xl font-semibold text-gray-900">Ubah Subkriteria</h4>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama kriteria">
                    Nama Kriteria</label>

                <select class="@error('nama_kriteria') border-red-500 @enderror field-input-slate w-full"
                    name="kode_kriteria" required>

                    <option selected disabled hidden>Pilih Kriteria</option>
                    @foreach ($kriteria as $item)
                        <option value="{{ $item->kode_kriteria }}"
                            {{ $subkriteria->kriteria->nama_kriteria == $item->nama_kriteria ? 'selected' : '' }}>
                            {{ $item->nama_kriteria }}
                        </option>
                    @endforeach
                </select>

                @error('kode_kriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="hidden">
                <label class="mb-2 block text-base font-medium text-gray-900" for="kode subkriteria">
                    Kode Subkriteria</label>
                <input class="@error('kode_subkriteria') border-red-500 @enderror field-input-slate w-full"
                    name="kode_subkriteria" type="text" value="{{ $subkriteria->kode_subkriteria }}" required>

                @error('kode_subkriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama subkriteria">
                    Nama Subkriteria</label>
                <input class="@error('nama_subkriteria') border-red-500 @enderror field-input-slate w-full"
                    name="nama_subkriteria" type="text" value="{{ $subkriteria->nama_subkriteria }}" required>

                @error('nama_subkriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="deskripsi subkriteria">
                    Deskripsi Subkriteria</label>
                <textarea class="@error('deskripsi_subkriteria') border-red-500 @enderror textAreaHeight field-input-slate w-full"
                    name="deskripsi_subkriteria" type="text" rows="3">{{ $subkriteria->deskripsi_subkriteria }}</textarea>

                @error('deskripsi_subkriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="bobot subkriteria">
                    Bobot Subkriteria</label>

                <div class="flex flex-row justify-between gap-4">
                    <input class="@error('bobot_subkriteria') border-red-500 @enderror field-input-slate w-full"
                        name="bobot_subkriteria" type="number" value="{{ $subkriteria->bobot_subkriteria }}"
                        min="1" maxlength="3" minlength="1" max="100" required>

                    <input class="field-input-slate w-10 text-center" type="text" value="%"
                        @disabled(true) @readonly(true)>
                </div>

                @error('bobot_subkriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

        </div>

        <div class="mt-12 space-y-6">
            <h4 class="text-2xl font-semibold text-gray-900">Ubah Indikator</h4>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="indikator subkriteria">
                    Indikator Subkriteria</label>

                <div id="kolom-subkriteria">
                    @foreach ($subkriteria->indikatorSubkriteria as $item)
                        <textarea class="textAreaHeight field-input-slate mb-4 w-full" name="indikator_subkriteria[]"
                            placeholder="Indikator Subkriteria" rows="auto" required>{{ $item->indikator_subkriteria }}</textarea>

                        @error('indikator_subkriteria')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    @endforeach
                </div>

            </div>

            <div class="flex flex-row gap-4">
                <a href="{{ route('subkriteria.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Ubah'" />
            </div>

        </div>
    </form>

</x-layouts.app-dashboard>
