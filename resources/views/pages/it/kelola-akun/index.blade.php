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
        @if (session('reset_password_value'))
            <div class="mb-4 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 dark:border-emerald-900/40 dark:bg-emerald-900/20"
                id="copy-input">
                <p class="text-sm font-medium text-emerald-900 dark:text-emerald-100">
                    Password baru untuk {{ session('reset_password_fullname') }}:
                </p>
                <div class="relative mt-3">
                    <button
                        class="absolute right-0 top-1/2 inline-flex -translate-y-1/2 cursor-pointer items-center gap-1 border-l border-emerald-200 py-3 pl-3.5 pr-3 text-sm font-medium text-emerald-900 dark:border-emerald-900/40 dark:text-emerald-100"
                        id="copy-button" type="button">
                        <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6.58822 4.58398C6.58822 4.30784 6.81207 4.08398 7.08822 4.08398H15.4154C15.6915 4.08398 15.9154 4.30784 15.9154 4.58398L15.9154 12.9128C15.9154 13.189 15.6916 13.4128 15.4154 13.4128H7.08821C6.81207 13.4128 6.58822 13.189 6.58822 12.9128V4.58398ZM7.08822 2.58398C5.98365 2.58398 5.08822 3.47942 5.08822 4.58398V5.09416H4.58496C3.48039 5.09416 2.58496 5.98959 2.58496 7.09416V15.4161C2.58496 16.5207 3.48039 17.4161 4.58496 17.4161H12.9069C14.0115 17.4161 14.9069 16.5207 14.9069 15.4161L14.9069 14.9128H15.4154C16.52 14.9128 17.4154 14.0174 17.4154 12.9128L17.4154 4.58398C17.4154 3.47941 16.52 2.58398 15.4154 2.58398H7.08822ZM13.4069 14.9128H7.08821C5.98364 14.9128 5.08822 14.0174 5.08822 12.9128V6.59416H4.58496C4.30882 6.59416 4.08496 6.81801 4.08496 7.09416V15.4161C4.08496 15.6922 4.30882 15.9161 4.58496 15.9161H12.9069C13.183 15.9161 13.4069 15.6922 13.4069 15.4161L13.4069 14.9128Z"
                                fill="" />
                        </svg>
                        <div id="copy-text">Copy</div>
                    </button>
                    <input
                        class="shadow-theme-xs h-11 w-full rounded-lg border border-emerald-200 bg-white py-2.5 pl-4 pr-24 text-sm text-emerald-900 placeholder:text-emerald-400 dark:border-emerald-900/40 dark:bg-gray-900 dark:text-emerald-100 dark:placeholder:text-emerald-200/40"
                        id="website-input" type="text" value="{{ session('reset_password_value') }}" readonly />
                </div>
                <p class="mt-2 text-xs text-emerald-800 dark:text-emerald-200/80">
                    Salin password ini sekarang, hanya ditampilkan sekali.
                </p>
            </div>
        @endif

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
                                <button class="text-gray-600 hover:text-amber-600" type="button"
                                    @mouseenter="showTooltip = true" @mouseleave="showTooltip = false"
                                    @click="isOpen = true">
                                    <x-atoms.svg.reload />
                                </button>

                                <div class="xs:text-xs absolute z-10 -ml-6 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                                    x-show="showTooltip" x-transition>
                                    <span>Reset Password</span>
                                </div>

                                <x-molecules.modal.modal-reset-password :heading="'Konfirmasi Reset Password'" :title="'Reset password akun: ' .
                                    $item->fullname .
                                    '? (Kosongkan input untuk random)'"
                                    :action="route('kelolaAkun.resetPassword', $item->id)" />
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
