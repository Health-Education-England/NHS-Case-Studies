<?php

namespace NHS_CASESTUDIES\ADMIN\ScreenOptions;


add_action('init', __NAMESPACE__ . '\change_user_options', 30 );


function change_user_options(){

	$all_users = get_users();
	$tax_options = array( 'add-cs_categories' );

	foreach ( $all_users as $key => $user ):

		// make sure user can edit menues

		if( user_can( $user->ID,  'edit_theme_options' ) ):


			$hidden_meta_boxes = get_user_option( 'metaboxhidden_nav-menus' );


			foreach ( $hidden_meta_boxes as $key => $option ):

				if( in_array( $hidden_meta_boxes, $tax_options ) ):

					// unset the custom taxonomy from the menu hidden array

					unset( $hidden_meta_boxes[ $key ] );

				endif;

			endforeach;

			update_user_option( $user->ID, 'metaboxhidden_nav-menus', $hidden_meta_boxes, true );

		endif;

	endforeach;
	
}