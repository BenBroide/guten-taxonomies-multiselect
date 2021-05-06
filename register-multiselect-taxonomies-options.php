<?php
// Uncomment the code to show post demo fields in post type "Post"
// add_filter( 'gtmu_register_multiselect_taxonomies_options', 'gtmu_taxonomies_options' );

// add_action( 'init', 'register_taxonomy_articles_element' );

// function register_taxonomy_articles_element() {
//
//     $labels = array(
//         'name' => _x( 'Elements', 'articles_element' ),
//         'singular_name' => _x( 'Element', 'articles_element' ),
//         'search_items' => _x( 'Search Elements', 'articles_element' ),
//         'popular_items' => _x( 'Popular Elements', 'articles_element' ),
//         'all_items' => _x( 'All Elements', 'articles_element' ),
//         'parent_item' => _x( 'Parent Element', 'articles_element' ),
//         'parent_item_colon' => _x( 'Parent Element:', 'articles_element' ),
//         'edit_item' => _x( 'Edit Element', 'articles_element' ),
//         'update_item' => _x( 'Update Element', 'articles_element' ),
//         'add_new_item' => _x( 'Add New Element', 'articles_element' ),
//         'not_found' => _x( 'No Elements found', 'articles_element' ),
//         'new_item_element' => _x( 'New Element', 'articles_element' ),
//         'separate_items_with_commas' => _x( 'Separate Elements with commas', 'articles_element' ),
//         'add_or_remove_items' => _x( 'Add or remove elements', 'articles_element' ),
//         'choose_from_most_used' => _x( 'Choose from the most used elements', 'articles_element' ),
//         'menu_name' => _x( 'Elements', 'articles_element' ),
//         'add_or_edit_item' => _x( 'To edit or add Elements click here', 'articles_element' ),
//     );
//
//     $args = array(
//         'labels' => $labels,
//         'public' => true,
//         'publicly_queryable' => true,
//         'show_in_nav_menus' => true,
//         'show_in_rest' => true,
//         'show_ui' => true,
//         'show_tagcloud' => true,
//         'hierarchical' => true,
//         'rewrite' => true,
//         'query_var' => true,
//     );
//
//     register_taxonomy( 'element', array('post'), $args );
// }
//
// // add_action( 'init', 'register_taxonomy_promo_type' );
//
// function register_taxonomy_promo_type() {
//
//     $labels = array(
//         'name' => _x( 'Promo Types', 'articles_element' ),
//         'singular_name' => _x( 'Promo Type', 'articles_element' ),
//         'search_items' => _x( 'Search Promo Types', 'articles_element' ),
//         'popular_items' => _x( 'Popular Promo Types', 'articles_element' ),
//         'all_items' => _x( 'All Promo Types', 'articles_element' ),
//         'parent_item' => _x( 'Parent Promo Type', 'articles_element' ),
//         'parent_item_colon' => _x( 'Parent Promo Type:', 'articles_element' ),
//         'edit_item' => _x( 'Edit Promo Type', 'articles_element' ),
//         'update_item' => _x( 'Update Promo Type', 'articles_element' ),
//         'add_new_item' => _x( 'Add New Promo Type', 'articles_element' ),
//         'not_found' => _x( 'No Promo Types found', 'articles_element' ),
//         'new_item_element' => _x( 'New Promo Type', 'articles_element' ),
//         'separate_items_with_commas' => _x( 'Separate Promo Types with commas', 'articles_element' ),
//         'add_or_remove_items' => _x( 'Add or remove promo types', 'articles_element' ),
//         'choose_from_most_used' => _x( 'Choose from the most used promo types', 'articles_element' ),
//         'menu_name' => _x( 'Promo Types', 'articles_element' ),
//         'add_or_edit_item' => _x( 'To edit or add Promo Types click here', 'articles_element' ),
//     );
//
//     $args = array(
//         'labels' => $labels,
//         'public' => true,
//         'publicly_queryable' => true,
//         'show_in_nav_menus' => true,
//         'show_in_rest' => true,
//         'show_ui' => true,
//         'show_tagcloud' => true,
//         'hierarchical' => true,
//         'rewrite' => true,
//         'query_var' => true,
//     );
//
//     register_taxonomy( 'promo_type', array('post'), $args );
// }
//

// Register operator fields
// function gtmu_taxonomies_options() {
// 	$taxonomies_options = [
// 		'element' => [
// 			'post_type' => 'post',
// 			'is_multiple' => true
// 		],
// 		'promo_type' => [
// 			'post_type' => 'post',
// 			'is_multiple' => true
// 		]
// 	];
//
// 	return $taxonomies_options;
// }
