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
                        @php
                            $canAccess = $hasDirectPermissions
                                ? $user->hasDirectPermission($data['permission'])
                                : $user->hasPermissionTo($data['permission']);

                            $isActive = request()->segment(2) == $data['url'];
                            $linkClasses = $isActive
                                ? 'items-center rounded-lg p-2 text-blue-600 bg-indigo-100/70 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-indigo-100/70';

                            $svgClasses = $isActive
                                ? 'text-gray-900 transition duration-75'
                                : 'text-gray-700 group-hover:text-gray-700';

                            $strokeColor = $isActive ? '#2563eb' : 'currentColor';
                        @endphp

                        @if ($canAccess)
                            <a class="{{ $linkClasses }} flex flex-row gap-2 text-base"
                                href="{{ route('dashboard.index') }}">
                                <svg class="{{ $svgClasses }}" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="none" viewBox="{{ $data['viewBox'] }}" stroke-width="1.5"
                                    stroke="{{ $strokeColor }}">
                                    @foreach ($data['paths'] as $path)
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                    @endforeach
                                </svg>
                                <p>{{ $name }}</p>
                            </a>
                        @endif
                    @endforeach
                </li>

                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNavData as $name => $data)
                        @php
                            $canAccess = $hasDirectPermissions
                                ? $user->hasDirectPermission($data['permission']['view']) ||
                                    $user->hasDirectPermission($data['permission']['manage'])
                                : $user->hasPermissionTo($data['permission']['view']) ||
                                    $user->hasPermissionTo($data['permission']['manage']);

                            $isActive = request()->segment(2) == $data['url'];
                            $linkClasses = $isActive
                                ? 'items-center rounded-lg p-2 text-blue-600 bg-indigo-100/70 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-indigo-100/70';

                            $svgClasses = $isActive
                                ? 'text-gray-900 transition duration-75'
                                : 'text-gray-700 group-hover:text-gray-700';

                            $strokeColor = $isActive ? '#2563eb' : 'currentColor';
                        @endphp

                        @if ($canAccess)
                            <a class="{{ $linkClasses }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">
                                <svg class="{{ $svgClasses }}" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="none" viewBox="{{ $data['viewBox'] }}" stroke-width="1.5"
                                    stroke="{{ $strokeColor }}">
                                    @foreach ($data['paths'] as $path)
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                    @endforeach
                                </svg>
                                <p>{{ $name }}</p>
                            </a>
                        @endif
                    @endforeach
                </li>

                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNavPenilaian as $name => $data)
                        @php
                            $canAccess = $hasDirectPermissions
                                ? $user->hasDirectPermission($data['permission'])
                                : $user->hasPermissionTo($data['permission']);

                            $isActive = request()->segment(2) == $data['url'] || request()->segment(2) == 'penilaian';
                            $linkClasses = $isActive
                                ? 'items-center rounded-lg p-2 text-blue-600 bg-indigo-100/70 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-indigo-100/70';

                            $svgClasses = $isActive
                                ? 'text-gray-900 transition duration-75'
                                : 'text-gray-700 group-hover:text-gray-700';

                            $strokeColor = $isActive ? '#2563eb' : 'currentColor';
                        @endphp

                        @if ($canAccess)
                            <a class="{{ $linkClasses }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">
                                <svg class="{{ $svgClasses }}" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="none" viewBox="{{ $data['viewBox'] }}" stroke-width="1.5"
                                    stroke="{{ $strokeColor }}">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $data['path'] }}" />
                                </svg>
                                <p>{{ $name }}</p>
                            </a>
                        @endif
                    @endforeach
                </li>

                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNavRiwayatPenilaian as $name => $data)
                        @php
                            $canAccess = $hasDirectPermissions
                                ? $user->hasDirectPermission($data['permission'])
                                : $user->hasPermissionTo($data['permission']);

                            $isActive = request()->segment(2) == $data['url'];
                            $linkClasses = $isActive
                                ? 'items-center rounded-lg p-2 text-blue-600 bg-indigo-100/70 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-indigo-100/70';

                            $svgClasses = $isActive
                                ? 'text-gray-900 transition duration-75'
                                : 'text-gray-700 group-hover:text-gray-700';

                            $strokeColor = $isActive ? '#2563eb' : 'currentColor';
                        @endphp

                        @if ($canAccess)
                            <a class="{{ $linkClasses }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">
                                <svg class="{{ $svgClasses }}" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="none" viewBox="{{ $data['viewBox'] }}" stroke-width="1.5"
                                    stroke="{{ $strokeColor }}">
                                    @foreach ($data['paths'] as $path)
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                    @endforeach
                                </svg>
                                <p>{{ $name }}</p>
                            </a>
                        @endif
                    @endforeach
                </li>

                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNavKepalaSekolah as $name => $data)
                        @php
                            $canAccess = $hasDirectPermissions
                                ? $user->hasDirectPermission($data['permission'])
                                : $user->hasPermissionTo($data['permission']);

                            $isActive = request()->segment(2) == $data['url'];
                            $linkClasses = $isActive
                                ? 'items-center rounded-lg p-2 text-blue-600 bg-indigo-100/70 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-indigo-100/70';

                            $svgClasses = $isActive
                                ? 'text-gray-900 transition duration-75'
                                : 'text-gray-700 group-hover:text-gray-700';

                            $strokeColor = $isActive ? '#2563eb' : 'currentColor';
                        @endphp

                        @if ($canAccess)
                            <a class="{{ $linkClasses }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">
                                <svg class="{{ $svgClasses }}" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="none" viewBox="{{ $data['viewBox'] }}" stroke-width="1.5"
                                    stroke="{{ $strokeColor }}">
                                    @foreach ($data['paths'] as $path)
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                    @endforeach
                                </svg>
                                <p>{{ $name }}</p>
                            </a>
                        @endif
                    @endforeach
                </li>

                <li class="flex flex-col gap-2.5" x-data="{ isOpen: localStorage.getItem('navSideDropDown') === 'true' || false }">
                    <a class="flex flex-row items-center gap-2 rounded-lg p-2 text-base text-gray-900 hover:bg-indigo-100/70"
                        href="#" @click="isOpen = !isOpen; localStorage.setItem('navSideDropDown', isOpen)">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                            color="#000000" fill="none">
                            <path
                                d="M14.5405 2V4.48622C14.5405 6.23417 14.5405 7.10814 14.7545 7.94715C14.9685 8.78616 15.3879 9.55654 16.2267 11.0973L17.3633 13.1852C19.5008 17.1115 20.5696 19.0747 19.6928 20.53L19.6792 20.5522C18.7896 22 16.5264 22 12 22C7.47357 22 5.21036 22 4.3208 20.5522L4.30725 20.53C3.43045 19.0747 4.49918 17.1115 6.63666 13.1852L7.7733 11.0973C8.61209 9.55654 9.03149 8.78616 9.24548 7.94715C9.45947 7.10814 9.45947 6.23417 9.45947 4.48622V2"
                                stroke="currentColor" stroke-width="1.5" />
                            <path d="M9 16.002L9.00868 15.9996" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M15 18.002L15.0087 17.9996" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 2L16 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M7.5 11.5563C8.5 10.4029 10.0994 11.2343 12 12.3182C14.5 13.7439 16 12.65 16.5 11.6152"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>

                        Perbandingan

                        <x-atoms.svg.arrow-down :class="'ml-12 mt-1 h-4 w-4 origin-center transform transition-transform duration-300'" />
                    </a>

                    <ul class="relative flex flex-col gap-2.5 rounded-lg bg-indigo-100/70 py-3" x-show="isOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95">

                        @foreach ($sideNavPerhitungan as $name => $data)
                            @if ($hasDirectPermissions)
                                @if (Auth::user()->hasDirectPermission($data['permission']['view']))
                                    <a class="{{ request()->segment(2) == $data['url']['view'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-200/80 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-200/80' }} ml-2 flex w-11/12 flex-row gap-2 text-base"
                                        href="{{ route('dashboard.index') . '/' . $data['url']['view'] }}">
                                        <p>{{ $name }}</p>
                                    </a>
                                @endif

                                @if (Auth::user()->hasDirectPermission($data['permission']['manage']))
                                    <a class="{{ request()->segment(2) == $data['url']['manage'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-200/80 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-200/80' }} ml-2 flex w-11/12 flex-row gap-2 text-base"
                                        href="{{ route('dashboard.index') . '/' . $data['url']['manage'] }}">
                                        <p>{{ $name }}</p>
                                    </a>
                                @endif
                            @else
                                @if (Auth::user()->hasAnyPermission($data['permission']['view']))
                                    <a class="{{ request()->segment(2) == $data['url']['view'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-200/80 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-200/80' }} ml-2 flex w-11/12 flex-row gap-2 text-base"
                                        href="{{ route('dashboard.index') . '/' . $data['url']['view'] }}">
                                        <p>{{ $name }}</p>
                                    </a>
                                @endif

                                @if (Auth::user()->hasAnyPermission($data['permission']['manage']))
                                    <a class="{{ request()->segment(2) == $data['url']['manage'] ? 'items-center rounded-lg p-2 text-gray-900 bg-slate-200/80 font-bold' : 'items-center rounded-lg p-2 text-gray-900 hover:bg-slate-200/80' }} ml-2 flex w-11/12 flex-row gap-2 text-base"
                                        href="{{ route('dashboard.index') . '/' . $data['url']['manage'] }}">
                                        <p>{{ $name }}</p>
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>

                <li class="flex flex-col gap-2.5">
                    @foreach ($sideNavPerankingan as $name => $data)
                        @php
                            $canAccess = $hasDirectPermissions
                                ? $user->hasDirectPermission($data['permission'])
                                : $user->hasPermissionTo($data['permission']);

                            $isActive = request()->segment(2) == $data['url'];
                            $linkClasses = $isActive
                                ? 'items-center rounded-lg p-2 text-blue-600 bg-indigo-100/70 font-bold'
                                : 'items-center rounded-lg p-2 text-gray-900 hover:bg-indigo-100/70';

                            $svgClasses = $isActive
                                ? 'text-gray-900 transition duration-75'
                                : 'text-gray-700 group-hover:text-gray-700';

                            $strokeColor = $isActive ? '#2563eb' : 'currentColor';
                        @endphp

                        @if ($canAccess)
                            <a class="{{ $linkClasses }} flex flex-row gap-2 text-base"
                                href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">
                                <svg class="{{ $svgClasses }}" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="none" viewBox="{{ $data['viewBox'] }}"
                                    stroke-width="1.5" stroke="{{ $strokeColor }}">

                                    @foreach ($data['paths'] as $path)
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="{{ $path }}" />
                                    @endforeach
                                </svg>
                                <p>{{ $name }}</p>

                            </a>
                        @endif
                    @endforeach
                </li>
            </ul>
        </div>

        <div>
            <li class="flex flex-col gap-2.5">
                @foreach ($sideNavKelolaAkun as $name => $data)
                    @php
                        $canAccess = $hasDirectPermissions
                            ? $user->hasDirectPermission($data['permission']['view']) ||
                                $user->hasDirectPermission($data['permission']['manage'])
                            : $user->hasPermissionTo($data['permission']['view']) ||
                                $user->hasPermissionTo($data['permission']['manage']);

                        $isActive = request()->segment(2) == $data['url'];
                        $linkClasses = $isActive
                            ? 'items-center rounded-lg p-2 text-blue-600 bg-indigo-100/70 font-bold'
                            : 'items-center rounded-lg p-2 text-gray-900 hover:bg-indigo-100/70';

                        $svgClasses = $isActive
                            ? 'text-gray-900 transition duration-75'
                            : 'text-gray-700 group-hover:text-gray-700';

                        $strokeColor = $isActive ? '#2563eb' : 'currentColor';
                    @endphp

                    @if ($canAccess)
                        <a class="{{ $linkClasses }} flex flex-row gap-2 text-base"
                            href="{{ $data['url'] == 'dashboard' ? route('dashboard.index') : route('dashboard.index') . '/' . $data['url'] }}">
                            <svg class="{{ $svgClasses }}" xmlns="http://www.w3.org/2000/svg" width="20"
                                height="20" fill="none" viewBox="{{ $data['viewBox'] }}" stroke-width="1.5"
                                stroke="{{ $strokeColor }}">
                                @foreach ($data['paths'] as $path)
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $path }}" />
                                @endforeach
                            </svg>
                            <p>{{ $name }}</p>
                        </a>
                    @endif
                @endforeach
            </li>
        </div>

    </div>
</aside>
