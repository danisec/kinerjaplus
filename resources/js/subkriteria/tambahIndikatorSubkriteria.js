import jQuery from "jquery";
import { trashIcon } from "../svg/trash";
window.$ = jQuery;

let i = 1;

$("#add-subkriteria-btn").click(function () {
    i++;

    $("#kolom-subkriteria").append(`
                <div class="flex flex-row kolom-subkriteria items-center justify-between gap-4 my-4">
                    <textarea class="field-input-slate w-full" name="indikator_subkriteria[]"
                        placeholder="Indikator Subkriteria" rows="3" required></textarea>

                    <button class="text-red-600 focus:outline-none delete-subkriteria-btn" type="button">
                        ${trashIcon}
                    </button>
                </div>
            `);
});

$(document).on("click", ".delete-subkriteria-btn", function () {
    $(this).parents(".kolom-subkriteria").remove();
});
