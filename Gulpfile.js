var gulp = require('gulp'),
    watch = require('gulp-watch'),
    sass = require('gulp-sass'),
    neat = require('node-neat').includePaths;

var paths = {
    scss: 'sass/*.scss'
};

gulp.task('styles', function () {
    return gulp.src(paths.scss)
        .pipe(sass({
            includePaths: ['styles'].concat(neat)
        }))
        .pipe(gulp.dest(''));
});

gulp.task('default',function(){
    gulp.start('styles');
});

gulp.task('watch', function() {
  gulp.watch('sass/**/*.*', ['styles']);
});