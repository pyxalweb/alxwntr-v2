const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const terser = require('gulp-terser');

// Sass Task
function scssTask(){
  return src('app/scss/styles.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// Sass Task: Testimonial Example 1
function testimonialScssTask() {
  return src('blocks/testimonial-example-1/testimonial.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/testimonial-example-1', { sourcemaps: '.' }));
}

// Sass Task: Zig Zag
function zigZagScssTask() {
  return src('blocks/zig-zag/zig-zag.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/zig-zag', { sourcemaps: '.' }));
}

// Sass Task: Highlighted Image
function highlightedImageScssTask() {
  return src('blocks/highlighted-image/highlighted-image.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/highlighted-image', { sourcemaps: '.' }));
}

// Sass Task: Image Slideshow
function imageSlideshowScssTask() {
  return src('blocks/image-slideshow/image-slideshow.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/image-slideshow', { sourcemaps: '.' }));
}

// Sass Task: Link Button
function linkButtonScssTask() {
  return src('blocks/link-button/link-button.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('blocks/link-button', { sourcemaps: '.' }));
}

// JavaScript Task
function jsTask() {
  const jsFiles = [
    'app/js/scripts.js'
  ];

  return src(jsFiles, { sourcemaps: true })
    .pipe(terser())
    .pipe(dest('dist', { sourcemaps: '.' }));
}

// Watch Task
function watchTask(){
  watch(['app/scss/**/*.scss', 'app/js/**/*.js'], series(scssTask, jsTask));
}

// Watch Task: Testimonial Example 1
watch('blocks/testimonial-example-1/testimonial.scss', testimonialScssTask);

// Watch Task: Zig Zag
watch('blocks/zig-zag/zig-zag.scss', zigZagScssTask);

// Watch Task: Highlighted Image
watch('blocks/highlighted-image/highlighted-image.scss', highlightedImageScssTask);

// Watch Task: Highlighted Image
watch('blocks/highlighted-image/highlighted-image.scss', highlightedImageScssTask);

// Watch Task: Link Button
watch('blocks/image-slideshow/image-slideshow.scss', imageSlideshowScssTask);

// Default Gulp task
exports.default = series(
  scssTask,
  jsTask,
  watchTask,
  testimonialScssTask,
  zigZagScssTask,
  highlightedImageScssTask,
  linkButtonScssTask,
  imageSlideshowScssTask
);