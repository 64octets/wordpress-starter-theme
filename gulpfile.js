var gulp                = require('gulp');
var prefix              = require('gulp-autoprefixer');
var browserSync         = require('browser-sync');
var reload              = browserSync.reload;
var sass                = require('gulp-sass');
var jshint              = require('gulp-jshint');
var concat              = require('gulp-concat');
var uglify              = require('gulp-uglify');
var rename              = require('gulp-rename');
var imageop             = require('gulp-image-optimization');
var cleanCSS            = require('gulp-clean-css');
var mamp                = require('gulp-mamp');
var options             = {};

// Start MAMP 
gulp.task('start', function(cb){
    mamp(options, 'start', cb);
});

gulp.task('stop', function(cb){
    mamp(options, 'stop', cb);
});

gulp.task('mamp', ['start']);

// Image Optimization
gulp.task('images', function(cb) {
    gulp.src(['img/images/**/*.png','img/images/**/*.jpg','img/images/**/*.gif','img/images/**/*.jpeg']).pipe(imageop({
        optimizationLevel: 5,
        progressive: true,
        interlaced: true
    })).pipe(gulp.dest('./img')).on('end', cb).on('error', cb);
});

// Lint Task
gulp.task('lint', function() {
    return gulp.src('js/vendor/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('js/vendor/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('js'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('js'));
});
 
// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    //watch files
    var files = [
    './style.css',
    './*.php'
    ];
 
    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    proxy: "localhost:8888",
    //notify: false,
    //browser: ['google chrome']
    });
});
 
// Sass task, will run when any SCSS files change & BrowserSync
// will auto-update browsers
gulp.task('sass', function () {
    return gulp.src('sass/*.scss')
        .pipe(sass())
        .pipe(prefix(['last 15 versions', 'firefox >= 4', '> 1%', 'ie 11', 'ie 10', 'ie 9', 'ie 8', 'ie 7', 'safari 7', 'safari 8'], { cascade: true }))
        .pipe(cleanCSS())
        .pipe(gulp.dest('./'))
        .pipe(reload({stream:true}));
});

gulp.task('watch', function () {
  gulp.watch('js/vendor/*.js', ['lint', 'scripts']);
  gulp.watch('sass/**', ['sass']);
});
 
// Default task to be run with `gulp`
gulp.task('default', ['mamp', 'images', 'sass', 'browser-sync', 'lint', 'scripts', 'watch'], function () {
    gulp.watch("sass/**/*.scss", ['sass']);
});
