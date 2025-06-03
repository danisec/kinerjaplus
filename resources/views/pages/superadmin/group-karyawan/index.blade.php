<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Group Pegawai</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="my-8">
        <div class="flex flex-row items-center justify-end">
            @can('direct.permission', 'kelola group pegawai')
                <div>
                    <a href="{{ route('groupKaryawan.create') }}">
                        <x-atoms.button.button-primary :type="'button'" :name="'Tambah Group Pegawai'" />
                    </a>
                </div>
            @endcan
        </div>
    </div>

    <div
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <x-molecules.table.table :title="'Daftar Group Pegawai'" :placeholderSearch="'Cari Group Pegawai'" :request="request('nama_group_karyawan')" :nameSearch="'nama_group_karyawan'">
            <x-slot:thead>
                <tr class="border-y border-gray-100 dark:border-gray-800">
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Group Pegawai</p>
                        </div>
                    </th>
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Kepala Sekolah</p>
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

            @forelse ($groupKaryawan as $item)
                <tr>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                {{ $item->nama_group_karyawan }}
                            </p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                {{ $item->alternatif->nama_alternatif }}
                            </p>
                        </div>
                    </td>
                    <td class="xs:gap-2.5 flex justify-center p-6 sm:gap-4">
                        @if (Auth::user()->hasAnyDirectPermission(['view group pegawai', 'kelola group pegawai']) ||
                                Auth::user()->canany(['view group pegawai', 'kelola group pegawai']))
                            <div x-data="{ showTooltip: false }">
                                <a class="hover:text-blue-light-500 font-medium text-gray-600"
                                    href="{{ route('groupKaryawan.show', $item->id_group_karyawan) }}"
                                    @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                    <x-atoms.svg.eye />
                                </a>

                                <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                    x-show="showTooltip" x-transition>
                                    <span>Show</span>
                                </div>
                            </div>
                        @endif

                        @can('direct.permission', 'kelola group pegawai')
                            <div x-data="{ showTooltip: false }">
                                <a class="font-medium text-gray-600 hover:text-blue-600"
                                    href="{{ route('groupKaryawan.edit', $item->id_group_karyawan) }}"
                                    @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                    <x-atoms.svg.pen />
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

                                <x-molecules.modal.modal-delete :title="'Apakah Anda yakin ingin menghapus group pegawai: ' .
                                    $item->nama_group_karyawan .
                                    '?'" :action="route('groupKaryawan.destroy', $item->id_group_karyawan)" />
                            </div>
                        @endcan
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
            {{ $groupKaryawan->links('vendor.pagination.tailwind') }}
        </div>
    </div>

</x-app-dashboard>
