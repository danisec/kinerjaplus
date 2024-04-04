<x-layouts.app-dashboard title="{{ $title }}">

    @if (in_array(Auth::user()->role, ['superadmin', 'IT']))
        <div class="my-2 flex flex-row flex-wrap gap-6">
            <div class="h-28 w-52 rounded-md bg-blue-200/50 shadow-md shadow-blue-100">
                <div class="mt-6 p-2">
                    <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countUser }}</p>
                    <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah User</p>
                </div>
            </div>
    @endif

    @if (Auth::user()->role == 'superadmin')
        <div class="h-28 w-52 rounded-md bg-purple-200/50 shadow-md shadow-purple-100">
            <div class="mt-6 p-2">
                <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countKriteria }}</p>
                <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah Kriteria</p>
            </div>
        </div>

        <div class="h-28 w-52 rounded-md bg-violet-200/50 shadow-md shadow-violet-100">
            <div class="mt-6 p-2">
                <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countSubkriteria }}</p>
                <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah Subkriteria</p>
            </div>
        </div>

        <div class="h-28 w-52 rounded-md bg-emerald-200/50 shadow-md shadow-emerald-100">
            <div class="mt-6 p-2">
                <p class="flex justify-center text-xl font-semibold text-gray-900">{{ $countAlternatif }}</p>
                <p class="flex justify-center text-lg font-normal text-gray-900">Jumlah Karyawan</p>
            </div>
        </div>
        </div>
    @endif

    @if (in_array(Auth::user()->role, ['superadmin', 'yayasan', 'kepala sekolah', 'atasan langsung', 'guru']))
        <div class="my-12">
            <div class="flex flex-row items-center gap-4">
                <h4 class="text-xl font-bold text-gray-700">Ranking Kinerja Karyawan Tahun Ajaran
                </h4>

                <div class="w-52">
                    <select class="field-input-slate w-full" id="selectTahun" name="tahun_ajaran"
                        data-current-tahun="{{ $currentTahunAjaran }}">
                        <option selected disabled hidden>{{ $currentTahunAjaran }}</option>
                        @foreach ($tahunAjaranRanking as $tahunAjaran)
                            <option value="{{ $tahunAjaran }}">
                                {{ $tahunAjaran }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="container mt-6">
                <div class="rounded-md bg-white p-4 shadow-md shadow-slate-100">
                    <div id="topRanking"></div>

                    <div class="animate-pulse" id="loadingChart" role="status">
                        <div class="mb-2.5 h-2 w-48 rounded-full bg-slate-100"></div>
                        <div class="mt-4 flex items-baseline">
                            <div class="ms-6 h-56 w-full rounded-t-lg bg-slate-100"></div>
                            <div class="ms-6 h-72 w-full rounded-t-lg bg-slate-100"></div>
                            <div class="ms-6 h-64 w-full rounded-t-lg bg-slate-100"></div>
                            <div class="ms-6 h-80 w-full rounded-t-lg bg-slate-100"></div>
                            <div class="ms-6 h-72 w-full rounded-t-lg bg-slate-100"></div>
                        </div>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </div>
        </div>
    @endif

    @if (in_array(Auth::user()->role, ['superadmin', 'yayasan', 'kepala sekolah', 'atasan langsung']))
        <div class="relative overflow-x-auto rounded-lg shadow-sm">
            <table class="w-full text-left text-base text-gray-900" id="tableRank">
                <thead class="bg-slate-100 text-sm uppercase text-gray-900">
                    <tr>
                        <th class="px-6 py-3" scope="col">
                            No.
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Tahun Ajaran
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Nama Karyawan
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Nilai Kinerja
                        </th>
                        <th class="px-6 py-3 text-center" scope="col">
                            Rank
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="animate-pulse" id="loadingRow" role="status">
                        <td colspan="5">
                            <div class="mb-4 h-2.5 w-full rounded-full bg-slate-100"></div>
                            <div class="mb-4 h-2.5 w-full rounded-full bg-slate-100"></div>
                            <div class="mb-4 h-2.5 w-full rounded-full bg-slate-100"></div>
                            <div class="mb-4 h-2.5 w-full rounded-full bg-slate-100"></div>
                            <div class="mb-4 h-2.5 w-full rounded-full bg-slate-100"></div>
                            <span class="sr-only">Loading...</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="my-4 flex flex-row items-center justify-center">
            <div class="rounded-md bg-white p-4 shadow-sm shadow-slate-100" id="paginationLinks">
            </div>
        </div>
    @endif

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</x-layouts.app-dashboard>
