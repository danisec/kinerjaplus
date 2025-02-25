<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                @if ($checkTanggalPenilaian != null)
                    <span class="mx-2 text-base font-medium capitalize text-gray-500">Penilaian Tahun Ajaran
                        {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</span>
                @else
                    <span class="mx-2 text-base font-medium text-gray-500">Penilaian Tahun Ajaran
                        {!! $tahunAjaran !!}</span>
                @endif
            </div>
        </li>
    </x-molecules.breadcrumb>

    @if ($checkGroupKaryawan != null)
        <div class="mx-auto my-8 w-full">

            @if ($checkTanggalPenilaian !== null)
                <h4 class="text-2xl font-semibold capitalize text-gray-900">Penilaian Kinerja Tahun Ajaran
                    {!! $checkTanggalPenilaian->tahun_ajaran !!} -
                    Semester {!! $checkTanggalPenilaian->semester !!}
                </h4>

                @if (Auth::user()->hasRole('kepala sekolah'))
                    <div class="my-8 flex justify-end text-center">
                        <a href="{{ route('tanggalPenilaian.edit', $checkTanggalPenilaian->id_tanggal_penilaian) }}">
                            <x-atoms.button.button-primary :customClass="'h-12 w-56 rounded-md'" :type="'button'" :name="'Ubah Tanggal Penilaian'" />
                        </a>
                    </div>
                @endif

                <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                    <p class="text-base font-bold uppercase tracking-wider text-gray-900">Pengantar</p>
                    <p class="mt-6 text-base font-normal text-gray-900">Mohon berikan penilaian kinerja terhadap Anda
                        sendiri,
                        rekan kerja, dan atasan Anda. Penilaian ini akan digunakan sebagai bahan evaluasi kinerja Anda
                        selama
                        Tahun Ajaran {!! $checkTanggalPenilaian->tahun_ajaran !!} - <span class="capitalize">Semester
                            {!! $checkTanggalPenilaian->semester !!}.</span> Atas
                        kerjasama Anda
                        kami
                        ucapkan terima kasih.</p>

                    <p class="mt-6 text-base font-medium text-gray-900">Mulai Penilaian:
                        {{ \Carbon\Carbon::parse($checkTanggalPenilaian->awal_tanggal_penilaian)->format('d-m-Y') }}</p>
                    <p class="mt-2 text-base font-medium text-gray-900">Akhir Penilaian:
                        {{ \Carbon\Carbon::parse($checkTanggalPenilaian->akhir_tanggal_penilaian)->format('d-m-Y') }}
                    </p>
                </div>

                <div class="flex justify-center">
                    <a href="{{ route('penilaian.create') }}">
                        <x-atoms.button.button-primary :customClass="'h-12 w-48 rounded-full'" :type="'button'" :name="'Mulai'" />
                    </a>
                </div>
            @else
                @if (Auth::user()->hasRole('kepala sekolah'))
                    <div class="mx-auto mb-8 text-center">
                        <a href="{{ route('tanggalPenilaian.create') }}">
                            <x-atoms.button.button-primary :customClass="'h-12 w-56 rounded-md'" :type="'button'" :name="'Buat Tanggal Penilaian'" />
                        </a>
                    </div>
                @else
                    <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                        <p class="text-base font-medium text-gray-900">Penilaian belum dibuka.</p>
                    </div>
                @endif
            @endif

        </div>
    @else
        <div class="my-6 w-full rounded-md bg-slate-100 p-8">
            <h2 class="text-base font-medium text-gray-900">Anda belum terdaftar di group pegawai. Hubungi admin untuk
                mendaftarkan diri Anda ke dalam
                group pegawai.</h2>
        </div>
    @endif

</x-app-dashboard>
