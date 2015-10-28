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

var frontend_theme_dir = 'build/theme';
var backend_theme_dir = 'build/admin/theme';

var frontend_js_sources = [
    'bower_components/fastclick/lib/fastclick.js',
    'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
    'bower_components/fancybox/source/jquery.fancybox.js',
    'components/frontend/scripts/common.js',
    'components/frontend/scripts/forms.js',
];

var backend_js_sources = [
    'bower_components/fastclick/lib/fastclick.js',
    'bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
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
    gulp.src('components/frontend/scss/style.scss')
    .pipe(compass({
        config_file: './config.rb',
        sass: 'components/frontend/scss',
        css: frontend_theme_dir + '/css'
    })
    .on('error', gutil.log))
    //.pipe(gulp.dest(frontend_theme_dir + '/css'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_compass', function() {
    gulp.src('components/backend/scss/style.scss')
    .pipe(compass({
        config_file: './config.rb',
        sass: 'components/backend/scss',
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
    gulp.src('components/frontend/scripts/custom/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(frontend_theme_dir + '/js'))
    .pipe(reload({stream:true}));
});

gulp.task('frontend_js_vendor', function() {
    gulp.src('components/frontend/scripts/vendor/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(frontend_theme_dir + '/js/vendor'))
    .pipe(reload({stream:true}));
});

gulp.task('frontend_js', function() {
    gulp.src(frontend_js_sources)
    .pipe(concat('theme.js'))
    .pipe(browserify())
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(frontend_theme_dir + '/js'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_js_custom', function() {
    gulp.src('components/backend/scripts/custom/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(backend_theme_dir + '/js'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_js_vendor', function() {
    gulp.src('components/backend/scripts/vendor/*.js')
    .pipe(gulpif(env === 'production', uglify()))
    .pipe(gulp.dest(backend_theme_dir + '/js/vendor'))
    .pipe(reload({stream:true}));
});

gulp.task('backend_js', function() {
    gulp.src(backend_js_sources)
    .pipe(concat('app.js'))
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
    gulp.watch(frontend_js_sources, ['frontend_js']);
    gulp.watch('components/frontend/scripts/vendor/*.js', ['frontend_js_vendor']);
    gulp.watch('components/frontend/scripts/custom/*.js', ['frontend_js_custom']);
    gulp.watch('components/frontend/scss/*.scss', ['frontend_compass']);
    gulp.watch(frontend_theme_dir + '/images/**/*.*', ['frontend_theme_images']);
    gulp.watch(backend_js_sources, ['backend_js']);
    gulp.watch('components/backend/scripts/vendor/*.js', ['backend_js_vendor']);
    gulp.watch('components/backend/scripts/custom/*.js', ['backend_js_custom']);
    gulp.watch('components/backend/scss/*.scss', ['backend_compass']);
    gulp.watch(backend_theme_dir + '/images/**/*.*', ['backend_theme_images']);
});

gulp.task('default', ['frontend_theme_files_move', 'backend_theme_files_move', 'frontend_modernizr', 'backend_modernizr', 'frontend_js_custom', 'frontend_js_vendor', 'frontend_js', 'backend_js_custom', 'backend_js_vendor', 'backend_js', 'frontend_compass', 'backend_compass', 'backend_theme_images', 'backend_theme_images', 'browser_sync', 'clear_cache', 'watch']);
