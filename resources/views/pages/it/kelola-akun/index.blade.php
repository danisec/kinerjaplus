<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Kelola Akun</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="my-8">
        <div class="flex flex-row items-center justify-end">
            @can('direct.permission', 'kelola akun')
                <div>
                    <a href="{{ route('kelolaAkun.create') }}">
                        <x-atoms.button.button-primary :type="'button'" :name="'Tambah Akun'" />
                    </a>
                </div>
            @endcan
        </div>
    </div>

    <div
        class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <x-molecules.table.table :title="'Daftar Pengguna'" :placeholderSearch="'Cari Pengguna'" :request="request('fullname')" :nameSearch="'fullname'">
            <x-slot:thead>
                <tr class="border-y border-gray-100 dark:border-gray-800">
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Lengkap</p>
                        </div>
                    </th>
                    <th class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Peran</p>
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

            @forelse ($user as $item)
                <tr>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                {{ $item->fullname }}
                            </p>
                        </div>
                    </td>
                    <td class="py-3">
                        <div class="flex items-center">
                            <p
                                class="{{ $roleColors[$item->role] ?? $roleColors['default'] }} xs:text-xs sm:text-theme-sm rounded-full px-2 py-0.5 capitalize text-gray-700 dark:text-gray-400">
                                {{ $item->role }}
                            </p>
                        </div>
                    </td>
                    <td class="xs:gap-2.5 flex justify-center p-6 sm:gap-4">
                        @if (Auth::user()->hasAnyDirectPermission(['view kelola akun', 'kelola akun']) ||
                                Auth::user()->canany(['view kelola akun', 'kelola akun']))
                            <div x-data="{ showTooltip: false }">
                                <a class="hover:text-blue-light-500 font-medium text-gray-600"
                                    href="{{ route('kelolaAkun.show', $item->id) }}" @mouseenter="showTooltip = true"
                                    @mouseleave="showTooltip = false">
                                    <x-atoms.svg.eye />
                                </a>

                                <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                    x-show="showTooltip" x-transition>
                                    <span>Show</span>
                                </div>
                            </div>
                        @endif

                        @can('direct.permission', 'kelola akun')
                            <div x-data="{ showTooltip: false }">
                                <a class="font-medium text-gray-600 hover:text-blue-600"
                                    href="{{ route('kelolaAkun.edit', $item->id) }}" @mouseenter="showTooltip = true"
                                    @mouseleave="showTooltip = false">
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

                                <x-molecules.modal.modal-delete :title="'Apakah Anda yakin ingin menghapus nama akun: ' . $item->fullname . '?'" :action="route('kelolaAkun.destroy', $item->id)" />
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
            {{ $user->links('vendor.pagination.tailwind') }}
        </div>
    </div>

</x-app-dashboard>
