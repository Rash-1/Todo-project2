const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');
mix.scripts(['resources/js/bootstrap.bundle.js',
],
    'public/Todo-project/js/mainPage.js'
);
mix.styles([
    'resources/css/mainPage.css',
    'resources/css/bootstrap.min.css'
],
    'public/Todo-project/css/mainPage.css'
);

