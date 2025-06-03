<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('skalaIndikator.index') }}">Skala Indikator</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Ubah Nilai Skala</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('nilaiSkala.update') }}" method="POST">
        @method('PUT')
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Ubah Nilai Skala
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    @foreach ($nilaiSkala as $item)
                        <input name="id_nilai_skala[]" type="hidden" value="{{ $item->id_nilai_skala }}">
                        <input name="skala[]" type="hidden" value="{{ $item->skala }}">

                        <div>
                            <x-molecules.input.input name="nilai_skala[]" label="Skala {{ $item->skala }}"
                                :type="'number'" min="1" maxlength="3" minlength="1" max="100"
                                :value="$item->nilai_skala" required />
                        </div>
                    @endforeach

                    <div class="flex flex-row justify-center gap-4">
                        <a href="{{ route('skalaIndikator.index') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                        <x-atoms.button.button-primary :type="'submit'" :name="'Ubah'" />
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
