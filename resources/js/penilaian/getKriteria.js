import jQuery from "jquery";
window.$ = jQuery;

$(document).ready(function () {
    let currentPage = 1;
    let totalPages = 0;
    let kriteriaPages = [];
    const prevPageButton = $("#prevPage");
    const nextPageButton = $("#nextPage");

    // Fungsi untuk mengupdate tampilan pagination
    function updatePagination() {
        // Tampilkan halaman saat ini
        kriteriaPages.forEach((page, index) => {
            if (index + 1 === currentPage) {
                $(page).show();
            } else {
                $(page).hide();
            }
        });

        // Aktifkan/nonaktifkan tombol navigasi dan ubah warna
        if (currentPage === 1) {
            prevPageButton.prop("disabled", true);
            prevPageButton.removeClass("bg-indigo-600 hover:bg-indigo-700");
            prevPageButton.addClass(
                "!text-gray-900 bg-slate-200 hover:bg-slate-300",
            );
        } else {
            prevPageButton.prop("disabled", false);
            prevPageButton.removeClass(
                "!text-gray-900 bg-slate-200 hover:bg-slate-300",
            );
            prevPageButton.addClass("bg-indigo-600 hover:bg-indigo-700");
        }

        if (currentPage === totalPages) {
            nextPageButton.prop("disabled", true);
            nextPageButton.removeClass("bg-indigo-600 hover:bg-indigo-700");
            nextPageButton.addClass(
                "!text-gray-900 bg-slate-200 hover:bg-slate-300",
            );
        } else {
            nextPageButton.prop("disabled", false);
            nextPageButton.removeClass(
                "!text-gray-900 bg-slate-200 hover:bg-slate-300",
            );
            nextPageButton.addClass("bg-indigo-600 hover:bg-indigo-700");
        }
    }

    // Event listener untuk tombol "Sebelumnya"
    prevPageButton.on("click", function () {
        if (currentPage > 1) {
            currentPage--;
            updatePagination();
        }
    });

    // Event listener untuk tombol "Selanjutnya"
    nextPageButton.on("click", function () {
        if (currentPage < totalPages) {
            currentPage++;
            updatePagination();
        }
    });

    // Event listener untuk perubahan dropdown alternatif
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
                kriteriaPages = [];
                let kriteriaCounter = 1;

                data.forEach((item) => {
                    let kriteriaHTML = `<div class="kriteria-page mb-6 rounded-md bg-slate-50 p-4" style="display: none;">
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

                // Update kriteriaPages setelah data di-load
                kriteriaPages = $(".kriteria-page").toArray();
                totalPages = kriteriaPages.length;

                // Inisialisasi pagination
                currentPage = 1;
                updatePagination();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });
});
