<?php

namespace NHS_CASESTUDIES\FRONTEND\RegisterScripts;


add_action( 'wp_enqueue_scripts',  __NAMESPACE__ . '\register_scripts' );


function register_scripts(){

	$css_path = '/public/css';

	if( is_singular( 'case-studies' ) ){

	    wp_enqueue_style( 
	        'nhs_casestudies_css',  
	        \NHS_CASESTUDIES\SetUp\get_plugin_url() . $css_path . '/cs-style.css',
	        array(),
	        filemtime( \NHS_CASESTUDIES\SetUp\get_plugin_directory() . $css_path . '/cs-style.css' )
	    );
	}


}