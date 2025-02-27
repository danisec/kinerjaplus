<x-app-layout title="{{ $title = '500' }}">

    <section class="bg-white">
        <div class="container mx-auto flex min-h-screen items-center justify-center">
            <div>
                <p class="text-sm font-medium text-blue-600">500 Internal Server Error</p>
                <h1 class="mt-3 text-2xl font-semibold text-gray-800 md:text-3xl">Something went wrong
                </h1>
                <p class="mt-4 text-gray-500">We're experiencing technical difficulties. Please try again later.</p>

                <a class="mt-6 flex items-center gap-x-3" href="{{ url()->previous() }}">
                    <button
                        class="flex w-1/2 items-center justify-center gap-x-4 rounded-lg border bg-white px-5 py-2 text-sm text-gray-700 transition-colors duration-200 hover:bg-gray-100 sm:w-auto">
                        <svg class="h-5 w-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                        </svg>

                        <span>Go back</span>
                    </button>
                </a>
            </div>
        </div>
    </section>

</x-app-layout>
