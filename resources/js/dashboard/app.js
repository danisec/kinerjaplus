// Self Rank Chart Yayasan, Deputi, Kepala Sekolah
if (
    window.currentUser &&
    window.currentUser.roles.some((role) =>
        ["yayasan", "deputi", "kepala sekolah"].includes(role),
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

// Self Rank Chart Guru, Tata Usaha Tenaga Pendidikan, Tata Usaha Non Tenaga Pendidikan, Kerohanian Tenaga Pendidikan, Kerohanian Non Tenaga Pendidikan
if (
    window.currentUser &&
    window.currentUser.roles.some((role) =>
        [
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
        import("./selfRankChartGuru")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor selfRankChartGuru");
            });
    }
}

// Rank Chart & Rank Table Kepala Sekolah
if (
    window.currentUser &&
    window.currentUser.roles.some((role) => ["kepala sekolah"].includes(role))
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

// Rank Group Chart Yayasan, Deputi
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
