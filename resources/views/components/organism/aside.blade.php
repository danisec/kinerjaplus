<aside class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="flex h-full flex-col justify-between overflow-y-auto bg-white px-3 py-4 shadow-md shadow-slate-100">

        <div class="flex flex-col gap-4">
            <a class="flex items-center px-1.5 py-5" href="{{ route('dashboard.index') }}">
                <x-atoms.logo class="text-2xl font-bold" />
            </a>

            <ul class="space-y-2 font-medium">
                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNav as $name => $data)
                        <a class="{{ request()->segment(2) == $data['url'] ? 'items-center rounded-lg p-2 text-gray-900 bg-gray-200/80 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100' }} flex flex-row gap-2 text-base"
                            href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                            <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }} h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="{{ $data['viewBox'] }}"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $data['path'] }}" />
                            </svg>

                            <span>{{ $name }}</span>
                        </a>
                    @endforeach
                </li>

                <li class="flex flex-col gap-2.5" x-data="{ isOpen: localStorage.getItem('navSideDropDown') === 'true' || false }">
                    <a class="flex flex-row items-center gap-2 rounded-lg p-2 text-base text-gray-900 hover:bg-gray-100"
                        href="#" @click="isOpen = !isOpen; localStorage.setItem('navSideDropDown', isOpen)">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                        </svg>

                        Perhitungan

                        <x-atoms.svg.arrow-down :class="'ml-16 mt-1 h-4 w-4 origin-center transform transition-transform duration-300'" />
                    </a>

                    <ul class="relative flex flex-col gap-2.5" x-show="isOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95">

                        @foreach ($sideNavPerhitungan as $name => $data)
                            <a class="{{ request()->segment(2) == $data['url'] ? 'items-center rounded-lg p-2 text-gray-900 bg-gray-200/80 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100' }} ml-2 flex w-11/12 flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                                <span>{{ $name }}</span>
                            </a>
                        @endforeach
                    </ul>
                </li>

                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNavPerankingan as $name => $data)
                        <a class="{{ request()->segment(2) == $data['url'] ? 'items-center rounded-lg p-2 text-gray-900 bg-gray-200/80 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-gray-100' }} flex flex-row gap-2 text-base"
                            href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                            <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }} h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="{{ $data['viewBox'] }}"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $data['path'] }}" />
                            </svg>

                            <span>{{ $name }}</span>
                        </a>
                    @endforeach
                </li>

            </ul>
        </div>

        <form action="{{ route('login.logout') }}" method="post">
            @csrf

            <button
                class="flex w-56 flex-row items-center justify-start gap-2 px-2 py-2 text-lg font-semibold text-gray-900 hover:rounded-md hover:bg-slate-100 focus:outline-none"
                type="submit">
                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>

                <p class="ml-0.5 text-lg font-medium text-gray-800">Keluar</p>
            </button>
        </form>
    </div>
</aside>
