import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#subkriteria").on("change", function () {
        const kodeSubkriteria = $(this).val();

        $.ajax({
            url:
                "/dashboard/data-skala-indikator/tambah-skala-indikator/" +
                kodeSubkriteria +
                "/getIndikatorSubkriteria",
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#indikatorSubkriteria").empty();

                var option = $("<option>", {
                    text: "Pilih Indikator Subkriteria",
                    selected: true,
                    hidden: true,
                    disabled: true,
                });

                $("#indikatorSubkriteria").append(option);

                $.each(data, function (key, value) {
                    $.each(
                        value.indikator_subkriteria,
                        function (index, indikator) {
                            $("#indikatorSubkriteria").append(
                                '<option value="' +
                                    indikator.id_indikator_subkriteria +
                                    '">' +
                                    indikator.indikator_subkriteria +
                                    "</option>",
                            );
                        },
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });
});
