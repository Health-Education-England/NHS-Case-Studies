<?php

namespace NHS_CASESTUDIES\ADMIN\Notices;

add_action( 'admin_notices', __NAMESPACE__ . '\check_theme_plugin_installed' );


function check_theme_plugin_installed() {

	$not_installed = array();
	$nightingale = false;
	$nhsblocks = false;

	if( ! function_exists('nightingale_setup') ):

		$nightingale = true;

		array_push( $not_installed, 'Nightingale theme' );

	endif;

	if( ! function_exists('nhsblocks_register_blocks') ):

		$nhsblocks = true;

		array_push( $not_installed, 'NHS Blocks' );

	endif;

	if( count( $not_installed ) > 0 ):

		$dismiss_url = 'dismiss';

    ?>

    <div class="notice notice-warning">

        <?php printf( '<p>%1$s %2$s %3$s %4$s %5$s</p>', 
        	 __( 'The Case Studies Plugin needs the ', 'nhs_cs' ),
        	$nightingale ? __( 'Nightingale theme', 'nhs_cs' ): '',
        	count( $not_installed ) > 1 ? __( ' and ', 'nhs_cs' ) : ' ',
        	$nhsblocks ? __( 'NHS Blocks Plugin', 'nhs_cs' ): '',        	
        	 __( ' activated to work properly', 'nhs_cs' )
    	); ?>

    </div>
    
    <?php

	endif;

}
