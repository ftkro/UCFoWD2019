const {series} = require('gulp');
var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var imageminJpg = require('imagemin-jpeg-recompress');
var imageminPng = require('imagemin-pngquant');
var imageminGif = require('imagemin-gifsicle');
var svgmin = require('gulp-svgmin');

// 圧縮前と圧縮後のディレクトリを定義
var paths = {
    srcDir: process.argv[3] + "Common-Available/img",
    dstDir: process.argv[3] + "Common/img"
};

// jpg,png,gif画像の圧縮タスク
function task_pug() {
    var srcGlob = [process.argv[3] + process.argv[5] + '/*.pug'];
    var dstGlob = process.argv[3] + process.argv[5];
    gulp.src(srcGlob)
        .pipe(plugins.pug())
        .pipe(gulp.dest(dstGlob))
        .pipe(plugins.sitemap({
            siteUrl: 'https://homepages.uc.edu/~fukudato/' + process.argv[5] + '/'
        }))
        .pipe(gulp.dest(dstGlob))
}

function task_imagemin() {
    var srcGlob = [paths.srcDir + '/**/*.+(jpg|jpeg|png|gif)'];
    var dstGlob = paths.dstDir;
    gulp.src(srcGlob)
        .pipe(plugins.changed(dstGlob))
        .pipe(plugins.imagemin([
                imageminPng(),
                imageminJpg(),
                imageminGif({
                    interlaced: false,
                    optimizationLevel: 3,
                    colors: 180
                })
            ]
        ))
        .pipe(gulp.dest(dstGlob));
    var srcGlob_svg = paths.srcDir + '/**/*.+(svg)';
    var dstGlob_svg = paths.dstDir;
    gulp.src(srcGlob_svg)
        .pipe(plugins.changed(dstGlob_svg))
        .pipe(svgmin())
        .pipe(gulp.dest(dstGlob_svg));
    gulp.src(paths.srcDir + '/**/*.ico').pipe(gulp.dest(paths.dstDir));
}

function task_sass() {
    var srcGlob = process.argv[3] + process.argv[5] + '/**/*.scss';
    var dstGlob = process.argv[3] + process.argv[5];
    return gulp.src(srcGlob)
        .pipe(plugins.sourcemaps.init())
        .pipe(plugins.sass({outputStyle: 'compressed'}))
        .pipe(plugins.csscomb())
        .pipe(plugins.soften(4))
        .pipe(gulp.dest(dstGlob))
        .pipe(plugins.rename({
            suffix: ".min",
        }))
        .pipe(plugins.minifyCss())
        .pipe(plugins.sourcemaps.write(dstGlob))
        .pipe(gulp.dest(dstGlob));
}

function task_coffee() {
    var srcGlob = process.argv[3] + process.argv[5] + '/**/*.coffee';
    var dstGlob = process.argv[3] + process.argv[5];
    return gulp.src(srcGlob)
        .pipe(plugins.sourcemaps.init())
        .pipe(plugins.coffee({bare: true}))
        .pipe(plugins.soften(4))
        .pipe(plugins.jshint())
        .pipe(gulp.dest(dstGlob))
        .pipe(plugins.rename({
            suffix: ".min",
        }))
        .pipe(plugins.uglify())
        .pipe(plugins.sourcemaps.write(dstGlob))
        .pipe(gulp.dest(dstGlob));
}

function task_upload() {
    return gulp.src(process.argv[3] + process.argv[5] + '/**/*')
        .pipe(plugins.sftpUp4({
            host: 'ucfilespace.uc.edu',
            user: "fukudato",
            remotePath: "/Volumes/UCFSsan31/Users/f/fukudato/Sites/" + process.argv[5]
        }));
}

gulp.task('default', (done) => {
    task_pug();
    task_imagemin();
    task_sass();
    task_coffee();
    //task_upload(); //なんか知らんがバグるので
    done();
});