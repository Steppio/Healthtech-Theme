var gulp 		= require('gulp'),
	sass 		= require('gulp-sass'),
	fs 			= require('node-fs'),
	fse			= require('fs-extra'),
	json		= require('json-file'),
	jshint 		= require('gulp-jshint'),
	concat 		= require('gulp-concat'),
	imagemin 	= require('gulp-imagemin'),
	plumber 	= require('gulp-plumber'),
	livereload 	= require('gulp-livereload'),
	sourcemaps 	= require('gulp-sourcemaps'),
	notify 		= require('gulp-notify'),
	browserSync = require('browser-sync'),
	themeName	= json.read('./package.json').get('themeName'),
	stylish 	= require('jshint-stylish'),
	rename 		= require('gulp-rename'),
	themeDir	= '../' + themeName;

var plumberErrorHandler = { errorHandler: notify.onError({
		title: 'Gulp',
		message: 'Error: <%= error.message %>'
	})
};

gulp.task('browserSync', function() {
  browserSync({
    // server: {
    //   baseDir: 'app'
    // }
    proxy: "localhost:8888/bloom"
  })
})

gulp.task('init', function() {
	fs.mkdirSync(themeDir, 765, true);
	fse.copySync('theme_boilerplate', themeDir + '/');
});

gulp.task('sass', function() {
	gulp.src('./css/src/*.scss')
		.pipe(plumber(plumberErrorHandler))
		.pipe(sass())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./css'))
	    .pipe(browserSync.reload({ // Reloading with Browser Sync
	      stream: true
	    }));
});

gulp.task('sassComponents', function() {
	gulp.src('./css/src/components/*.scss')
		.pipe(plumber(plumberErrorHandler))
		.pipe(sass())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest('./css/components'))
	    .pipe(browserSync.reload({ // Reloading with Browser Sync
	      stream: true
	    }));
});

gulp.task('fullpagesass', function() {
	gulp.src('./wp-fullpage/css/src/*.scss')
		.pipe(plumber(plumberErrorHandler))
		.pipe(sass())
		.pipe(sourcemaps.write())
		.pipe(rename('jquery.fullpage.theme.css'))
		.pipe(gulp.dest('./wp-fullpage/css'))
	    .pipe(browserSync.reload({ // Reloading with Browser Sync
	      stream: true
	    }));
});

gulp.task('js', function() {
	gulp.src('js/src/*.js')
		.pipe(plumber(plumberErrorHandler))
		.pipe(jshint())
		.pipe(jshint.reporter('fail'))
		.pipe(jshint.reporter( stylish ))
		.pipe(concat('theme.js'))
		.pipe(gulp.dest('js'));
});

gulp.task('img', function() {
	gulp.src('img/src/*.{png,jpg,gif}')
		.pipe(plumber(plumberErrorHandler))
		.pipe(imagemin({
			optimizationLevel: 7,
			progressive: true
		}))
		.pipe(gulp.dest('img'));
});

gulp.task('watch', function() {
	gulp.watch('css/src/*.scss', ['sass', 'sassComponents']);
	gulp.watch('css/src/components/*.scss', ['sass', 'sassComponents']);
	gulp.watch('wp-fullpage/css/src/*.scss', ['fullpagesass']);
	gulp.watch('js/src/*.js', ['js']);
	gulp.watch('img/src/*.{png,jpg,gif}', ['img']);
	gulp.watch('*.html', browserSync.reload);
	gulp.watch('*.php', browserSync.reload);
	gulp.watch('js/**/*.js', browserSync.reload);
});

gulp.task('default', ['sass', 'sassComponents', 'fullpagesass', 'browserSync', 'js', 'img', 'watch']);