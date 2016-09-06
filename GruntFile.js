module.exports = function(grunt) {
    var gtx = require('gruntfile-gtx').wrap(grunt);

    gtx.loadAuto();

    var gruntConfig = require('./grunt');
    gruntConfig.package = require('./package.json');

    gtx.config(gruntConfig);

    gtx.alias('build:prepare', ['copy:prepare']);

    gtx.alias('build:composer', ['copy:plugins','copy:wpkit','copy:jadewp','copy:btforms','clean:composer']);

    gtx.alias('build:base', [
        'clean:bower',
        'bower-install-simple:prod',
        'copy:wp',
        'copy:assets',
        'imagemin:images',
        'coffee:compile',
        'concat:compile',
        'removelogging:wp',
        'clean:coffee',
        'uglify:wp',
        'clean:js',
        'stylus:dist',
        'recess:wp',
        'clean:stylus',
        'postcss:wp',
        'clean:css',
        'svg_sprite:generate',
        'svgcombine:inject',
        'jadephp:prod',
        'clean:svg',
        'htmlclean:index'
    ]);

    gtx.alias('build:prod', [
        'copy:wp',
        'copy:assets',
        'imagemin:images',
        'coffee:compile',
        'concat:compile',
        'removelogging:wp',
        'clean:coffee',
        'uglify:wp',
        'clean:js',
        'stylus:dist',
        'recess:wp',
        'clean:stylus',
        'postcss:wp',
        'clean:css',
        'svg_sprite:generate',
        'svgcombine:inject',
        'jadephp:prod',
        'clean:svg',
        'htmlclean:index'
    ]);

    gtx.alias('build:dev', [
        'copy:wp',
        'copy:assets',
        'imagemin:images',
        'coffee:compile',
        'concat:compile',
        'clean:coffee',
        'stylus:dist',
        'recess:wp',
        'clean:stylus',
        'svg_sprite:generate',
        'svgcombine:inject',
        'jadephp:dev'
    ]);

    gtx.alias('build:html', [
        'copy:wp',
        'copy:assets',
        'imagemin:images',
        'svg_sprite:generate',
        'svgcombine:inject',
        'jade:dev',
        'clean:svg',
        'htmlclean:index'
    ]);

    gtx.alias('build:css', [
        'copy:assets',
        'imagemin:images',
        'stylus:dist',
        'recess:wp',
        'clean:stylus',
        'postcss:wp',
        'clean:css'
    ]);

    gtx.alias('build:js', [
        'copy:assets',
        'imagemin:images',
        'coffee:compile',
        'concat:compile',
        'clean:coffee',
        'uglify:wp',
        'clean:js'
    ]);

    gtx.finalise();
}


