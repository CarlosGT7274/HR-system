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

                getResource("css", "app"),

                "resources/icons/css/all.min.css",
            ],
            refresh: true,
        }),
    ],
});
