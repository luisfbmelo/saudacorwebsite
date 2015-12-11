'use strict';
 
var gulp = require('gulp');
var compass = require('gulp-compass');

gulp.task('compass', function() {
  gulp.src('./sass/*')
    .pipe(compass({
      sourcemap: true,
      css: 'css',
      sass: 'sass',
      style: 'compressed'
    }))
    .pipe(gulp.dest('./css'));
});

//Watch task
gulp.task('default',function() {
    gulp.watch('./sass/**/*.scss',['compass']);
});