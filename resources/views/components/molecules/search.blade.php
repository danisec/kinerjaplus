@props(['placeholder', 'request', 'name', 'value'])

<form method="GET">
    <div class="relative h-auto w-96">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <x-atoms.svg.search />
        </div>

        @if ($request)
            <input name="{{ $name }}" type="hidden" value="{{ $value }}">
        @endif

        <input
            class="block w-full rounded-lg border border-indigo-50 bg-indigo-50 p-3.5 pl-9 pr-20 text-base text-gray-900 focus:border-indigo-600 focus:ring-indigo-600"
            name="search" type="search" value="{{ request('search') ?? '' }}" placeholder="{{ $placeholder }}">

        <x-atoms.button.button-primary :customClass="'absolute rounded-md bottom-1.5 right-2.5 px-4 py-2'" :type="'submit'" :name="'Search'" />
    </div>
</form>
