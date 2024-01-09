const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const rename = require('gulp-rename');




// ***********************************
//  Main Tasks
// ***********************************

// Sass Task
function scssTask(){
  return src('app/scss/styles.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// JavaScript Task
function jsTask() {
  return src('app/js/scripts.js', { sourcemaps: true })
    .pipe(terser())
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// Watch Task
function watchTask(){
  watch(['app/scss/**/*.scss', 'app/js/**/*.js'], series(scssTask, jsTask));
}




// ***********************************
//  ACF Blocks
// ***********************************

function acfBlockTasks(blockName) {
  function acfBlockScssTask() {
    return src(`blocks/${blockName}/${blockName}.scss`, { sourcemaps: true })
      .pipe(sass())
      .pipe(postcss([cssnano()]))
      .pipe(dest(`blocks/${blockName}`, { sourcemaps: '.' }));
  }
  watch([`blocks/${blockName}/${blockName}.scss`], acfBlockScssTask);

  function acfBlockJsTask() {
    return src(`blocks/${blockName}/${blockName}.js`, { sourcemaps: true })
      .pipe(terser())
      .pipe(rename({ suffix: '.min' }))
      .pipe(dest(`blocks/${blockName}`, { sourcemaps: '.' }));
  }
  watch([`blocks/${blockName}/${blockName}.js`], acfBlockJsTask);
}

acfBlockTasks('zig-zag');
acfBlockTasks('highlighted-image');
acfBlockTasks('image-slideshow');
acfBlockTasks('link-button');
acfBlockTasks('sounds');




// ***********************************
//  Exports
// ***********************************

// Default Gulp task
exports.default = series(
  scssTask,
  jsTask,
  watchTask
);