var gulp = require('gulp');
var sass = require('gulp-sass');
var order = require('gulp-order');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var imageop = require('gulp-image-optimization');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');


//Optimize images
gulp.task('images', function (cb) {
	gulp.src(['images-src/**/*.png', 'src/**/*.jpg', 'src/**/*.gif', 'src/**/*.jpeg']).pipe(imageop({
		optimizationLevel: 5,
		progressive: true,
		interlaced: true
	})).pipe(gulp.dest('img')).on('end', cb).on('error', cb);
});


//Compile Scss and minify output
gulp.task('styles', function () {
	gulp.src('scss/**/*.scss')
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(cleanCSS())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./css/'));
});


//Concat and minify JS
gulp.task('scripts', function () {
	return gulp.src('js/*.js')
		.pipe(sourcemaps.init())
		.pipe(order([
			'js/jquery.js',
			'js/visible',
			'js/initialize-comp.js',
			'js/initialize-dash.js',
			'js/app.js',
			'js/bootstrap.min.js',
			'js/matchheight.js',
			'js/main.js'
		], {base: './'}))
		.pipe(concat('site.js'))
		.pipe(gulp.dest('js/min'))
		.pipe(rename('site.min.js'))
		.pipe(uglify())
		.pipe(sourcemaps.write('maps'))
		.pipe(gulp.dest('js/min'));
});


//Watch task
gulp.task('watch', function () {
	gulp.watch('scss/**/*.scss', ['styles']);
	gulp.watch('js/*.js', ['scripts']);
});

gulp.task('default', ['styles', 'scripts', 'watch']);




