### Installation

install [Node.js](https://nodejs.org/en/download/package-manager/)
go to the build-dir

    npm install -g grunt-cli
    npm install
    grunt build:prepare
    cd /wp-directory
    composer install    
    cd /wp-directory/public_html/wp-content/plugins/laps
    composer install
    cd /build-dir
    grunt build:composer
    grunt build:base

Add this lines to your wp_config.php

    define('WP_MEMORY_LIMIT', '512M');    
    define('CONCATENATE_SCRIPTS', false );    
    define('SAVEQUERIES', true);    
    define('AUTOMATIC_UPDATER_DISABLED', true );     
    define('WP_DEBUG_LOG', true);    
    define('PRODUCTION', true);