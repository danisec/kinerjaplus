if (window.location.pathname.includes("data-subkriteria/")) {
    import("./tambahIndikatorSubkriteria")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor tambahIndikatorSubkriteria");
        });
}
