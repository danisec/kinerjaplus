<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                @if ($checkTanggalPenilaian != null)
                    <span class="mx-2 text-base font-medium capitalize text-gray-500">Perbandingan Pegawai Tahun Ajaran
                        {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</span>
                @else
                    <span class="mx-2 text-base font-medium text-gray-500">Perbandingan Pegawai Tahun Ajaran
                        {!! $tahunAjaran !!}</span>
                @endif
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-full">
        @if ($checkTanggalPenilaian != null)
            <h4 class="text-2xl font-semibold capitalize text-gray-900">Perbandingan Antar Pegawai Berdasarkan Kriteria
                Tahun
                Ajaran {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</h4>

            <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                <p class="text-base font-bold uppercase tracking-wider text-gray-900">Pengantar</p>
                <p class="mt-6 text-base font-normal text-gray-900">Mohon berikan penilaian perbandingan berpasangan
                    antar pegawai berdasarkan kiteria (<span class="italic">pairwise comparison</span>). Penilaian
                    perbandingan antar pegawai berdasarkan kriteria ini
                    akan digunakan sebagai bahan evaluasi kinerja Anda
                    selama
                    Tahun Ajaran {!! $checkTanggalPenilaian->tahun_ajaran !!} <span class="capitalize"> - Semester
                        {!! $checkTanggalPenilaian->semester !!}.</span> Atas
                    kerjasama Anda kami ucapkan terima kasih.</p>

                <p class="mt-6 text-base font-medium text-gray-900">Mulai Penilaian:
                    {{ \Carbon\Carbon::parse($checkTanggalPenilaian->awal_tanggal_penilaian)->format('d-m-Y') }}</p>
                <p class="mt-2 text-base font-medium text-gray-900">Akhir Penilaian:
                    {{ \Carbon\Carbon::parse($checkTanggalPenilaian->akhir_tanggal_penilaian)->format('d-m-Y') }}
                </p>
            </div>

            <div class="flex justify-center">
                @if ($perhitunganAlternatif->isEmpty())
                    <a
                        href="{{ route('perhitunganAlternatif.index', ['firstYear' => substr($checkTanggalPenilaian->tahun_ajaran, 0, 4), 'secondYear' => substr($checkTanggalPenilaian->tahun_ajaran, 5), 'semester' => $checkTanggalPenilaian->semester]) }}">
                        <x-atoms.button.button-primary :customClass="'h-12 w-48 rounded-full'" :type="'button'" :name="'Mulai'" />
                    </a>
                @else
                    <a
                        href="{{ route('perhitunganAlternatif.hasil', ['firstYear' => substr($checkTanggalPenilaian->tahun_ajaran, 0, 4), 'secondYear' => substr($checkTanggalPenilaian->tahun_ajaran, 5), 'semester' => $checkTanggalPenilaian->semester]) }}">
                        <x-atoms.button.button-primary :customClass="'h-12 w-80 rounded-full'" :type="'button'" :name="'Lihat Hasil Perbandingan Pegawai'" />
                    </a>
                @endif
            </div>
        @else
            <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                <p class="text-base font-medium text-gray-900">Silakan buat tanggal penilaian dahulu
                    pada <a class="text-blue-600" href="{{ route('penilaian.welcome') }}">menu
                        penilaian</a>
                    untuk dapat
                    melakukan perbandingan antar pegawai berdasarkan
                    kriteria.</p>
            </div>
        @endif
    </div>

</x-app-dashboard>
