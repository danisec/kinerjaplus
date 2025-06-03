<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('groupKaryawan.index') }}">Group Pegawai</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Filter Group Penilaian</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('groupPenilaian.store', $groupKaryawan->id_group_karyawan) }}" method="POST">
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex flex-row items-center gap-1.5 px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Filter Penilaian
                    </h3>

                    <div class="cursor-pointer pt-0.5" x-data="{ showTooltip: false }">
                        <div @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                            <x-atoms.svg.help-circle width='20' height='20' />
                        </div>

                        <div class="xs:text-xs xs:w-10/12 absolute z-10 -ml-28 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:w-auto sm:text-sm dark:text-gray-400"
                            x-show="showTooltip" x-transition>
                            Filter penilaian digunakan untuk menetapkan siapa saja yang berwenang memberikan penilaian
                            kepada atasan atau rekan kerja.
                        </div>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    @foreach ($groupKaryawanArray as $index => $item)
                        <div>
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                                for="nama karyawan">
                                {!! $loop->iteration !!}. {!! $item['nama_alternatif'] !!} sebagai {!! $item['jabatan'] !!} dapat
                                memberikan penilaian kepada:</label>

                            <input name="id_group_karyawan" type="hidden"
                                value="{{ $groupKaryawan->id_group_karyawan }}">
                            <input name="alternatif_pertama[]" type="hidden" value="{{ $item['kode_alternatif'] }}">

                            <div class="mb-6">
                                <select
                                    class="@error('alternatif_kedua') border-red-500 @enderror shadow-theme-xs focus:ring-3 focus:outline-hidden h-11 w-full appearance-none rounded-lg border border-gray-300 px-4 py-2.5 pr-11 text-sm capitalize text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    id="namaKaryawan_{{ $index }}" name="alternatif_kedua[{{ $index }}][]"
                                    multiple required>

                                    @foreach ($groupKaryawanArray as $nestedIndex => $nestedItem)
                                        @if ($nestedItem['kode_alternatif'] != $item['kode_alternatif'])
                                            <option value="{{ $nestedItem['kode_alternatif'] }}">
                                                {{ $nestedItem['nama_alternatif'] . ' - ' . $nestedItem['jabatan'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            @error('alternatif_kedua')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    @endforeach

                    <div class="flex flex-row justify-center gap-4">
                        <x-atoms.button.button-primary :type="'submit'" :name="'Simpan'" />
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        window.groupKaryawanArray = @json($groupKaryawanArray);
    </script>

</x-app-dashboard>
