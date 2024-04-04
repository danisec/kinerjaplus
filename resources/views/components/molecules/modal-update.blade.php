@props(['title', 'action', 'modalId'])

<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/20" id="{{ $modalId }}" x-show="isOpen"
    x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100" x-cloak>

    <div class="w-7/12 rounded-lg bg-white p-12 shadow-lg">
        <div class="relative">
            <div class="absolute -right-10 -top-10">
                <button
                    class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm text-gray-900 hover:bg-gray-100"
                    type="button" @click="isOpen = false">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <h2 class="mb-1 text-2xl font-semibold">Konfirmasi</h2>

        <p class="text-base font-normal text-gray-900">{{ $title }}</p>

        <div class="mt-8 flex justify-start gap-4">
            <form id="{{ $modalId }}" action={{ $action }} method="POST">
                @method('PUT')
                @csrf

                <div>
                    {{ $slot }}
                </div>
            </form>
        </div>
    </div>

</div>
