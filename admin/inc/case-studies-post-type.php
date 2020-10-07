<?php

namespace NHS_CASESTUDIES\ADMIN\CustomPostType;


add_action( 'init', __NAMESPACE__ . '\create_case_studies_post_type' );


function create_case_studies_post_type() {
    
    $case_studies_labels = array(
        'name'               => 'Case Studies',
        'singular_name'      => 'Study',
        'menu_name'          => 'Case Studies',
        'name_admin_bar'     => 'Case Studies',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Study',
        'new_item'           => 'New Study',
        'edit_item'          => 'Edit Study',
        'view_item'          => 'View Study',
        'all_items'          => 'All Case Studies',
        'search_items'       => 'Search Case Studies',
        'parent_item_colon'  => 'Parent Study',
        'not_found'          => 'No Case Studies Found',
        'not_found_in_trash' => 'No Case Studies Found in Trash'
    );

    $case_studies_args = array(
        'labels'              => $case_studies_labels,
        'public'              => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-appearance',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'         => true,
        'rewrite'             => array( 'slug' => 'case-studies' ),
        'query_var'           => true
    );

    register_post_type( 'case-studies', $case_studies_args );
}
