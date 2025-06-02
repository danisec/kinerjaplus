@props(['title', 'action', 'class' => '', 'confirmNameButton' => 'Simpan'])

<div class="modal z-99999 fixed inset-0 flex items-center justify-center overflow-y-auto p-5" x-show="isOpen" x-cloak>
    <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
    <div class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 lg:p-10 dark:bg-gray-900"
        @click.outside="isOpen = false">

        <button
            class="z-999 h-9.5 w-9.5 absolute right-3 top-3 flex items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 sm:right-6 sm:top-6 sm:h-11 sm:w-11 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            @click="isOpen = false">
            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.04289 16.5413C5.65237 16.9318 5.65237 17.565 6.04289 17.9555C6.43342 18.346 7.06658 18.346 7.45711 17.9555L11.9987 13.4139L16.5408 17.956C16.9313 18.3466 17.5645 18.3466 17.955 17.956C18.3455 17.5655 18.3455 16.9323 17.955 16.5418L13.4129 11.9997L17.955 7.4576C18.3455 7.06707 18.3455 6.43391 17.955 6.04338C17.5645 5.65286 16.9313 5.65286 16.5408 6.04338L11.9987 10.5855L7.45711 6.0439C7.06658 5.65338 6.43342 5.65338 6.04289 6.0439C5.65237 6.43442 5.65237 7.06759 6.04289 7.45811L10.5845 11.9997L6.04289 16.5413Z"
                    fill=""></path>
            </svg>
        </button>

        <div>
            <h4 class="xs:text-lg mb-7 font-semibold text-gray-800 sm:text-xl dark:text-white/90">
                Konfirmasi
            </h4>

            <p class="mt-5 text-sm leading-6 text-gray-500 dark:text-gray-400">
                {{ $title }}
            </p>

            <div>
                <div class="mt-8 flex w-full items-center justify-end gap-3">
                    <button
                        class="shadow-theme-xs flex w-full justify-center rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 sm:w-auto dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200"
                        type="button" @click="isOpen = false">
                        Batal
                    </button>

                    <button
                        class="{{ $class }} bg-brand-500 shadow-theme-xs hover:bg-brand-600 flex w-full justify-center rounded-lg px-4 py-3 text-sm font-medium text-white sm:w-auto"
                        type="submit">
                        {{ $confirmNameButton }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
