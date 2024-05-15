<aside class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="flex h-full flex-col justify-between overflow-y-auto bg-white px-3 py-4 shadow-md shadow-slate-100">

        <div class="flex flex-col gap-4 overflow-y-scroll">
            <a class="flex items-center px-1.5 py-5" href="{{ route('dashboard.index') }}">
                <x-atoms.logo class="text-2xl font-bold" />
            </a>

            <ul class="space-y-2 font-medium">
                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNavDashboard as $name => $data)
                        <a class="{{ request()->segment(2) == $data['url'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-100 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-100' }} flex flex-row gap-2 text-base"
                            href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') }}">

                            <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }}"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="{{ $data['viewBox'] }}" stroke-width="1.5" stroke="currentColor">
                                @foreach ($data['paths'] as $path)
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                @endforeach
                            </svg>

                            <span>{{ $name }}</span>
                        </a>
                    @endforeach
                </li>

                @if (in_array(Auth::user()->role, ['superadmin', 'admin']))
                    <li class="flex flex-col gap-2.5">
                        @foreach ($sideNavData as $name => $data)
                            <a class="{{ request()->segment(2) == $data['url'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-100 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-100' }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                                <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }}"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="{{ $data['viewBox'] }}" stroke-width="1.5" stroke="currentColor">
                                    @foreach ($data['paths'] as $path)
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                    @endforeach
                                </svg>

                                <span>{{ $name }}</span>
                            </a>
                        @endforeach
                    </li>
                @endif

                @if (in_array(Auth::user()->role, ['kepala sekolah', 'guru']))
                    <li class="flex flex-col gap-2.5">
                        @foreach ($sideNavPenilaian as $name => $data)
                            <a class="{{ request()->segment(2) == $data['url'] || request()->segment(2) == 'penilaian'
                                ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-100 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-100' }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                                <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }}"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="{{ $data['viewBox'] }}" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $data['path'] }}" />
                                </svg>

                                <span>{{ $name }}</span>
                            </a>
                        @endforeach
                    </li>
                @endif

                @if (in_array(Auth::user()->role, ['kepala sekolah', 'guru']))
                    <li class="flex flex-col gap-2.5">
                        @foreach ($sideNavGuru as $name => $data)
                            <a class="{{ request()->segment(2) == $data['url']
                                ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-100 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-100' }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                                <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }}"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="{{ $data['viewBox'] }}" stroke-width="1.5" stroke="currentColor">
                                    @foreach ($data['paths'] as $path)
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                    @endforeach
                                </svg>

                                <span>{{ $name }}</span>
                            </a>
                        @endforeach
                    </li>
                @endif

                @if (in_array(Auth::user()->role, ['kepala sekolah']))
                    <li class="flex flex-col gap-2.5">
                        @foreach ($sideNavKepalaSekolah as $name => $data)
                            <a class="{{ request()->segment(2) == $data['url']
                                ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-100 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-100' }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                                <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }}"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="{{ $data['viewBox'] }}" stroke-width="1.5" stroke="currentColor">
                                    @foreach ($data['paths'] as $path)
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                    @endforeach
                                </svg>

                                <span>{{ $name }}</span>
                            </a>
                        @endforeach
                    </li>
                @endif

                @if (in_array(Auth::user()->role, ['superadmin', 'kepala sekolah']))
                    <li class="flex flex-col gap-2.5" x-data="{ isOpen: localStorage.getItem('navSideDropDown') === 'true' || false }">
                        <a class="flex flex-row items-center gap-2 rounded-lg p-2 text-base text-gray-900 hover:bg-slate-100"
                            href="#" @click="isOpen = !isOpen; localStorage.setItem('navSideDropDown', isOpen)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                            </svg>

                            Perbandingan

                            <x-atoms.svg.arrow-down :class="'ml-12 mt-1 h-4 w-4 origin-center transform transition-transform duration-300'" />
                        </a>

                        <ul class="relative flex flex-col gap-2.5 rounded-lg bg-slate-100 py-3" x-show="isOpen"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95">

                            @foreach ($sideNavPerhitungan as $name => $data)
                                <a class="{{ request()->segment(2) == $data['url'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-200/80 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-200/80' }} ml-2 flex w-11/12 flex-row gap-2 text-base"
                                    href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                                    <span>{{ $name }}</span>
                                </a>
                            @endforeach
                        </ul>
                    </li>
                @endif

                @if (in_array(Auth::user()->role, ['kepala sekolah']))
                    <li class="flex flex-col gap-2.5">
                        @foreach ($sideNavPerankingan as $name => $data)
                            <a class="{{ request()->segment(2) == $data['url'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-100 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-100' }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                                <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }}"
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="{{ $data['viewBox'] }}" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $data['path'] }}" />
                                </svg>

                                <span>{{ $name }}</span>
                            </a>
                        @endforeach
                    </li>
                @endif

            </ul>
        </div>

        <div>
            @if (Auth::user()->role === 'superadmin' || Auth::user()->role === 'IT')
                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNavUser as $name => $data)
                        <a class="{{ request()->segment(2) == $data['url'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-100 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-100' }} flex flex-row gap-2 text-base"
                            href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">

                            <svg class="{{ request()->segment(2) == $data['url'] ? 'text-gray-900 transition duration-75' : 'text-gray-700 group-hover:text-gray-700' }}"
                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                viewBox="{{ $data['viewBox'] }}" stroke-width="1.5" stroke="currentColor">
                                @foreach ($data['paths'] as $path)
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                @endforeach
                            </svg>

                            <span>{{ $name }}</span>
                        </a>
                    @endforeach
                </li>
            @endif
        </div>

    </div>
</aside>
