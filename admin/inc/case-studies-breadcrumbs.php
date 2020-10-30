<?php


namespace NHS_CASESTUDIES\ADMIN\BreadCrumbs;



add_filter( 'nightingale_modify_breadcrumb', __NAMESPACE__ . '\add_to_breadcrumbs', 20, 1 );


function add_to_breadcrumbs( $trail ) {


	if( ! ( is_post_type_archive( 'case-studies' ) || is_tax( 'cs_categories' ) || is_singular( 'case-studies' ) )  ) return $trail;


	if ( is_post_type_archive( 'case-studies' ) ){

		return '<li class="nhsuk-breadcrumb__item">' . esc_html( 'Case Studies', 'nhs_cs' ) . '</li>';

	} elseif ( is_tax( 'cs_categories' ) ) {

		global $wp_query;


		$trail = '<li class="nhsuk-breadcrumb__item"><a href="' . esc_url( get_post_type_archive_link( 'case-studies' ) ) . '">' . esc_html( 'Case Studies', 'nhs_cs' ) . '</a></li>';
		$trail .= '<li class="nhsuk-breadcrumb__item">' . esc_html( $wp_query->get_queried_object()->name ) . '</li>';

		return $trail;

	} elseif ( is_singular( 'case-studies' ) ) { 

		$trail = '<li class="nhsuk-breadcrumb__item"><a href="' . esc_url( get_post_type_archive_link( 'case-studies' ) ) . '">' . esc_html( 'Case Studies', 'nhs_cs' ) . '</a></li>';
		$trail .= '<li class="nhsuk-breadcrumb__item">' . esc_html( get_the_title() ) . '</li>';

		return $trail;

	}

    
}