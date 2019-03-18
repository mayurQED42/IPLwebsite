var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var imagemin = require('gulp-imagemin');

//task for compiled scss files to css.
gulp.task('default', defaultTask);

function defaultTask(done) {
  return gulp.src('custom/mayur/sass/header.scss') 
    .pipe(sass())
    .pipe(gulp.dest('custom/mayur/css'))
    .pipe(browserSync.reload({stream: true}));
  //console.log('Hello mayur');
  // place code for your default task here
  //done();
}

//task for compraises image size.
gulp.task('images', function(){
  return gulp.src('custom/mayur/images/**/*.+(png|jpg|gif|svg|jpeg)')
  .pipe(imagemin())
  .pipe(gulp.dest('custom/mayur/myimages'))
});

//task for browser sync.
gulp.task('browserSync', function() {
  browserSync.init({
    open: 'external',
    hostname: 'localhost',
    port: 7777,
    proxy: 'http://localhost:8887/8-2-19/MYIPL/web/'
  })
});

// watched tasks
gulp.task('watch', gulp.parallel('browserSync', function(done) {
  gulp.watch('custom/mayur/sass/header.scss', gulp.series('default'));
}));

