if (window.location.pathname.includes("data-skala-indikator/")) {
    import("./getIndikatorSubkriteria")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor getIndikatorSubkriteria");
        });
}

if (window.location.pathname.includes("data-skala-indikator/")) {
    import("./tambahSkalaIndikator")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor tambahSkalaIndikator");
        });
}
