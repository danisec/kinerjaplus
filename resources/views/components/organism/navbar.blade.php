<nav class="sticky top-0 z-40 bg-white px-4 py-8 shadow-md shadow-slate-100">

    <div class="flex flex-row justify-end">
        <div class="flex flex-row items-center gap-4">
            <div class="flex flex-row gap-2">
                <p class="text-base font-normal text-gray-900">{{ Auth::user()->fullname }}</p>
                <span
                    class="rounded-md bg-emerald-400 p-1 text-xs font-normal text-white">{{ Auth::user()->getRoleNames()->first() }}</span>
            </div>

            <div x-data="{ isOpen: false }">
                <button type="button" @click="isOpen = !isOpen" @keydown.escape="isOpen = false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"
                        color="#000000" fill="none">
                        <path
                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M14.75 9.5C14.75 11.0188 13.5188 12.25 12 12.25C10.4812 12.25 9.25 11.0188 9.25 9.5C9.25 7.98122 10.4812 6.75 12 6.75C13.5188 6.75 14.75 7.98122 14.75 9.5Z"
                            stroke="currentColor" stroke-width="1.5" />
                        <path
                            d="M5.49994 19.0001L6.06034 18.0194C6.95055 16.4616 8.60727 15.5001 10.4016 15.5001H13.5983C15.3926 15.5001 17.0493 16.4616 17.9395 18.0194L18.4999 19.0001"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <ul class="absolute right-4 z-20 mt-2 w-48 overflow-hidden rounded-lg border-2 border-slate-50 bg-white py-1 font-normal shadow-sm shadow-slate-100"
                    x-show="isOpen" @click.away="isOpen = false" x-cloak>

                    <li class="border-b border-slate-200 p-2">
                        <a class="flex flex-row items-center p-2 hover:rounded-md hover:bg-slate-100 focus:outline-none"
                            href="{{ route('profile.index', Auth::user()->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"
                                color="#000000" fill="none">
                                <path
                                    d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                            <span class="ml-2">Profile</span>
                        </a>
                    </li>

                    <li class="p-2">
                        <form class="p-2 hover:rounded-md hover:bg-slate-100 focus:outline-none"
                            action="{{ route('login.logout') }}" method="post">
                            @csrf

                            <button class="flex flex-row items-center gap-2" type="submit">
                                <svg class="text-red-500" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>

                                <p class="text-base font-normal text-gray-900">Keluar</p>
                            </button>
                        </form>
                    </li>
                </ul>

            </div>
        </div>
    </div>

</nav>
