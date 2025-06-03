if (
    window.location.pathname.includes("/dashboard/data-subkriteria/") ||
    window.location.pathname.includes("/dashboard/data-skala-indikator/") ||
    window.location.pathname.includes("/dashboard/data-penilaian/") ||
    window.location.pathname.includes("/dashboard/persetujuan-penilaian/") ||
    window.location.pathname.includes("/dashboard/catatan-karyawan/") ||
    window.location.pathname.includes("/dashboard/data-group-alternatif/") ||
    window.location.pathname.includes("/dashboard/kelola-akun/view-akun/")
) {
    import("./text-area-height")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor text area height");
        });
}
