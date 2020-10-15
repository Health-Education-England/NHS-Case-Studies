<?php

namespace NHS_CASESTUDIES\ADMIN\Custom_Sidebar;

add_action( 'init', __NAMESPACE__ . '\case_studies_sidebar' );

function case_studies_sidebar() {

    register_sidebar( array(
        'name'          => __( 'Case Studies Sidebar', 'nhs_cs' ),
        'id'            => 'case-studies',
        'before_widget' => '<section id="%1$s" class="nhsuk-related-nav %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="nhsuk-related-nav__heading">',
        'after_title'   => '</h2>',
    ) );
 
}


function nhs_cs_show_sidebar(){

    $option = ( get_theme_mod('cs_sidebar') === 'true' );

    return $option;

}