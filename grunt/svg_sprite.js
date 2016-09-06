module.exports = {
    generate: {
        expand: true,
        cwd: 'files/svg',
        src: ['*.svg'],
        dest: 'files',
        options: {
            mode: {
                symbol: {
                    dest: "svg-final",
                    sprite: "svg-sprite.svg"
                },
                defs: {
                    dest: "svg-final",
                    sprite: "svg-sprite-def.svg"
                }
            }
        }
    }
};
