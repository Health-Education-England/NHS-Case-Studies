<?php

namespace NHS_CASESTUDIES\ADMIN\Custom_Taxonomy;

add_action( 'init', __NAMESPACE__ . '\case_studies_categories' );

// Register Custom Taxonomy
function case_studies_categories() {

	$labels = array(
		'name'                       => _x( 'Case Studies Categories', 'Taxonomy General Name', 'nhs_cs' ),
		'singular_name'              => _x( 'Case Studies Category', 'Taxonomy Singular Name', 'nhs_cs' ),
		'menu_name'                  => __( 'Case Studies Categories', 'nhs_cs' ),
		'all_items'                  => __( 'All Items', 'nhs_cs' ),
		'parent_item'                => __( 'Parent Item', 'nhs_cs' ),
		'parent_item_colon'          => __( 'Parent Item:', 'nhs_cs' ),
		'new_item_name'              => __( 'New Item Name', 'nhs_cs' ),
		'add_new_item'               => __( 'Add New Item', 'nhs_cs' ),
		'edit_item'                  => __( 'Edit Item', 'nhs_cs' ),
		'update_item'                => __( 'Update Item', 'nhs_cs' ),
		'view_item'                  => __( 'View Item', 'nhs_cs' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'nhs_cs' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'nhs_cs' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'nhs_cs' ),
		'popular_items'              => __( 'Popular Items', 'nhs_cs' ),
		'search_items'               => __( 'Search Items', 'nhs_cs' ),
		'not_found'                  => __( 'Not Found', 'nhs_cs' ),
		'no_terms'                   => __( 'No items', 'nhs_cs' ),
		'items_list'                 => __( 'Items list', 'nhs_cs' ),
		'items_list_navigation'      => __( 'Items list navigation', 'nhs_cs' ),
	);
	$rewrite = array(
		'slug'                       => 'case-study',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);

	register_taxonomy( 'cs_categories', array( 'case-studies' ), $args );

}