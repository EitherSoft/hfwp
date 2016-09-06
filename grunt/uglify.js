module.exports = {
    wp: {
        src: [
            '<%= package.base + package.themes + package.themename + package.jspath %>compiled.js'
        ],
        dest: '<%= package.base + package.themes + package.themename + package.jspath %>compiled.min.js'
    }
}