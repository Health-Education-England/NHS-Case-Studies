<?php

namespace NHS_CASESTUDIES\ADMIN\FilterTitle;


add_filter( 'get_the_archive_title', __NAMESPACE__ . '\filter_title' );


function filter_title( $title ) {    

    if ( is_tax( 'cs_categories' ) ) { 
        
        $title = sprintf( __( '%1$s', 'nhs_cs' ), single_term_title( '', false ) );

    } elseif ( is_post_type_archive( 'case-studies' ) ) {
       
        $title = post_type_archive_title( '', false );
    
    }
    
    return $title;    
}