// Periksa apakah currentUser dan role pengguna
if (
    window.currentUser &&
    window.currentUser.roles.some((role) =>
        [
            "yayasan",
            "deputi",
            "kepala sekolah",
            "guru",
            "tata usaha tenaga pendidikan",
            "tata usaha non tenaga pendidikan",
            "kerohanian tenaga pendidikan",
            "kerohanian non tenaga pendidikan",
        ].includes(role),
    )
) {
    // Periksa apakah pengguna berada di dashboard
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
    }
}

if (
    window.currentUser &&
    window.currentUser.roles.some((role) =>
        [
            "kepala sekolah",
            "guru",
            "tata usaha tenaga pendidikan",
            "tata usaha non tenaga pendidikan",
            "kerohanian tenaga pendidikan",
            "kerohanian non tenaga pendidikan",
        ].includes(role),
    )
) {
    // Memeriksa apakah pengguna berada di dashboard
    if (
        window.location.pathname === "/dashboard" ||
        window.location.pathname === "/dashboard/"
    ) {
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

// Memeriksa apakah currentUser ada dan role-nya adalah "yayasan", "deputi"
if (
    window.currentUser &&
    window.currentUser.roles.some((role) =>
        ["yayasan", "deputi"].includes(role),
    )
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
