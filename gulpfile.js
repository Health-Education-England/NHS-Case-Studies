const

  // Gulp and plugins
  gulp          = require('gulp'),
  gutil         = require('gulp-util'),
  sass          = require('gulp-sass'),
  postcss       = require('gulp-postcss'),
  sourcemaps    = require('gulp-sourcemaps'),
  uglify        = require('gulp-uglify')

;


// CSS settings
var css = {
  theme       : 'assets/scss/style.scss',
  watch       : 'assets/scss/**/*',
  build       : 'public/css',
  cssbuild    : 'public/css/',
  sassOpts: {
    outputStyle     : 'expanded',
    precision       : 3,
    errLogToConsole : true
  },
  processors: [
    
    require('autoprefixer')({
      browsers: ['last 2 versions', '> 2%']
    }),
    require('cssnano')
  ]
};

// CSS processing
gulp.task( 'css', gulp.series( () => {

  var theme = gulp.src(css.theme)
    .pipe(sourcemaps.init())
    .pipe(sass(css.sassOpts))
    .pipe(postcss(css.processors))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(css.cssbuild))

    return [ theme ]
} ) );



gulp.task('default', function(){
    gulp.watch(css.watch, gulp.series('css') );
});