<?php
/**
 * Plugin Name:       Guten Taxonomies Multiselect UI
 * Description:       Example block written with ESNext standard and JSX support – build step required.
 * Requires at least: 5.7
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       guten-taxonomies-multiselect-ui
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/tutorials/block-tutorial/writing-your-first-block-type/
 */
function create_block_guten_taxonomies_multiselect_ui_block_init() {
	register_block_type_from_metadata( __DIR__ );
}
add_action('rest_api_init', 'create_block_guten_taxonomies_multiselect_ui_block_init');

include('register-multiselect-taxonomies-options.php');

function gtmu_load_scripts() {
	$dir = __DIR__;

	$script_asset_path = "$dir/build/index.asset.php";
	if ( ! file_exists( $script_asset_path ) ) {
		throw new Error(
			'You need to run `npm start` or `npm run build` for the "create-block/guten-taxonomies-multiselect-ui" block first.'
		);
	}
	$index_js     = 'build/index.js';
	$script_asset = require( $script_asset_path );
	wp_register_script(
		'gtmu-script',
		plugins_url( $index_js, __FILE__ ),
		$script_asset['dependencies'],
		$script_asset['version']
	);

	$taxonomiesMultiSelectData = apply_filters('gtmu_register_multiselect_taxonomies_options', []);

	wp_localize_script('gtmu-script', 'taxonomiesMultiSelectData', $taxonomiesMultiSelectData);

	wp_enqueue_script('gtmu-script');
}

add_action('admin_enqueue_scripts', 'gtmu_load_scripts');

