module.exports = {
    assets: {
        nonull: true,
        files: [
            {
                src: "**",
                dest: "<%= package.base + package.themes + package.themename %>assets/fonts",
                cwd: 'files/fonts',
                expand: true
            },
            {
                src: "**",
                dest: "<%= package.base + package.themes + package.themename %>assets/fonts",
                cwd: 'bower_components/bootstrap/fonts',
                expand: true
            }
        ]
    },
    wp: {
        nonull: true,
        files: [
            {
                src: "**",
                dest: "<%= package.base + package.themes + package.themename %>",
                cwd: 'wp',
                expand: true
            }
        ]
    },
    prepare: {
        nonull: true,
        files: [
            {
                src: "**",
                dest: "<%= package.base %>",
                cwd: 'composer',
                expand: true
            }
        ]
    },
    plugins: {
        nonull: true,
        files: [
            {
                src: "**",
                dest: "<%= package.base + package.plugins %>",
                cwd: '<%= package.base %>wp-content/plugins',
                expand: true
            }
        ]
    },
    wpkit: {
        nonull: true,
        files: [
            {
                src: "**",
                dest: "<%= package.base %>public_html/WPKit",
                cwd: '<%= package.base %>vendor/redink-no/wpkit',
                expand: true
            }
        ]
    },
    jadewp: {
        nonull: true,
        files: [
            {
                src: "**",
                dest: "<%= package.base %>public_html/jadeWP",
                cwd: '<%= package.base %>vendor/EitherSoft/jadeWP',
                expand: true
            }
        ]
    },
    btforms: {
        nonull: true,
        files: [
            {
                src: "**",
                dest: "<%= package.base + package.plugins %>/btforms",
                cwd: '<%= package.base %>vendor/jonnSmith/btforms',
                expand: true
            }
        ]
    }
};