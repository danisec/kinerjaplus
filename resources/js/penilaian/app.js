if (window.location.pathname === "/dashboard/penilaian/tambah-penilaian") {
    import("./get-kriteria")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor get kriteria");
        });

    import("./pagination-penilaian")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor pagination penilaian");
        });
}
