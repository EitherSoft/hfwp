module.exports = {
    inject: {
        files: {
            'jade/svg.html': ['files/svg-final/svg-sprite.svg']
        },
        options: {
            minify: false
        }
    }
};
