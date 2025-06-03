<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            @if ($checkTanggalPenilaian !== null)
                <span class="capitalize">Perbandingan Pegawai Tahun Ajaran
                    {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</span>
            @else
                <span>Perbandingan Pegawai Tahun Ajaran
                    {!! $tahunAjaran !!}</span>
            @endif
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div
        class="my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
        @if ($checkTanggalPenilaian != null)
            <h4 class="xs:text-base mb-6 font-semibold capitalize text-gray-800 sm:text-lg dark:text-white/90">
                Perbandingan Antar Pegawai Berdasarkan Kriteria Tahun Ajaran {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester
                {!! $checkTanggalPenilaian->semester !!}</h4>

            <div class="my-6 w-full rounded-md bg-slate-100 p-4">
                <p class="text-base font-bold uppercase tracking-wider text-gray-900">Pengantar</p>
                <p class="xs:text-sm mt-6 font-normal text-gray-900 lg:text-base">Mohon berikan penilaian
                    perbandingan berpasangan
                    antar pegawai berdasarkan kiteria (<span class="italic">pairwise comparison</span>). Penilaian
                    perbandingan antar pegawai berdasarkan kriteria ini
                    akan digunakan sebagai bahan evaluasi kinerja Anda
                    selama
                    Tahun Ajaran {!! $checkTanggalPenilaian->tahun_ajaran !!} <span class="capitalize"> - Semester
                        {!! $checkTanggalPenilaian->semester !!}.</span> Atas
                    kerjasama Anda kami ucapkan terima kasih.</p>

                <p class="xs:text-sm mt-6 font-medium text-gray-800 lg:text-base dark:text-white/90">Mulai Penilaian:
                    {{ \Carbon\Carbon::parse($checkTanggalPenilaian->awal_tanggal_penilaian)->format('d-m-Y') }}</p>
                <p class="xs:text-sm mt-2 font-medium text-gray-800 lg:text-base dark:text-white/90">Akhir Penilaian:
                    {{ \Carbon\Carbon::parse($checkTanggalPenilaian->akhir_tanggal_penilaian)->format('d-m-Y') }}
                </p>
            </div>

            <div class="flex justify-center">
                @if ($perhitunganAlternatif->isEmpty())
                    <a
                        href="{{ route('perhitunganAlternatif.index', ['firstYear' => substr($checkTanggalPenilaian->tahun_ajaran, 0, 4), 'secondYear' => substr($checkTanggalPenilaian->tahun_ajaran, 5), 'semester' => $checkTanggalPenilaian->semester]) }}">
                        <x-atoms.button.button-primary :type="'button'" :name="'Mulai'" />
                    </a>
                @else
                    <a
                        href="{{ route('perhitunganAlternatif.hasil', ['firstYear' => substr($checkTanggalPenilaian->tahun_ajaran, 0, 4), 'secondYear' => substr($checkTanggalPenilaian->tahun_ajaran, 5), 'semester' => $checkTanggalPenilaian->semester]) }}">
                        <x-atoms.button.button-primary :customClass="'h-12 w-80 rounded-full'" :type="'button'" :name="'Hasil Perbandingan Pegawai'" />
                    </a>
                @endif
            </div>
        @else
            <div class="my-6 w-full rounded-md bg-slate-100 p-4">
                <p class="xs:text-sm font-medium text-gray-800 lg:text-base dark:text-white/90">Silakan buat tanggal
                    penilaian dahulu
                    pada <a class="text-blue-600" href="{{ route('penilaian.welcome') }}">menu
                        penilaian</a>
                    untuk dapat
                    melakukan perbandingan antar pegawai.</p>
            </div>
        @endif
    </div>

</x-app-dashboard>
