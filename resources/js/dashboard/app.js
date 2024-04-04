if (
    window.location.pathname == "/dashboard" ||
    window.location.pathname == "/dashboard/"
) {
    import("./rankChart")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor rankChart");
        });

    import("./rankTable")
        .then((module) => {})
        .catch((error) => {
            console.error("Gagal mengimpor rankTable");
        });
}
