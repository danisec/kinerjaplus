<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('riwayatPenilaian.index') }}">Riwayat Penilaian</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium capitalize text-gray-500">Tahun Ajaran
                    {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] }} - Semester
                    {{ $tahunAjaranBreadcrumbs['semester'] }}</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="my-8">
        <h4 class="mb-6 text-2xl font-semibold capitalize text-gray-900">Riwayat Penilaian Evaluasi Kinerja
            {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] }} - Semester {{ $tahunAjaranBreadcrumbs['semester'] }}</h4>

        <div class="flex flex-row items-center justify-between">
            <div>
                <x-molecules.search :placeholder="'Cari Riwayat Penilaian'" :request="request('nama_alternatif')" :name="'nama_alternatif'" :value="request('nama_alternatif')" />
            </div>
        </div>
    </div>

    <div class="relative overflow-x-auto rounded-lg shadow-sm">
        <table class="w-full text-left text-base text-gray-900">
            <thead class="bg-slate-100 text-sm uppercase text-gray-900">
                <tr>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        No.
                    </th>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        Tahun Ajaran
                    </th>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        Semester
                    </th>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        Nama Pemberi Nilai
                    </th>
                    <th class="px-6 py-3" scope="col" rowspan="2">
                        Kepada
                    </th>
                    <th class="px-6 py-3 text-center" scope="colgroup" rowspan="2">
                        Aksi
                    </th>
                </tr>
            </thead>

            @if ($penilaian != null && $penilaian->count() > 0)
                @foreach ($penilaian as $item)
                    <tbody>
                        <tr class="border-b bg-white hover:bg-slate-100">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                {{ ($penilaian->currentPage() - 1) * $penilaian->perPage() + $loop->iteration }}
                            </th>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->tanggalPenilaian->tahun_ajaran }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">
                                {{ $item->tanggalPenilaian->semester }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->alternatifPertama->alternatifPertama->nama_alternatif }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->alternatifKedua->alternatifPertama->nama_alternatif }}
                            </td>
                            <td class="flex justify-center gap-4 px-6 py-4">
                                <div x-data="{ showTooltip: false }">
                                    <a class="font-medium text-gray-600"
                                        href="{{ route('riwayatPenilaian.show', $item->id_penilaian) }}"
                                        target="_blank" rel="noreferrer noopener" @mouseenter="showTooltip = true"
                                        @mouseleave="showTooltip = false">
                                        <x-atoms.svg.eye />
                                    </a>

                                    <div class="absolute rounded bg-gray-100 px-2 py-1 text-sm text-gray-900"
                                        x-show="showTooltip">
                                        Detail
                                    </div>
                                </div>
                            </td>
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

    <div class="bg-white p-6">
        {{ $penilaian->links('vendor.pagination.tailwind') }}
    </div>

</x-app-dashboard>
