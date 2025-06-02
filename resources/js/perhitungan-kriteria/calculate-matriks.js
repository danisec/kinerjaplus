import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("select").change(function () {
        let row = $(this).data("row");
        let col = $(this).data("col");
        let selectedValue = parseFloat($(this).val());

        $("#matriks[" + row + "][" + col + "]").val(selectedValue);
        let calculatedValue = (1 / selectedValue).toFixed(4);

        let calculatedInput = $(
            ".matriksHasil[data-row='" + col + "'][data-col='" + row + "']",
        );
        calculatedInput.val(calculatedValue);

        if (calculatedInput.val() === "0") {
            calculatedInput.val(calculatedValue);
        }

        if (isNaN(calculatedValue)) {
            calculatedInput.val("");
        }
    });
});
