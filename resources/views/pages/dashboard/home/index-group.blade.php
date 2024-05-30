<x-layouts.app-dashboard title="{{ $title }}">

    @if (in_array(Auth::user()->role, ['yayasan', 'deputi']))
        <div class="my-2">
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

                <div class="w-64">
                    <select class="field-input-slate w-full" id="selectNamaGroup" name="nama_group_karyawan"
                        data-nama-group="{{ $firstNamaGroupKaryawan->nama_group_karyawan }}">
                        <option selected disabled hidden>{{ $firstNamaGroupKaryawan->nama_group_karyawan }}</option>
                        @foreach ($namaGroupKaryawan as $nama)
                            <option value="{{ $nama }}">
                                {{ $nama }}
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

        <div class="relative mt-10 overflow-x-auto rounded-lg shadow-sm">
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

    <script>
        window.currentUser = @json(auth()->user());
    </script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

</x-layouts.app-dashboard>
