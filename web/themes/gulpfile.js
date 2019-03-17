var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('default', defaultTask);

function defaultTask(done) {
  return gulp.src('custom/mayur/sass/header.scss') 
    .pipe(sass())
    .pipe(gulp.dest('custom/mayur/css'));
  //console.log('Hello mayur');
  // place code for your default task here
  //done();
}

gulp.task('sass', function() {
  return gulp.src('custom/mayur/sass/header.scss') 
    .pipe(sass())
    .pipe(gulp.dest('custom/mayur/css'))
   
});

gulp.task('watch', function() {
  gulp.watch('custom/mayur/sass/header.scss', gulp.series('sass'));
});
