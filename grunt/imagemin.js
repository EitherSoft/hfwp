module.exports = {
    images: {
        options: {
            optimizationLevel: 3
        },
        files: [{
            expand: true,
            cwd: 'files/img',
            src: ['**/*.{png,jpg,gif}'],
            dest: "<%= package.base + package.themes + package.themename %>assets/img",
        }]
    }
};