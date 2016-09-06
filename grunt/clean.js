module.exports = {
    bower: ['bower_components/*'],
    js: ['<%= package.base + package.themes + package.themename  + package.jspath %>*.js', '!<%= package.base + package.themes + package.themename  + package.jspath %>*.min.js'],
    css: ['<%= package.base + package.themes + package.themename  + package.csspath %>*.css', '!<%= package.base + package.themes + package.themename  + package.csspath %>*.min.css'],
    svg: ['files/svg-final', 'jade/svg.html'],
    composer: ['<%= package.base %>wp-content','<%= package.base %>vendor'],
    coffee: ['compiled-js'],
    stylus: ['compiled-css'],
    options: { force: true }
};