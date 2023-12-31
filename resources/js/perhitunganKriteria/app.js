if (
    window.location.pathname == "/dashboard/perhitungan-perbandingan-kriteria"
) {
    import("./calculateMatriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculateMatriks");
        });
}
