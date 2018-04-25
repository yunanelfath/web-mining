var elixir = require("laravel-elixir"),
	util = require("gulp-util").env,
  env = require("./environment.config"),
  gulp = require('gulp'),
  webpackStream = require('webpack-stream'),
	Task = elixir.Task


elixir.extend('home_form', function(message){
  new Task('form-stemming-scripts',function(){
    return gulp.src('./stemmer/index.cjsx')
      .pipe(webpackStream({
        output: {
          filename: 'text-processing.js'
        },
        module: {
          loaders: env.environment.loaders
        },
        plugins: env.environment.plugins,
      }))
      .pipe(gulp.dest('public'));
  }).watch(['/**/*.cjsx','/**/*.scss']);
})

elixir(function(mix) {
    var page = util.page === undefined ? undefined : util.page.split(',');
    var build = page === undefined ? [
    'home_form'
    ] : page;

	for (var i = 0; i <= build.length - 1; i++) {
		if (typeof mix[build[i]] == "function") {
			mix[build[i]]()
		}
	}
})
