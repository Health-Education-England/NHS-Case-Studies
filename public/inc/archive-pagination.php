<?php

namespace NHS_CASESTUDIES\FRONTEND\ArchivePagination;

add_action( 'pre_get_posts' , __NAMESPACE__ . '\archive_pagination', 30 );

function archive_pagination( $query ){


    if ( ! is_admin() && ( is_post_type_archive( 'case-studies' ) || is_tax( 'cs_categories' ) ) && $query->is_main_query() ){

    	$per_page = get_option('posts_per_page');

        $query->set( 'posts_per_page', $per_page );

    }

    
}