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
