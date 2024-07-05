// Memeriksa apakah currentUser dan role pengguna
if (
    window.currentUser &&
    (window.currentUser.role === "yayasan" ||
        window.currentUser.role === "deputi" ||
        window.currentUser.role === "kepala sekolah" ||
        window.currentUser.role === "guru" ||
        window.currentUser.role === "tata usaha tenaga pendidikan" ||
        window.currentUser.role === "tata usaha non tenaga pendidikan" ||
        window.currentUser.role === "kerohanian tenaga pendidikan" ||
        window.currentUser.role === "kerohanian non tenaga pendidikan")
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
    }
}

if (
    window.currentUser &&
    (window.currentUser.role === "kepala sekolah" ||
        window.currentUser.role === "guru" ||
        window.currentUser.role === "tata usaha tenaga pendidikan" ||
        window.currentUser.role === "tata usaha non tenaga pendidikan" ||
        window.currentUser.role === "kerohanian tenaga pendidikan" ||
        window.currentUser.role === "kerohanian non tenaga pendidikan")
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
    (window.currentUser.role === "yayasan" ||
        window.currentUser.role === "deputi")
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
