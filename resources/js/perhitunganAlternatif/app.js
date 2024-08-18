if (window.location.pathname.includes("/dashboard/perbandingan-alternatif/")) {
    import("./calculateMatriks")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor calculateMatriks");
        });
}
