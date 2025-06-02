import jQuery from "jquery";
window.$ = jQuery;

let idGroupKaryawan = $("#idGroupKaryawan").val();

// request ke server untuk mengambil data alternatif
$.ajax({
    url:
        "/dashboard/data-group-alternatif/ubah-group-alternatif/" +
        idGroupKaryawan +
        "/getAlternatif",
    type: "GET",
    dataType: "json",
    success: function (response) {
        // Tambahkan opsi baru ke elemen select
        response.forEach(function (data) {
            $("#namaKaryawan").append(
                $("<option>", {
                    value: data.kode_alternatif,
                    text: data.nama_alternatif,
                }),
            );
        });

        // Setelah menambahkan opsi, inisialisasikan MultiSelectTag
        new MultiSelectTag("namaKaryawan", {
            rounded: true,
            placeholder: "Cari Nama Karyawan",
            tagColor: {
                textColor: "#FFFFFF",
                borderColor: "#34d399",
                bgColor: "#34d399",
            },
        });
    },
    error: function (xhr, status, error) {
        console.error(xhr.responseText);
    },
});
