<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Persetujuan Penilaian</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="my-8">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Persetujuan Penilaian Evaluasi Kinerja</h4>

        <div class="flex flex-row items-center justify-between">
            <div>
                <x-molecules.search :placeholder="'Cari Tahun Penilaian'" :request="request('tahun_ajaran')" :name="'tahun_ajaran'" :value="request('tahun_ajaran')" />
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto rounded-lg shadow-sm">
        <table class="w-full text-left text-base text-gray-900">
            <thead class="bg-slate-100 text-sm uppercase text-gray-900">
                <tr>
                    <th class="px-6 py-3" scope="col">
                        No.
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Tahun Ajaran
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Semester
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Nama Group Pegawai
                    </th>
                    <th class="flex justify-center px-6 py-3" scope="col">
                        Aksi
                    </th>
                </tr>
            </thead>

            @if ($penilaianGroupedByTahun != null && $penilaianGroupedByTahun->count() > 0)
                <tbody>
                    @foreach ($penilaianWithGroupKaryawan as $index => $item)
                        <tr class="border-b bg-white hover:bg-slate-100">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                {{ $index + 1 }}
                            </th>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item['tahun_ajaran'] }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">
                                {{ $item['semester'] }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item['name_group_employee'] }}
                            </td>
                            <td class="flex justify-center gap-4 px-6 py-4">
                                <div x-data="{ showTooltip: false }">
                                    <a class="font-medium text-gray-600"
                                        href="{{ route('persetujuanPenilaian.showTahun', [
                                            'firstYear' => substr($item['tahun_ajaran'], 0, 4),
                                            'secondYear' => substr($item['tahun_ajaran'], 5),
                                            'semester' => $item['semester'],
                                        ]) }}"
                                        @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                        <x-atoms.svg.eye />
                                    </a>

                                    <div class="absolute rounded bg-gray-100 px-2 py-1 text-xs text-gray-900"
                                        x-show="showTooltip">
                                        Detail
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
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

    <div class="bg-white p-6">
        {{ $penilaianGroupedByTahun->links('vendor.pagination.tailwind') }}
    </div>

</x-app-dashboard>
