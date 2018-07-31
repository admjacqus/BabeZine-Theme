var gulp = require("gulp");
var browserSync = require("browser-sync").create();
var sass = require("gulp-sass");
var autoprefixer = require("gulp-autoprefixer");
var autoprefixerOptions = {
  browsers: ["last 2 versions", "> 5%", "Firefox ESR"]
};

gulp.task("sass", function() {
  return gulp
    .src("./sass/style.scss")
    .pipe(sass().on("error", sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest("./css").on("change", browserSync.reload));
});

gulp.task("default", function() {
  browserSync.init({
    proxy: "http://localhost:8888",
    notify: false
  });
  gulp.watch("./sass/**/*.scss", ["sass"]);
  gulp.watch("./css/**/*.css").on("change", browserSync.reload);
  gulp.watch("**/*.php").on("change", browserSync.reload);
});

gulp.task("dist", ["dist-php"], function() {
  // this occurs after 'dist-php' finishes
  return gulp.src("css/*").pipe(gulp.dest("dist/css/"));
});

gulp.task("dist-php", function() {
  return gulp.src("*.php").pipe(gulp.dest("dist/"));
});
