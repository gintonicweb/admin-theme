/*global module:false*/
module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({

    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: 
      '/*! <%= pkg.title || pkg.name %> - v<%= pkg.version %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '<%= pkg.homepage ? "* " + pkg.homepage + "\\n" : "" %>' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> <%= pkg.author.name %>;' +
      ' Licensed <%= _.pluck(pkg.licenses, "type").join(", ") %> */\n',

    // Task configuration.
    babel: {
      options: {
        sourceMap: false
      },
      dist: {
        files: [{
            expand: true,
            cwd: 'assets/js/',
            src: ['**/*.*'],
            dest: 'assets/tmp/',
            ext: '.js'
        }]
      }
    },
    requirejs: {
      compile: {
        options: {
          appDir:"assets/tmp/",
          baseUrl:"./",
          dir:"webroot/js",
          modules:[{
            name: "config",
          }],
          noBuildTxt: true
        }
      }
    },
    copy: {
      main: {
        files: [
          {
            expand: true,
            cwd: './assets/vendor/',
            src: ['**'],
            dest: 'webroot/vendor/'
          },
          {
            expand: true,
            cwd: './assets/vendor/',
            src: ['**/fonts/**'],
            dest: 'webroot/fonts/',
            flatten: true,
            filter: "isFile"
          },
        ],
      },
    },
    less: {
      production: {
        options: {
          paths: [
            "assets/less",
            "assets/vendor"
          ],
          compress: true,
          optimization: 0
        },
        files: {
          "webroot/css/admin.css": "assets/less/admin.less",
        }
      }
    },
    clean: {
        tmp: [
            "assets/tmp",
            "webroot/css",
            "webroot/js",
            "webroot/vendor",
        ],
        webroot: ["webroot/js/**/*.jsx"],
    },
    concat: {
      options: {
        banner: '<%= banner %>',
        stripBanners: true
      },
      dist: {
        src: ['lib/<%= pkg.name %>.js'],
        dest: 'dist/<%= pkg.name %>.js'
      }
    },
    uglify: {
      options: {
        banner: '<%= banner %>'
      },
      dist: {
        src: '<%= concat.dist.dest %>',
        dest: 'dist/<%= pkg.name %>.min.js'
      }
    },
    jshint: {
      options: {
        curly: true,
        eqeqeq: true,
        immed: true,
        latedef: true,
        newcap: true,
        noarg: true,
        sub: true,
        undef: true,
        unused: true,
        boss: true,
        eqnull: true,
        browser: true,
        globals: {
          jQuery: true
        }
      },
      gruntfile: {
        src: 'Gruntfile.js'
      },
      lib_test: {
        src: ['lib/**/*.js', 'test/**/*.js']
      }
    },
    qunit: {
      files: ['test/**/*.html']
    },
    watch: {
      gruntfile: {
        files: '<%= jshint.gruntfile.src %>',
        tasks: ['jshint:gruntfile']
      },
      js: {
        files: [
            "assets/js/**/*"
        ],
        tasks: ["babel","requirejs","copy"]
      },  
      style: {
          files: [
            "assets/less/**/*",
          ],
          tasks: ["less"]
      }
    }
  });

  // These plugins provide necessary tasks.
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-requirejs');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-babel');

  // Default task.
  grunt.registerTask('default', ['clean', 'babel', 'requirejs', 'copy', 'less']);

};
