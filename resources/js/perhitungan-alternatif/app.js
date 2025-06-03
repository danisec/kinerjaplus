if (window.location.pathname.includes("/dashboard/perbandingan-alternatif/")) {
    import("./calculate-matriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculate matriks");
        });
}
