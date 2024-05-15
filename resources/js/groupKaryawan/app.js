if (
    window.location.pathname.includes(
        "/dashboard/data-group-alternatif/ubah-group-alternatif/",
    )
) {
    import("./getAlternatif")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor getAlternatif");
        });
}

if (
    window.location.pathname ==
        "/dashboard/data-group-alternatif/tambah-group-alternatif" ||
    window.location.pathname.includes(
        "/dashboard/data-group-alternatif/ubah-group-alternatif/",
    )
) {
    import("./multiSelectTag")
        .then((module) => {
            const MultiSelectTag = module.default;

            new MultiSelectTag("namaKaryawan", {
                rounded: true,
                placeholder: "Cari Nama Karyawan",
                tagColor: {
                    textColor: "#FFFFFF",
                    borderColor: "#34d399",
                    bgColor: "#34d399",
                },
            });
        })
        .catch((error) => {
            console.error("Gagal mengimpor multiSelectTag", error);
        });
}

if (
    window.location.pathname.includes(
        "/dashboard/data-group-alternatif/group-penilaian/",
    )
) {
    import("./multiSelectTag")
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
            console.error("Gagal mengimpor multiSelectTag", error);
        });
}
