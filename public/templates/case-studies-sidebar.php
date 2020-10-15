<?php if ( \NHS_CASESTUDIES\ADMIN\Custom_Sidebar\nhs_cs_show_sidebar() && is_active_sidebar( 'case-studies' ) ) : ?>

    <div class="nhsuk-grid__item nhsuk-grid-column-one-third">
    	
    	<aside id="secondary" class="widget-area">

    		<?php dynamic_sidebar( 'case-studies' ); ?>

    	</aside>

    </div>

<?php endif;?>