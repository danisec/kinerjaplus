if (
    window.location.pathname.includes("/") ||
    window.location.pathname.includes("/dashboard/kelola-akun/")
) {
    import("./togglePasswordVisibility")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor togglePasswordVisibility");
        });
}
