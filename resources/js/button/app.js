if (
    window.location.pathname.includes("/") ||
    window.location.pathname.includes("/dashboard/kelola-akun/")
) {
    import("./button-key-search")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor button key search");
        });

    import("./togglePasswordVisibility")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor togglePasswordVisibility");
        });
}
