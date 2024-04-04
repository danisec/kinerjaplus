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
    showSkeletonLoading();
    fetchChartData();

    $("#selectTahun").change(function () {
        let tahunAjaran = $(this).val();
        fetchChartData(tahunAjaran);
    });

    function fetchChartData(tahunAjaran = null) {
        let currentTahunAjaran = $("#selectTahun").data("current-tahun");

        if (tahunAjaran === null) {
            tahunAjaran = currentTahunAjaran;
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
                "/getRankTahunAjaranChart",
            type: "GET",
            success: function (data) {
                hideSkeletonLoading();

                let namaKaryawan = data.map(function (item) {
                    return item.nama;
                });
                let nilaiKaryawan = data.map(function (item) {
                    return item.nilai;
                });

                updateChart(namaKaryawan, nilaiKaryawan);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    function updateChart(namaKaryawan, nilaiKaryawan) {
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
                text: "5 Peringkat Teratas",
                align: "left",
            },
            xAxis: {
                categories: namaKaryawan,
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
                    pointPadding: 0.2,
                    borderWidth: 0,
                },
            },
            series: [
                {
                    name: "Nilai",
                    data: nilaiKaryawan,
                    color: "#34d399",
                },
            ],
        });
    }
});
