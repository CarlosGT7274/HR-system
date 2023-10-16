import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/app.js",
                "resources/js/attendance.js",
                "resources/js/salaries.js",
                "resources/js/general.js",
                "resources/js/birthdays.js",
                "resources/js/rotations.js",
                "resoucers/css/app.css",
                "resources/icons/css/all.min.css",
            ],
            refresh: true,
        }),
    ],
});
