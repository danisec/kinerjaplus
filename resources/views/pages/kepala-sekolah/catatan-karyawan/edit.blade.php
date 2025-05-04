<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('catatanKaryawan.index') }}">Catatan Pegawai</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium capitalize text-gray-900 hover:text-blue-600"
                    href="{{ route('catatanKaryawan.showTahun', ['firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5), 'semester' => $tahunAjaranBreadcrumbs['semester']]) }}">Tahun
                    Ajaran
                    {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] . ' - Semester ' . $tahunAjaranBreadcrumbs['semester'] }}</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Ubah Catatan Pegawai</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 flex flex-col text-2xl font-semibold text-gray-900">Ubah Catatan Penilaian
            {!! $catatanKaryawan->penilaian->alternatifPertama->alternatifPertama->nama_alternatif !!}
            Kepada
            {!! $catatanKaryawan->penilaian->alternatifKedua->alternatifPertama->nama_alternatif !!}
        </h4>

        <form class="mt-8 space-y-6"
            action="{{ route('catatanKaryawan.update', $catatanKaryawan->id_catatan_karyawan) }}" method="POST">
            @method('PUT')
            @csrf

            <input name="id_penilaian" type="hidden" value="{{ $catatanKaryawan->id_penilaian }}">
            <input name="id_tanggal_penilaian" type="hidden" value="{{ $catatanKaryawan->id_tanggal_penilaian }}">

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="tahun ajaran">
                    Tahun Ajaran</label>
                <input class="@error('tahun_ajaran') border-red-500 @enderror field-input-slate w-full capitalize"
                    name="tahun_ajaran" type="text"
                    value="{{ $catatanKaryawan->tanggalPenilaian->tahun_ajaran . ' - Semester ' . $catatanKaryawan->tanggalPenilaian->semester }}"
                    required @readonly(true)>

                @error('tahun_ajaran')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="catatan">
                    Catatan</label>
                <textarea class="textAreaHeight field-input-slate w-full" name="catatan" rows="3" required>{{ $catatanKaryawan->catatan }}</textarea>

                @error('catatan')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-row gap-4">
                @if (Auth::user()->hasRole(['kepala sekolah']))
                    <a
                        href="{{ route('catatanKaryawan.showTahun', ['firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5), 'semester' => $tahunAjaranBreadcrumbs['semester']]) }}">
                        <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                    </a>
                @else
                    <a
                        href="{{ route('catatanKaryawan.showTahunPimpinan', [$catatanKaryawan->penilaian->alternatifPertama->id_group_karyawan, 'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5), 'semester' => $tahunAjaranBreadcrumbs['semester']]) }}">
                        <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                    </a>
                @endif

                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Ubah'" />
            </div>
        </form>
    </div>

</x-app-dashboard>
