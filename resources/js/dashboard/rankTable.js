import jQuery from "jquery";
window.$ = jQuery;

function showSkeletonLoading() {
    $("#loadingRow").show();
    $("#rankTable").hide();
}

function hideSkeletonLoading() {
    $("#loadingRow").hide();
    $("#rankTable").show();
}

$(document).ready(function () {
    fetchChartData();

    $("#selectTahun").change(function () {
        let tahunAjaran = $(this).val();
        fetchChartData(tahunAjaran);
    });

    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        let page = $(this).attr("href").split("page=")[1];
        fetchChartData($("#selectTahun").val(), page);
    });

    function fetchChartData(tahunAjaran = null, page = 1) {
        showSkeletonLoading();

        let currentTahunAjaran = $("#selectTahun").data("current-tahun");

        if (tahunAjaran === null) {
            tahunAjaran = currentTahunAjaran;
        }

        let tahunAjaranParts = tahunAjaran.split("/");
        let firstYear = tahunAjaranParts[0];
        let secondYear = tahunAjaranParts[1];

        $.ajax({
            url: `/dashboard/${firstYear}/${secondYear}/getRankTahunAjaranTable?page=${page}`,
            type: "GET",
            success: function (response) {
                hideSkeletonLoading();

                showRankTable(
                    response.data,
                    response.pagination.currentPage,
                    response.pagination.perPage,
                );
                showPagination(response.pagination);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    function showRankTable(data, currentPage, perPage) {
        let tableRank = $("#tableRank tbody");
        tableRank.empty();

        if (data.length > 0) {
            let startIndex = (currentPage - 1) * perPage;

            data.forEach(function (item, index) {
                let row = `
                    <tr class="border-b bg-white hover:bg-slate-100">
                        <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900" scope="row">
                            ${startIndex + index + 1}
                        </td>
                        <td class="px-6 py-4">
                            ${item.tahun_ajaran}
                        </td>
                        <td class="px-6 py-4">
                            ${item.nama}
                        </td>
                        <td class="px-6 py-4">
                            ${item.nilai}
                        </td>
                        <td class="px-6 py-4 text-center">
                            ${item.rank}
                        </td>
                    </tr>
                    `;
                tableRank.append(row);
            });
        } else {
            let emptyRow = `
                    <tr class="border-b bg-white">
                        <td class="px-6 py-4 text-center font-medium text-gray-600" colspan="5">
                            Data belum ada.
                        </td>
                    </tr>
                `;
            tableRank.append(emptyRow);
        }
    }

    function showPagination(pagination) {
        let paginationLinks = $("#paginationLinks");
        paginationLinks.empty();

        // Membuat link untuk setiap halaman
        for (let i = 1; i <= pagination.lastPage; i++) {
            let activeClass =
                i === pagination.currentPage
                    ? "bg-indigo-700 text-white"
                    : "text-gray-700";
            let pageLink = `<a href="#" class="px-3 py-1 mx-1 rounded ${activeClass}" data-page="${i}">${i}</a>`;
            paginationLinks.append(pageLink);
        }

        // Menambahkan event listener untuk setiap link halaman
        paginationLinks.find("a").click(function (e) {
            e.preventDefault();
            let page = $(this).data("page");
            fetchChartData($("#selectTahun").val(), page);
        });
    }
});
