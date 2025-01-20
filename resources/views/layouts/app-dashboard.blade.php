<x-app-layout title="{{ $title }}">

    <div class="relative h-screen">
        <x-nav-aside />

        <div class="ml-64">
            <x-organism.navbar />

            <main class="bg-slate-100 p-3.5">
                <section class="min-h-screen w-auto rounded-2xl bg-white p-4">
                    {{ $slot }}
                </section>
            </main>
        </div>

    </div>

</x-app-layout>
