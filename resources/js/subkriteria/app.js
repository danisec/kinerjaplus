if (window.location.pathname.includes("/dashboard/data-subkriteria/")) {
    import("./tambahIndikatorSubkriteria")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor tambahIndikatorSubkriteria");
        });
}
