<x-layouts.app-dashboard title="{{ $title }}">

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
                <span class="mx-2 text-base font-medium text-gray-500">Ubah Skala Indikator</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form class="mx-auto my-8 w-8/12" action="{{ route('skalaIndikator.update', $skalaIndikator->id_skala_indikator) }}"
        method="POST">
        @method('PUT')
        @csrf

        <div class="mt-8 space-y-6">
            <h4 class="mb-6 text-2xl font-semibold text-gray-900">Ubah Skala Indikator</h4>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama subkriteria">
                    Nama Subkriteria</label>

                <input class="field-input-slate w-full" name="id_indikator_subkriteria" type="text"
                    value="{{ $skalaIndikator->indikatorSubkriteria->subkriteria->nama_subkriteria }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="indikator subkriteria">
                    Indikator Subkriteria</label>

                <textarea class="textAreaHeight field-input-slate w-full" name="id_indikator_subkriteria" rows="auto"
                    @disabled(true) @readonly(true)>{{ $skalaIndikator->indikatorSubkriteria->indikator_subkriteria }}</textarea>
            </div>

            <div>
                @foreach ($skalaIndikator->skalaIndikatorDetail as $item)
                    <label class="mb-2 block text-base font-medium text-gray-900" for="skala indikator">
                        Skala {{ $item->skala }}</label>

                    <div class="kolom-skala-indikator my-4">
                        <input name="skala[]" type="hidden" value="{{ $item->skala }}">
                        <textarea class="textAreaHeight field-input-slate w-full" name="deskripsi_skala[]" rows="auto" required>{{ $item->deskripsi_skala }}</textarea>

                        @error('deskripsi_skala')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                @endforeach
            </div>

        </div>


        <div class="flex flex-row gap-4">
            <a href="{{ route('skalaIndikator.index') }}">
                <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
            </a>
            <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Ubah'" />
        </div>

    </form>

</x-layouts.app-dashboard>
