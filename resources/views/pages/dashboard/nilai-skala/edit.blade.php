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
                <span class="mx-2 text-base font-medium text-gray-500">Ubah Nilai Skala</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form class="mx-auto my-8 w-8/12" action="{{ route('nilaiSkala.update') }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mt-8 space-y-6">
            <h4 class="mb-6 text-2xl font-semibold text-gray-900">Ubah Nilai Skala</h4>

            @foreach ($nilaiSkala as $item)
                <div>
                    <label class="mb-2 block text-base font-medium text-gray-900" for="nama subkriteria">Skala
                        {{ $item->skala }}</label>

                    <input name="id_nilai_skala[]" type="hidden" value="{{ $item->id_nilai_skala }}">
                    <input name="skala[]" type="hidden" value="{{ $item->skala }}">
                    <input class="@error('nilai_skala') border-red-500 @enderror field-input-slate w-full"
                        name="nilai_skala[]" type="number" value="{{ $item->nilai_skala }}" autofocus
                        placeholder="Nilai Skala" min="1" max="100" required>

                    @error('nilai_skala')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            @endforeach

            <div class="flex flex-row gap-4">
                <a href="{{ route('skalaIndikator.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Ubah'" />
            </div>
        </div>

    </form>

</x-layouts.app-dashboard>
