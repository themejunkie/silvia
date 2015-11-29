module.exports = function(grunt) {

	// require it at the top and pass in the grunt instance
	require( 'time-grunt' )( grunt );

	// Load all Grunt tasks
	require( 'jit-grunt' )( grunt, {
		makepot: 'grunt-wp-i18n'
	});

	grunt.initConfig({

		pkg: grunt.file.readJSON( 'package.json' ),

		bowercopy: {
			options: {
				clean: false
			},
			jsdev: {
				options: {
					destPrefix: 'assets/js/devs'
				},
				files: {
					'jquery.fitvids.js': 'fitvids/jquery.fitvids.js',
					'jquery.slicknav.min.js': 'slicknav/dist/jquery.slicknav.min.js',
					'jquery.magnific-popup.min.js': 'magnific-popup/dist/jquery.magnific-popup.min.js',
				}
			},
			js: {
				options: {
					destPrefix: 'assets/js'
				},
				files: {
					'html5shiv.min.js': 'html5shiv/dist/html5shiv.min.js',
				}
			},
			css: {
				options: {
					destPrefix: 'assets/css/devs'
				},
				files: {
					'font-awesome.min.css': 'fontawesome/css/font-awesome.min.css',
					'magnific-popup.css': 'magnific-popup/dist/magnific-popup.css',
					'slicknav.css': 'slicknav/dist/slicknav.css',
				}
			},
			fonts: {
				options: {
					destPrefix: 'assets/fonts'
				},
				files: {
					'assets/fonts': ['fontawesome/fonts/*']
				}
			}
		},

		// Concat and Minify our js.
		uglify: {
			dev: {
				files: {
					'assets/js/plugins.min.js': [
						'assets/js/devs/**/*.js'
					]
				}
			},
			prod: {
				files: {
					'assets/js/<%= pkg.name %>.min.js': ['assets/js/plugins.min.js','assets/js/main.js']
				}
			}
		},

		// Minify CSS
		cssmin: {
			options: {
				shorthandCompacting: false,
				roundingPrecision: -1,
				keepSpecialComments: 0
			},
			prod: {
				files: {
					'assets/css/plugins.min.css': [
						'assets/css/devs/**/*.css'
					]
				}
			}
		},

		// Compile our sass.
		sass: {
			dev: {
				options: {
					outputStyle: 'expanded'
				},
				files: {
					'style.css': 'scss/style.scss',
					'assets/css/editor-style.css': 'scss/editor-style.scss'
				}
			},
			prod: {
				options: {
					outputStyle: 'compressed'
				},
				files: {
					'style.min.css': 'scss/style.scss'
				}
			}
		},

		// Autoprefixer.
		autoprefixer: {
			options: {
				browsers: [
					'last 8 versions', 'ie 8', 'ie 9'
				]
			},
			main: {
				files: {
					'style.css': 'style.css',
					'style.min.css': 'style.min.css',
				}
			}
		},

		// Auto generate rtl.css
		cssjanus: {
			theme: {
				options: {
					swapLtrRtlInUrl: false
				},
				files: [
					{
						src: 'style.css',
						dest: 'rtl.css'
					}
				]
			}
		},

		// Newer files checker
		newer: {
			options: {
				override: function(detail, include) {
					if (detail.task === 'php' || detail.task === 'sass') {
						include(true);
					} else {
						include(false);
					}
				}
			}
		},

		// Watch for changes.
		watch: {
			options: {
				livereload: true,
				spawn: false
			},
			scss: {
				files: ['scss/**/*.scss'],
				tasks: [
					'newer:sass:dev',
					'newer:autoprefixer:main',
				]
			},
			js: {
				files: ['assets/js/**/*.js'],
			},
			php: {
				files: ['**/*.php'],
			}
		},

		// Copy the theme into the build directory
		copy: {
			build: {
				expand: true,
				src:  [
					'**',
					'!node_modules/**',
					'!bower_components/**',
					'!build/**',
					'!scss/**',
					'!.git/**',
					'!Gruntfile.js',
					'!package.json',
					'!bower.json',
					'!.gitignore',
					'!.jshintrc',
					'!.DS_Store',
					'!.ftppass',
					'!*.map',
					'!**/*.map',
					'!**/*~'
				],
				dest: 'build/<%= pkg.name %>/'
			}
		},

		// Compress build directory into <name>.zip and <name>-<version>.zip
		compress: {
			build: {
				options: {
					mode: 'zip',
					archive: './build/<%= pkg.name %>.zip'
				},
				expand: true,
				cwd: 'build/<%= pkg.name %>/',
				src: ['**/*'],
				dest: '<%= pkg.name %>/'
			}
		},

		// Clean up build directory
		clean: {
			build: [
				'build/<%= pkg.name %>',
				'build/<%= pkg.name %>.zip',
			]
		},

		makepot: {
			target: {
				options: {
					domainPath: '/languages/',           // Where to save the POT file.
					exclude: [                           // Exlude folder.
						'build/.*',
						'assets/.*',
						'readme/.*',
						'scss/.*',
						'bower_components/.*'
					],
					potFilename: '<%= pkg.name %>.pot',  // Name of the POT file.
					type: 'wp-theme',                    // Type of project (wp-plugin or wp-theme).
					updateTimestamp: true,               // Whether the POT-Creation-Date should be updated without other changes.
					processPot: function( pot, options ) {
						pot.headers['report-msgid-bugs-to'] = 'http://www.theme-junkie.com/support';
						pot.headers['plural-forms'] = 'nplurals=2; plural=n != 1;';
						pot.headers['last-translator'] = 'Support (support@theme-junkie.com)\n';
						pot.headers['language-team'] = 'Support (support@theme-junkie.com)\n';
						pot.headers['x-poedit-basepath'] = '..\n';
						pot.headers['x-poedit-language'] = 'English\n';
						pot.headers['x-poedit-country'] = 'UNITED STATES\n';
						pot.headers['x-poedit-sourcecharset'] = 'utf-8\n';
						pot.headers['x-poedit-searchpath-0'] = '.\n';
						pot.headers['x-poedit-keywordslist'] = '__;_e;__ngettext:1,2;_n:1,2;__ngettext_noop:1,2;_n_noop:1,2;_c;_nc:4c,1,2;_x:1,2c;_ex:1,2c;_nx:4c,1,2;_nx_noop:4c,1,2;\n';
						pot.headers['x-textdomain-support'] = 'yes\n';
						return pot;
					}
				}
			}
		},

	});

	// Dev task
	grunt.registerTask('default', [
		'bowercopy',
		'newer:uglify:dev',
		'newer:cssmin:prod',
		'newer:sass:dev'
	]);

	// Production task
	grunt.registerTask('build', [
		'newer:uglify',
		'sass',
		'cssjanus',
		'autoprefixer:main',
		'makepot',
		'newer:copy'
	]);

	// Package task
	grunt.registerTask('package', [
		'compress'
	]);

};