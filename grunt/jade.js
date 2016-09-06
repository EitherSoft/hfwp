module.exports = {
    dev: {
        expand: true,
        cwd: 'jade/tpl',
        src: ['**/*.jade'],
        dest: '<%=  package.base %>',
        ext: '.html',
        options: {
            client: false,
            pretty: true,
            basedir: 'jade/',
            data: function (dest, src) {
                return require('../languages/default/data.json');
            }
        }
    },
    prod: {
        expand: true,
        cwd: 'jade/tpl',
        src: ['**/*.jade'],
        dest: '<%=  package.base %>',
        ext: '.html',
        options: {
            client: false,
            pretty: false,
            basedir: 'jade/',
            data: function (dest, src) {
                return require('../languages/default/data.json');
            }
        }
    }
};