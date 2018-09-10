const { mix } = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([

    'resources/assets/css/libs/blog-post.css',
    'resources/assets/css/libs/bootstrap.min.css',
    'resources/assets/css/libs/font-awesome.css',
    'resources/assets/css/libs/metisMenu.css',
    'resources/assets/css/libs/select2.min.css',
    'resources/assets/css/libs/sb-admin-2.css',
    'resources/assets/css/libs/styles.css',
    'resources/assets/css/libs/datatables-plugins/dataTables.bootstrap.css',
    'resources/assets/css/libs/datatables-responsive/dataTables.responsive.css',
    'resources/assets/css/libs/bootstrap-datepicker.min.css'

],'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/jquery.js',
    'resources/assets/js/libs/bootstrap.js',
    'resources/assets/js/libs/sb-admin-2.js',
    'resources/assets/js/libs/metisMenu.js',
    'resources/assets/js/libs/script.js',
    'resources/assets/js/libs/datatables/js/jquery.dataTables.min.js',
    'resources/assets/js/libs/datatables-plugins/dataTables.bootstrap.min.js',
    'resources/assets/js/libs/datatables-responsive/dataTables.responsive.js',
    'resources/assets/js/libs/bootstrap-datepicker.min.js',
    'resources/assets/js/libs/jquery.validate.min.js',
    'resources/assets/js/libs/select2.min.js',
    'resources/assets/js/libs/custom.js'

],'public/js/libs.js');
