<?php
/*
* Plugin Name: Stanford Logo Generator
* Description: Logo generation tool creates University-approved lock-ups based on multiple user-selectable layout options.
* Plugin URI:  http://ucomm.stanford.edu/
* Author:      Perception System
* Author URI:  http://www.perceptionsystem.com/
* Version:     1.0.5
* License:     GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: wp-stanford
* Domain Path: languages
*/

// Preventing to direct access
defined( 'ABSPATH' ) OR die( 'Direct access not acceptable!' );


/**
 * Plugin file.
 * 
 */
if ( ! defined( 'SF_PLUGIN_FILE' ) ) {
    define( 'SF_PLUGIN_FILE', __FILE__ );
}

/**
 * Defined Plugin ABSPATH
 * 
 */
if ( ! defined( 'SF_PLUGIN_PATH' ) ) {
    define( 'SF_PLUGIN_PATH', plugin_dir_path( SF_PLUGIN_FILE ) );
}

/**
 * Defined Plugin URL
 * 
 */
if ( ! defined( 'SF_PLUGIN_URL' ) ) {
    define( 'SF_PLUGIN_URL', plugin_dir_url( SF_PLUGIN_FILE ) );
}


/**
 * Defined plugin version
 * 
 */
if ( ! defined( 'SF_PLUGIN_VER' ) ) {
    define( 'SF_PLUGIN_VER', '1.0.5' );
}

function sf_public_enqueue_scripts() {
    //wp_enqueue_script( 'bootstrap-min-js', SF_PLUGIN_URL . '/assets/js/bootstrap.min.js', array('jquery'), SF_PLUGIN_VER );
    wp_register_script( 'sf-public-script', SF_PLUGIN_URL . '/assets/js/sf-public-script.js', array('jquery'), SF_PLUGIN_VER );

    wp_localize_script( 'sf-public-script', 'sfObj', array(
        'plugin_url'            => esc_url( SF_PLUGIN_URL ),
        'is_mobile'             => ( wp_is_mobile() ) ? '1' : '0',
        'current_page_id'       => get_the_ID(),
        'current_page_url'      => get_permalink(),
        'ajax_url'              => admin_url( 'admin-ajax.php?ver=' . uniqid() ),
        'version'               => SF_PLUGIN_VER,
    ) );
   
   //wp_enqueue_style( 'bootstrap-min-css', SF_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), SF_PLUGIN_VER );
    wp_enqueue_style( 'sf-public-style', SF_PLUGIN_URL . 'assets/css/sf-public-style.css', array(), SF_PLUGIN_VER );
}

add_action( 'wp_enqueue_scripts', 'sf_public_enqueue_scripts', 10);


function sf_init() {
    require_once SF_PLUGIN_PATH . 'includes/horizontal_layout_options.php';
    require_once SF_PLUGIN_PATH . 'includes/vertical_layout_options.php';
    require_once SF_PLUGIN_PATH . 'includes/listing_shortcode.php';
}
add_action( 'plugins_loaded', 'sf_init', 20 );
?>