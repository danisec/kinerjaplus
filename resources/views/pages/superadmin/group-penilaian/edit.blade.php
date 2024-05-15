<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('groupKaryawan.index') }}">
                    Data Group Karyawan
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
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Filter Group Karyawan
            <p class="mt-1 text-base font-normal leading-normal text-gray-900">Filter group penilaian digunakan untuk
                menetapkan siapa yang
                dapat
                memberikan penilaian kepada atasan atau rekan yang lainnya.</p>
        </h4>

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

            <div class="flex flex-row gap-4">
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Ubah'" />
            </div>
        </form>
    </div>

    <script>
        window.groupKaryawanArray = @json($groupKaryawanArray);
    </script>

</x-layouts.app-dashboard>
