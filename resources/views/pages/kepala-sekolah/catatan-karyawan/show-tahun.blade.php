<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('catatanKaryawan.index') }}">Catatan Pegawai</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span class="capitalize">Tahun Ajaran
                {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] . ' - Semester ' . $tahunAjaranBreadcrumbs['semester'] }}</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div
        class="my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <x-molecules.table.table
            title="Catatan Pegawai Evaluasi Kinerja
            {{ $tahunAjaranBreadcrumbs['tahun_ajaran'] . ' - Semester ' . $tahunAjaranBreadcrumbs['semester'] }}"
            :placeholderSearch="'Cari Nama Pegawai'" :request="request('nama_alternatif')" :nameSearch="'nama_alternatif'">
            <x-slot:thead>
                <tr class="border-y border-gray-100 dark:border-gray-800">
                    <th class="min-w-48 whitespace-nowrap py-3 text-left">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Pemberi Nilai</p>
                        </div>
                    </th>
                    <th class="min-w-48 whitespace-nowrap py-3 text-left">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Kepada</p>
                        </div>
                    </th>
                    <th class="whitespace-nowrap py-3 text-left">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Penilaian</p>
                        </div>
                    </th>
                    <th class="flex justify-center px-6 py-3">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md text-center font-medium text-gray-800">Aksi
                            </p>
                        </div>
                    </th>
                </tr>
            </x-slot:thead>

            @forelse ($catatanKaryawan as $item)
                <tr>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                {{ $item->penilaian->alternatifPertama->alternatifPertama->nama_alternatif }}
                            </p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                {{ $item->penilaian->alternatifKedua->alternatifPertama->nama_alternatif }}
                            </p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <div x-data="{ showTooltip: false }">
                                <a class="xs:text-xs font-medium text-blue-600 underline hover:text-blue-500 sm:text-sm"
                                    href="{{ route('persetujuanPenilaian.show', $item->id_penilaian) }}" target="_blank"
                                    rel="noreferrer noopener" @mouseenter="showTooltip = true"
                                    @mouseleave="showTooltip = false">
                                    Penilaian
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="xs:gap-2.5 flex justify-center p-6 sm:gap-4">
                        <div x-data="{ showTooltip: false }">
                            <a class="hover:text-blue-light-500 font-medium text-gray-600"
                                href="{{ route('catatanKaryawan.show', [
                                    'id' => $item->id_catatan_karyawan,
                                    'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4),
                                    'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5),
                                    'semester' => $tahunAjaranBreadcrumbs['semester'],
                                ]) }}"
                                @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                <x-atoms.svg.eye />
                            </a>

                            <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                x-show="showTooltip" x-transition>
                                <span>Show</span>
                            </div>
                        </div>

                        <div x-data="{ showTooltip: false }">
                            <a class="font-medium text-blue-600 hover:text-blue-600"
                                href="{{ route('catatanKaryawan.edit', [
                                    'id' => $item->id_catatan_karyawan,
                                    'firstYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 0, 4),
                                    'secondYear' => substr($tahunAjaranBreadcrumbs['tahun_ajaran'], 5),
                                    'semester' => $tahunAjaranBreadcrumbs['semester'],
                                ]) }}"
                                @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                <x-atoms.svg.comment />
                            </a>

                            <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                x-show="showTooltip" x-transition>
                                <span>Edit</span>
                            </div>
                        </div>

                        <div x-data="{ showTooltip: false, isOpen: false }">
                            <button class="text-gray-600 hover:text-red-600" type="button"
                                @mouseenter="showTooltip = true" @mouseleave="showTooltip = false"
                                @click="isOpen = true">
                                <x-atoms.svg.trash />
                            </button>

                            <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                x-show="showTooltip" x-transition>
                                <span>Delete</span>
                            </div>

                            <x-molecules.modal.modal-delete :title="'Apakah Anda yakin ingin menghapus catatan pegawai: ' .
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
            @empty
                <tr class="border-b bg-white">
                    <td class="px-6 py-4 text-center font-medium text-gray-600" colspan="3">
                        Data belum ada.
                    </td>
                </tr>
            @endforelse
        </x-molecules.table.table>

        <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-800">
            {{ $catatanKaryawan->links('vendor.pagination.tailwind') }}
        </div>
    </div>

</x-app-dashboard>
