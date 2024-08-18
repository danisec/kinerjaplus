if (window.location.pathname.includes("/dashboard/kelola-akun/ubah-akun/")) {
    import("./multiSelectTagPermission")
        .then((module) => {
            const MultiSelectTag = module.default;

            new MultiSelectTag("permission", {
                rounded: true,
                placeholder: "Cari Permission",
                tagColor: {
                    textColor: "#FFFFFF",
                    borderColor: "#34d399",
                    bgColor: "#34d399",
                },
            });
        })
        .catch((error) => {
            console.error("Gagal mengimpor multiSelectTagPermission", error);
        });
}
