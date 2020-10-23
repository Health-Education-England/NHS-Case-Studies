<?php
/**
 * Plugin Name: NHS Case Studies
 * Plugin URI: https://github.com/Health-Education-England/NHS-Case-Studies
 * Description: NHS Case Studies Plugin
 * Version: 1.0.0
 * Author: VeryTwisty
 */

namespace NHS_CASESTUDIES\SetUp;


defined( 'ABSPATH' ) || exit;

/**
 * Currently plugin version.
 */
define( 'NHSCASESTUDIES_VERSION', '1.0.0' );


/**
 * Gets this plugin's absolute directory path.
 *
 * @since  1.0.0
 * @ignore
 * @access private
 *
 * @return string
 */

function get_plugin_directory() {
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

function get_plugin_url() {
    static $plugin_url;

    if ( empty( $plugin_url ) ) {
        $plugin_url = plugins_url( null, __FILE__ );
    }

    return $plugin_url;
}

/**
 * Flushes re-write rules
 *
 * @since  1.0.0
 *
 */

function activate() {

	\NHS_CASESTUDIES\ADMIN\CustomPostType\create_case_studies_post_type();
	\NHS_CASESTUDIES\ADMIN\Custom_Taxonomy\case_studies_categories();

   flush_rewrite_rules();

}

/**
 * Flushes re-write rules
 *
 * @since  1.0.0
 *
 */

function deactivate() {
    flush_rewrite_rules();
}


register_activation_hook( __FILE__, __NAMESPACE__ . '\activate' );

register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate' );


require_once 'admin/admin.php';

require_once 'public/public.php';