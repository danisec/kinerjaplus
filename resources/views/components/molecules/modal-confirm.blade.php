@props(['title'])

<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/20" x-show="isOpen"
    x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100" x-cloak>

    <div class="w-7/12 rounded-lg bg-white p-12 shadow-lg">
        <h2 class="mb-1 text-2xl font-semibold">Konfirmasi</h2>

        <p class="text-base font-normal text-gray-900">{{ $title }}</p>

        <div class="mt-8 flex justify-start gap-4">
            <button class="rounded-md border border-gray-300 px-6 py-2.5 text-gray-900" type="button"
                @click="isOpen = false">
                Batal
            </button>

            <button
                class="rounded-md bg-indigo-700 px-6 py-2.5 text-white hover:bg-indigo-600 focus:bg-indigo-600 focus:ring-indigo-600"
                type="submit">
                Simpan
            </button>
        </div>
    </div>

</div>
