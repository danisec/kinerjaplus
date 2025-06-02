import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    let currentPage = 1;
    const totalPages = window.kriteriaData.length;
    const kriteriaPages = $(".kriteria-page");
    const prevPageButton = $("#prevPage");
    const nextPageButton = $("#nextPage");

    function updatePagination() {
        // Show current page
        kriteriaPages.each(function (index, page) {
            if (index + 1 === currentPage) {
                $(page).show();
            } else {
                $(page).hide();
            }
        });

        // Update button states
        if (currentPage === 1) {
            prevPageButton.prop("disabled", true);
            prevPageButton.removeClass("bg-indigo-600 hover:bg-indigo-700");
            prevPageButton.addClass(
                "text-gray-900! bg-slate-200 hover:bg-slate-300",
            );
        } else {
            prevPageButton.prop("disabled", false);
            prevPageButton.removeClass(
                "text-gray-900! bg-slate-200 hover:bg-slate-300",
            );
            prevPageButton.addClass("bg-indigo-600 hover:bg-indigo-700");
        }

        if (currentPage === totalPages) {
            nextPageButton.prop("disabled", true);
            nextPageButton.removeClass("bg-indigo-600 hover:bg-indigo-700");
            nextPageButton.addClass(
                "text-gray-900! bg-slate-200 hover:bg-slate-300",
            );
        } else {
            nextPageButton.prop("disabled", false);
            nextPageButton.removeClass(
                "text-gray-900! bg-slate-200 hover:bg-slate-300",
            );
            nextPageButton.addClass("bg-indigo-600 hover:bg-indigo-700");
        }
    }

    // Prev button
    prevPageButton.on("click", function () {
        if (currentPage > 1) {
            currentPage--;
            updatePagination();
        }
    });

    // Next button
    nextPageButton.on("click", function () {
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
        }
    });

    updatePagination();
});
