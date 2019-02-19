const gulp = require('gulp');
const sass = require('gulp-sass');
const order = require('gulp-order');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const uglify = require('gulp-uglify');
// const imageop = require('gulp-image-optimization');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const babel = require('gulp-babel');
const notify = require('gulp-notify');

const notifySettings = {
	title: 'Atomic Docs Compile'
};


//Optimize images
// gulp.task('images', function (cb) {
// 	gulp.src(['images-src/**/*.png', 'src/**/*.jpg', 'src/**/*.gif', 'src/**/*.jpeg']).pipe(imageop({
// 		optimizationLevel: 5,
// 		progressive: true,
// 		interlaced: true
// 	})).pipe(gulp.dest('img')).on('end', cb).on('error', cb);
// });


//Compile Scss and minify output
gulp.task('styles', function (done) {
	gulp.src('scss/main.scss')
		.pipe(sourcemaps.init())
		.pipe(sass().on('error', sass.logError))
		.pipe(cleanCSS())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./css/'))
		.pipe(notify(Object.assign({message: 'CSS compiled successfully'}, notifySettings)));
	done();
});


//Concat and minify JS
gulp.task('scripts', function () {
	return gulp.src('js/*.js')
		.pipe(babel({
			presets: ['es2015']
		}))
		.pipe(sourcemaps.init())
		.pipe(order([
			'js/bootstrap.min.js',
			'js/bs-datepicker.js',
			'js/matchheight.js',
			'app.js',
			'flash.js',
			'js/visible.js',
			'js/slick.js',
			'js/sticky-element.js',
			'js/main.js'
		], {base: './'}))
		.pipe(concat('site.js'))
		.pipe(gulp.dest('js/min'))
		.pipe(rename('site.min.js'))
		.pipe(uglify())
		.pipe(sourcemaps.write('maps'))
		.pipe(gulp.dest('js/min'))
		.pipe(notify(Object.assign({message: 'Scripts compiled successfully'}, notifySettings)));
});


//Watch task
gulp.task('watch', function () {
	gulp.watch('scss/**/*.scss', gulp.parallel('styles'));
	gulp.watch('js/*.js', gulp.parallel('scripts'));
});

gulp.task('default', gulp.series('styles', 'scripts', 'watch', function (done) {
	done();
}));
