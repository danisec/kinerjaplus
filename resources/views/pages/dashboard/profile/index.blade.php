<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb>
        <li aria-current="page">
            <div class="flex items-center">
                <x-atoms.svg.arrow-right />
                <span class="mx-2 text-base font-medium text-gray-500">Profile</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-11/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Akun dan Pengaturan</h4>

        <div class="mt-8 space-y-6 border-b border-slate-200 text-center text-sm font-medium text-gray-700">
            <ul class="flex flex-wrap">
                <li class="me-2">
                    <a class="{{ request()->segment(2) == 'my-profile' ? 'border-indigo-600 p-4 text-indigo-600' : 'border-transparent p-4 hover:border-slate-300 hover:text-gray-600' }} inline-block rounded-t-lg border-b-2"
                        href="#">Detail Profile</a>
                </li>
                <li class="me-2">
                    <a class="inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-slate-300 hover:text-gray-600"
                        href="{{ route('profile.edit', $profile->id) }}">Pengaturan</a>
                </li>
            </ul>
        </div>

        <div class="mt-8 space-y-6 rounded-md border border-slate-200 px-32 py-8">
            <div class="flex items-center justify-center">
                <img class="h-20 w-20 rounded-full border border-slate-200"
                    src="{{ Avatar::create($profile->fullname)->toBase64() }}" alt="Avatar" />
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="fullname">
                    Nama Lengkap</label>
                <input class="field-input-slate w-full" name="fullname" type="text" value="{{ $profile->fullname }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="username">
                    Nama Pengguna</label>
                <input class="field-input-slate w-full" name="username" type="text" value="{{ $profile->username }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="email">
                    Email</label>
                <input class="field-input-slate w-full" name="email" type="email" value="{{ $profile->email }}"
                    @disabled(true) @readonly(true)>
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="role">
                    Peran Pengguna</label>
                <input class="field-input-slate w-full capitalize" name="role" type="text"
                    value="{{ $profile->getRoleNames()->first() }}" @disabled(true) @readonly(true)>
            </div>
        </div>

    </div>

</x-app-dashboard>
