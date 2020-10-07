<?php

namespace NHS_CASESTUDIES\ADMIN\AddWidget;

add_action('nightingale_after_single_content', __NAMESPACE__ . '\add_widgets_after_content');

function add_widgets_after_content(){ 

	if ( ! is_singular( 'case-studies' ) || ! is_active_sidebar( 'sidebar-1' ) ) return; ?>	

	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside>

<?php }