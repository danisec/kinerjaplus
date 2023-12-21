@props(['customClass', 'type', 'name'])

<button
    class="{{ $customClass }} bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300"
    type="{{ $type }}" {{ $attributes }}>{{ $name }}
</button>
