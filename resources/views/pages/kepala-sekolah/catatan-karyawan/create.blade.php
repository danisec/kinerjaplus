<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('persetujuanPenilaian.index') }}">Persetujuan Penilaian</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 capitalize text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('persetujuanPenilaian.showTahun', [
                    'firstYear' => substr($tahunAjaran['tahun_ajaran'], 0, 4),
                    'secondYear' => substr($tahunAjaran['tahun_ajaran'], 5),
                    'semester' => $tahunAjaran['semester'],
                ]) }}">Tahun
                Ajaran {!! $tahunAjaran['tahun_ajaran'] !!}</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span class="capitalize">Tambah Catatan Pegawai</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8"
        action="{{ route('persetujuanPenilaian.storeCatatan', [
            $penilaian->id_penilaian,
            'firstYear' => substr($tahunAjaran['tahun_ajaran'], 0, 4),
            'secondYear' => substr($tahunAjaran['tahun_ajaran'], 5),
            'semester' => $tahunAjaran['semester'],
        ]) }}"
        method="POST">
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Tambah Catatan Penilaian {!! $penilaian->alternatifPertama->alternatifPertama->nama_alternatif !!} Kepada {!! $penilaian->alternatifKedua->alternatifPertama->nama_alternatif !!}
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <input name="id_penilaian" type="hidden" value="{{ $penilaian->id_penilaian }}">
                    <input name="id_tanggal_penilaian" type="hidden" value="{{ $penilaian->id_tanggal_penilaian }}">

                    <div>
                        <x-molecules.input.input name="tahun_ajaran" label="Tahun Ajaran" :type="'text'"
                            :value="$tahunAjaran['tahun_ajaran'] . ' - Semester ' . $tahunAjaran['semester']" required readonly disabled />
                    </div>

                    <div>
                        <x-molecules.textarea.textarea name="catatan" label="Catatan" :placeholder="'Catatan'"
                            :value="old('catatan')" rows="6" />
                    </div>

                    <div class="flex flex-row justify-center gap-4">
                        @if (Auth::user()->hasRole(['kepala sekolah']))
                            <a
                                href="{{ route('persetujuanPenilaian.showTahun', [
                                    'firstYear' => substr($tahunAjaran['tahun_ajaran'], 0, 4),
                                    'secondYear' => substr($tahunAjaran['tahun_ajaran'], 5),
                                    'semester' => $tahunAjaran['semester'],
                                ]) }}">
                                <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                            </a>
                        @else
                            <a
                                href="{{ route('persetujuanPenilaian.showTahunPimpinan', [
                                    $penilaian->alternatifPertama->id_group_karyawan,
                                    'firstYear' => substr($tahunAjaran['tahun_ajaran'], 0, 4),
                                    'secondYear' => substr($tahunAjaran['tahun_ajaran'], 5),
                                    'semester' => $tahunAjaran['semester'],
                                ]) }}">
                                <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                            </a>
                        @endif

                        <x-atoms.button.button-primary :type="'submit'" :name="'Simpan'" />
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
