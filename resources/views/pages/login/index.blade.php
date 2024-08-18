<x-app-layout title="{{ $title }}">

    <section class="bg-slate-50">
        <div class="mx-auto flex min-h-screen max-w-lg flex-col justify-center">
            <div class="mb-8 flex items-center justify-center text-2xl font-semibold lg:mb-10">
                <x-atoms.logo class="self-center whitespace-normal text-3xl font-bold" />
            </div>

            <div class="max-w-screen-sm w-full rounded-lg bg-white shadow md:mt-0 xl:p-0">
                <div class="space-y-8 p-12">
                    <h2 class="text-2xl font-bold text-gray-900 lg:text-3xl">
                        Masuk
                    </h2>

                    <form class="mt-8 space-y-6" action="{{ route('login.store') }}" method="POST">
                        @csrf

                        <div>
                            <label class="mb-2 block text-base font-medium text-gray-900" for="login">
                                Email atau Username</label>
                            <input class="field-input-slate w-full" name="login" type="text"
                                value="{{ old('login') }}" autofocus placeholder="name@mail.com" required>
                        </div>

                        <div>
                            <label class="mb-2 block text-base font-medium text-gray-900"
                                for="password">Password</label>

                            <div class="flex flex-row items-center justify-end">
                                <input class="field-input-slate w-full" id="passwordInput" name="password"
                                    type="password" placeholder="••••••••" required>

                                <button class="absolute mr-2.5" id="togglePasswordVisibility" type="button">
                                    <x-atoms.svg.eye id="eyeIcon" />
                                </button>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex h-6 items-center">
                                <input
                                    class="focus:ring-3 h-4 w-4 rounded border-gray-300 bg-gray-50 focus:ring-indigo-200"
                                    name="remember" type="checkbox" aria-describedby="remember">
                            </div>
                            <div class="ml-3 text-base">
                                <label class="font-medium text-gray-900" for="remember">Ingat saya</label>
                            </div>
                        </div>

                        <x-atoms.button.button-primary :customClass="'w-full text-center rounded-lg px-5 py-3'" :type="'submit'" :name="'Masuk'" />
                    </form>

                </div>
            </div>
        </div>
    </section>

</x-app-layout>
