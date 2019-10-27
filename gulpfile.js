"use strict";

const gulp = require("gulp");

// Utilites
const del = require("del");
const rename = require("gulp-rename");
const plumber = require("gulp-plumber");
const run = require("run-sequence");
// const wait = require('gulp-wait');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const gulpInclude = require("gulp-include");
const buffer = require('vinyl-buffer');
// const newer = require('gulp-newer');
const sourcemaps = require('gulp-sourcemaps');

// Server
const server = require("browser-sync").create();
const reload = server.reload;

// Html
const posthtml = require("gulp-posthtml");
const include = require("posthtml-include");

// Styles
const sass = require("gulp-sass");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const minify = require("gulp-csso");
const csscomb = require('gulp-csscomb');

// Images
const webp = require("gulp-webp");
const imagemin = require("gulp-imagemin");
const svgstore = require("gulp-svgstore");
const spritesmith = require('gulp.spritesmith');

// Config
const config = require('./config.json');
const srcPath = config.dev;
const publicPath = config.build;


// Server
gulp.task("serve", function() {
  server.init(config.server);
});

// Clean
gulp.task("clean", function() {
  return del.sync(config.clean);
});

// HTML
gulp.task("html", function() {
  return gulp.src(config.src.html) 
    .pipe(plumber())
    .pipe(posthtml([
      include()
    ]))
    .pipe(gulp.dest(config.build.html))
    .pipe(reload({stream: true}));
});

// Styles
gulp.task("style", function() {
  return gulp
		.src(config.src.style)
		.pipe(plumber())
		.pipe(sourcemaps.init())
		.pipe(sass({
				sourceMap: true,
				errLogToConsole: true,
				includePaths: ["node_modules/"]
			}))
		.pipe(postcss([autoprefixer()]))
		.pipe(csscomb())
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(config.build.css))
		.pipe(minify())
		.pipe(rename("style.min.css"))
		.pipe(gulp.dest(config.build.css))
		.pipe(reload({ stream: true }));
});


// Scripts
gulp.task("js:copy", function () {
  return gulp.src(config.src.js.separate)
    .pipe(plumber())
    .pipe(gulpInclude({
        extensions: "js",
        hardFail: true,
        includePaths: [
          __dirname + "/node_modules",
        ]
    }))
    .pipe(gulp.dest(config.build.js))
    .pipe(reload({stream: true}));
});

gulp.task("js:plugins", function () {
  return gulp.src(config.src.js.plugins)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(gulpInclude({
        extensions: "js",
        hardFail: true,
        includePaths: [
          __dirname + "/node_modules",
        ]
    }))
    .pipe(concat('plugins.js'))
    .pipe(gulp.dest(config.build.js))
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(rename('plugins.min.js'))
    .pipe(gulp.dest(config.build.js))
    .pipe(reload({stream: true}));
});

gulp.task("js:components", function () {
  return gulp.src(config.src.js.components)
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(gulpInclude({
        extensions: "js",
        hardFail: true,
        includePaths: [
          __dirname + "/node_modules",
        ]
    }))
    .pipe(concat('main.js'))
    .pipe(gulp.dest(config.build.js))
    .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(rename('main.min.js'))
    .pipe(gulp.dest(config.build.js))
    .pipe(reload({stream: true}));
});

gulp.task("js", function (cb) {
  run(
    "js:copy",
    "js:plugins",
    "js:components",
    cb);
});


// Images
gulp.task("images:build", function () {
  return gulp.src(config.src.img, { base: config.build.imgBase }) 
    .pipe(buffer())
    .pipe(imagemin([
      imagemin.gifsicle({interlaced: true}),
      imagemin.jpegtran({progressive: true}),
      imagemin.optipng({optimizationLevel: 3}),
      imagemin.svgo({
        plugins: [
          {removeViewBox: true},
          {cleanupIDs: false}
        ]
      })
    ]))
    .pipe(gulp.dest(config.build.img))
    // .pipe(reload({stream: true}));
});

gulp.task("images:dev", function () {
  return gulp.src(config.src.img, { base: config.src.imgBase }) 
    .pipe(buffer())
    .pipe(imagemin([
      imagemin.svgo({
        plugins: [
          {removeViewBox: true},
          {cleanupIDs: false}
        ]
      })
    ]))
    .pipe(gulp.dest(config.build.img))
    .pipe(reload({stream: true}));
});

gulp.task("images:clean", function() {
  return del.sync(config.build.img);
});

gulp.task("images:watch", ['images:clean'], function() {
  gulp.start('images:dev');
});

