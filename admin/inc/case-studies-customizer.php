<?php

namespace NHS_CASESTUDIES\ADMIN\Customizer;

add_action( 'customize_register', __NAMESPACE__ . '\add_sidebar_settings' );

function add_sidebar_settings( $wp_customize ){

	$wp_customize->add_section(
		'section_case_studies',
		array(
			'title'       => esc_html__( 'Case Studies', 'nightingale' ),
			'description' => esc_attr__( 'Customise your header display', 'nightingale' ),
			'priority'    => 160,
			'capability'  => 'edit_theme_options',
		)
	);


	$wp_customize->add_setting(
	// $id
		'cs_sidebar',
		// $args
		array(
			'default'           => 'true',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'nightingale_sanitize_select',
		)
	);

	$wp_customize->add_control(
	// $id
		'cs_sidebar',
		// $args
		array(
			'settings'    => 'cs_sidebar',
			'section'     => 'section_case_studies',
			'type'        => 'radio',
			'label'       => esc_html__( 'Display Case Studies Sidebar', 'nhs_cs' ),
			'description' => esc_html__( 'Choose whether or not to display the sidebar on the Case Studies page', 'nhs_cs' ),
			'choices'     => array(
				'true'  => esc_html__( 'Sidebar', 'nhs_cs' ),
				'false' => esc_html__( 'No Sidebar', 'nhs_cs' ),
			),
		)
	);
};