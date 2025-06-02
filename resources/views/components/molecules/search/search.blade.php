@props(['placeholder', 'request', 'name', 'value'])

<form method="GET">
    <div class="relative">
        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2">
            <x-atoms.svg.search />
        </span>

        @if ($request)
            <input name="{{ $name }}" type="hidden" value="{{ $value }}">
        @endif

        <input
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 focus:ring-3 focus:outline-hidden h-[42px] w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-[42px] pr-4 text-sm text-gray-800 placeholder:text-gray-400 xl:w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            id="search-input" name="search" type="search" value="{{ request('search') ?? '' }}"
            placeholder="{{ $placeholder }}">

        <button
            class="absolute right-2.5 top-1/2 inline-flex -translate-y-1/2 items-center gap-0.5 rounded-lg border border-gray-200 bg-gray-50 px-[7px] py-[4.5px] text-xs -tracking-[0.2px] text-gray-500 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-400"
            id="search-button">
            <span> ⌘ </span>
            <span> K </span>
        </button>
    </div>
</form>
