/**
 * Gulp
 */

const gulp = require('gulp');
const imagemin = require('gulp-imagemin');

// Otimização de Imagens
gulp.task('build-img', () =>
   gulp.src('public/img/**/*')
       .pipe(imagemin())
       .pipe(gulp.dest('public/img'))
);


/** 
 * Laravel Elixir
 */
var elixir = require('laravel-elixir');

elixir(function(mix) {
    // Otimização de CSS
    mix.styles([
        'bootstrap.css',
        'style.css'
    ]);

    // Otimização de JavaScript
    mix.scripts([
        'jquery-3.2.1.js',
        'bootstrap.js',
        'jquery.maskMoney.js'
    ]);

});
