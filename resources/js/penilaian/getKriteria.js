import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    $("#alternatif_kedua").change(function () {
        let kodeAlternatif = $(this).val();

        $.ajax({
            url:
                "/dashboard/penilaian/tambah-penilaian/get-kriteria/" +
                kodeAlternatif,
            type: "GET",
            dataType: "json",
            data: {
                kode_alternatif: kodeAlternatif,
            },
            success: function (data) {
                $("#kriteriaContainer").empty();

                let kriteriaCounter = 1;

                data.forEach((item) => {
                    let kriteriaHTML = `<div class="mb-6 rounded-md bg-slate-50 p-4">
                                                <h4 class="block text-xl font-semibold text-gray-900">
                                                    ${String.fromCharCode(
                                                        64 + kriteriaCounter++,
                                                    )}. ${item.nama_kriteria}
                                                </h4>`;

                    item.subkriteria.forEach((subkriteria, subIndex) => {
                        kriteriaHTML += `<h6 class="ml-5 pb-2 pt-5 text-lg font-semibold text-gray-900">
                                                ${subIndex + 1}. ${
                                                    subkriteria.nama_subkriteria
                                                }
                                             </h6>`;

                        subkriteria.indikator_subkriteria.forEach(
                            (indikator, indIndex) => {
                                kriteriaHTML += `<div class="mb-3">
                                                    <p class="ml-10 text-base font-medium text-gray-900">
                                                        ${indIndex + 1}) ${
                                                            indikator.indikator_subkriteria
                                                        }
                                                    </p>
                                                </div>`;

                                indikator.skala_indikator.forEach(
                                    (skalaIndikator) => {
                                        kriteriaHTML += `<div class="my-8 ml-10 flex flex-row gap-4">`;

                                        skalaIndikator.skala_indikator_detail.forEach(
                                            (skalaIndikatorDetail) => {
                                                kriteriaHTML += `<div class="flex h-max w-auto flex-col items-center justify-center gap-3 rounded-md bg-white p-3 shadow-slate-50 hover:shadow-md">
                                                            <input name="id_skala_indikator_detail[${skalaIndikator.id_indikator_subkriteria}]" type="radio"
                                                                value="${skalaIndikatorDetail.id_skala_indikator_detail}" required>
                                                            <label class="text-left text-base font-normal leading-normal text-gray-900" for="${skalaIndikatorDetail.skala}">
                                                                ${skalaIndikatorDetail.deskripsi_skala}
                                                            </label>
                                                        </div>`;
                                            },
                                        );

                                        kriteriaHTML += `</div>`;
                                    },
                                );
                            },
                        );
                    });

                    kriteriaHTML += `</div>`;
                    $("#kriteriaContainer").append(kriteriaHTML);
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });
});
