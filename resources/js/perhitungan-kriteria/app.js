if (window.location.pathname == "/dashboard/perbandingan-kriteria") {
    import("./calculate-matriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculate matriks");
        });
}
