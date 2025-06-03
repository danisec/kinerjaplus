if (
    window.currentUser &&
    window.currentUser.roles.some((role) =>
        ["yayasan", "deputi", "kepala sekolah"].includes(role),
    )
) {
    if (
        window.location.pathname === "/dashboard" ||
        window.location.pathname === "/dashboard/"
    ) {
        // Mengimpor selfRankChart
        import("./self-rank-chart")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor self rank chart");
            });
    }
}

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
    if (
        window.location.pathname === "/dashboard" ||
        window.location.pathname === "/dashboard/"
    ) {
        import("./self-rank-chart-guru")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor self rank chart guru");
            });
    }
}

if (
    window.currentUser &&
    window.currentUser.roles.some((role) => ["kepala sekolah"].includes(role))
) {
    if (
        window.location.pathname === "/dashboard" ||
        window.location.pathname === "/dashboard/"
    ) {
        import("./rank-chart")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor rank chart");
            });

        import("./rank-table")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor rank table");
            });
    }
}

if (
    window.currentUser &&
    window.currentUser.roles.some((role) =>
        ["yayasan", "deputi"].includes(role),
    )
) {
    if (
        window.location.pathname === "/dashboard" ||
        window.location.pathname === "/dashboard/"
    ) {
        import("./rank-group-chart")
            .then((module) => {})
            .catch((error) => {
                console.error("Gagal mengimpor rank group chart");
            });
    }
}
