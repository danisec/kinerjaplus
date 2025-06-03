<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <a class="hover:text-brand-500 dark:hover:text-brand-400 xs:text-xs flex items-center gap-1 text-gray-500 sm:text-sm dark:text-gray-400"
                href="{{ route('kelolaAkun.index') }}">Kelola Akun</a>
        </li>

        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Ubah Akun</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('kelolaAkun.update', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Ubah Akun
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <div>
                        <x-molecules.input.input name="fullname" label="Nama Lengkap" :type="'text'"
                            :value="$user->fullname" required />
                    </div>

                    <div>
                        <x-molecules.input.input name="username" label="Nama Pengguna" :type="'text'"
                            :value="$user->username" required />
                    </div>

                    <div>
                        <x-molecules.input.input name="email" label="Email" :type="'email'" :value="$user->email"
                            required />
                    </div>

                    <div>
                        <x-molecules.select.select name="role" label="Peran Pengguna" :options="$roles->pluck('name', 'name')"
                            :value="old('role', $user->roles->first()->name ?? '')" required />
                    </div>

                    <div>
                        <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400"
                            for="nama karyawan">
                            Izin Pengguna
                        </label>
                        <select
                            class="@error('permission') border-red-500 @enderror shadow-theme-xs focus:ring-3 focus:outline-hidden h-11 w-full appearance-none rounded-lg border border-gray-300 px-4 py-2.5 pr-11 text-sm capitalize text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                            id="permission" name="permission[]" multiple required>

                            @foreach ($allPermissions as $permission)
                                <option value="{{ $permission->id }}"
                                    {{ in_array($permission->id, old('permission', $selectedPermissions)) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('permission')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex flex-row justify-center gap-4">
                        <a href="{{ route('kelolaAkun.index') }}">
                            <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                        </a>
                        <x-atoms.button.button-primary :type="'submit'" :name="'Ubah'" />
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
