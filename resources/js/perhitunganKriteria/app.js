if (window.location.pathname == "/dashboard/perbandingan-kriteria") {
    import("./calculateMatriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculateMatriks");
        });
}
