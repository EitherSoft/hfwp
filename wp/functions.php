<?php
/**
 * Themename functions and definitions
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage themename
 * @since themename
 */

global $themename, $shortname;

$themename = "hfwp";
$shortname = "hfwp";

add_action('after_setup_theme', 'theme_setup');

global $production;

$production = PRODUCTION;

$build_ext = '';
if($production) {
    $build_ext = '.min';
}

require_once locate_template('/func/admin-options.php');
require_once locate_template('/func/theme-options.php');
require_once locate_template('/func/shortcodes.php');


function theme_setup()
{
    global $themename;

    //add_image_size('slide', 1340, 740, true);

    add_theme_support('post-thumbnails');
    add_theme_support('widgets');

    load_theme_textdomain($themename, get_template_directory() . '/languages');

}

/*SVG Support*/

function add_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_mime_types');

function fix_svg_thumb_display() {
    print '<style>
    td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
      width: 100% !important;
      height: auto !important;
    }
  </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');

/*OpenGraph*/

function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}

add_filter('language_attributes', 'doctype_opengraph');


function getOpengraphData() {

    global $themeOptions,$wp_query ;
    $post = $wp_query->get_queried_object();

    $og = array();

    if(is_single()) {
        $og['image'] = getImage('news-middle-horizontal', '500x370', $post->ID);
        $og['title'] = $post->post_title;
        $og['url'] = get_the_permalink($post->ID);
        $og['description'] = str_replace('"', "", wp_trim_words(strip_shortcodes($post->post_content), 80));
        $og['site_name'] = $themeOptions['site_name'];
    }

    return $og;

}

/*Helpers*/

function clearQuotes($str) {

    $str = str_replace( '"','',$str);
    $str = str_replace( "'",'',$str);

    return $str;
}

remove_filter( 'the_content', 'easy_image_gallery_append_to_content' );
remove_action( 'wp_footer', 'easy_image_gallery_js', 20 );

/*Theme options*/

function mytheme_add_admin()
{
    global $themename, $options;
    if ($_GET['page'] == basename(__FILE__)) {
        if ('save' == $_REQUEST['action']) {
            foreach ($options as $value) {
                update_option($value['id'], $_REQUEST[$value['id']]);
            }
            foreach ($options as $value) {
                if (isset($_REQUEST[$value['id']])) {
                    update_option($value['id'], $_REQUEST[$value['id']]);
                } else {
                    delete_option($value['id']);
                }
            }
            header("Location: themes.php?page=functions.php&saved=true");
            die;
        } else if ('reset' == $_REQUEST['action']) {
            foreach ($options as $value) {
                delete_option($value['id']);
            }
            header("Location: themes.php?page=functions.php&reset=true");
            die;
        }
    }
    add_menu_page(__(''), "Theme options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

add_action('admin_menu', 'mytheme_add_admin');

function admin_add_javascripts()
{
    wp_enqueue_script('jquery.tools.min', get_bloginfo('template_directory') . '/func/assets/tabs/jquery.tools.min.js', array('jquery'), '0.5');
}

if (is_admin()) {
    if(isset($_GET['page']) && $_GET['page'] == 'functions.php') {
        add_action('wp_print_scripts', 'admin_add_javascripts');
    }
}

global $wpPosts, $wpRelatedPosts, $wpTaxonomies, $wpImage, $topWpMenu, $footWpMenu, $bottomWpMenu, $themeOptions, $options;

/*jadeWP*/

include_once ABSPATH.'jadeWP/init_autoloader.php';

use jadeWP\wpQueries\wpPosts as wpPosts;
$wpPosts = new wpPosts('','%d.%m.%y %H:%i');

use jadeWP\wpQueries\wpTaxonomies as wpTaxonomies;
$wpTaxonomies = new wpTaxonomies('');

use jadeWP\wpImage\wpImage as wpImage;
$wpImage = new wpImage('http://placehold.it/','prettyPhoto');

use jadeWP\wpMenu\wpMenu as wpMenu;
$topWpMenu = new wpMenu('top-menu');
$footWpMenu = new wpMenu('foot-menu');

use jadeWP\wpUtils\wpThemeoptions as wpThemeoptions;
$wpThemeoptions = new wpThemeoptions($options);
$themeOptions = $wpThemeoptions->loadOptions();

use jadeWP\wpQueries\wpRelatedPosts as wpRelatedPosts;
$wpRelatedPosts = new wpRelatedPosts(6,array('category','post_tag','region','media'));

use jadeWP\wpUtils\wpClean as wpClean;

$frontend_css =array(
                    'wc-add-to-cart',
                    'woocommerce',
                    'woocommerce-layout',
                    'woocommerce-smallscreen',
                    'woocommerce-general');
$frontend_js =array('jquery',
                    'wp-embed',
                    'chosen',
                    'select2',
                    'jquery-blockui',
                    'jquery-payment',
                    'jquery-migrate',
                    'jquery-cookie',
                    'wc-credit-card-form',
                    'wc-add-to-cart-variation',
                    'wc-single-product',
                    'wc-country-select',
                    'wc-address-i18n',
                    'wc-password-strength-meter',
                    'wc-add-to-cart',
                    'wc-cart-fragments',
                    'woocommerce');
$frontend_actions = array('wp_enqueue_scripts', 'wp_print_scripts', 'wp_print_footer_scripts');
$frontend_filters = array('woocommerce_enqueue_styles');

$cleanWP = new wpClean(array('frontend'=>$frontend_css),array('frontend'=>$frontend_js),array('frontend'=>$frontend_actions),array('frontend'=>$frontend_filters));

use jadeWP\wpUtils\wpEnqueue as wpEnqueue;

$css = array(
    array(
        'key'=>'minstyles',
        'url'=>'/assets/css/compiled'.$build_ext.'.css',
        'deps'=>false,
        'ver'=>null,
        'media'=> 'all'
    )
);

$js = array(
    array(
        'key'=>'minjs',
        'url'=>'/assets/js/compiled'.$build_ext.'.js',
        'deps'=>false,
        'ver'=>null,
        'footer'=> true,
        'localize'=>array( 'siteurl' => get_bloginfo('template_url'))
    )
);

$wpEnqueue = new wpEnqueue($css,$js);

/*wpKit*/

include_once ABSPATH.'WPKit/init_autoloader.php';

use WPKit\Taxonomy\Taxonomy as Taxonomy;
use WPKit\PostType\MetaBox as MetaBox;
use WPKit\User\UserMetaBox as UserMetaBox;
use WPKit\PostType\PostType as PostType;

$slider_post_type = new PostType('slide','Slide');
$slider_post_type->set_menu_icon('dashicons-images-alt2');

$slider_post_type = new PostType('info','Info');
$slider_post_type->set_menu_icon('dashicons-welcome-learn-more');