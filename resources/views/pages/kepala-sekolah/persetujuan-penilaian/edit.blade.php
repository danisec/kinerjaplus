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
                <span class="mx-2 text-base font-medium text-gray-500">Ubah Status Persetujuan Penilaian</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <form class="mx-auto my-8 w-8/12" action="{{ route('persetujuanPenilaian.update', $penilaian->id_penilaian) }}"
        method="POST">
        @method('PUT')
        @csrf

        <div class="mt-8 space-y-6">
            <h4 class="text-2xl font-semibold text-gray-900">Ubah Status Persetujuan Penilaian
                {{ $penilaian->alternatifPertama->nama_alternatif }} Kepada
                {{ $penilaian->alternatifKedua->nama_alternatif }} Tahun Ajaran {{ $penilaian->tahun_ajaran }}</h4>

            {{-- <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="nama kriteria">
                    Nama Kriteria</label>

                <select class="@error('nama_kriteria') border-red-500 @enderror field-input-slate w-full"
                    name="kode_kriteria" required>

                    <option selected disabled hidden>Pilih Kriteria</option>
                    @foreach ($kriteria as $item)
                        <option value="{{ $item->kode_kriteria }}"
                            {{ $subkriteria->kriteria->nama_kriteria == $item->nama_kriteria ? 'selected' : '' }}>
                            {{ $item->nama_kriteria }}
                        </option>
                    @endforeach
                </select>

                @error('kode_kriteria')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div> --}}

        </div>
    </form>

</x-app-dashboard>
