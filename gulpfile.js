var gulp                      = require('gulp'),
    postcss                   = require('gulp-postcss'),
    uglify                    = require('gulp-uglify'),
    imagemin                  = require('gulp-imagemin'),
    browserSync               = require('browser-sync');

gulp.task('php', function() {
    return gulp.src('./voyageuw-src/**/*.php')
        .pipe(gulp.dest('./voyageuw'))
});

gulp.task('styles', function() {
    return gulp.src('./voyageuw-src/css/style.css')
        .pipe(postcss([require('postcss-import'),
                       require('postcss-custom-media'),
                       require('postcss-custom-properties'), 
                       require('postcss-calc'),
                       require('autoprefixer')]))
        .pipe(gulp.dest('./voyageuw'));
});

gulp.task('scripts', function() {
    return gulp.src('./voyageuw-src/js/**/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('./voyageuw/js'))
});

gulp.task('images', function() {
    return gulp.src('./voyageuw-src/images/**/*')
        .pipe(imagemin())
        .pipe(gulp.dest('./voyageuw/images'))
});

gulp.task('vendor', function() {
    return gulp.src('./voyageuw-src/vendor/**/*')
        .pipe(gulp.dest('./voyageuw/vendor'))
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "localhost:8888"
    });
});

gulp.task('watch', function() {
    gulp.watch('./voyageuw-src/**/*.php', ['php']);
    gulp.watch('./voyageuw-src/css/**/*.css', ['styles']);
    gulp.watch('./voyageuw-src/js/**/*.js', ['scripts']);
    gulp.watch('./voyageuw-src/images/**/*', ['images']);
    gulp.watch('./voyageuw-src/vendor/**/*', ['vendor']);
    gulp.watch('./voyageuw/**/*').on('change', browserSync.reload);
});

gulp.task('default', ['php', 'styles', 'scripts', 'images', 'vendor', 'browser-sync', 'watch']);