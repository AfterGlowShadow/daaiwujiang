var gulp = require("gulp"),
    connect = require("gulp-connect");

// var concat = require("gulp-concat"),
//     minifyCss = require("gulp-minify-css"),
//     uglify = require("gulp-uglify");

// 定义源代码的目录和编译压缩后的目录
var src = "src",
    dist = "dist";

// // 合并及压缩 css 文件
// gulp.task("compress-css", function() {
//     return gulp.src([
//             "static/pv1/css/base.css"
//         ])
//         .pipe(concat("manifest.min.css"))
//         .pipe(minifyCss())
//         .pipe(gulp.dest(dist + "/pv1/css"));
// });

// // 合并及压缩 js 文件
// gulp.task("compress-js", function() {
//     return gulp.src([
//             "static/pv1/js/base.js"
//         ])
//         .pipe(concat("manifest.min.js"))
//         .pipe(uglify())
//         .pipe(gulp.dest(dist + "/pv1/js"));
// });

// // // 合并及压缩 css 文件
// // gulp.task("minifycss", function() {
// //     return gulp.src([
// //             src + "/assets/mobile/normalize.css",
// //             src + "/assets/mobile/component.css",
// //             src + "/assets/mobile/base.css"
// //         ])
// //         .pipe(concat("manifest.min.css"))
// //         .pipe(minifyCss())
// //         .pipe(gulp.dest(dist + "/assets"));
// // });

// // // 合并及压缩 js 文件
// // gulp.task("minifyjs", function() {
// //     return gulp.src([
// //             src + "/assets/lazyloading/echo.min.js",
// //             src + "/assets/mobile/modernizr.custom.js",
// //             src + "/assets/mobile/classie.js",
// //             src + "/assets/mobile/gnmenu.js",
// //             src + "/assets/mobile/base.js"
// //         ])
// //         .pipe(concat("manifest.min.js"))
// //         .pipe(uglify())
// //         .pipe(gulp.dest(dist + "/assets"));
// // });

// // 图片压缩处理
// // gulp.task("miniimages", function() {
// //     gulp.src(src + "/assets/*.{png,jpg,jpeg,gif}")
// //         .pipe(imagemin())
// //         .pipe(gulp.dest(dist + "/assets"));
// // });

// web 服务
gulp.task("webserver", function() {
    connect.server({
        port: 8081,
        root: "./src/", // 当前项目主目录
        livereload: true // 自动刷新
    });
});

// gulp.task("template", function() {
//     gulp.src(src + "/*.html").pipe(connect.reload());
// });

// gulp.task("watch", function() {
//     gulp.watch("static/pv1/css/*.css", ["template"]); // 监控 css 文件
//     gulp.watch("static/pv1/js/*.js", ["template"]); // 监控 js 文件
//     gulp.watch(src + "/*.html", ["template"]); // 监控 html 文件
// });



// // 打包压缩任务
// gulp.task("default", ["compress-js", "compress-css"]);

// // 开发任务
// gulp.task("server", ["webserver", "watch"]);
gulp.task("server", ["webserver"]);
