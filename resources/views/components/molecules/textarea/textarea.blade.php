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
<textarea name="{{ $name }}" type="{{ $type }}"
    {{ $attributes->class([
        'textAreaHeight dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden',
        'border-red-500' => $errors->has($name),
        'dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30',
        'disabled:bg-gray-50 dark:disabled:bg-white/[0.03]',
    ]) }}
    {{ $required ? 'required' : '' }} {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }} />{{ old($name, $value) }}</textarea>
@error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror
