=== Guten Taxonomies Multiselect UI ===

Convert Gutenberg taxonomies UI to multiselect

== Description ==

This plugin replaces Gutenberg taxonomies UI with React multiselect.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/guten-taxonomies-multiselect-ui` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress

== How to use ==

Add similar code in your functions.php or your plugin

```php
// Inner Array key (element/listing) in the demo code is the taxonomy slug
function gtmu_taxonomies_options($taxonomies_options) {
	$taxonomies_options = [
		'element' => [
			'post_type' => 'post',
			'is_multiple' => false
		],
		'listing' => [
			'post_type' => 'post',
			'is_multiple' => true
		]
	];

	return $taxonomies_options;
}
add_filter( 'gtmu_register_multiselect_taxonomies_options', 'gtmu_taxonomies_options' );
```

Note: The plugin does not work with hierarchical taxonomies