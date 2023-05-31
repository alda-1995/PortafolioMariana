<?php 

function cptui_register_location_tax() {

	/**
	 * Taxonomy: Location.
	 */

	$labels = array(
		"name" => __( "Location", "RSAAW" ),
		"singular_name" => __( "Location", "RSAAW" ),
		"menu_name" => __( "Location", "RSAAW" ),
		"all_items" => __( "All Location", "RSAAW" ),
		"edit_item" => __( "Edit", "RSAAW" ),
		"view_item" => __( "View", "RSAAW" ),
		"update_item" => __( "Update", "RSAAW" ),
		"add_new_item" => __( "Add new Location", "RSAAW" ),
		"new_item_name" => __( "New", "RSAAW" ),
		"search_items" => __( "Search", "RSAAW" ),
		"popular_items" => __( "Popular Location", "RSAAW" ),
		"not_found" => __( "Not results found", "RSAAW" ),
	);

	$args = array(
		"label" => __( "Location", "RSAAW" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'location', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "location",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => true,
		);
	register_taxonomy( "location", array( "projects" ), $args );
}
add_action( 'init', 'cptui_register_location_tax' );
?>