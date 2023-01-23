var gulp = require('gulp');
var htmlmin = require('gulp-html-minifier');

gulp.task('min-twig', function() {
    gulp.src('views/*.twig')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('min'))
});


gulp.task('watch', function(){
  gulp.watch('views/**/*.twig', gulp.series('min-twig')); 
  // Other watchers
});

