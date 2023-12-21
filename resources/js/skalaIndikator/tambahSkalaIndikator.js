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
                        <textarea class="field-input-slate w-full" name="deskripsi_skala[]"
                            placeholder="Deskripsi Skala ${i}" rows="3" required></textarea>

                        <button class="text-red-600 focus:outline-none delete-skala-indikator-btn" type="button">
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
