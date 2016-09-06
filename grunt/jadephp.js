module.exports = {
    dev: {
        expand: true,
        cwd: 'jade/tpl',
        src: ['**/*.jade'],
        dest: '<%=  package.base + package.themes + package.themename %>',
        ext: '.php',
        options: {
            client: false,
            pretty: true,
            basedir: 'jade/',
            data: function (dest, src) {
                return require('../languages/<%=  package.language %>/data.json');
            }
        }
    },
    prod: {
        expand: true,
        cwd: 'jade/tpl',
        src: ['**/*.jade'],
        dest: '<%=  package.base + package.themes + package.themename %>',
        ext: '.php',
        options: {
            client: false,
            pretty: false,
            basedir: 'jade/',
            data: function (dest, src) {
                return require('../languages/<%=  package.language %>/data.json');
            }
        }
    }
};