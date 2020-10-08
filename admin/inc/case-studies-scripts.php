<?php

namespace NHS_CASESTUDIES\ADMIN\ScriptsStyles;


add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\admin_scripts_styles' );


function admin_scripts_styles(){

	$block_path = '/admin/js/editor.blocks.js';
	$style_path = '/admin/css/blocks.editor.css';

	// Enqueue the bundled block JS file
	wp_enqueue_script(
		'nhs_cs-blocks-js',
		\NHS_CASESTUDIES\SetUp\get_plugin_url() . $block_path,
		[ 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' ],
		filemtime( \NHS_CASESTUDIES\SetUp\get_plugin_directory() . $block_path )
	);

	// Enqueue optional editor only styles
	// wp_enqueue_style(
	// 	'nhs_cs-blocks-editor-css',
	// 	get_plugin_url() . $style_path,
	// 	[ ],
	// 	filemtime( \NHS_CASESTUDIES\SetUp\get_plugin_directory() . $style_path )
	// );

}