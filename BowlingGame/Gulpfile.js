var gulp = require('gulp');
var phpspec = require('gulp-phpspec');
var notify = require('gulp-notify');

gulp.task('test', function() {
	gulp.src('spec/**/*.php')
		.pipe(phpspec('', { clear: true, notify: true, sound: false }))
		.on('error', notify.onError({
			title: 'Failed',
			message: 'Your test failed, Roman!',
		}))
		.pipe(notify({
			title: 'Success',
			message: 'All tests have returned green!',
		}));
});

gulp.task('watch', function(){
	gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
});

gulp.task('default', ['test', 'watch']);