if (
    window.location.pathname ==
    "/dashboard/perhitungan-perbandingan-subkriteria"
) {
    import("./calculateMatriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculateMatriks");
        });
}
