<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('groupKaryawan.index') }}">Data Group Pegawai</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Detail Group Pegawai</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Detail Group Pegawai</h4>

        <div class="my-8 space-y-6">

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama group karyawan">
                    Nama Group Pegawai</label>
                <input class="field-input-slate w-full capitalize" name="nama_group_karyawan" type="text"
                    value="{{ $groupKaryawan->nama_group_karyawan }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama kepala sekolah">
                    Nama Kepala Sekolah / Pimpinan</label>
                <input class="field-input-slate w-full" name="kepala_sekolah" type="text"
                    value="{{ $groupKaryawan->alternatif->nama_alternatif }}" @disabled(true)
                    @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama karyawan">
                    Nama Pegawai</label>
                <div class="field-input-slate w-full">
                    <div class="textAreaHeight flex flex-row flex-wrap items-center gap-2">
                        @foreach ($groupKaryawan->groupKaryawanDetail as $item)
                            <option class="rounded-md bg-emerald-400 p-1 text-sm text-white"
                                value="{{ $item->kode_alternatif }}" @disabled(true) @readonly(true)>
                                {{ $item->alternatif->nama_alternatif . ' - ' . $item->alternatif->jabatan }}
                            </option>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="my-14 space-y-6">

            <div class="mb-6 flex flex-row items-center gap-2">
                <h4 class="text-2xl font-semibold text-gray-900">Filter Penilaian
                </h4>

                <div class="cursor-pointer pt-0.5" x-data="{ showTooltip: false }">
                    <div @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                        <x-atoms.svg.help-circle width='20' height='20' />
                    </div>

                    <div class="absolute z-10 w-96 rounded bg-slate-50 px-2 py-1 text-base text-gray-900"
                        x-show="showTooltip">
                        Filter penilaian digunakan untuk
                        menetapkan siapa yang
                        dapat
                        memberikan penilaian kepada atasan atau rekan yang lainnya.
                    </div>
                </div>
            </div>

            @foreach ($groupKaryawan->groupPenilaian as $index => $item)
                <div>
                    <label class="mb-2 block text-base font-semibold text-gray-900" for="nama karyawan">
                        {!! $loop->iteration . '. ' . $item->alternatifPertama->nama_alternatif !!} sebagai {!! $item->alternatifPertama->jabatan !!} dapat
                        memberikan penilaian kepada:</label>

                    <input name="alternatif_pertama[]" type="hidden"
                        value="{{ $item->alternatifPertama->kode_alternatif }}">

                    <div class="field-input-slate w-full">
                        <div class="textAreaHeight flex flex-row flex-wrap items-center gap-2">
                            @foreach ($item->groupPenilaianDetail as $itemGroupPenilaian)
                                <option class="rounded-md bg-emerald-400 p-1 text-sm text-white"
                                    value="{{ $itemGroupPenilaian->alternatifKedua->kode_alternatif }}"
                                    @disabled(true) @readonly(true)>
                                    {{ $itemGroupPenilaian->alternatifKedua->nama_alternatif . ' - ' . $itemGroupPenilaian->alternatifKedua->jabatan }}
                                </option>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="flex justify-center">
                <a href="{{ route('groupKaryawan.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
            </div>
        </div>
    </div>

</x-app-dashboard>
