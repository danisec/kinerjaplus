<x-app-dashboard title="{{ $title }}">

    <div class="my-2">
        @if ($checkGroupKaryawan !== null)
            @if (Auth::user()->hasAnyRole([
                    'kepala sekolah',
                    'guru',
                    'tata usaha tenaga pendidikan',
                    'tata usaha non tenaga pendidikan',
                    'kerohanian tenaga pendidikan',
                    'kerohanian non tenaga pendidikan',
                ]))
                <div class="mb-12">
                    <div class="flex flex-row items-center gap-4">
                        <input id="kodeAlternatif" name="kode_alternatif" type="hidden"
                            value="{{ $checkGroupKaryawan->alternatif->kode_alternatif }}">
                        <h4 class="xs:text-base font-semibold text-gray-800 sm:text-lg dark:text-white/90" id="namaGroup"
                            data-nama-group="{{ $checkGroupKaryawan->alternatif->nama_alternatif }}">Kinerja
                            {!! $checkGroupKaryawan->alternatif->nama_alternatif !!} Per Tahun Ajaran
                        </h4>
                    </div>

                    <div class="container mt-6">
                        <div class="rounded-md bg-white p-4 shadow-md shadow-slate-100">
                            <div id="selfRanking"></div>
                            <div class="animate-pulse" id="loadingSelfChart" role="status">
                                <x-atoms.skeleton.skeleton-chart />
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="min-w-full table-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-y border-gray-100 dark:border-gray-800">
                                    <th class="min-w-40 whitespace-nowrap py-3 text-left">
                                        <div class="flex items-center">
                                            <div
                                                class="xs:text-xs sm:text-theme-md flex flex-row items-center gap-0.5 font-medium text-gray-800">
                                                @sortablelink('id_tanggal_penilaian', 'Tahun Ajaran')
                                                <x-atoms.svg.arrow-down @class(['mt-0.5 h-4 w-4']) />
                                            </div>
                                        </div>
                                    </th>
                                    <th class="min-w-48 whitespace-nowrap py-3 text-left">
                                        <div class="flex items-center">
                                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama
                                                Pegawai</p>
                                        </div>
                                    </th>
                                    <th class="min-w-28 whitespace-nowrap py-3 text-left">
                                        <div class="flex items-center">
                                            <div
                                                class="xs:text-xs sm:text-theme-md flex flex-row items-center gap-0.5 font-medium text-gray-800">
                                                @sortablelink('nilai', 'Nilai Kinerja')
                                                <x-atoms.svg.arrow-down @class(['mt-0.5 h-4 w-4']) />
                                            </div>
                                        </div>
                                    </th>
                                    @if (Auth::user()->hasRole(['kepala sekolah']))
                                        <th class="whitespace-nowrap py-3 text-left">
                                            <div class="flex items-center">
                                                <div
                                                    class="xs:text-xs sm:text-theme-md flex flex-row items-center justify-center gap-0.5 font-medium text-gray-800">
                                                    @sortablelink('rank', 'Rank')
                                                    <x-atoms.svg.arrow-down @class(['mt-0.5 h-4 w-4']) />
                                                </div>
                                            </div>
                                        </th>
                                    @endif
                                </tr>
                            </thead>

                            @if ($selfRankings != null && $selfRankings->count() > 0)
                                @foreach ($selfRankings as $item)
                                    <tbody>
                                        <tr>
                                            <td class="py-3">
                                                <div class="flex items-center">
                                                    <p
                                                        class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                                        {{ $item->tanggalPenilaian->tahun_ajaran }} -
                                                        {{ $item->tanggalPenilaian->semester }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div class="flex items-center">
                                                    <p
                                                        class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                                        {{ $item->alternatif->alternatifPertama->nama_alternatif }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div class="flex items-center">
                                                    <p
                                                        class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                                        {{ substr($item->nilai, 0, 9) }}
                                                    </p>
                                                </div>
                                            </td>
                                            @if (Auth::user()->hasRole(['kepala sekolah']))
                                                <td class="py-3">
                                                    <div class="flex items-center">
                                                        <p
                                                            class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                                            {{ $item->rank }}
                                                        </p>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                @endforeach
                            @else
                                <tbody>
                                    <tr class="border-b bg-white">
                                        <td class="px-6 py-4 text-center font-medium text-gray-600" colspan="6">
                                            Data belum ada.
                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>

                <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-800">
                    {{ $selfRankings->links('vendor.pagination.tailwind') }}
                </div>
            @endif

            @if (Auth::user()->hasRole(['kepala sekolah']))
                <div class="my-12">
                    <div class="xs:flex-col flex justify-between gap-4 lg:flex-row lg:items-center">
                        <h4 class="xs:text-base font-semibold text-gray-800 sm:text-lg dark:text-white/90"
                            id="namaGroup" data-nama-group="{{ $checkGroupKaryawan->nama_group_karyawan }}">Ranking
                            Kinerja
                            {!! $checkGroupKaryawan->nama_group_karyawan !!} Tahun Ajaran
                        </h4>

                        <div class="xs:w-full lg:w-96">
                            <select
                                class="shadow-theme-xs focus:ring-3 focus:outline-hidden h-11 w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-11 text-sm capitalize text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                id="selectTahun" name="tahun_ajaran"
                                data-current-tahun="{{ $firstTanggalPenilaian->id_tanggal_penilaian ?? '' }}"
                                data-current-text="{{ $firstTanggalPenilaian ? $firstTanggalPenilaian->tahun_ajaran . ' - ' . $firstTanggalPenilaian->semester : '' }}">

                                <option selected disabled hidden>
                                    {{ $firstTanggalPenilaian ? $firstTanggalPenilaian->tahun_ajaran . ' - ' . $firstTanggalPenilaian->semester : '' }}
                                </option>
                                @foreach ($tanggalPenilaian as $itemTanggalPenilaian)
                                    <option
                                        data-text="{{ $itemTanggalPenilaian->tahun_ajaran . ' - ' . $itemTanggalPenilaian->semester }}"
                                        value="{{ $itemTanggalPenilaian->id_tanggal_penilaian }}">
                                        {{ $itemTanggalPenilaian->tahun_ajaran . ' - ' . $itemTanggalPenilaian->semester }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="container mt-6">
                        <div class="rounded-md bg-white p-4 shadow-md shadow-slate-100">
                            <div id="topRanking"></div>
                            <div class="animate-pulse" id="loadingRankChart" role="status">
                                <x-atoms.skeleton.skeleton-chart />
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (Auth::user()->hasRole(['kepala sekolah']))
                <div
                    class="overflow-x-auto rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="min-w-full table-auto">
                        <table class="min-w-full" id="tableRank">
                            <thead>
                                <tr class="border-y border-gray-100 dark:border-gray-800">
                                    <th class="min-w-28 whitespace-nowrap py-3 text-left">
                                        <div class="flex items-center">
                                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Tahun
                                                Ajaran</p>
                                        </div>
                                    </th>
                                    <th class="min-w-48 whitespace-nowrap py-3 text-left">
                                        <div class="flex items-center">
                                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama
                                                Pegawai</p>
                                        </div>
                                    </th>
                                    <th class="min-w-40 whitespace-nowrap py-3 text-left">
                                        <div class="flex items-center">
                                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nilai
                                                Kinerja</p>
                                        </div>
                                    </th>
                                    <th class="whitespace-nowrap py-3 text-left">
                                        <div class="flex items-center">
                                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Rank</p>
                                        </div>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="animate-pulse" id="loadingRow" role="status">
                                    <td colspan="5">
                                        <x-atoms.skeleton.skeleton-table />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="my-4 flex flex-row items-center justify-center">
                        <div class="shadow-xs rounded-md bg-white p-4 shadow-slate-100" id="paginationLinks">
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="my-6 w-full rounded-md bg-slate-100 p-8">
                <p class="text-base font-medium text-gray-900">Anda belum terdaftar di group pegawai. Hubungi admin
                    untuk mendaftarkan diri Anda ke dalam
                    group pegawai.</p>
            </div>
        @endif
    </div>

    <script>
        window.currentUser = @json([
            'user' => auth()->user(),
            'roles' => auth()->user()->getRoleNames(),
        ]);
    </script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</x-app-dashboard>
