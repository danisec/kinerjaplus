if (
    window.location.pathname.includes(
        "/dashboard/data-group-alternatif/ubah-group-alternatif/",
    )
) {
    import("./get-alternatif")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor get alternatif");
        });
}

if (
    window.location.pathname ==
        "/dashboard/data-group-alternatif/tambah-group-alternatif" ||
    window.location.pathname.includes(
        "/dashboard/data-group-alternatif/ubah-group-alternatif/",
    )
) {
    import("./multi-select-tag")
        .then((module) => {
            const MultiSelectTag = module.default;

            new MultiSelectTag("namaKaryawan", {
                rounded: true,
                placeholder: "Cari Nama Pegawai",
                tagColor: {
                    textColor: "#FFFFFF",
                    borderColor: "#34d399",
                    bgColor: "#34d399",
                },
            });
        })
        .catch((error) => {
            console.error("Gagal mengimpor multi select tag", error);
        });
}

if (
    window.location.pathname.includes(
        "/dashboard/data-group-alternatif/group-penilaian/",
    )
) {
    import("./multi-select-tag")
        .then((module) => {
            const MultiSelectTag = module.default;
            let groupKaryawanArray = window.groupKaryawanArray;

            groupKaryawanArray.forEach((item, index) => {
                new MultiSelectTag(`namaKaryawan_${index}`, {
                    rounded: true,
                    placeholder: "Cari Nama Karyawan",
                    tagColor: {
                        textColor: "#FFFFFF",
                        borderColor: "#34d399",
                        bgColor: "#34d399",
                    },
                });
            });
        })
        .catch((error) => {
            console.error("Gagal mengimpor multi select tag", error);
        });
}
