const { src, dest, watch, parallel, series } = require('gulp');

// ===== CSS =====
const sass = require('gulp-sass')(require('sass'));
const cssnano = require('cssnano');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');

// ===== IMÁGENES =====
const webp = require('gulp-webp');
const imagemin = require('gulp-imagemin');
const avif = require('gulp-avif');
const svg = require('gulp-svgmin');

// ===== WEBPACK (JS) =====
const webpack = require('webpack-stream');
const TerserPlugin = require('terser-webpack-plugin');
const rename = require('gulp-rename');

// ===== PATHS =====
const path = {
   scss: 'src/scss/**/*.scss',
   css: 'build/css/app.css',
   js: 'src/js/**/*.js',
   img: 'src/img/**/*.{jpg,png}',
   imgmin: 'build/img/**/*.{jpg,png}',
   svg: 'src/img/**/*.svg',
   jsOutput: 'build/js/'
};

// ===== COMPILAR SASS =====
function compileSass() {
   return src(path.scss)
      .pipe(sourcemaps.init())
      .pipe(sass().on('error', sass.logError))
      .pipe(postcss([autoprefixer(), cssnano()]))
      .pipe(sourcemaps.write('.'))
      .pipe(dest('build/css'));
}

// ===== COMPILAR JS (con Webpack) =====
function compileJS() {
   return src(path.js)
      .pipe(webpack({
         mode: 'production',
         entry: './src/js/app.js',
         output: {
            filename: 'app.js',
         },
         module: {
            rules: [
               {
                  test: /\.css$/i,
                  use: ['style-loader', 'css-loader'],
               },
               {
                  test: /\.m?js$/,
                  exclude: /(node_modules)/,
                  use: {
                     loader: 'babel-loader',
                     options: {
                        presets: ['@babel/preset-env'],
                     },
                  },
               },
            ],
         },
         resolve: {
            extensions: ['.js', '.json', '.css'],
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
         target: 'web',
      }))
      .pipe(rename({ suffix: '.min' }))
      .pipe(dest(path.jsOutput));
}

// ===== OPTIMIZAR IMÁGENES =====
function imageMin() {
   return src(path.img)
      .pipe(imagemin({ optimizationLevel: 3 }))
      .pipe(dest('build/img'));
}

function imgWebp() {
   return src(path.img)
      .pipe(webp({ quality: 50 }))
      .pipe(dest('build/img'));
}

function imgAvif() {
   return src(path.img)
      .pipe(avif({ quality: 50 }))
      .pipe(dest('build/img'));
}

function imgSvg() {
   return src(path.svg)
      .pipe(svg())
      .pipe(dest('build/img'));
}

// Se agrupan todas las tareas de imágenes en una sola
const processImages = parallel(imageMin, imgWebp, imgAvif, imgSvg);

// ===== WATCH =====
function watchFiles() {
   watch(path.scss, compileSass);
   watch(path.js, compileJS);
   watch(path.img, parallel(imageMin, imgWebp, imgAvif));
   watch(path.svg, imgSvg);
}

// ===== EXPORTAR TAREAS =====
// Se crea una tarea 'build' que compila todo una vez
const build = parallel(compileSass, compileJS, processImages);

// Se crea una tarea 'dev' que primero compila todo y LUEGO se queda observando
const dev = series(build, watchFiles);

exports.build = build;       // Para ejecutar solo la compilación: `gulp build`
exports.dev = dev;           // Para compilar y observar: `gulp dev`
exports.default = dev;       // La tarea por defecto (`gulp`) será `gulp dev`