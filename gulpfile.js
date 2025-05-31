const { src, dest, watch, parallel } = require('gulp');

//css
const sass = require('gulp-sass')(require('sass'));
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');

//js
const autoPrefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');

//img
const webp =require('gulp-webp');
const imagemin = require('gulp-imagemin');
const cache = require('gulp-cache'); 
const avif = require('gulp-avif');
const svg = require('gulp-svgmin');

// WebPack
const webpack = require('webpack-stream');
const TerserPlugin = require('terser-webpack-plugin');
const rename = require('gulp-rename');

const path = {
   scss: 'src/scss/**/*.scss',
   css: 'build/css/app.css',
   js: 'src/js/**/*.js',
   img: 'src/img/**/*.{jpg,png}',
   imgmin: 'build/img/**/*.{jpg,png}',
   svg: 'src/img/**/*.svg',
   jsOutput: 'build/js/'
};

function compileSass() {
   return src(path.scss)
      .pipe(sourcemaps.init())
      .pipe(sass().on('error', sass.logError))
      .pipe(postcss([autoPrefixer(), cssnano()]))
      .pipe(sourcemaps.write('.'))
      .pipe(dest('build/css'));
}

function compileJS() {
   return src(path.js)
      .pipe(sourcemaps.init())
      .pipe(webpack({
         mode: 'production',
         entry: './src/js/app.js',
         output: {
            filename: 'app.js',
         },
         optimization: {
            minimize: true,
            minimizer: [
               new TerserPlugin({
                  terserOptions: {
                     compress: {
                        drop_console: true,
                     },
                  },
               }),
            ],
         },
         devtool: 'source-map',
      }))
      .pipe(sourcemaps.write('.'))
      .pipe(rename({ suffix: '.min' }))
      .pipe(dest(path.jsOutput));
}

function imageMin() {
   return src(path.img)
      .pipe(cache(imagemin({optimizationLevel: 3})))
      .pipe(dest('build/img'));
}

function imgWebp() {
   return src(path.img)
      .pipe(webp({quality: 50}))
      .pipe(dest('build/img'));
}

function imgAvif() {
   return src(path.img)
      .pipe(avif({quality: 50}))
      .pipe(dest('build/img'));
}

function imgSvg() {
   return src(path.svg)
      .pipe(svg())
      .pipe(dest('build/img'));
}

function autoCompile() {
   watch(path.scss, compileSass);
   watch(path.js, compileJS);
   watch(path.img, parallel(imgAvif, imgWebp, imageMin));
}

exports.default = parallel(compileSass, compileJS, autoCompile, imgAvif, imageMin, imgWebp, imgSvg);