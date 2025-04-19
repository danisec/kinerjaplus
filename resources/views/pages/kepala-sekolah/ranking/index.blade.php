<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                @if ($checkTanggalPenilaian != null)
                    <span class="mx-2 text-base font-medium capitalize text-gray-500">Perankingan Kinerja Pegawai Tahun
                        Ajaran
                        {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</span>
                @else
                    <span class="mx-2 text-base font-medium text-gray-500">Perankingan
                        {!! $tahunAjaran !!}</span>
                @endif
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="my-8">
        @if ($checkTanggalPenilaian != null)
            <h4 class="mb-6 text-2xl font-semibold capitalize text-gray-900">Hasil Ranking Kinerja Pegawai Tahun Ajaran
                {!! $checkTanggalPenilaian->tahun_ajaran !!} - Semester {!! $checkTanggalPenilaian->semester !!}</h4>

            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                @if ($checkPerhitunganAlternatif->isEmpty())
                    <table class="w-full text-left text-base text-gray-900">
                        <thead class="bg-slate-100 text-base capitalize text-gray-900">
                            <tr>
                                <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                    colspan="{{ $kriteria->count() + 2 }}">
                                    Bobot Prioritas Kriteria
                                </th>
                            </tr>

                            <tr>
                                <th class="px-6 py-3" scope="col">
                                </th>

                                @foreach ($kriteria as $dataKriteria)
                                    <th class="px-3 py-3 text-center" scope="col">
                                        {{ $dataKriteria->nama_kriteria }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-emerald-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    Bobot Prioritas Kriteria
                                </th>

                                @foreach ($bobotPrioritasSubkriteria as $bobotSubkriteria)
                                    <td class="bg-emerald-100 px-3 py-3 text-center">
                                        <input
                                            class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                            type="text" value="{{ $bobotSubkriteria->bobot_prioritas }}" readonly>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>

                    </table>
                @else
                    <table class="w-full text-left text-base text-gray-900">
                        <thead class="bg-slate-100 text-base capitalize text-gray-900">
                            <tr>
                                <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                    colspan="{{ $kriteria->count() + 2 }}">
                                    Perhitungan Bobot Prioritas Pegawai Terhadap Bobot Prioritas Kriteria
                                </th>
                            </tr>

                            <tr>
                                <th class="px-6 py-3" scope="col">
                                </th>

                                @foreach ($kriteria as $dataKriteria)
                                    <th class="px-3 py-3 text-center" scope="col">
                                        {{ $dataKriteria->nama_kriteria }}
                                    </th>
                                @endforeach

                                <th class="px-3 py-3 text-center" scope="col">
                                    Total Bobot
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="border-b bg-white">
                                <th class="w-12 whitespace-nowrap bg-emerald-100 px-6 py-4 font-medium text-gray-900"
                                    scope="row">
                                    Bobot Prioritas Kriteria
                                </th>

                                @foreach ($bobotPrioritasSubkriteria as $bobotSubkriteria)
                                    <td class="bg-emerald-100 px-3 py-3 text-center">
                                        <input
                                            class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                            type="text" value="{{ $bobotSubkriteria->bobot_prioritas }}" readonly>
                                    </td>
                                @endforeach
                            </tr>

                            @foreach ($alternatifPenilaian as $dataAlternatif)
                                @if ($dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif !== $checkAuthAlternatif)
                                    <tr class="border-b bg-white">
                                        <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                            scope="row">
                                            {{ $dataAlternatif->alternatifKedua->alternatifPertama->nama_alternatif }}
                                        </th>

                                        @foreach ($bobotAlternatif as $bobot)
                                            @if ($bobot->kode_alternatif == $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif)
                                                <td class="px-3 py-3 text-center">
                                                    <input
                                                        class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                        type="text" value="{{ $bobot->bobot_prioritas }}" readonly>
                                                </td>
                                            @endif
                                        @endforeach

                                        @foreach ($totalBobotKriteria as $keyAlternatif => $totalBobot)
                                            @if ($keyAlternatif == $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif)
                                                <td class="px-3 py-3 text-center">
                                                    <input
                                                        class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                        type="text" value="{{ $totalBobot }}" readonly>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>

                    </table>
                @endif
            </div>

            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ $kriteria->count() + 2 }}">
                                Rata-rata Nilai Pegawai Terhadap Kriteria
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                            </th>

                            @foreach ($kriteria as $dataKriteria)
                                <th class="px-3 py-3 text-center" scope="col">
                                    {{ $dataKriteria->nama_kriteria }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatifPenilaian as $dataAlternatif)
                            @if ($dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif !== $checkAuthAlternatif)
                                <tr class="border-b bg-white">
                                    <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                        scope="row">
                                        {{ $dataAlternatif->alternatifKedua->alternatifPertama->nama_alternatif }}
                                    </th>

                                    @foreach ($avgNilaiKriteria[$dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif] as $kodeSubkriteria => $nilai)
                                        <td class="px-3 py-3 text-center">
                                            <input
                                                class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                type="text" value="{{ substr($nilai, 0, 8) }}" readonly>
                                        </td>
                                    @endforeach
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="relative my-8 overflow-x-auto rounded-lg shadow-sm">
                <table class="w-full text-left text-base text-gray-900">
                    <thead class="bg-slate-100 text-base capitalize text-gray-900">
                        <tr>
                            <th class="border-b bg-slate-100 py-2 text-center font-bold text-gray-900"
                                colspan="{{ $kriteria->count() + 2 }}">
                                Ranking Kinerja Pegawai
                            </th>
                        </tr>

                        <tr>
                            <th class="px-6 py-3" scope="col">
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                Total Nilai
                            </th>

                            <th class="px-3 py-3 text-center" scope="col">
                                Rank
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($alternatifPenilaian as $dataAlternatif)
                            @if ($dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif !== $checkAuthAlternatif)
                                <tr class="border-b bg-white">
                                    <th class="w-12 whitespace-nowrap bg-slate-100 px-6 py-4 font-medium text-gray-900"
                                        scope="row">
                                        {{ $dataAlternatif->alternatifKedua->alternatifPertama->nama_alternatif }}
                                    </th>

                                    @foreach ($nilaiAlternatif as $keyAlternatif => $nilai)
                                        @if ($keyAlternatif == $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif)
                                            <td class="px-3 py-3 text-center">
                                                <input
                                                    class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                    type="text" value="{{ substr($nilai, 0, 8) }}" readonly>
                                            </td>
                                        @endif
                                    @endforeach

                                    @foreach ($rankAlternatif as $keyAlternatif => $rank)
                                        @if ($keyAlternatif == $dataAlternatif->alternatifKedua->alternatifPertama->kode_alternatif)
                                            <td class="px-3 py-3 text-center">
                                                <input
                                                    class="w-24 rounded-md border-none bg-slate-100 text-center focus:ring-slate-100"
                                                    type="text" value="{{ $rank }}" readonly>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>
            </div>
        @else
            <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                <p class="text-base font-medium text-gray-900">Silakan buat tanggal penilaian dahulu
                    pada <a class="text-blue-600" href="{{ route('penilaian.welcome') }}">menu
                        penilaian</a>
                    untuk dapat
                    melakukan perankingan.</p>
            </div>
        @endif
    </div>

</x-app-dashboard>
