<?php


namespace NHS_CASESTUDIES\FRONTEND\Remove_ReadMore;


function excerpt_more( $more ) {

	global $post;

	if ( is_admin() ) {

		return $more;

	} elseif( $post->post_type === 'case-studies' ){

		return '';

	}else{

		return $more;
	}

}

add_filter( 'excerpt_more', __NAMESPACE__ . '\excerpt_more', 20 );