module.exports = {
    compile:{
        src:[
            'bower_components/jquery/dist/jquery.js',
            'bower_components/bootstrap/dist/js/bootstrap.js',
            'bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
            'bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.ru.js',
            'bower_components/bootstrap-select/dist/js/bootstrap-select.js',
            'bower_components/bootstrap-validator/dist/validator.js',
            'bower_components/svg4everybody/dist/svg4everybody.js',
            'bower_components/fullpage.js/vendors/jquery.easings.min.js',
            'bower_components/fullpage.js/vendors/jquery.slimscroll.js',
            'bower_components/fullpage.js/dist/jquery.fullpage.js',
            'bower_components/typed.js/js/typed.js',
            'compiled-js/coffee.js'
        ],
        dest:'<%= package.base + package.themes + package.themename + package.jspath %>compiled.js'
    }
};