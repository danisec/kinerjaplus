import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#togglePasswordVisibility").click(function () {
        var passwordInput = $("#passwordInput");

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
        } else {
            passwordInput.attr("type", "password");
        }
    });
});
