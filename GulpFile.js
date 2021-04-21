var gulp = require("gulp"),
    sass = require("gulp-sass"),
    postcss = require("gulp-postcss"),
    autoprefixer = require("autoprefixer"),
    cssnano = require("cssnano"),
    sourcemaps = require("gulp-sourcemaps"),
    order = require("gulp-order"),
    concat = require("gulp-concat"),
    rename = require("gulp-rename"),
    uglify = require("gulp-uglify");




var paths = {
    styles: {
        // By using styles/**/*.sass we're telling gulp to check all folders for any sass file
        src: "scss/**/*.scss",
        // Compiled files will end up in whichever folder it's found in (partials are not compiled)
        dest: "./css/"
    },
    scripts: {
        // By using styles/**/*.sass we're telling gulp to check all folders for any sass file
        src: "js/*.js",
        // Compiled files will end up in whichever folder it's found in (partials are not compiled)
        dest: "js/min"
    }
};

function style() {
    return gulp
        .src(paths.styles.src)
        // Initialize sourcemaps before compilation starts
        .pipe(sourcemaps.init())
        .pipe(sass())
        .on("error", sass.logError)
        // Use postcss with autoprefixer and compress the compiled file using cssnano
        .pipe(postcss([autoprefixer(), cssnano()]))
        // Now add/write the sourcemaps
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(paths.styles.dest))

}

function scripts() {
    return gulp
        .src(paths.scripts.src)
        // Initialize sourcemaps before compilation starts
        .pipe(sourcemaps.init())
        .pipe(order([
            'js/bootstrap.min.js',
            'js/matchheight.js',
            'js/main.js'
        ]))
        .pipe(concat('site.js'))
        .pipe(gulp.dest('js/min'))
        .pipe(rename('site.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest(paths.scripts.dest))

}




function watch() {

    gulp.watch(paths.styles.src, style);
    gulp.watch(paths.scripts.src, scripts);

}


// Don't forget to expose the task!
exports.watch = watch;

// Expose the task by exporting it
// This allows you to run it from the commandline using
// $ gulp style
exports.style = style;
exports.scripts = scripts;

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */

var build = gulp.parallel(style, watch, scripts);

/*
 * You can still use `gulp.task` to expose tasks
 */
gulp.task('build', build);

/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', build);





