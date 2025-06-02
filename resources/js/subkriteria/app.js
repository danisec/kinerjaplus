if (window.location.pathname.includes("/dashboard/data-subkriteria/")) {
    import("./add-indikator-subkriteria")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor add indikator subkriteria");
        });
}
