const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .disableSuccessNotifications()
    .browserSync({
        proxy: "http://localhost:8000",
        notify: false,
        port: 8080,
    });

if (mix.inProduction()) {
    mix.version();
}
