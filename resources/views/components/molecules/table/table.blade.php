@props(['title', 'placeholderSearch', 'request', 'nameSearch', 'thead', 'slot'])

<div class="mb-4 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
    <div>
        <h3 class="xs:text-base font-semibold capitalize text-gray-800 sm:text-lg dark:text-white/90">
            {{ $title }}
        </h3>
    </div>

    <div>
        <x-molecules.search.search :placeholder="$placeholderSearch" :request="$request" :name="$nameSearch" :value="$request" />
    </div>
</div>

<div class="w-full overflow-x-auto">
    <table class="min-w-full">
        <thead>
            {{ $thead }}
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
