@props(['label', 'name', 'options' => [], 'value' => '', 'required' => false])

<label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
    {{ $label }}
</label>
<div class="relative z-20 bg-transparent">
    <select name="{{ $name }}"
        {{ $attributes->class([
            'h-11 w-full rounded-lg border appearance-none px-4 py-2.5 pr-11 text-sm capitalize shadow-theme-xs focus:ring-3 focus:outline-hidden',
            'border-red-500' => $errors->has($name),
            'border-gray-300 dark:border-gray-700 text-gray-800 dark:text-white/90 placeholder:text-gray-400 dark:placeholder:text-white/30 dark:bg-gray-900',
            'disabled:bg-gray-50 dark:disabled:bg-white/[0.03]',
        ]) }}
        {{ $required ? 'required' : '' }}>
        <option selected disabled hidden>
            Pilih {{ $label }}
        </option>
        @foreach ($options as $key => $text)
            <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>

    <span class="pointer-events-none absolute right-4 top-1/2 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </span>
</div>
@error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror
