<nav class="sticky top-0 z-40 bg-white px-4 py-8 shadow-md shadow-slate-100">

    <div class="flex flex-row justify-end">
        <div class="flex flex-row items-center gap-2">
            <p class="text-base font-normal text-gray-900">{{ Auth::user()->fullname }}</p>

            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
    </div>

</nav>
