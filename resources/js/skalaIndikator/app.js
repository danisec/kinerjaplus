if (window.location.pathname.includes("/dashboard/data-skala-indikator/")) {
    import("./getIndikatorSubkriteria")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor getIndikatorSubkriteria");
        });

    import("./tambahSkalaIndikator")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor tambahSkalaIndikator");
        });
}
