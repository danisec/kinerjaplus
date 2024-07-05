if (window.location.pathname === "/dashboard/penilaian/tambah-penilaian") {
    import("./getKriteria")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor getKriteria");
        });
}
