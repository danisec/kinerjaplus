@props([
    'label',
    'name',
    'type' => 'text',
    'value' => '',
    'required' => false,
    'readonly' => false,
    'disabled' => false,
])

<label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
    {{ $label }}
</label>
<input name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}"
    {{ $attributes->class([
        'h-11 w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm shadow-theme-xs focus:ring-3 focus:outline-hidden',
        'border-red-500' => $errors->has($name),
        'border-gray-300 dark:border-gray-700 text-gray-800 dark:text-white/90 placeholder:text-gray-400 dark:placeholder:text-white/30 dark:bg-gray-900',
        'disabled:bg-gray-50 dark:disabled:bg-white/[0.03]',
    ]) }}
    {{ $required ? 'required' : '' }} {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }} />
@error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror
