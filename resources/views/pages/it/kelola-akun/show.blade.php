<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <a class="ml-1 text-base font-medium text-gray-900 hover:text-blue-600"
                    href="{{ route('kelolaAkun.index') }}">Kelola Akun</a>
            </div>
        </li>

        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Detail Akun</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Detail Akun</h4>

        <div class="mt-8 space-y-6">

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="fullname">
                    Nama Lengkap</label>
                <input class="field-input-slate w-full" name="fullname" type="text" value="{{ $user->fullname }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="username">
                    Nama Pengguna</label>
                <input class="field-input-slate w-full" name="username" type="text" value="{{ $user->username }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="email">
                    Email</label>
                <input class="field-input-slate w-full" name="email" type="email" value="{{ $user->email }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="role">
                    Peran Pengguna</label>
                <input class="field-input-slate w-full capitalize" name="role" type="text"
                    value="{{ $user->roles->first()->name }}" @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="role">
                    Permission Pengguna</label>

                <div class="field-input-slate w-full">
                    <div class="textAreaHeight flex flex-row flex-wrap items-center gap-2">

                        @foreach ($permission as $itemPermission)
                            <option class="rounded-md bg-emerald-400 p-1 text-sm text-white"
                                value="{{ $itemPermission->name }}" @disabled(true) @readonly(true)>
                                {{ $itemPermission->name }}
                            </option>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('kelolaAkun.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
            </div>
        </div>
    </div>

</x-app-dashboard>
