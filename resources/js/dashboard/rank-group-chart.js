import jQuery from "jquery";
window.$ = jQuery;

function showSkeletonLoading() {
    $("#loadingChart").show();
    $("#topRanking").hide();
}

function hideSkeletonLoading() {
    $("#loadingChart").hide();
    $("#topRanking").show();
}

$(document).ready(function () {
    let chartDataLoaded = false;
    let tableDataLoaded = false;

    showSkeletonLoading();
    fetchChartData();

    $("#selectTahun").change(function () {
        let idTanggalPenilaian = $("#selectTahun").val();
        let selectedOptionText = $(this).find("option:selected").data("text");
        let selectedGroup = $("#selectTahun option:selected").data("group");

        fetchChartData(idTanggalPenilaian, selectedOptionText, selectedGroup);
    });

    function fetchChartData(
        idTanggalPenilaian = null,
        selectedOptionText = null,
    ) {
        let currentIdTanggalPenilaian = $("#selectTahun").data("current-tahun");

        if (idTanggalPenilaian === null) {
            idTanggalPenilaian = currentIdTanggalPenilaian;
        }

        let currentTextIdTanggalPenilaian =
            $("#selectTahun").data("current-text");

        // Change currentTextIdTanggalPenilaian to capitalize
        currentTextIdTanggalPenilaian = currentTextIdTanggalPenilaian
            .toLowerCase()
            .split(" ")
            .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
            .join(" ");

        $.ajax({
            url:
                "/dashboard/" +
                idTanggalPenilaian +
                "/getRankTahunAjaranGroupChart",
            type: "GET",
            success: function (data) {
                chartDataLoaded = true;
                if (tableDataLoaded) {
                    hideSkeletonLoading();
                }

                let dataKaryawan = data.map(function (item) {
                    return {
                        nama: item.nama,
                        nilai: item.nilai,
                        rank: item.rank,
                    };
                });

                showRankChart(
                    dataKaryawan,
                    selectedOptionText,
                    currentTextIdTanggalPenilaian,
                );
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });

        $.ajax({
            url:
                "/dashboard/" +
                idTanggalPenilaian +
                "/getRankTahunAjaranGroupTable",
            type: "GET",
            success: function (response) {
                tableDataLoaded = true;
                if (chartDataLoaded) {
                    hideSkeletonLoading();
                }

                showRankTable(
                    response.data,
                    response.pagination.currentPage,
                    response.pagination.perPage,
                );
                showPagination(idTanggalPenilaian, response.pagination);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    function showRankChart(
        dataKaryawan,
        selectedOptionText,
        currentTextIdTanggalPenilaian,
    ) {
        Highcharts.chart("topRanking", {
            chart: {
                type: "column",
            },
            title: {
                // text: 'Ranking Kinerja Karyawan' + ' ' + $('#selectTahun').val(),
                text: "",
                align: "left",
            },
            subtitle: {
                text:
                    "5 Peringkat Teratas Kinerja Pegawai " +
                    ($("#selectTahun option:selected").data("group")
                        ? $("#selectTahun option:selected").data("group")
                        : $("#selectTahun").data("current-group")) +
                    " Tahun Ajaran " +
                    (selectedOptionText
                        ? selectedOptionText
                              .toLowerCase()
                              .split(" ")
                              .map(
                                  (word) =>
                                      word.charAt(0).toUpperCase() +
                                      word.slice(1),
                              )
                              .join(" ")
                        : currentTextIdTanggalPenilaian),
                align: "left",
            },
            xAxis: {
                categories: dataKaryawan
                    ? dataKaryawan.map((item) => item.nama)
                    : [],
                crosshair: true,
                accessibility: {
                    description: "nama karyawan",
                },
            },
            yAxis: {
                min: 0,
                title: {
                    text: "Nilai Kinerja Karyawan",
                },
            },
            tooltip: {
                valueSuffix: "",
                valueDecimals: 5,
            },
            plotOptions: {
                column: {
                    pointWidth: 100,
                    pointPadding: 0.2,
                    dataLabels: {
                        enabled: true,
                        formatter: function () {
                            return (
                                "Nilai: " +
                                this.y.toFixed(5) +
                                "<br>Rank: " +
                                dataKaryawan[this.point.index].rank
                            );
                        },
                    },
                    borderWidth: 0,
                },
            },
            legend: {
                enabled: false,
            },
            credits: {
                enabled: false,
            },
            series: [
                {
                    name: "Nilai",
                    data: dataKaryawan
                        ? dataKaryawan.map((item) => item.nilai)
                        : [],
                    color: "#34d399",
                },
            ],
            responsive: {
                rules: [
                    {
                        condition: {
                            maxWidth: 600,
                        },
                        chartOptions: {
                            chart: {
                                spacingLeft: 10,
                                spacingRight: 10,
                            },
                            xAxis: {
                                labels: {
                                    style: {
                                        fontSize: "10px",
                                    },
                                },
                            },
                            yAxis: {
                                labels: {
                                    style: {
                                        fontSize: "10px",
                                    },
                                },
                            },
                            plotOptions: {
                                column: {
                                    pointWidth: 30,
                                    dataLabels: {
                                        style: {
                                            fontSize: "9px",
                                        },
                                    },
                                },
                            },
                        },
                    },
                ],
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

    function showPagination(idTanggalPenilaian, pagination) {
        let paginationLinks = $("#paginationLinks");
        paginationLinks.empty();

        // Membuat link untuk setiap halaman
        for (let i = 1; i <= pagination.lastPage; i++) {
            let activeClass =
                i === pagination.currentPage
                    ? "bg-brand-500/[0.08] relative -ml-px inline-flex cursor-default items-center rounded-lg px-4 py-2 text-sm font-medium leading-5 text-indigo-500"
                    : "hover:bg-brand-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500 relative -ml-px inline-flex items-center rounded-lg bg-white px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out";
            let pageLink = `<a href="#" class="px-3 py-1 mx-1 rounded-sm ${activeClass}" data-page="${i}">${i}</a>`;
            paginationLinks.append(pageLink);
        }

        // Menambahkan event listener untuk setiap link halaman
        paginationLinks.find("a").click(function (e) {
            e.preventDefault();

            let page = $(this).data("page");

            // Memperbarui tampilan tabel berdasarkan halaman yang dipilih
            updateTable(idTanggalPenilaian, page);
        });
    }

    function updateTable(idTanggalPenilaian, page) {
        $.ajax({
            url:
                "/dashboard/" +
                idTanggalPenilaian +
                "/getRankTahunAjaranGroupTable?page=" +
                page,
            type: "GET",
            success: function (response) {
                showRankTable(
                    response.data,
                    response.pagination.currentPage,
                    response.pagination.perPage,
                );
                showPagination(idTanggalPenilaian, response.pagination);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
});
