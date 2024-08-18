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
                <span class="mx-2 text-base font-medium text-gray-500">Tambah Nilai Skala</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form class="mx-auto my-8 w-8/12" action="{{ route('nilaiSkala.store') }}" method="POST">
        @csrf

        <div class="mt-8 space-y-6">
            <h4 class="mb-6 text-2xl font-semibold text-gray-900">Tambah Nilai Skala</h4>

            @for ($i = 0; $i < 4; $i++)
                <div>
                    <label class="mb-2 block text-base font-medium text-gray-900" for="nama subkriteria">Skala
                        {{ $i + 1 }}</label>

                    <input name="skala[]" type="hidden" value="{{ $i + 1 }}">
                    <input class="@error('nilai_skala[]') border-red-500 @enderror field-input-slate w-full"
                        name="nilai_skala[]" type="number" value="{{ old('nilai_skala[]') }}" autofocus
                        placeholder="1 - 100" min="1" max="100" required>

                    @error('nilai_skala')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            @endfor

            <div class="flex flex-row gap-4">
                <a href="{{ route('skalaIndikator.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Simpan'" />
            </div>
        </div>

    </form>

    </x-layouts.app-dashboard>
