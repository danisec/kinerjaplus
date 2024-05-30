if (window.location.pathname == "/dashboard/perbandingan-subkriteria") {
    import("./calculateMatriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculateMatriks");
        });
}
