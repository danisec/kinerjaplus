if (
    window.location.pathname.includes("/dashboard/data-subkriteria/") ||
    window.location.pathname.includes("/dashboard/data-skala-indikator/") ||
    window.location.pathname.includes("/dashboard/data-penilaian/")
) {
    import("./textAreaHeight")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor textAreaHeight");
        });
}
