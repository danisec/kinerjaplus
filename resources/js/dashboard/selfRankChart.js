import jQuery from "jquery";
window.$ = jQuery;

function showSkeletonLoading() {
    $("#loadingSelfChart").show();
    $("#topRanking").hide();
}

function hideSkeletonLoading() {
    $("#loadingSelfChart").hide();
    $("#topRanking").show();
}

$(document).ready(function () {
    showSkeletonLoading();
    fetchChartData();

    let kodeAlternatif = $("#kodeAlternatif").val();
    fetchChartData(kodeAlternatif);

    function fetchChartData(kodeAlternatif) {
        $.ajax({
            url: "/dashboard/" + kodeAlternatif + "/getSelfRankChart",
            type: "GET",
            success: function (data) {
                hideSkeletonLoading();

                let dataKaryawan = data.map(function (item) {
                    return {
                        tahunAjaran: item.tahun_ajaran,
                        semester: item.semester,
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
        Highcharts.chart("selfRanking", {
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
                    "Kinerja " +
                    $("#namaGroup").data("nama-group") +
                    " Per Tahun Ajaran",
                align: "left",
            },
            xAxis: {
                categories: dataKaryawan
                    ? dataKaryawan.map((item) =>
                          (item.tahunAjaran + " - " + item.semester)
                              .toLowerCase()
                              .split(" ")
                              .map(
                                  (word) =>
                                      word.charAt(0).toUpperCase() +
                                      word.slice(1),
                              )
                              .join(" "),
                      )
                    : [],
                crosshair: true,
                accessibility: {
                    description: "tahun ajaran",
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
                    pointWidth: 50,
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
                    color: "#4f46e5",
                },
            ],
        });
    }
});
