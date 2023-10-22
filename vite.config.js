import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/all.min.css",
                "resources/css/sb-admin-2.min.css",
                "resources/css/sb-admin-2.min.css",
                "resources/css/dataTables.bootstrap4.min.css",
                "resources/js/app.js",
            ],
            refresh: [...refreshPaths, "app/Livewire/**"],
        }),
    ],
});
