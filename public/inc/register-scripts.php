<?php

namespace NHS_CASESTUDIES\FRONTEND\RegisterScripts;


add_action( 'wp_enqueue_scripts',  __NAMESPACE__ . '\register_scripts' );


function register_scripts(){

	$css_path = '/public/css';

	if( is_singular( 'case-studies' ) || is_post_type_archive( 'case-studies' ) ){

	    wp_enqueue_style( 
	        'nhs_casestudies_css',  
	        \NHS_CASESTUDIES\SetUp\get_plugin_url() . $css_path . '/style.css',
	        array(),
	        filemtime( \NHS_CASESTUDIES\SetUp\get_plugin_directory() . $css_path . '/style.css' )
	    );
	}

	if( has_block( 'nhs-cs/casestudies' ) ){

		wp_enqueue_style( 
	        'nhs_casestudy_cards',  
	        \NHS_CASESTUDIES\SetUp\get_plugin_url() . $css_path . '/blocks.style.css',
	        array(),
	        filemtime( \NHS_CASESTUDIES\SetUp\get_plugin_directory() . $css_path . '/blocks.style.css' )
	    );
	}


}