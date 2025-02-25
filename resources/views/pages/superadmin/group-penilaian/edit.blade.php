<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('groupKaryawan.index') }}">
                    Data Group Pegawai
                </a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Filter Group Penilaian</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-10/12">

        <div class="mb-6 flex flex-row items-center gap-2">
            <h4 class="text-2xl font-semibold text-gray-900">Filter Penilaian
            </h4>

            <div class="pt-0.5" x-data="{ showTooltip: false }">
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

        <form class="mt-8 space-y-6" action="{{ route('groupPenilaian.update', $groupKaryawan->id_group_karyawan) }}"
            method="POST">
            @method('PUT')
            @csrf

            @foreach ($groupKaryawanArray as $index => $item)
                <div>
                    <label class="mb-2 block text-base font-semibold text-gray-900" for="nama karyawan">
                        {!! $loop->iteration !!}. {!! $item['nama_alternatif'] !!} sebagai {!! $item['jabatan'] !!} dapat
                        memberikan penilaian kepada:</label>

                    <input name="id_group_karyawan" type="hidden" value="{{ $groupKaryawan->id_group_karyawan }}">
                    <input name="alternatif_pertama[]" type="hidden" value="{{ $item['kode_alternatif'] }}">

                    <div class="mb-6">
                        <select class="@error('alternatif_kedua') border-red-500 @enderror field-input-slate w-full"
                            id="namaKaryawan_{{ $index }}" name="alternatif_kedua[{{ $index }}][]"
                            multiple required>

                            @foreach ($groupKaryawanArray as $nestedIndex => $nestedItem)
                                @if ($nestedItem['kode_alternatif'] != $item['kode_alternatif'])
                                    @php
                                        // Cek apakah kode_alternatif ini sudah ada di group_penilaian
                                        $isSelected = false;
                                        foreach ($item['group_penilaian'] as $penilaian) {
                                            if ($penilaian['alternatif_kedua'] == $nestedItem['kode_alternatif']) {
                                                $isSelected = true;
                                                break;
                                            }
                                        }
                                    @endphp

                                    <option value="{{ $nestedItem['kode_alternatif'] }}"
                                        {{ $isSelected ? 'selected' : '' }}>
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

            <div class="flex flex-row gap-4">
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Ubah'" />
            </div>
        </form>
    </div>

    <script>
        window.groupKaryawanArray = @json($groupKaryawanArray);
    </script>

</x-app-dashboard>
