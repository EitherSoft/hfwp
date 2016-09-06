module.exports = {
    wp: {
        files: {
            '<%= package.base + package.themes + package.themename  + package.csspath %>compiled.css': [
                'bower_components/bootstrap/dist/css/bootstrap.css',
                'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
                'bower_components/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
                'bower_components/bootstrap-select/dist/css/bootstrap-select.css',
                'bower_components/fullpage.js/dist/jquery.fullpage.css',
                'compiled-css/main.css'
            ]
        }
    },
    options: {
        compile: true,
        compress: false
    }
}