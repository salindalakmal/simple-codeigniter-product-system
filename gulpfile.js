var gulp = require('gulp'),
    gutil = require('gulp-util'),
    browserify = require('gulp-browserify'),
    compass = require('gulp-compass'),
    browserSync = require('browser-sync'),
    gulpif = require('gulp-if'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    pngcrush = require('imagemin-pngcrush'),
    concat = require('gulp-concat'),
    cache = require('gulp-cache');

var reload  = browserSync.reload;

var frontend_theme_dir = 'build';
var backend_theme_dir = 'build/admin';

var frontend_js_sources = [
    'bower_components/fastclick/lib/fastclick.js',
    'bower_components/foundation/js/foundation.js',
    'bower_components/fancybox/source/jquery.fancybox.js',
    'components/theme/scripts/common.js',
    'components/theme/scripts/forms.js',
];

var backend_js_sources = [
    'bower_components/fastclick/lib/fastclick.js',
    'bower_components/foundation/js/foundation.js',
    'bower_components/fancybox/source/jquery.fancybox.js',
    'components/app/scripts/common.js',
    'components/app/scripts/forms.js',
];

var env = process.env.NODE_ENV || 'development';
//var env = process.env.NODE_ENV = 'production';



gulp.task('browser_sync', function() {
    browserSync({
        proxy: 'localhost/product_system/build/',
        open: true,
        notify: false,
    });
});

gulp.task('frontend_theme_files_move', function() {
    gulp.src('bower_components/font-awesome/fonts/**.*')
    .pipe(gulp.dest(frontend_theme_dir + '/fonts'));
    gulp.src('bower_components/jquery/dist/jquery.min.js')
    .pipe(gulp.dest(frontend_theme_dir + '/js/vendor'));
    gulp.src('bower_components/fancybox/source/**.{gif,png,jpg}')
    .pipe(gulp.dest(frontend_theme_dir + '/images'));
});

gulp.task('backend_theme_files_move', function() {
    gulp.src('bower_components/font-awesome/fonts/**.*')
    .pipe(gulp.dest(backend_theme_dir + '/fonts'));
    gulp.src('bower_components/jquery/dist/jquery.min.js')
    .pipe(gulp.dest(backend_theme_dir + '/js/vendor'));
    gulp.src('bower_components/fancybox/source/**.{gif,png,jpg}')
    .pipe(gulp.dest(backend_theme_dir + '/images'));
});

gulp.task('frontend_compass', function() {
    gulp.src('components/theme/scss/style.scss')
    .pipe(compass({
        config_file: './config.rb',
        sass: 'components/theme/scss',
        css: frontend_theme_dir + '/css'
    })
    .on('error', gutil.log))
    //.pipe(gulp.dest(frontend_theme_dir + '/css'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_compass', function() {
    gulp.src('components/app/scss/style.scss')
    .pipe(compass({
        config_file: './config.rb',
        sass: 'components/app/scss',
        css: backend_theme_dir + '/css'
    })
    .on('error', gutil.log))
    //.pipe(gulp.dest(backend_theme_dir + '/css'))
    .pipe(reload({stream:true}));
});

gulp.task('frontend_modernizr', function() {
    gulp.src('bower_components/modernizr/modernizr.js')
    .pipe(uglify())
    .pipe(gulp.dest(frontend_theme_dir + '/js/vendor'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_modernizr', function() {
    gulp.src('bower_components/modernizr/modernizr.js')
    .pipe(uglify())
    .pipe(gulp.dest(backend_theme_dir + '/js/vendor'))
    .pipe(reload({stream:true}));
});

gulp.task('frontend_js_custom', function() {
    gulp.src('components/theme/scripts/custom/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(frontend_theme_dir + '/js/custom'))
    .pipe(reload({stream:true}));
});

gulp.task('frontend_js_vendor', function() {
    gulp.src('components/theme/scripts/vendor/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(frontend_theme_dir + '/js/vendor'))
    .pipe(reload({stream:true}));
});

gulp.task('frontend_js', function() {
    gulp.src(frontend_theme_js_sources)
    .pipe(concat('theme.js'))
    .pipe(browserify())
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(frontend_theme_dir + '/js'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_js_custom', function() {
    gulp.src('components/app/scripts/custom/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(backend_theme_dir + '/js/custom'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_js_vendor', function() {
    gulp.src('components/app/scripts/vendor/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(backend_theme_dir + '/js/vendor'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_js', function() {
    gulp.src(app_theme_js_sources)
    .pipe(concat('theme.js'))
    .pipe(browserify())
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(backend_theme_dir + '/js'))
    .pipe(reload({stream:true}));
});

gulp.task('frontend_theme_images', function() {
    gulp.src(frontend_theme_dir + '/images/**/*.*')
    .pipe(gulpif(env === 'production', imagemin({
        progressive: true,
        svgoPlugins: [{ removeViewBox: false }],
        use: [pngcrush()]
    })))
    .pipe(reload({stream:true}));
});

gulp.task('backend_theme_images', function() {
    gulp.src(frontend_theme_dir + '/images/**/*.*')
    .pipe(gulpif(env === 'production', imagemin({
        progressive: true,
        svgoPlugins: [{ removeViewBox: false }],
        use: [pngcrush()]
    })))
    .pipe(reload({stream:true}));
});

gulp.task('clear_cache', function() {
    cache.clearAll();
});

gulp.task('watch', function() {
    gulp.watch(frontend_theme_js_sources, ['frontend_js']);
    gulp.watch('components/theme/scripts/vendor/*.js', ['frontend_js_vendor']);
    gulp.watch('components/theme/scripts/custom/*.js', ['frontend_js_custom']);
    gulp.watch('components/theme/scss/*.scss', ['frontend_compass']);
    gulp.watch(frontend_theme_dir + '/images/**/*.*', ['frontend_theme_images']);
    gulp.watch(app_theme_js_sources, ['backend_js']);
    gulp.watch('components/app/scripts/vendor/*.js', ['backend_js_vendor']);
    gulp.watch('components/app/scripts/custom/*.js', ['backend_js_custom']);
    gulp.watch('components/app/scss/*.scss', ['backend_theme_compass']);
    gulp.watch(app_theme_dir + '/images/**/*.*', ['backend_theme_images']);
});

gulp.task('default', ['frontend_theme_files_move', 'backend_theme_files_move', 'frontend_modernizr', 'backend_modernizr', 'frontend_js_custom', 'frontend_js_vendor', 'frontend_js', 'backend_js_custom', 'backend_js_vendor', 'backend_js', 'frontend_compass', 'backend_compass', 'backend_theme_images', 'backend_theme_images', 'browser_sync', 'clear_cache', 'watch']);

