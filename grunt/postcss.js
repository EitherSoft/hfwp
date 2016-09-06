module.exports = {
    options: {
        processors: [
            require('pixrem')(),
            require('postcss-import')(),
            require('css-mqpacker')(),
            require('autoprefixer')({browsers: 'last 2 versions'}),
            require('cssnano')({discardComments: { removeAll: true}})
        ]
    },
    wp: {
        src: '<%= package.base + package.themes + package.themename + package.csspath %>compiled.css',
        dest: '<%= package.base + package.themes + package.themename + package.csspath %>compiled.min.css'
    }
}

