<x-app-dashboard title="{{ $title }}">

    <div class="xsm:grid-cols-2 min-2xl:grid-cols-6 my-2 grid grid-cols-1 gap-6 md:grid-cols-3 lg:grid-cols-4">
        @if (Auth::user()->hasAnyRole('superadmin', 'IT'))
            <div
                class="xs:w-full h-full rounded-2xl border border-gray-200 bg-white p-5 sm:w-48 md:p-6 lg:w-52 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851ZM4.86252 15.3208C4.08769 16.0881 3.70377 17.0608 3.51705 17.8611C3.48384 18.0034 3.5211 18.1175 3.60712 18.2112C3.70161 18.3141 3.86659 18.3987 4.07591 18.3987H13.4249C13.6343 18.3987 13.7992 18.3141 13.8937 18.2112C13.9797 18.1175 14.017 18.0034 13.9838 17.8611C13.7971 17.0608 13.4132 16.0881 12.6383 15.3208C11.8821 14.572 10.6899 13.955 8.75042 13.955C6.81096 13.955 5.61877 14.572 4.86252 15.3208ZM3.8071 14.2549C4.87163 13.2009 6.45602 12.455 8.75042 12.455C11.0448 12.455 12.6292 13.2009 13.6937 14.2549C14.7397 15.2906 15.2207 16.5607 15.4446 17.5202C15.7658 18.8971 14.6071 19.8987 13.4249 19.8987H4.07591C2.89369 19.8987 1.73504 18.8971 2.05628 17.5202C2.28015 16.5607 2.76117 15.2906 3.8071 14.2549ZM15.3042 11.4955C14.4702 11.4955 13.7006 11.2193 13.0821 10.7533C13.3742 10.3314 13.6054 9.86419 13.7632 9.36432C14.1597 9.75463 14.7039 9.99545 15.3042 9.99545C16.5176 9.99545 17.5012 9.01185 17.5012 7.79851C17.5012 6.58517 16.5176 5.60156 15.3042 5.60156C14.7039 5.60156 14.1597 5.84239 13.7632 6.23271C13.6054 5.73284 13.3741 5.26561 13.082 4.84371C13.7006 4.37777 14.4702 4.10156 15.3042 4.10156C17.346 4.10156 19.0012 5.75674 19.0012 7.79851C19.0012 9.84027 17.346 11.4955 15.3042 11.4955ZM19.9248 19.8987H16.3901C16.7014 19.4736 16.9159 18.969 16.9827 18.3987H19.9248C20.1341 18.3987 20.2991 18.3141 20.3936 18.2112C20.4796 18.1175 20.5169 18.0034 20.4837 17.861C20.2969 17.0607 19.913 16.088 19.1382 15.3208C18.4047 14.5945 17.261 13.9921 15.4231 13.9566C15.2232 13.6945 14.9995 13.437 14.7491 13.1891C14.5144 12.9566 14.262 12.7384 13.9916 12.5362C14.3853 12.4831 14.8044 12.4549 15.2503 12.4549C17.5447 12.4549 19.1291 13.2008 20.1936 14.2549C21.2395 15.2906 21.7206 16.5607 21.9444 17.5202C22.2657 18.8971 21.107 19.8987 19.9248 19.8987Z"
                            fill="" />
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">User</span>
                        <h4 class="text-title-sm mt-2 font-bold text-gray-800 dark:text-white/90">
                            {{ $countUser }}
                        </h4>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->hasAnyRole('superadmin', 'admin'))
            <div
                class="xs:w-full h-full rounded-2xl border border-gray-200 bg-white p-5 sm:w-48 md:p-6 lg:w-52 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="text-gray-700 group-hover:text-gray-700" xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 7L17 7"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7L8 7"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 12L8 12"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L8 17"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 12L17 12"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 17L17 17"></path>
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Kriteria</span>
                        <h4 class="text-title-sm mt-2 font-bold text-gray-800 dark:text-white/90">
                            {{ $countKriteria }}
                        </h4>
                    </div>
                </div>
            </div>

            <div
                class="xs:w-full h-full rounded-2xl border border-gray-200 bg-white p-5 sm:w-48 md:p-6 lg:w-52 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="text-gray-700 group-hover:text-gray-700" xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.0235 3.03358L16.0689 2.77924C13.369 2.05986 12.019 1.70018 10.9555 2.31074C9.89196 2.9213 9.53023 4.26367 8.80678 6.94841L7.78366 10.7452C7.0602 13.4299 6.69848 14.7723 7.3125 15.8298C7.92652 16.8874 9.27651 17.247 11.9765 17.9664L12.9311 18.2208C15.631 18.9401 16.981 19.2998 18.0445 18.6893C19.108 18.0787 19.4698 16.7363 20.1932 14.0516L21.2163 10.2548C21.9398 7.57005 22.3015 6.22768 21.6875 5.17016C21.0735 4.11264 19.7235 3.75295 17.0235 3.03358Z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.8538 7.43306C16.8538 8.24714 16.1901 8.90709 15.3714 8.90709C14.5527 8.90709 13.889 8.24714 13.889 7.43306C13.889 6.61898 14.5527 5.95904 15.3714 5.95904C16.1901 5.95904 16.8538 6.61898 16.8538 7.43306Z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 20.9463L11.0477 21.2056C8.35403 21.9391 7.00722 22.3059 5.94619 21.6833C4.88517 21.0608 4.52429 19.6921 3.80253 16.9547L2.78182 13.0834C2.06006 10.346 1.69918 8.97731 2.31177 7.89904C2.84167 6.96631 4 7.00027 5.5 7.00015">
                        </path>
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Subkriteria</span>
                        <h4 class="text-title-sm mt-2 font-bold text-gray-800 dark:text-white/90">
                            {{ $countSubkriteria }}
                        </h4>
                    </div>
                </div>
            </div>

            <div
                class="xs:w-full h-full rounded-2xl border border-gray-200 bg-white p-5 sm:w-48 md:p-6 lg:w-52 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="text-gray-700 group-hover:text-gray-700" xmlns="http://www.w3.org/2000/svg"
                        width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14 3.5C17.7712 3.5 19.6569 3.5 20.8284 4.7448C22 5.98959 22 7.99306 22 12C22 16.0069 22 18.0104 20.8284 19.2552C19.6569 20.5 17.7712 20.5 14 20.5L10 20.5C6.22876 20.5 4.34315 20.5 3.17157 19.2552C2 18.0104 2 16.0069 2 12C2 7.99306 2 5.98959 3.17157 4.7448C4.34315 3.5 6.22876 3.5 10 3.5L14 3.5Z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 15.4999C6.60865 13.3625 10.3539 13.2458 12 15.4999M10.249 10.25C10.249 11.2165 9.46552 12 8.49902 12C7.53253 12 6.74902 11.2165 6.74902 10.25C6.74902 9.2835 7.53253 8.5 8.49902 8.5C9.46552 8.5 10.249 9.2835 10.249 10.25Z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 9.5L19 9.5"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 13.5H17"></path>
                    </svg>
                </div>

                <div class="mt-5 flex items-end justify-between">
                    <div>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Pegawai</span>
                        <h4 class="text-title-sm mt-2 font-bold text-gray-800 dark:text-white/90">
                            {{ $countAlternatif }}
                        </h4>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if (Auth::user()->hasAnyRole('superadmin', 'admin'))
        <div class="my-12">
            <div
                class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <x-molecules.table.table :title="'Daftar Pegawai'" :placeholderSearch="'Cari Pegawai'" :request="request('nama_alternatif')" :nameSearch="'nama_alternatif'">
                    <x-slot:thead>
                        <tr class="border-y border-gray-100 dark:border-gray-800">
                            <th class="py-3">
                                <div class="flex items-center">
                                    <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Pegawai</p>
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

                    @forelse ($alternatif as $item)
                        <tr>
                            <td class="py-3">
                                <div class="flex items-center">
                                    <p class="xs:text-sm sm:text-theme-md text-gray-700 dark:text-gray-400">
                                        {{ $item->nama_alternatif }}
                                    </p>
                                </div>
                            </td>
                            <td class="xs:gap-2.5 flex justify-center p-6 sm:gap-4">
                                <div x-data="{ showTooltip: false }">
                                    <a class="hover:text-blue-light-500 font-medium text-gray-600"
                                        href="{{ route('alternatif.show', $item->id_alternatif) }}"
                                        @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                        <x-atoms.svg.eye />
                                    </a>

                                    <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                        x-show="showTooltip" x-transition>
                                        <span>Detail</span>
                                    </div>
                                </div>

                                <div x-data="{ showTooltip: false }">
                                    <a class="font-medium text-gray-600 hover:text-blue-600"
                                        href="{{ route('alternatif.edit', $item->id_alternatif) }}"
                                        @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                        <x-atoms.svg.pen />
                                    </a>

                                    <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                        x-show="showTooltip" x-transition>
                                        <span>Ubah</span>
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
                                        <span>Hapus</span>
                                    </div>

                                    <x-molecules.modal.modal-delete :title="'Apakah Anda akan yakin ingin menghapus nama pegawai: ' .
                                        $item->nama_alternatif .
                                        '?'" :action="route('alternatif.destroy', $item->id_alternatif)" />
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
                    {{ $alternatif->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    @endif

    @if (Auth::user()->hasRole('IT'))
        <div class="my-12">
            <div
                class="overflow-hidden rounded-2xl border border-gray-200 bg-white px-4 pb-3 pt-4 sm:px-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <x-molecules.table.table :title="'Daftar Pengguna'" :placeholderSearch="'Cari Pengguna'" :request="request('fullname')" :nameSearch="'fullname'">
                    <x-slot:thead>
                        <tr class="border-y border-gray-100 dark:border-gray-800">
                            <th class="py-3">
                                <div class="flex items-center">
                                    <p class="xs:text-xs sm:text-theme-md font-medium text-gray-800">Nama Pengguna</p>
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
                                        {{ $item->username }}
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
                                            href="{{ route('kelolaAkun.show', $item->id) }}"
                                            @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
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
                                            href="{{ route('kelolaAkun.edit', $item->id) }}"
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

                                        <x-molecules.modal.modal-delete :title="'Apakah Anda akan yakin ingin menghapus nama akun : ' .
                                            $item->fullname .
                                            '?'" :action="route('kelolaAkun.destroy', $item->id)" />
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
        </div>
    @endif

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
