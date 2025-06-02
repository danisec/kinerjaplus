if (window.location.pathname.includes("/dashboard/kelola-akun/ubah-akun/")) {
    import("./multi-select-tag-permission")
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
            console.error("Gagal mengimpor multi select tag permission", error);
        });
}
