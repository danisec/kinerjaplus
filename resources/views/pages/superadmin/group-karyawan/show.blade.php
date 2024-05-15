<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('groupKaryawan.index') }}">Data Group Karyawan</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Detail Group Karyawan</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Detail Group Karyawan</h4>

        <div class="my-8 space-y-6">

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama group karyawan">
                    Nama Group Karyawan</label>
                <input class="field-input-slate w-full capitalize" name="nama_group_karyawan" type="text"
                    value="{{ $groupKaryawan->nama_group_karyawan }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama kepala sekolah">
                    Nama Kepala Sekolah</label>
                <input class="field-input-slate w-full" name="kepala_sekolah" type="text"
                    value="{{ $groupKaryawan->alternatif->nama_alternatif }}" @disabled(true)
                    @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama karyawan">
                    Nama Karyawan</label>
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
            <h4 class="mb-6 text-2xl font-semibold text-gray-900">Detail Filter Group Penilaian
                <p class="mt-1 text-base font-normal leading-normal text-gray-900">Filter group penilaian digunakan
                    untuk
                    menetapkan siapa yang
                    dapat
                    memberikan penilaian kepada atasan atau rekan yang lainnya.</p>
            </h4>

            @foreach ($groupKaryawan->groupPenilaian as $index => $item)
                <div>
                    <label class="mb-2 block text-base font-semibold text-gray-900" for="nama karyawan">
                        {!! $loop->iteration . '.' . $item->alternatifPertama->nama_alternatif !!} sebagai {!! $item->alternatifPertama->jabatan !!} dapat
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

</x-layouts.app-dashboard>
