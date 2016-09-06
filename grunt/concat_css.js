module.exports = {
    dist: {
        options: {

        },
        files: {
            '<%= package.base + package.themes + package.themename  + package.csspath %>compiled.css': [
                'bower_components/animate.css/animate.css',
                'bower_components/bootstrap/dist/css/bootstrap.css',
                'bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css',
                'bower_components/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
                'bower_components/bootstrap-select/dist/css/bootstrap-select.css',
                'bower_components/font-awesome/css/font-awesome.css',
                'bower_components/ionicons/css/ionicons.css',
                'default-skin/default-skin.css',
                'bower_components/photoswipe/dist/photoswipe.css',
                'bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css',
                'bower_components/vegas/dist/vegas.css',
                'compiled-css/main-sass.css'
            ]
        }
    }
}