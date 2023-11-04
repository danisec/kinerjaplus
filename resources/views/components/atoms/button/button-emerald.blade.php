@props(['customClass', 'type', 'name'])

<button
    class="{{ $customClass }} bg-emerald-500 text-base font-medium text-white hover:bg-emerald-600 focus:outline-none focus:ring-4 focus:ring-emerald-300"
    type="{{ $type }}" {{ $attributes }}>{{ $name }}
</button>
