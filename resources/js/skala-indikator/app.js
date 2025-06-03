if (window.location.pathname.includes("/dashboard/data-skala-indikator/")) {
    import("./get-indikator-subkriteria")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor get indikator subkriteria");
        });

    import("./add-skalaIndikator")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor add skala indikator");
        });
}
