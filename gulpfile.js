var gulp = require('gulp'),
    less = require('gulp-less'),
    autoprefixer = require('gulp-autoprefixer'),
    plumber = require('gulp-plumber'),
    uglify = require('gulp-uglify'),
    jshint = require('gulp-jshint'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    ngAnnotate = require('gulp-ng-annotate'),
    watch = require('gulp-watch'),
    livereload = require('gulp-livereload'),
    serve = require('gulp-serve');

gulp.task('js-deps', function () {
    gulp.src([
            './bower_components/jquery/dist/jquery.js',
            './bower_components/lodash/lodash.js',
            './bower_components/angular/angular.js',
            './bower_components/angular-ui/angular-ui.js',
            './bower_components/angular-bootstrap/ui-bootstrap.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            './bower_components/angular-xeditable/dist/js/xeditable.js',
            './bower_components/vue/dist/vue.js'
        ])
        .pipe(concat('deps.js'))
        .pipe(ngAnnotate())
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./public/build/js'));
});


gulp.task('css-deps', function () {
    gulp.src([
            "./bower_components/bootstrap/dist/css/bootstrap.min.css",
            "./bower_components/font-awesome/css/font-awesome.min.css",
            "./bower_components/angular-xeditable/dist/css/xeditable.css"
        ])
        .pipe(concat('css-deps.css'))
        .pipe(gulp.dest('./public/build/css'));

    gulp.src('./bower_components/font-awesome/fonts/*')
        .pipe(gulp.dest('./public/build/fonts'));
});

gulp.task('js', function () {
    var baseDir = __dirname + '/resources/modules',
        outputDir = __dirname + '/public/build/js',
        outputFilename = 'app.js';

    gulp.src([
            baseDir + "/*module.js",
            baseDir + "/**/*module.js",
            baseDir + "/**/*.js"
        ])
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(sourcemaps.init())
        .pipe(concat(outputFilename))
        .pipe(ngAnnotate())
        .pipe(uglify())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(outputDir))
        .pipe(livereload());
});

gulp.task('less', function () {
    gulp.src([
            './resources/styles/app.less'
        ])
        .pipe(plumber())
        .pipe(less())
        .pipe(autoprefixer())
        .pipe(gulp.dest('./public/build/css'))
        .pipe(livereload());
});

gulp.task('serve', serve('.'));

gulp.task('watch', function () {
    livereload.listen({port: 35730});
    watch(['./resources/js/*.js', './resources/js/**/*.js'], function () {
        gulp.start('js');
    });

    watch('./resources/styles/*.less', function () {
        gulp.start('less');
    });
});

gulp.task('default', ['js-deps', 'css-deps', 'js', 'less', 'watch', 'serve']);
