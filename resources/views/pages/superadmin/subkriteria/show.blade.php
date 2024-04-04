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
                <span class="mx-2 text-base font-medium text-gray-500">Detail Subkriteria</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">

        <div class="mt-8 space-y-6">
            <h4 class="mb-6 text-2xl font-semibold text-gray-900">Subkriteria</h4>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama kriteria">
                    Nama Kriteria</label>

                <input class="field-input-slate w-full" name="kode_subkriteria" type="text"
                    value="{{ $subkriteria->kriteria->nama_kriteria }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="kode subkriteria">
                    Kode Subkriteria</label>
                <input class="field-input-slate w-full" name="kode_subkriteria" type="text"
                    value="{{ $subkriteria->kode_subkriteria }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama subkriteria">
                    Nama Subkriteria</label>
                <input class="field-input-slate w-full" name="nama_subkriteria" type="text"
                    value="{{ $subkriteria->nama_subkriteria }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="deskripsi subkriteria">
                    Deskripsi Subkriteria</label>
                <textarea class="textAreaHeight field-input-slate w-full" name="deskripsi_subkriteria" type="text" rows="3"
                    @disabled(true) @readonly(true)>{{ $subkriteria->deskripsi_subkriteria }}</textarea>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="bobot kriteria">
                    Bobot Subkriteria</label>

                <div class="flex flex-row justify-between gap-4">
                    <input class="field-input-slate w-full" name="bobot_subkriteria" type="number"
                        value="{{ $subkriteria->bobot_subkriteria }}" @disabled(true) @readonly(true)>

                    <input class="field-input-slate w-10 text-center" type="text" value="%"
                        @disabled(true) @readonly(true)>
                </div>
            </div>

        </div>

        <div class="mt-12 space-y-6">
            <h4 class="text-2xl font-semibold text-gray-900">Indikator</h4>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="indikator subkriteria">
                    Indikator Subkriteria</label>

                <div id="kolom-subkriteria">
                    @foreach ($subkriteria->indikatorSubkriteria as $item)
                        <textarea class="textAreaHeight field-input-slate mb-4 w-full" name="indikator_subkriteria[]" rows="3"
                            @disabled(true) @readonly(true)>{{ $item->indikator_subkriteria }}</textarea>
                    @endforeach
                </div>

            </div>

            <div class="flex justify-center">
                <a href="{{ route('subkriteria.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
            </div>

        </div>
    </div>

</x-layouts.app-dashboard>
