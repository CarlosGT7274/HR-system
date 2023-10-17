import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

function getResource(type, filePath) {
    return "resources/" + type + "/" + filePath + "." + type;
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                getResource("js", "app"),
                getResource("js", "attendance"),
                getResource("js", "salaries"),
                getResource("js", "general"),
                getResource("js", "birthdays"),
                getResource("js", "rotations"),

                getResource("css", "app"),

                "resources/icons/css/all.min.css",
            ],
            refresh: true,
        }),
    ],
});
