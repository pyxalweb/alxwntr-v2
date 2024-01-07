const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');
const concat = require('gulp-concat');
const gulpIf = require('gulp-if');




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
  const jsFiles = [
    'app/js/scripts.js',
    'blocks/sounds/sounds.js'
  ];

  return src(jsFiles, { sourcemaps: true })
    .pipe(concat('scripts.js')) // Concatenate the files into a single file
    .pipe(terser())
    .pipe(dest('dist', { sourcemaps: '.' }))
    .pipe(gulpIf('blocks/sounds/sounds.js', concat('sounds.js')))
    .pipe(gulpIf('blocks/sounds/sounds.js', terser()))
    .pipe(gulpIf('blocks/sounds/sounds.js', dest('dist', { sourcemaps: '.' })));
}

// Watch Task
function watchTask() {
  watch(['app/scss/**/*.scss', 'app/js/**/*.js', 'blocks/sounds/sounds.js'], series(scssTask, jsTask));
}




// ***********************************
//  ACF Blocks
// ***********************************

// Sass Task: Zig Zag
function zigZagScssTask() {
  return src('blocks/zig-zag/zig-zag.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/zig-zag', { sourcemaps: '.' }));
}
// Watch Task: Zig Zag
watch(['blocks/zig-zag/zig-zag.scss'], zigZagScssTask);




// Sass Task: Highlighted Image
function highlightedImageScssTask() {
  return src('blocks/highlighted-image/highlighted-image.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/highlighted-image', { sourcemaps: '.' }));
}
// Watch Task: Highlighted Image
watch(['blocks/highlighted-image/highlighted-image.scss'], highlightedImageScssTask);




// Sass Task: Image Slideshow
function imageSlideshowScssTask() {
  return src('blocks/image-slideshow/image-slideshow.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/image-slideshow', { sourcemaps: '.' }));
}
// Watch Task: Image Slideshow
watch(['blocks/image-slideshow/image-slideshow.scss'], imageSlideshowScssTask);




// Sass Task: Link Button
function linkButtonScssTask() {
  return src('blocks/link-button/link-button.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/link-button', { sourcemaps: '.' }));
}
// Watch Task: Link Button
watch(['blocks/link-button/link-button.scss'], linkButtonScssTask);




// Sass Task: Sounds
function soundsScssTask() {
  return src('blocks/sounds/sounds.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/sounds', { sourcemaps: '.' }));
}
// Watch Task: Sounds
watch('blocks/sounds/sounds.scss', soundsScssTask);




// ***********************************
//  Exports
// ***********************************

// Default Gulp task
exports.default = series(
  scssTask,
  jsTask,
  watchTask,
  zigZagScssTask,
  highlightedImageScssTask,
  imageSlideshowScssTask,
  linkButtonScssTask,
  soundsScssTask
);