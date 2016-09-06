module.exports = {
    index: {
        expand: true,
        cwd: '<%= package.base + package.themes + package.themename %>',
        src: '**/*.php',
        dest: '<%= package.base + package.themes + package.themename %>'
    }
};