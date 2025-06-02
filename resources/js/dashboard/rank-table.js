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
        let idTanggalPenilaian = $(this).val();
        fetchChartData(idTanggalPenilaian);
    });

    $(document).on("click", ".pagination a", function (event) {
        event.preventDefault();
        let page = $(this).attr("href").split("page=")[1];
        fetchChartData($("#selectTahun").val(), page);
    });

    function fetchChartData(idTanggalPenilaian = null, page = 1) {
        showSkeletonLoading();

        let currentIdTanggalPenilaian = $("#selectTahun").data("current-tahun");

        if (idTanggalPenilaian === null) {
            idTanggalPenilaian = currentIdTanggalPenilaian;
        }

        $.ajax({
            url: `/dashboard/${idTanggalPenilaian}/getRankTahunAjaranTable?page=${page}`,
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
                    <tr>
                        <td class="py-3">
                            <div class="flex items-center">
                                <p class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                    ${item.tahun_ajaran} - ${item.semester}
                                </p>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="flex items-center">
                                <p class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                    ${item.nama}
                                </p>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="flex items-center">
                                <p class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                    ${item.nilai}
                                </p>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="flex items-center">
                                <p class="xs:text-sm sm:text-theme-md capitalize text-gray-700 dark:text-gray-400">
                                    ${item.rank}
                                </p>
                            </div>
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

        // pagination
        for (let i = 1; i <= pagination.lastPage; i++) {
            let activeClass =
                i === pagination.currentPage
                    ? "bg-brand-500/[0.08] relative -ml-px inline-flex cursor-default items-center rounded-lg px-4 py-2 text-sm font-medium leading-5 text-indigo-500"
                    : "hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500 relative -ml-px inline-flex items-center rounded-lg bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out";
            let pageLink = `<a href="#" class="px-3 py-1 mx-1 rounded-sm ${activeClass}" data-page="${i}">${i}</a>`;
            paginationLinks.append(pageLink);
        }

        paginationLinks.find("a").click(function (e) {
            e.preventDefault();
            let page = $(this).data("page");
            fetchChartData($("#selectTahun").val(), page);
        });
    }
});
