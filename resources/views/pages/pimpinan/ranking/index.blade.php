<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Perankingan</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div
        class="my-8 overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <x-molecules.table.table :title="'Daftar Perankingan'" :placeholderSearch="'Cari Perankingan'" :request="request('tahun_ajaran')" :nameSearch="'tahun_ajaran'">
            <x-slot:thead>
                <tr class="border-y border-gray-100 dark:border-gray-800">
                    <th class="min-w-48 whitespace-nowrap py-3 text-left">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Group Pegawai</p>
                        </div>
                    </th>
                    <th class="whitespace-nowrap py-3 text-left">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Tahun Ajaran</p>
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

            @if ($tanggalPenilaian !== null)
                @foreach ($tanggalPenilaian as $index => $item)
                    <tr>
                        <td class="py-3">
                            <div class="flex items-center">
                                <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                    {{ $item->groupKaryawan->nama_group_karyawan }}
                                </p>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="flex items-center">
                                <p class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                    {{ $item->tahun_ajaran }} - {{ $item->semester }}
                                </p>
                            </div>
                        </td>
                        <td class="xs:gap-2.5 flex justify-center p-6 sm:gap-4">
                            <div x-data="{ showTooltip: false }">
                                <a class="hover:text-blue-light-500 font-medium text-gray-600"
                                    href="{{ route('ranking.show', [
                                        $item->id_tanggal_penilaian,
                                        'firstYear' => substr($item->tahun_ajaran, 0, 4),
                                        'secondYear' => substr($item->tahun_ajaran, 5),
                                        'semester' => $item->semester,
                                    ]) }}"
                                    @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                    <x-atoms.svg.eye />
                                </a>

                                <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                    x-show="showTooltip" x-transition>
                                    <span>Show</span>
                                </div>
                            </div>

                            <div x-data="{ isOpen: false, showTooltip: false }">
                                <button class="focus:outline-hidden text-indigo-600" type="button"
                                    @mouseenter="showTooltip = true" @mouseleave="showTooltip = false"
                                    @click="isOpen = true">
                                    <x-atoms.svg.reload />
                                </button>

                                <div class="absolute rounded-sm bg-gray-100 text-xs text-gray-900" x-show="showTooltip">
                                    <span>Perbaharui Ranking</span>
                                </div>

                                <x-molecules.modal.modal-delete :heading="'Konfirmasi'" :class="'bg-indigo-600! hover:bg-indigo-700'" :title="'Perbaharui ranking: ' .
                                    $item->groupKaryawan->nama_group_karyawan .
                                    ' Tahun Ajaran ' .
                                    $item->tahun_ajaran .
                                    ' Semester ' .
                                    ucfirst($item->semester) .
                                    '?'"
                                    :action="route('ranking.destroy', [
                                        $item->id_tanggal_penilaian,
                                        'firstYear' => substr($item->tahun_ajaran, 0, 4),
                                        'secondYear' => substr($item->tahun_ajaran, 5),
                                        'semester' => $item->semester,
                                    ])" :deleteNameButton="'Perbaharui ranking'" />
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr class="border-b bg-white">
                    <td class="px-6 py-4 text-center font-medium text-gray-600" colspan="3">
                        Data belum ada.
                    </td>
                </tr>
            @endif
        </x-molecules.table.table>

        <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-800">
            {{ $tanggalPenilaian->links('vendor.pagination.tailwind') }}
        </div>
    </div>

</x-app-dashboard>
