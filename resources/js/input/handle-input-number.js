import jQuery from "jquery";
window.$ = jQuery;

$(function () {
    $('input[type="number"]').on("input", function () {
        this.value = this.value.replace(/\D/g, "");
    });
});
