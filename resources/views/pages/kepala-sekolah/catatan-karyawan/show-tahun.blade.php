<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('catatanKaryawan.index') }}">Catatan Pegawai</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium capitalize text-gray-500">Tahun Ajaran
                    {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] . ' - Semester ' . $tahunAjaranBreadcrumbs['semester'] }}</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="my-8">
        <h4 class="mb-6 text-2xl font-semibold capitalize text-gray-900">Catatan Pegawai Evaluasi Kinerja
            {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] . ' - Semester ' . $tahunAjaranBreadcrumbs['semester'] }}</h4>

        <div class="flex flex-row items-center justify-between">
            <div>
                <x-molecules.search :placeholder="'Cari Catatan Pegawai'" :request="request('nama_alternatif')" :name="'nama_alternatif'" :value="request('nama_alternatif')" />
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
                        Nama Pemberi Nilai
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Kepada
                    </th>
                    <th class="px-6 py-3" scope="col">
                        Penilaian
                    </th>
                    <th class="px-6 py-3 text-center" scope="colgroup">
                        Aksi
                    </th>
                </tr>
            </thead>

            @if ($catatanKaryawan != null && $catatanKaryawan->count() > 0)
                @foreach ($catatanKaryawan as $item)
                    <tbody>
                        <tr class="border-b bg-white hover:bg-slate-100">
                            <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                                {{ ($catatanKaryawan->currentPage() - 1) * $catatanKaryawan->perPage() + $loop->iteration }}
                            </th>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->tanggalPenilaian->tahun_ajaran }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 capitalize">
                                {{ $item->tanggalPenilaian->semester }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->penilaian->alternatifPertama->alternatifPertama->nama_alternatif }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                {{ $item->penilaian->alternatifKedua->alternatifPertama->nama_alternatif }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div x-data="{ showTooltip: false }">
                                    <a class="font-medium text-blue-600 underline hover:text-blue-500"
                                        href="{{ route('persetujuanPenilaian.show', $item->id_penilaian) }}"
                                        target="_blank" rel="noreferrer noopener" @mouseenter="showTooltip = true"
                                        @mouseleave="showTooltip = false">
                                        Lihat Penilaian
                                    </a>
                                </div>
                            </td>
                            <td class="flex justify-center gap-4 px-6 py-4">
                                <div x-data="{ showTooltip: false }">
                                    <a class="font-medium text-gray-600"
                                        href="{{ route('catatanKaryawan.show', ['id' => $item->id_catatan_karyawan, 'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5), 'semester' => $tahunAjaranBreadcrumbs['semester']]) }}"
                                        @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                        <x-atoms.svg.eye />
                                    </a>

                                    <div class="absolute rounded bg-gray-100 px-2 py-1 text-xs text-gray-900"
                                        x-show="showTooltip">
                                        Detail
                                    </div>
                                </div>

                                <div x-data="{ showTooltip: false }">
                                    <a class="font-medium text-blue-600"
                                        href="{{ route('catatanKaryawan.edit', ['id' => $item->id_catatan_karyawan, 'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4), 'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5), 'semester' => $tahunAjaranBreadcrumbs['semester']]) }}"
                                        @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                        <x-atoms.svg.pen />
                                    </a>

                                    <div class="absolute rounded bg-gray-100 px-2 py-1 text-sm text-gray-900"
                                        x-show="showTooltip">
                                        <span>Ubah</span>
                                    </div>
                                </div>

                                <div x-data="{ isOpen: false }">
                                    <button class="text-red-600 focus:outline-none" type="button"
                                        @click="isOpen = true">
                                        <x-atoms.svg.trash />
                                    </button>

                                    <x-molecules.modal-delete :title="'Apakah Anda akan yakin ingin menghapus catatan pegawai : ' .
                                        $item->penilaian->alternatifPertama->alternatifPertama->nama_alternatif .
                                        ' Kepada ' .
                                        $item->penilaian->alternatifKedua->alternatifPertama->nama_alternatif .
                                        ' Tahun Ajaran ' .
                                        $item->tanggalPenilaian->tahun_ajaran .
                                        ' - Semester ' .
                                        ucfirst(strtolower($item->tanggalPenilaian->semester)) .
                                        '?'" :action="route('catatanKaryawan.destroy', $item->id_catatan_karyawan)" />
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
        {{ $catatanKaryawan->links('vendor.pagination.tailwind') }}
    </div>

</x-app-dashboard>
