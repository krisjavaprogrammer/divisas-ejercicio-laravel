let mix = require('laravel-mix');

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.scripts([
	'resources/assets/js/jquery.js', 
	'resources/assets/js/bootstrap.js', 
	'resources/assets/js/datatables.js', 
	'resources/assets/js/toastr.js', 
	'resources/assets/js/vue.js', 
	'resources/assets/js/axios.js',
	'resources/assets/js/jquery.slimscroll.js',
	'resources/assets/js/adminlte.js',
	'resources/assets/js/app.js',
	],  'public/js/app.js')
	.styles([
		'resources/assets/css/bootstrap.css', 
		'resources/assets/css/dataTables.bootstrap.css', 
		'resources/assets/css/toastr.css', 
		'resources/assets/css/styles.css', 
		], 'public/css/app.css');
