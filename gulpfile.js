"use strict";

// include gulp
var gulp = require('gulp'),
changed = require('gulp-changed'),
imagemin = require('gulp-imagemin'),
jshint = require('gulp-jshint'),
concat = require('gulp-concat'),
stripDebug = require('gulp-strip-debug'),
uglify = require('gulp-uglify'),
autoprefix = require('gulp-autoprefixer'),
minifyCSS = require('gulp-cssnano'),
sourcemaps = require('gulp-sourcemaps'),
sass = require('gulp-sass');

// minify new images
gulp.task('imagemin', function() {
  var imgSrc = './images/**/*',
      imgDst = './build/images';
  gulp.src(imgSrc)
    .pipe(changed(imgDst))
    .pipe(imagemin())
    .pipe(gulp.dest(imgDst));
});

// JS hint task
gulp.task('jshint', function() {
  gulp.src('./js/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// JS concat, strip debugging and minify
gulp.task('scripts', function() {
  gulp.src(['./js/lib.js','./js/*.js'])
    .pipe(concat('script.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(gulp.dest('./build/scripts/'));
});

// CSS concat, auto-prefix and minify
gulp.task('style', function() {
  gulp.src(['./css/*.css'])
    .pipe(concat('style.css'))
    .pipe(autoprefix('last 2 versions'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./build/css/'));
});

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src('scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('./css'));
});

gulp.task('watch', function() {
  // watch for JS changes
  gulp.watch('./js/*.js', ["jshint", "scripts"]);
  // watch for CSS changes
  gulp.watch('css/*.css', ["style"]);
  //sass watch
  gulp.watch('scss/*.scss', ['sass']);

});


// default gulp task
gulp.task("default", ["imagemin", "watch"], function() {

});