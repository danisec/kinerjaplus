// Memeriksa apakah currentUser ada dan role-nya adalah "kepala sekolah" atau "guru"
if (
    window.currentUser &&
    (window.currentUser.role === "kepala sekolah" ||
        window.currentUser.role === "guru")
) {
    // Memeriksa apakah pengguna berada di dashboard
    if (
        window.location.pathname === "/dashboard" ||
        window.location.pathname === "/dashboard/"
    ) {
        // Mengimpor selfRankChart
        import("./selfRankChart")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor selfRankChart");
            });

        // Mengimpor rankChart
        import("./rankChart")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor rankChart");
            });

        // Mengimpor rankTable
        import("./rankTable")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor rankTable");
            });
    }
}

// Memeriksa apakah currentUser ada dan role-nya adalah "superadmin", "yayasan", "deputi", "IT", atau "admin"
if (
    window.currentUser &&
    (window.currentUser.role === "superadmin" ||
        window.currentUser.role === "yayasan" ||
        window.currentUser.role === "deputi" ||
        window.currentUser.role === "IT" ||
        window.currentUser.role === "admin")
) {
    // Memeriksa apakah pengguna berada di dashboard
    if (
        window.location.pathname === "/dashboard" ||
        window.location.pathname === "/dashboard/"
    ) {
        // Mengimpor rankGroupChart
        import("./rankGroupChart")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor rankGroupChart");
            });
    }
}
