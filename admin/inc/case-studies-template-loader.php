<?php

namespace NHS_CASESTUDIES\ADMIN\Template_Loader;


add_filter('template_include',  __NAMESPACE__ . '\case_studies_template');

function case_studies_template( $template ) {


  	if ( is_post_type_archive('case-studies') || is_tax('cs_categories') ) {
 		
		return \NHS_CASESTUDIES\SetUp\get_plugin_directory() . '/public/templates/case-studies-archive.php';

  	}
  	elseif( is_singular('case-studies') ){

  		return \NHS_CASESTUDIES\SetUp\get_plugin_directory() . '/public/templates/case-studies-single.php';

  	}else{

  		return $template;
  		
  	}

	
}