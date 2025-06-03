<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('kelolaAkun.index') }}">Kelola Akun</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Detail Akun</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <div class="my-8">
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Detail Akun
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div>
                        <x-molecules.input.input name="fullname" label="Nama Lengkap" :type="'text'"
                            :value="$user->fullname" readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="username" label="Nama Pengguna" :type="'text'"
                            :value="$user->username" readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="email" label="Email" :type="'email'" :value="$user->email"
                            readonly />
                    </div>

                    <div>
                        <x-molecules.input.input name="role" label="Peran Pengguna" :type="'text'"
                            :value="$user->roles->first()->name" readonly />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                            for="nama karyawan">
                            Izin Pengguna</label>
                        <div
                            class="textAreaHeight shadow-theme-xs focus:ring-3 focus:outline-hidden flex flex-wrap gap-2 rounded-lg border border-gray-300 bg-transparent p-3 text-sm text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            @foreach ($permission as $item)
                                <span
                                    class="inline-block rounded-md bg-indigo-100/70 px-3 py-1 text-sm text-gray-700 dark:text-gray-400">
                                    {{ $item->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex flex-row justify-center">
                        <a href="{{ route('kelolaAkun.index') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-dashboard>
