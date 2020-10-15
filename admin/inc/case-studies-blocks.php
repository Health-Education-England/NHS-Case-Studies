<?php

add_action( 'init', 'case_studies_block' );

function case_studies_block(){

	$blocks = [
		'nhs-cs/casestudies'
	];

	foreach ( $blocks as $block ):

		register_block_type(
			$block,
			array(
				'attributes'      => array(
					'tax'    => array(
						'type' => 'number',
					),
					'title'     => array(
						'type' => 'string',
					),
					'backend'  => array(
						'type' => 'boolean',
					),
					'url'     => array(
						'type' => 'string',
					),
					'urlTxt'     => array(
						'type' => 'string',
					),
				),
				'render_callback' => function( array $attributes, string $content = null ) use ( $block ) {

				return template_part_block_renderer( $block, $attributes, $content );
				},
			)
		);

	endforeach;

}




function template_part_block_renderer( $name, $attributes, $content ){

	$template_name = str_replace( '/', '-', $name );

	$template = \NHS_CASESTUDIES\SetUp\get_plugin_directory() . '/public/templates/' . $template_name . '.php';

	ob_start();
	load_template( $template, false, $attributes );
	$output = ob_get_clean();

	return $output;
}