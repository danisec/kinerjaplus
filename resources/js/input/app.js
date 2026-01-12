if (
    window.location.pathname.includes("/dashboard/data-alternatif/") ||
    window.location.pathname.includes("/dashboard/data-kriteria/") ||
    window.location.pathname.includes("/dashboard/data-subkriteria/") ||
    window.location.pathname.includes("/dashboard/data-skala-indikator/")
) {
    import("./handle-input-number")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor handle input number");
        });
}

const kelolaAkunPath = window.location.pathname;
if (
    kelolaAkunPath === "/dashboard/kelola-akun" ||
    kelolaAkunPath.startsWith("/dashboard/kelola-akun/")
) {
    import("./copy-input")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor copy input");
        });
}
