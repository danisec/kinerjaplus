import jQuery, { data } from "jquery";
window.$ = jQuery;

function showSkeletonLoading() {
    $("#loadingRankChart").show();
    $("#topRanking").hide();
}

function hideSkeletonLoading() {
    $("#loadingRankChart").hide();
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

                let dataKaryawan = data.map(function (item) {
                    return {
                        nama: item.nama,
                        nilai: item.nilai,
                        rank: item.rank,
                    };
                });

                updateChart(dataKaryawan);
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    function updateChart(dataKaryawan) {
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
                // text: "5 Peringkat Teratas",
                text:
                    "5 Peringkat Teratas Kinerja Karyawan " +
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
});
