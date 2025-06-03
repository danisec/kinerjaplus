<x-app-layout title="{{ $title }}">

    <section class="z-1 relative bg-white p-6 sm:p-0 dark:bg-gray-900">
        <div class="relative flex h-screen w-full flex-col justify-center sm:p-0 lg:flex-row dark:bg-gray-900">
            <div class="flex w-full flex-1 flex-col lg:w-1/2">
                <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
                    <div class="mb-14 flex flex-row items-center justify-center gap-3">
                        <img class="h-14 w-14 sm:h-16 sm:w-16" src="{{ asset('assets/logo/logo.svg') }}" alt="Logo" />
                        <h1 class="text-title-sm sm:text-title-md font-bold text-gray-800 dark:text-white/90">
                            KinerjaMetrik
                        </h1>
                    </div>

                    <div>
                        <div class="mb-5 sm:mb-8">
                            <h2 class="text-title-sm mb-2 font-semibold text-gray-800 dark:text-white/90">
                                Sign In
                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Enter your email and password to sign in!
                            </p>
                        </div>
                        <div>
                            <form action="{{ route('login.store') }}" method="POST">
                                @csrf

                                <div class="space-y-5">
                                    <div>
                                        <label
                                            class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                            Email<span class="text-error-500">*</span>
                                        </label>
                                        <input
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                            name="login" type="text" value="{{ old('login') }}"
                                            placeholder="Email or Username" required />
                                    </div>

                                    <div>
                                        <x-molecules.input.input-password :name="'password'" :label="'Password'"
                                            labelSuffix='<span class="text-error-500">*</span>' :value="old('password')"
                                            :placeholder="'Enter your password'" required />
                                    </div>

                                    <div class="flex items-center justify-between">
                                        <div x-data="{ checkboxToggle: false }">
                                            <label
                                                class="flex cursor-pointer select-none items-center text-sm font-normal text-gray-700 dark:text-gray-400"
                                                for="checkboxLabelOne">
                                                <div class="relative">
                                                    <input class="sr-only" id="checkboxLabelOne" name="remember"
                                                        type="checkbox" @change="checkboxToggle = !checkboxToggle" />

                                                    <div class="mr-3 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px]"
                                                        :class="checkboxToggle ? 'border-brand-500 bg-brand-500' :
                                                            'bg-transparent border-gray-300 dark:border-gray-700'">
                                                        <span :class="checkboxToggle ? '' : 'opacity-0'">
                                                            <svg width="14" height="14" viewBox="0 0 14 14"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7"
                                                                    stroke="white" stroke-width="1.94437"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                </div>
                                                Keep me logged in
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <button
                                            class="bg-brand-500 shadow-theme-xs hover:bg-brand-600 flex w-full items-center justify-center rounded-lg px-4 py-3 text-sm font-medium text-white transition"
                                            type="submit">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
