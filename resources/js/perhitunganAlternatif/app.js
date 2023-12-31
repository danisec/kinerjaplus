if (
    window.location.pathname == "/dashboard/perhitungan-perbandingan-alternatif"
) {
    import("./calculateMatriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculateMatriks");
        });
}
