<x-layouts.app-dashboard title="{{ $title }}">

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
                <span class="mx-2 text-base font-medium text-gray-500">Detail Data Kriteria</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Detail Data Kriteria</h4>

        <div class="mt-8 space-y-6">
            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="kode kriteria">
                    Kode Kriteria</label>
                <input class="field-input-slate w-full" name="kode_kriteria" type="text"
                    value="{{ $kriteria->kode_kriteria }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama kriteria">
                    Nama Kriteria</label>
                <input class="field-input-slate w-full" name="nama_kriteria" type="text"
                    value="{{ $kriteria->nama_kriteria }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="bobot kriteria">
                    Bobot Kriteria</label>

                <div class="flex flex-row justify-between gap-4">
                    <input class="field-input-slate w-full" name="bobot_kriteria" type="number"
                        value="{{ $kriteria->bobot_kriteria }}" @disabled(true) @readonly(true)>

                    <input class="field-input-slate w-10 text-center" type="text" value="%"
                        @disabled(true) @readonly(true)>
                </div>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('kriteria.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
            </div>
        </div>
    </div>

</x-layouts.app-dashboard>
