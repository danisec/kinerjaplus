@props(['class' => '', 'type', 'name'])

<button
    class="{{ $class }} bg-brand-500 shadow-theme-xs hover:bg-brand-600 inline-flex items-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white transition"
    type="{{ $type }}" {{ $attributes }}>{{ $name }}
</button>
