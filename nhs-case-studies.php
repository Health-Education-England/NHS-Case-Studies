<?php
/**
 * Plugin Name: NHS Case Studies
 * Plugin URI: https://github.com/Health-Education-England/nhs-jobs
 * Description: NHS Case Studies Plugin
 * Version: 1.0.0
 * Author: VeryTwisty
 */


defined( 'ABSPATH' ) || exit;

/**
 * Currently plugin version.
 */
define( 'NHSJOBS_VERSION', '1.0.0' );


/**
 * Gets this plugin's absolute directory path.
 *
 * @since  1.0.0
 * @ignore
 * @access private
 *
 * @return string
 */

function nhscs_get_plugin_directory() {
    return __DIR__;
}

/**
 * Gets this plugin's URL.
 *
 * @since  1.0.0
 * @ignore
 * @access private
 *
 * @return string
 */

function nhscs_get_plugin_url() {
    static $plugin_url;

    if ( empty( $plugin_url ) ) {
        $plugin_url = plugins_url( null, __FILE__ );
    }

    return $plugin_url;
}


require_once 'admin/admin.php';