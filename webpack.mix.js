const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.react("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);

mix.copyDirectory(
    "node_modules/tinymce/icons",
    "public/node_module/tinymce/icons"
);
mix.copyDirectory(
    "node_modules/tinymce/plugins",
    "public/node_module/tinymce/plugins"
);
mix.copyDirectory(
    "node_modules/tinymce/skins",
    "public/node_module/tinymce/skins"
);
mix.copyDirectory(
    "node_modules/tinymce/themes",
    "public/node_module/tinymce/themes"
);
mix.copy(
    "node_modules/tinymce/jquery.tinymce.js",
    "public/node_module/tinymce/jquery.tinymce.js"
);
mix.copy(
    "node_modules/tinymce/jquery.tinymce.min.js",
    "public/node_module/tinymce/jquery.tinymce.min.js"
);
mix.copy(
    "node_modules/tinymce/tinymce.js",
    "public/node_module/tinymce/tinymce.js"
);
mix.copy(
    "node_modules/tinymce/tinymce.min.js",
    "public/node_module/tinymce/tinymce.min.js"
);
