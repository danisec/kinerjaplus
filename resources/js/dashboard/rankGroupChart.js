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

    $("#selectTahun, #selectNamaGroup").change(function () {
        let tahunAjaran = $("#selectTahun").val();
        let namaGroupKaryawan = $("#selectNamaGroup").val();
        fetchChartData(tahunAjaran, namaGroupKaryawan);
    });

    function fetchChartData(tahunAjaran = null, namaGroupKaryawan = null) {
        let currentTahunAjaran = $("#selectTahun").data("current-tahun");

        if (tahunAjaran === null) {
            tahunAjaran = currentTahunAjaran;
        }

        if (namaGroupKaryawan === null) {
            namaGroupKaryawan = $("#selectNamaGroup").data("nama-group");
        }

        let tahunAjaranParts = tahunAjaran.split("/");
        let firstYear = tahunAjaranParts[0];
        let secondYear = tahunAjaranParts[1];

        $.ajax({
            url:
                "/dashboard/" +
                firstYear +
                "/" +
                secondYear +
                "/" +
                namaGroupKaryawan +
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

                showRankChart(dataKaryawan);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });

        $.ajax({
            url:
                "/dashboard/" +
                firstYear +
                "/" +
                secondYear +
                "/" +
                namaGroupKaryawan +
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
                showPagination(
                    tahunAjaran,
                    namaGroupKaryawan,
                    response.pagination,
                );
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    function showRankChart(dataKaryawan) {
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
                    "5 Peringkat Teratas Kinerja Karyawan " +
                    ($("#selectNamaGroup").val()
                        ? $("#selectNamaGroup").val()
                        : $("#selectNamaGroup").data("nama-group")) +
                    " Tahun Ajaran " +
                    ($("#selectTahun").val()
                        ? $("#selectTahun").val()
                        : $("#selectTahun").data("current-tahun")),
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

    function showPagination(tahunAjaran, namaGroupKaryawan, pagination) {
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

            // Memperbarui tampilan tabel berdasarkan halaman yang dipilih
            updateTable(tahunAjaran, namaGroupKaryawan, page);
        });
    }

    function updateTable(tahunAjaran, namaGroupKaryawan, page) {
        let tahunAjaranParts = tahunAjaran.split("/");
        let firstYear = tahunAjaranParts[0];
        let secondYear = tahunAjaranParts[1];

        $.ajax({
            url:
                "/dashboard/" +
                firstYear +
                "/" +
                secondYear +
                "/" +
                namaGroupKaryawan +
                "/getRankTahunAjaranGroupTable?page=" +
                page,
            type: "GET",
            success: function (response) {
                showRankTable(
                    response.data,
                    response.pagination.currentPage,
                    response.pagination.perPage,
                );
                showPagination(
                    tahunAjaran,
                    namaGroupKaryawan,
                    response.pagination,
                );
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }
});
