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

// Sass Task - Front End
function scssTask(){
  return src('app/scss/styles.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// Sass Task - Block Editor
function scssTaskBlockEditor(){
  return src('app/scss/block-editor.scss', { sourcemaps: true })
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
  watch(['app/scss/**/*.scss', 'app/js/**/*.js'], series(scssTask, scssTaskBlockEditor, jsTask));
}

// Default Gulp task
exports.default = series(
  scssTask,
  scssTaskBlockEditor,
  jsTask,
  watchTask
);




// ***********************************
//  ACF Blocks
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

// ACF Blocks
blockTasks('highlighted-image');
blockTasks('image-slideshow');
blockTasks('link-button');
blockTasks('portfolio');
blockTasks('sounds');
blockTasks('status');
blockTasks('zig-zag');




// ***********************************
//  Patterns
// ***********************************

// Note:
// These will only run when saving the pattern's respective files.
// Not when running the default Gulp task.

function patternTasks(patternName) {
  function patternsScssTask() {
    return src(`patterns/${patternName}/${patternName}.scss`, { sourcemaps: true })
      .pipe(sass())
      .pipe(postcss([cssnano()]))
      .pipe(dest(`patterns/${patternName}`, { sourcemaps: '.' }));
  }
  watch([`patterns/${patternName}/${patternName}.scss`], patternsScssTask);

  function patternsJsTask() {
    return src(`patterns/${patternName}/${patternName}.js`, { sourcemaps: true })
      .pipe(terser())
      .pipe(rename({ suffix: '.min' }))
      .pipe(dest(`patterns/${patternName}`, { sourcemaps: '.' }));
  }
  watch([`patterns/${patternName}/${patternName}.js`], patternsJsTask);
}

// Patterns
patternTasks('code');
