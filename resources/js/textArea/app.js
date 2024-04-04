if (
    window.location.pathname.includes("/dashboard/data-subkriteria/") ||
    window.location.pathname.includes("/dashboard/data-skala-indikator/") ||
    window.location.pathname.includes("/dashboard/data-penilaian/") ||
    window.location.pathname.includes("/dashboard/catatan-karyawan/")
) {
    import("./textAreaHeight")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor textAreaHeight");
        });
}
