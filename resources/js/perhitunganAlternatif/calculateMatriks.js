import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("select").change(function () {
        let row = $(this).data("row");
        let col = $(this).data("col");
        let selectedValue = parseFloat($(this).val());

        let tableAlternatif = $(this).closest(".table-alternatif");
        let calculatedInput = tableAlternatif.find(
            ".matriksHasil[data-row='" + col + "'][data-col='" + row + "']",
        );

        tableAlternatif
            .find(".matriks[data-row='" + col + "'][data-col='" + row + "']")
            .val(selectedValue);

        let calculatedValue = (1 / selectedValue).toFixed(4);
        calculatedInput.val(calculatedValue);

        if (calculatedInput.val() === "0") {
            calculatedInput.val(calculatedValue);
        }
    });
});
