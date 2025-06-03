<x-app-dashboard title="{{ $title }}">

    <x-molecules.breadcrumb.breadcrumb>
        <li class="xs:text-xs flex items-center gap-0.5 text-gray-800 sm:text-sm dark:text-white/90">
            <x-atoms.svg.arrow-right />
            <span>Profile</span>
        </li>
    </x-molecules.breadcrumb.breadcrumb>

    <form class="my-8" action="{{ route('profile.update', $profile->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="space-y-6">
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Profile
                    </h3>
                </div>

                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <nav
                        class="[&amp;::-webkit-scrollbar-thumb]:rounded-full [&amp;::-webkit-scrollbar-thumb]:bg-gray-200 dark:[&amp;::-webkit-scrollbar-thumb]:bg-gray-600 [&amp;::-webkit-scrollbar-track]:bg-white dark:[&amp;::-webkit-scrollbar-track]:bg-transparent [&amp;::-webkit-scrollbar]:h-1.5 flex overflow-x-auto rounded-lg bg-gray-100 p-1 dark:bg-gray-900">
                        <a class="inline-flex items-center rounded-md bg-transparent px-3 py-2 text-sm font-medium text-gray-500 transition-colors duration-200 ease-in-out hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                            href="{{ route('profile.index', $profile->id) }}">
                            Details
                        </a>

                        <a class="shadow-theme-xs inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-900 transition-colors duration-200 ease-in-out dark:bg-white/[0.03] dark:text-white"
                            href="#"
                            {{ request()->segment(2) == 'my-profile/ubah-profile'
                                ? 'bg-white text-gray-900 shadow-theme-xs dark:bg-white/[0.03] dark:text-white'
                                : 'bg-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200' }}>
                            Settings
                        </a>
                    </nav>

                    <div class="space-y-6">
                        <div>
                            <x-molecules.input.input name="fullname" label="Nama Lengkap" :type="'text'"
                                :value="$profile->fullname" required />
                        </div>

                        <div>
                            <x-molecules.input.input name="username" label="Nama Pengguna" :type="'text'"
                                :value="$profile->username" required />
                        </div>

                        <div>
                            <x-molecules.input.input name="email" label="Email" :type="'email'" :value="$profile->email"
                                required />
                        </div>

                        <div>
                            <x-molecules.input.input-password :name="'password'" :label="'Ubah Password'" :value="old('password')"
                                :placeholder="'******'" />
                        </div>

                        <div class="flex flex-row justify-center gap-4">
                            <a href="{{ route('dashboard.index') }}">
                                <x-atoms.button.button-secondary :type="'button'" :name="'Kembali'" />
                            </a>
                            <x-atoms.button.button-primary :type="'submit'" :name="'Ubah'" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-app-dashboard>
