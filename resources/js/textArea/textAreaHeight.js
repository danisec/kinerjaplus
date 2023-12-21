import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $(document).ready(function () {
        function adjustTextareaHeight() {
            $(".textAreaHeight").each(function () {
                this.style.height = "auto";
                this.style.height = this.scrollHeight + "px";
            });
        }
        adjustTextareaHeight();

        $(document).on("input", ".deskripsiTextarea", function () {
            adjustTextareaHeight();
        });
    });
});
