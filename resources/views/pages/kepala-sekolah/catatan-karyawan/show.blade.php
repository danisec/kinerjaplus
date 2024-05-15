<x-layouts.app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('catatanKaryawan.index') }}">Catatan Karyawan</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Detail Catatan Karyawan</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Detail Catatan Karyawan {!! $catatanKaryawan->penilaian->alternatifPertama->alternatifPertama->nama_alternatif !!}
            Kepada
            {!! $catatanKaryawan->penilaian->alternatifKedua->alternatifPertama->nama_alternatif !!}</h4>

        <form class="mt-8 space-y-6"
            action="{{ route('catatanKaryawan.update', $catatanKaryawan->id_catatan_karyawan) }}" method="POST">
            @method('PUT')
            @csrf

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="tahun ajaran">
                    Tahun Ajaran</label>
                <input class="@error('tahun_ajaran') border-red-500 @enderror field-input-slate w-full"
                    name="tahun_ajaran" type="text" value="{{ $catatanKaryawan->tahun_ajaran }}" required
                    @readonly(true) @disabled(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="catatan">
                    Catatan</label>
                <textarea class="textAreaHeight field-input-slate w-full" name="catatan" rows="3" required @readonly(true)
                    @disabled(true)>{{ $catatanKaryawan->catatan }}</textarea>
            </div>

            <div class="flex justify-center">
                <a href="{{ url()->previous() }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
            </div>
        </form>
    </div>

</x-layouts.app-dashboard>
