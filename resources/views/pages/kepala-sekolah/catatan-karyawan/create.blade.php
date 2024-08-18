<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('persetujuanPenilaian.index') }}">Persetujuan Penilaian</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('persetujuanPenilaian.showTahun', ['firstYear' => substr($tahunAjaran['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaran['tahun_ajaran'], 5), 'semester' => $tahunAjaran['semester']]) }}">Tahun
                    Ajaran {!! $tahunAjaran['tahun_ajaran'] !!}</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Tambah Catatan Pegawai</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 flex flex-col text-2xl font-semibold text-gray-900">Tambah Catatan Penilaian
            {!! $penilaian->alternatifPertama->alternatifPertama->nama_alternatif !!}
            Kepada
            {!! $penilaian->alternatifKedua->alternatifPertama->nama_alternatif !!}
            <p class="text-sm font-normal text-gray-900"><span class="align-super text-red-600">&Star;</span>Buatkan
                catatan
                pegawai
                jika
                status penilaian tidak
                disetujui.</p>
        </h4>

        <form class="mt-8 space-y-6"
            action="{{ route('persetujuanPenilaian.updateCatatan', [$penilaian->id_penilaian, 'firstYear' => substr($tahunAjaran['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaran['tahun_ajaran'], 5), 'semester' => $tahunAjaran['semester']]) }}"
            method="POST">
            @method('PUT')
            @csrf

            <input name="id_penilaian" type="hidden" value="{{ $penilaian->id_penilaian }}">
            <input name="id_tanggal_penilaian" type="hidden" value="{{ $penilaian->id_tanggal_penilaian }}">
            <input name="status" type="hidden" value="Tidak Disetujui">

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="tahun ajaran">
                    Tahun Ajaran</label>
                <input name="tahun_ajaran" type="hidden" value="{{ $tahunAjaran['tahun_ajaran'] }}">

                <input class="@error('tahun_ajaran') border-red-500 @enderror field-input-slate w-full capitalize"
                    type="text"
                    value="{{ $tahunAjaran['tahun_ajaran'] . ' - Semester ' . $tahunAjaran['semester'] }}" required
                    @readonly(true)>

                @error('tahun_ajaran')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="catatan">
                    Catatan</label>
                <textarea class="field-input-slate w-full" name="catatan" placeholder="Catatan" rows="3" autofocus required>{{ old('catatan') }}</textarea>

                @error('catatan')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-row gap-4">
                <a href="{{ route('catatanKaryawan.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Simpan'" />
            </div>
        </form>
    </div>

</x-app-dashboard>
