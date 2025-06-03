<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('penilaian.welcome') }}">Penilaian Tahun Ajaran {!! $tahunAjaran !!}</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Buat Tanggal Penilaian</span>
        </li>
    </x-molecules.breadcrumb>

    <form class="my-8" action="{{ route('tanggalPenilaian.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Buat Tanggal Penilaian Tahun Ajaran {!! $tahunAjaran !!}
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <input name="id_group_karyawan" type="hidden"
                        value="{{ $alternatifGroupKaryawan->id_group_karyawan }}" readonly>

                    <div>
                        <x-molecules.input.input name="tahun_ajaran" label="Tahun Ajaran" :type="'text'"
                            :value="$tahunAjaran" required readonly />
                    </div>

                    <div>
                        <x-molecules.select.select name="semester" label="Semester" :options="collect($semester)->mapWithKeys(fn($item) => [$item => $item])->toArray()" :value="old('semester')"
                            required />
                    </div>

                    <div class="xs:flex-col flex items-center justify-between gap-4 sm:flex-row">
                        <div class="w-full">
                            <x-molecules.input.input name="awal_tanggal_penilaian" label="Awal Tanggal Penilaian"
                                :type="'date'" :value="old('awal_tanggal_penilaian')" required />
                        </div>
                        <div class="w-full">
                            <x-molecules.input.input name="akhir_tanggal_penilaian" label="Akhir Tanggal Penilaian"
                                :type="'date'" :value="old('akhir_tanggal_penilaian')" required />
                        </div>
                    </div>

                    <div class="flex flex-row justify-center gap-4">
                        <a href="{{ route('penilaian.welcome') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                        <x-atoms.button.button-primary :type="'submit'" :name="'Simpan'" />
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
