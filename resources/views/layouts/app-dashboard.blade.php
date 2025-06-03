<x-app-layout title="{{ $title }}">

    <div class="flex h-screen overflow-hidden">
        <x-nav-aside />

        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <x-organism.navbar />

            <main class="{{ request()->segment(2) == '' ? 'bg-gray-50' : 'xs:bg-white lg:bg-gray-50' }} h-dvh">
                <section class="max-w-(--breakpoint-2xl) mx-auto p-4 md:p-6">
                    {{ $slot }}
                </section>
            </main>
        </div>

    </div>

    </script>


</x-app-layout>
