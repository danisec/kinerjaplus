import jQuery from "jquery";
import { trashIcon } from "../svg/trash";
window.$ = jQuery;

let i = 1;

$("#add-skala-indikator-btn").click(function () {
    if (i < 4) {
        i++;

        $("#kolom-skala-indikator").append(`
            <div class="flex flex-row kolom-skala-indikator items-center justify-between gap-4 my-4">
                <input name="skala[]" type="hidden" value="${i}">
                <textarea class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 focus:ring-3 focus:outline-hidden w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" name="deskripsi_skala[]"
                    placeholder="Deskripsi Skala ${i}" rows="6" required></textarea>

                <button class="text-gray-600 hover:text-red-600 focus:outline-hidden delete-skala-indikator-btn" type="button">
                    ${trashIcon}
                </button>
            </div>
        `);
    }
});

$(document).on("click", ".delete-skala-indikator-btn", function () {
    $(this).parents(".kolom-skala-indikator").remove();
    i--;
});
