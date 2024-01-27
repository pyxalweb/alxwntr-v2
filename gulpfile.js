// ***********************************
// Dependencies
// ***********************************

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

// Default Gulp task
exports.default = series(
  scssTask,
  jsTask,
  watchTask
);




// ***********************************
//  Blocks
// ***********************************

// Note:
// These will only run when saving the block's respective files.
// Not when running the default Gulp task.

function blockTasks(blockName) {
  function blockScssTask() {
    return src(`blocks/${blockName}/${blockName}.scss`, { sourcemaps: true })
      .pipe(sass())
      .pipe(postcss([cssnano()]))
      .pipe(dest(`blocks/${blockName}`, { sourcemaps: '.' }));
  }
  watch([`blocks/${blockName}/${blockName}.scss`], blockScssTask);

  function blockJsTask() {
    return src(`blocks/${blockName}/${blockName}.js`, { sourcemaps: true })
      .pipe(terser())
      .pipe(rename({ suffix: '.min' }))
      .pipe(dest(`blocks/${blockName}`, { sourcemaps: '.' }));
  }
  watch([`blocks/${blockName}/${blockName}.js`], blockJsTask);
}

// Core Blocks
blockTasks('code');

// ACF Blocks
blockTasks('highlighted-image');
blockTasks('image-slideshow');
blockTasks('link-button');
blockTasks('sounds');
blockTasks('zig-zag');