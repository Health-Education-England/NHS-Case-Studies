<?php

namespace NHS_CASESTUDIES\ADMIN\Template_Loader;


add_filter('template_include',  __NAMESPACE__ . '\faq_template');

function faq_template( $template ) {


  	if ( is_post_type_archive('case-studies') || is_tax('cs_categories') ) {
 		
		return \NHS_CASESTUDIES\SetUp\get_plugin_directory() . '/public/templates/case-studies-archive.php';;

  	}else{
  		return $template;
  	}

	
}