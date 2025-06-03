<x-app-dashboard title="{{ $title }}">
    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span class="capitalize">
                @if ($checkTanggalPenilaian != null)
                    Penilaian Tahun Ajaran
                    {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}
                @else
                    Penilaian Tahun Ajaran
                    {!! $tahunAjaran !!}
                @endif
            </span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    @if ($checkGroupKaryawan !== null)
        <div
            class="my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
            @if ($checkTanggalPenilaian !== null)
                <h4 class="xs:text-base font-semibold capitalize text-gray-800 sm:text-lg dark:text-white/90">Penilaian
                    Kinerja
                    Tahun Ajaran
                    {!! $checkTanggalPenilaian->tahun_ajaran !!} -
                    Semester {!! $checkTanggalPenilaian->semester !!}
                </h4>

                @if (Auth::user()->hasRole('kepala sekolah'))
                    <div class="my-8 flex justify-end text-center">
                        <a href="{{ route('tanggalPenilaian.edit', $checkTanggalPenilaian->id_tanggal_penilaian) }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Ubah Tanggal Penilaian'" />
                        </a>
                    </div>
                @endif

                <div class="my-6 w-full rounded-md bg-slate-100 p-4">
                    <p class="text-base font-bold uppercase tracking-wider text-gray-900">Pengantar</p>
                    <p class="xs:text-sm mt-6 font-normal text-gray-900 lg:text-base">Mohon berikan penilaian kinerja
                        terhadap Anda
                        sendiri,
                        rekan kerja, dan atasan Anda. Penilaian ini akan digunakan sebagai bahan evaluasi kinerja Anda
                        selama
                        Tahun Ajaran {!! $checkTanggalPenilaian->tahun_ajaran !!} - <span class="capitalize">Semester
                            {!! $checkTanggalPenilaian->semester !!}.</span> Atas
                        kerjasama Anda
                        kami
                        ucapkan terima kasih.</p>

                    <p class="xs:text-sm mt-6 font-medium text-gray-800 lg:text-base dark:text-white/90">Mulai
                        Penilaian:
                        {{ \Carbon\Carbon::parse($checkTanggalPenilaian->awal_tanggal_penilaian)->format('d-m-Y') }}</p>
                    <p class="xs:text-sm mt-2 font-medium text-gray-800 lg:text-base dark:text-white/90">Akhir
                        Penilaian:
                        {{ \Carbon\Carbon::parse($checkTanggalPenilaian->akhir_tanggal_penilaian)->format('d-m-Y') }}
                    </p>
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('penilaian.create') }}">
                        <x-atoms.button.button-primary :type="'button'" :name="'Mulai'" />
                    </a>
                </div>
            @else
                @if (Auth::user()->hasRole('kepala sekolah'))
                    <div class="mx-auto text-center">
                        <a href="{{ route('tanggalPenilaian.create') }}">
                            <x-atoms.button.button-primary :type="'button'" :name="'Buat Tanggal Penilaian'" />
                        </a>
                    </div>
                @else
                    <div class="my-6 w-full rounded-md bg-slate-100 p-4">
                        <p class="text-base font-medium text-gray-900">Penilaian belum dibuka.</p>
                    </div>
                @endif
            @endif

        </div>
    @else
        <div class="my-6 w-full rounded-md bg-slate-100 p-4">
            <h2 class="xs:text-sm font-normal text-gray-800 sm:text-base dark:text-white/90">Anda belum terdaftar di
                group pegawai. Hubungi admin untuk
                mendaftarkan diri Anda ke dalam
                group pegawai.</h2>
        </div>
    @endif

</x-app-dashboard>
