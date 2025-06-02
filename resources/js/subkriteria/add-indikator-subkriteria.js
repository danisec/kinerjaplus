import jQuery from "jquery";
import { trashIcon } from "../svg/trash";
window.$ = jQuery;

let i = 1;

$("#add-subkriteria-btn").click(function () {
    i++;

    $("#kolom-subkriteria").append(`
                <div class="flex flex-row kolom-subkriteria items-center justify-between gap-4 my-4">
                    <textarea class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 focus:ring-3 focus:outline-hidden w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" name="indikator_subkriteria[]"
                        placeholder="Indikator Subkriteria" rows="6" required></textarea>

                    <div x-data="{ showTooltip: false, isOpen: false }">
                        <button class="text-gray-600 hover:text-red-600 focus:outline-hidden delete-subkriteria-btn" type="button" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false" @click="isOpen = true">
                            ${trashIcon}
                        </button>

                        <div class="xs:text-xs absolute z-10 -ml-2.5 mt-1 rounded-sm bg-gray-100 px-2 py-1 text-gray-900 sm:text-sm"
                        x-show="showTooltip" x-transition>
                            <span>Hapus</span>
                        </div>
                    </div>
                </div>
            `);
});

$(document).on("click", ".delete-subkriteria-btn", function () {
    $(this).parents(".kolom-subkriteria").remove();
});
