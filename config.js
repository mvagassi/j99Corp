const action = require( 'tempaw-functions' ).action;

module.exports = {
	livedemo: {
		enable: true,
		server: {
			baseDir: `dev/`,
			directory: false
		},
		port: 8000,
		open: false,
		notify: true,
		reloadDelay: 0,
		ghostMode: {
			clicks: false,
			forms: false,
			scroll: false
		}
	},
	sass: {
		enable: true,
		showTask: false,
		watch: `dev/**/*.scss`,
		source: `dev/**/!(_)*.scss`,
		dest: `dev/`,
		options: {
			outputStyle: 'expanded',
			indentType: 'tab',
			indentWidth: 1,
			linefeed: 'cr'
		}
	},
	pug: {
		enable: true,
		showTask: false,
		watch: `dev/**/*.pug`,
		source: [
			`dev/pages/!(_)*.pug`,
			`dev/documentation/!(_)*.pug`
		],
		dest: `dev/`,
		options: {
			pretty: true,
			verbose: true,
			self: true,
			emitty: true
		}
	},
	autoprefixer: {
		enable: false,
		options: {
			cascade: true,
			browsers: ['Chrome >= 45', 'Firefox ESR', 'Edge >= 12', 'Explorer >= 10', 'iOS >= 9', 'Safari >= 9', 'Android >= 4.4', 'Opera >= 30']
		}
	},
	watcher: {
		enable: true,
		watch: `dev/**/*.js`
	},
	lint: {
		showTask: true,
		sass: 'dev/components/!(bootstrap)/**/*.scss',
		pug: 'dev/**/*.pug',
		js: 'dev/**/!(*.min).js',
		html: 'dev/**/*.html'
	},
	buildRules: {
		'Build Dist': [
			// Clean dist
			action.clean({ src: 'dist' }),

			// Copy files to a temporary folder
			action.copy({
				src: [
					'dev/**/*.pug',
					'dev/**/*.scss',
					'dev/**/*.js'
				],
				dest: 'tmp'
			}),

			// Deleting code fragments
			action.delMarker({
				src: [
					'tmp/**/*.pug',
					'tmp/**/*.scss',
					'tmp/**/*.js'
				],
				dest: 'tmp',
				marker: 'DIST'
			}),

			// LIVEDEMO

			// Compile sass
			action.sass({
				src: 'tmp/**/*.scss',
				dest: 'dist/livedemo',
				autoprefixer: false
			}),

			// Compile pug
			action.pug({
				src: [
					`tmp/pages/!(_)*.pug`
				],
				dest: 'dist/livedemo',
				autoprefixer: false
			}),

			// Copy js files
			action.copy({
				src: 'tmp/**/*.js',
				dest: 'dist/livedemo'
			}),

			// Copy fonts
			action.copy({
				src: [
					'dev/**/*.otf',
					'dev/**/*.eot',
					'dev/**/*.svg',
					'dev/**/*.ttf',
					'dev/**/*.woff',
					'dev/**/*.woff2'
				],
				dest: 'dist/livedemo'
			}),

			// Copy & minify images
			action.minifyimg({
				src: [
					'dev/**/*.png',
					'dev/**/*.jpg',
					'dev/**/*.gif'
				],
				dest: 'dist/livedemo'
			}),

			// Copy other files
			action.copy({
				src: [
					'dev/**/*.ico',
					'dev/**/*.php',
					'dev/**/*.json',
					'dev/**/*.txt'
				],
				dest: 'dist/livedemo'
			}),

			// Delete temporary folder
			action.clean({ src: 'tmp' }),

			// GRANTER

			action.copy({
				src: [
					'dev/**/*.pug',
					'dev/**/*.html',
					'dev/**/*.scss',
					'dev/**/*.css',
					'dev/**/*.js',
				],
				dest: 'dist/granter/dev'
			}),

			// Copy fonts
			action.copy({
				src: [
					'dev/**/*.otf',
					'dev/**/*.eot',
					'dev/**/*.svg',
					'dev/**/*.ttf',
					'dev/**/*.woff',
					'dev/**/*.woff2'
				],
				dest: 'dist/granter/dev'
			}),

			// Copy & minify images
			action.minifyimg({
				src: [
					'dev/**/*.png',
					'dev/**/*.jpg',
					'dev/**/*.gif'
				],
				dest: 'dist/granter/dev'
			}),

			// Copy other files
			action.copy({
				src: [
					'dev/**/*.ico',
					'dev/**/*.php',
					'dev/**/*.json',
					'dev/**/*.txt'
				],
				dest: 'dist/granter/dev'
			}),

			// Copy project files
			action.copy({
				src: [
					'config.js',
					'gulpfile.js',
					'package.json'
				],
				dest: 'dist/granter/'
			}),
		],
		'Babel': [
			action.minifyJs({
				src: [
					'dev/components/base/core.js',
					'dev/components/base/script.js'
				],
				dest: 'dev/components/base'
			})
		],
		'Util Backup': [
			action.pack({
				src: [ 'dev/**/*', '*.*', '.gitignore' ], dest: 'versions/',
				name( dateTime ) { return `backup-${dateTime[0]}-${dateTime[1]}.zip`; }
			})
		]
	}
};
