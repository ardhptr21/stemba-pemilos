module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    bold: "#0e1734",
                    light: "#2a3359",
                    extralight: "#868dad",
                },
            },
        },
    },
    plugins: [],
};
