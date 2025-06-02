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
        let idTanggalPenilaian = $(this).val();
        let selectedOptionText = $(this).find("option:selected").data("text");
        fetchChartData(idTanggalPenilaian, selectedOptionText);
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
                "/dashboard/" + idTanggalPenilaian + "/getRankTahunAjaranChart",
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

                updateChart(
                    dataKaryawan,
                    selectedOptionText,
                    currentTextIdTanggalPenilaian,
                );
            },
            error: function (xhr, status, error) {
                console.error(error);
            },
        });
    }

    function updateChart(
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
});
