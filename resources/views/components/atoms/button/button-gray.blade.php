@props(['customClass', 'type', 'name'])

<button
    class="{{ $customClass }} bg-slate-200 text-base font-medium text-gray-900 hover:bg-slate-300 focus:outline-hidden focus:ring-4 focus:ring-slate-100"
    type="{{ $type }}">{{ $name }}
</button>
