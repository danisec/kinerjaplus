import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    server: {
        watch: {
            usePolling: true,
        },
        hmr: {
            host: "localhost",
            port: 5173,
        },
        port: 5173,
        host: true,
    },
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/multi-select-tag.css",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
        {
            name: "controller",
            handleHotUpdate({ file, server }) {
                if (file.endsWith(".php")) {
                    server.ws.send({ type: "full-reload", path: "*" });
                }
            },
        },
    ],
});
