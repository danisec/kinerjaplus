import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    const $searchInput = $("#search-input");
    const $searchButton = $("#search-button");

    function focusSearchInput() {
        $searchInput.focus();
    }

    $searchButton.on("click", focusSearchInput);

    $(document).on("keydown", function (event) {
        // Cmd+K (Mac) or Ctrl+K (Windows/Linux)
        if ((event.metaKey || event.ctrlKey) && event.key === "k") {
            event.preventDefault();
            focusSearchInput();
        }

        // Key "/"
        if (event.key === "/" && document.activeElement !== $searchInput[0]) {
            event.preventDefault();
            focusSearchInput();
        }
    });
});