gulp.task("webp", function () {
  return gulp.src(config.src.img, { base: config.src.imgBase })
    .pipe(buffer())
    .pipe(webp({quality: 80}))
    .pipe(gulp.dest(config.build.img))
    .pipe(reload({stream: true}));
});

// Sprites
gulp.task("sprite:svg", function () {
  return gulp.src(config.src.sprite.svg)
    .pipe(buffer())
    .pipe(imagemin([
      imagemin.svgo({
        plugins: [
          {removeViewBox: false},
          {cleanupIDs: false}
        ]
      })
    ]))
    .pipe(svgstore({
      inlineSvg: true
    }))
    .pipe(rename("sprite.svg"))
    .pipe(gulp.dest(config.build.sprites))
    .pipe(reload({stream: true}));
});

gulp.task('sprite:png', function () {
  var spriteData = gulp.src(config.src.sprite.png).pipe(spritesmith({
    imgName: 'sprite.png',
    cssName: '_sprite.scss',
    imgPath: './assets/images/nofollow/sprite.png',
    cssFormat: 'scss'
  }));
  spriteData.img
    .pipe(imagemin([
      imagemin.gifsicle({interlaced: true}),
      imagemin.jpegtran({progressive: true}),
      imagemin.optipng({optimizationLevel: 3}),
      imagemin.svgo({
        plugins: [
          {removeViewBox: true},
          {cleanupIDs: false}
        ]
      })
    ]))
    .pipe(gulp.dest(config.build.sprites));

  spriteData.css.pipe(gulp.dest(config.src.styleBase + '/2_vendors'));
});


// gulp.task("php", function() {
//   return gulp.src(srcPath + "/php/**/*")
//     .pipe(plumber())
//     .pipe(gulp.dest(publicPath))
//     .pipe(server.stream());
// });


gulp.task("fonts", function () {
  return gulp.src(config.src.fonts)
    .pipe(gulp.dest(config.build.fonts))
    .pipe(reload({stream: true}));
});

gulp.task("fonts:clean", function() {
  return del.sync(config.build.fonts);
});

gulp.task("fonts:watch", ['fonts:clean'], function() {
  gulp.start('fonts');
});


gulp.task('watch', function(){
  gulp.watch([config.watch.html], function(event, cb) {
    if (event.type === 'changed' || event.type === 'added' || event.type === 'renamed' || event === 'deleted') {
      gulp.start('html');
    }
  });

  gulp.watch([config.watch.style], function(event, cb) {
    if (event.type === 'changed' || event.type === 'added' || event.type === 'renamed' || event === 'deleted') {
      gulp.start('style');
    }
  });

  gulp.watch([config.watch.js.separate], function(event, cb) {
    if (event.type === 'changed' || event.type === 'added' || event.type === 'renamed' || event.type === 'deleted') {
      gulp.start('js:separate');
    }
  });

  gulp.watch([config.watch.js.components], function(event, cb) {
    if (event.type === 'changed' || event.type === 'added' || event.type === 'renamed' || event.type === 'deleted') {
      gulp.start('js:components');
    }
  });

  gulp.watch([config.watch.js.plugins], function(event, cb) {
    if (event.type === 'changed' || event.type === 'added' || event.type === 'renamed' || event.type === 'deleted') {
      gulp.start('js:plugins');
    }
  });

  gulp.watch([config.watch.img], function(event, cb) {
    if (event.type === 'added' || event.type === 'renamed' || event.type === 'deleted') {
      gulp.start('images:watch');
    }
  });

  gulp.watch([config.watch.sprite.svg], function(event, cb) {
    if (event.type === 'added' || event.type === 'renamed' || event.type === 'deleted') {
      gulp.start('sprite:svg');
    }
  });

  gulp.watch([config.watch.sprite.png], function(event, cb) {
    if (event.type === 'added' || event.type === 'renamed' || event.type === 'deleted') {
      gulp.start('sprite:png');
    }
  });

  gulp.watch([config.watch.fonts], function(event, cb) {
    if (event.type === 'added' || event.type === 'renamed' || event.type === 'deleted') {
      gulp.start('fonts:watch');
    }
  });
});

gulp.task("build", function (done) {
  run(
    // "clean",
    // "html",
    "style",
    "js",
    // "images:build",
    "sprite:svg",
    // "webp",
    // "fonts",
    done);
});

gulp.task("dev", function (done) {
  run(
    // "clean",
    // "html",
    "style",
    "js",
    // "images:dev",
    "sprite:svg",
    // "fonts",
    // "serve",
    "watch",
    done);
});