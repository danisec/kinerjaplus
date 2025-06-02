if (window.location.pathname == "/dashboard/perbandingan-subkriteria") {
    import("./calculate-matriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculate matriks");
        });
}
