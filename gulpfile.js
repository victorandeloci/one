var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var cssmin = require('gulp-cssmin');
var watch = require('gulp-watch');
var notify = require('gulp-notify');
var prefix = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var minify = require('gulp-babel-minify');

gulp.task('watch', gulp.series(function(done) {
  gulp.watch('./_dev/plugins/css/*.css', gulp.series('plugins_styles'));
  gulp.watch('./_dev/scss/*.scss', gulp.series('main_styles'));
  gulp.watch('./_dev/plugins/js/*.js', gulp.series('plugins_scripts'));
  gulp.watch('./_dev/js/*.js', gulp.series('main_scripts'));
  done();
}));

// ========== STYLES ==========

gulp.task('plugins_styles', gulp.series(function(done) {
  gulp.src('./_dev/plugins/css/*.css')
    .pipe(cssmin())
    .pipe(concat('plugins.min.css'))
    .pipe(gulp.dest('./'))
    .pipe(notify({ "message": "PLUGIN Styles task complete" }));
  done();
}));

gulp.task('main_styles', gulp.series(function(done) {
  gulp.src('./_dev/scss/*.scss')
    .pipe(sass())
    .on('error', notify.onError(function (error) {
       return 'An error occurred while compiling sass.\nLook in the console for details.\n' + error;
    }))
    .pipe(cssmin())
    .pipe(concat('style.css'))
    .pipe(gulp.dest('./'))
    .pipe(notify({ "message": "MAIN Styles task complete" }));
  done();
}));

// ========== SCRIPTS ==========

gulp.task('plugins_scripts', gulp.series(function(done) {
  gulp.src('./_dev/plugins/js/*.js')
    .pipe(minify())
    .pipe(concat('plugins.min.js'))
    .pipe(gulp.dest('./'))
    .pipe(notify({ "message": "PLUGINS Scripts task complete" }));
  done();
}));

gulp.task('main_scripts', gulp.series(function(done) {
  gulp.src('./_dev/js/*.js')
    .pipe(minify())
    .pipe(concat('main.min.js'))
    .pipe(gulp.dest('./'))
    .pipe(notify({ "message": "MAIN Scripts task complete" }));
  done();
}));

gulp.task('default', gulp.series(['plugins_styles', 'main_styles', 'plugins_scripts', 'main_scripts', 'watch']));
gulp.task('build', gulp.series(['plugins_styles', 'main_styles', 'plugins_scripts', 'main_scripts']));
