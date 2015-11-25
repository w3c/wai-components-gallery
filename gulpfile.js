var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var minifyCss =require('gulp-minify-css');
var plumber =require('gulp-plumber');
var uglify = require('gulp-uglify');
var dirSync = require( 'gulp-directory-sync' );

var sassdir = "sass/**/*.scss";

gulp.task('scss', function () {
    return gulp.src(sassdir)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass())
        //.pipe(gulp.dest('.'))
        .pipe(autoprefixer())
        .pipe(concat('style.css'))
        .pipe(minifyCss())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('.'));
        //.run('sync');
});

var jsdir = "_js/*.js";

gulp.task('js', function () {
/*    return gulp.src(['_js/jquery.min.js', '_/js/bootstrap.min.js', '_/js/highlight.jquery.js', '_/js/uri.js', '_/js/history.js', '_/js/fixedsticky.jquery.js', '_/js/sharebox.js', '_/js/script.js'])
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./js/'));*/
});

gulp.task( 'sync', ['scss'], function() {
    return gulp.src( '' )
        .pipe(dirSync( '/Users/yatil/projects/wai-components-gallery', '/Users/yatil/projects/w3.org/WWW/2008/site/templates/wordpress/w3c_wai_components', { nodelete: false, printSummary: true, ignore: [ 'gulpfile.js', 'package.json','wai-components-gallery.sublime-workspace', 'wai-components-gallery.sublime-project', 'node_modules', '.git', 'CVS', 'sass', '.cvsignore' ] } ));
        //.on('error', gutil.log);
} );

gulp.task('watch', function() {
  var watcher = gulp.watch([sassdir, '**/*.php'], ['sync']);
  watcher.on('change', function(event) {
    console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
  });
});