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
                <span class="mx-2 text-base font-medium text-gray-500">Tambah Akun</span>
            </div>
        </li>
    </x-molecules.breadcrumb>

    <div class="mx-auto my-8 w-8/12">
        <h4 class="mb-6 text-2xl font-semibold text-gray-900">Tambah Akun</h4>

        <form class="mt-8 space-y-6" action="{{ route('kelolaAkun.store') }}" method="POST">
            @csrf

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="fullname">
                    Nama Lengkap</label>
                <input class="@error('fullname') border-red-500 @enderror field-input-slate w-full" name="fullname"
                    type="text" value="{{ old('fullname') }}" autofocus placeholder="Nama Lengkap" required>

                @error('fullname')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="username">
                    Nama Pengguna</label>
                <input class="@error('username') border-red-500 @enderror field-input-slate w-full" name="username"
                    type="text" value="{{ old('username') }}" placeholder="Nama Pengguna" required>

                @error('username')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="email">
                    Email</label>
                <input class="@error('email') border-red-500 @enderror field-input-slate w-full" name="email"
                    type="email" value="{{ old('email') }}" placeholder="Email" required>

                @error('email')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="role">
                    Peran Pengguna</label>
                <select class="@error('role') border-red-500 @enderror field-input-slate w-full" name="role"
                    required>

                    <option selected disabled hidden>Pilih Peran</option>
                    @foreach ($roles as $role)
                        <option class="capitalize" value="{{ $role->name }}"
                            {{ old('role') == $role->name ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>

                @error('role')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="mb-2 block text-base font-medium text-gray-900" for="password">
                    Password</label>

                <div class="flex flex-row items-center justify-end">
                    <input class="@error('password') border-red-500 @enderror field-input-slate w-full"
                        id="passwordInput" name="password" type="password" value="{{ old('password') }}"
                        placeholder="********" required>

                    <button class="absolute mr-2.5" id="togglePasswordVisibility" type="button">
                        <x-atoms.svg.eye id="eyeIcon" />
                    </button>
                </div>

                @error('password')
                    <p class="invalid-feedback">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-row gap-4">
                <a href="{{ route('kelolaAkun.index') }}">
                    <x-atoms.button.button-gray :customClass="'w-52 text-center rounded-lg px-5 py-3'" :type="'button'" :name="'Kembali'" />
                </a>
                <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Simpan'" />
            </div>
        </form>
    </div>

</x-app-dashboard>
