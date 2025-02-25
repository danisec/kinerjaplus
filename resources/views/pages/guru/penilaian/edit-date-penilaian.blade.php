<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('penilaian.welcome') }}">Penilaian Tahun Ajaran {!! $tahunAjaran !!}</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Ubah Tanggal Penilaian</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Ubah Tanggal Penilaian Tahun Ajaran {!! $tahunAjaran !!}
        </h4>

        <form class="mt-8 space-y-6"
            action="{{ route('tanggalPenilaian.update', $tanggalPenilaian->id_tanggal_penilaian) }}" method="POST">
            @method('PUT')
            @csrf
            @csrf

            <input name="id_group_karyawan" type="hidden" value="{{ $alternatifGroupKaryawan->id_group_karyawan }}"
                readonly>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="tahun ajaran">
                    Tahun Ajaran</label>
                <input class="@error('tahun_ajaran') border-red-500 @enderror field-input-slate w-full"
                    name="tahun_ajaran" type="text" value="{{ $tahunAjaran }}" required @readonly(true)>

                @error('tahun_ajaran')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="semester">
                    Semester</label>
                <select class="@error('semester') border-red-500 @enderror field-input-slate w-full" name="semester"
                    required autofocus>

                    <option selected disabled hidden>Pilih Semester</option>
                    @foreach ($semester as $item)
                        <option value="{{ $item }}"
                            {{ $tanggalPenilaian->semester == $item ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>

                @error('semester')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-row items-center justify-between">
                <div>
                    <label class="mb-2 block text-base font-medium text-gray-900" for="awal tanggal penilaian">
                        Awal Tanggal Penilaian</label>
                    <input class="@error('awal_tanggal_penilaian') border-red-500 @enderror field-input-slate w-72"
                        name="awal_tanggal_penilaian" type="date"
                        value="{{ $tanggalPenilaian->awal_tanggal_penilaian }}" required>

                    @error('awal_tanggal_penilaian')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label class="mb-2 block text-base font-medium text-gray-900" for="akhir tanggal penilaian">
                        Akhir Tanggal Penilaian</label>
                    <input class="@error('akhir_tanggal_penilaian') border-red-500 @enderror field-input-slate w-72"
                        name="akhir_tanggal_penilaian" type="date"
                        value="{{ $tanggalPenilaian->akhir_tanggal_penilaian }}" required>

                    @error('akhir_tanggal_penilaian')
                        <p class="invalid-feedback">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <div class="flex flex-row gap-4">
                <a href="{{ route('penilaian.welcome') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>

                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Ubah'" />
            </div>
        </form>
    </div>

</x-app-dashboard>
