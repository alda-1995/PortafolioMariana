<?php 

function cptui_register_my_cpts_people() {

	/**
	 * Post Type: People.
	 */
	$labels = array(
		"name" => __( "People", "RSAAW" ),
		"singular_name" => __( "People", "RSAAW" ),
		"menu_name" => __( "People", "RSAAW" ),
		"all_items" => __( "All People", "RSAAW" ),
		"add_new" => __( "Add people", "RSAAW" ),
		"add_new_item" => __( "Add new people", "RSAAW" ),
		"edit_item" => __( "Edit people", "RSAAW" ),
		"new_item" => __( "New people", "RSAAW" ),
		"view_item" => __( "View people", "RSAAW" ),
		"view_items" => __( "View people", "RSAAW" ),
		"search_items" => __( "Search people", "RSAAW" ),
		"not_found" => __( "Not results found", "RSAAW" ),
		"not_found_in_trash" => __( "Not found in trash", "RSAAW" ),
		"featured_image" => __( "Featured image", "RSAAW" ),
		"set_featured_image" => __( "Add featured image", "RSAAW" ),
		"remove_featured_image" => __( "Remove featured image", "RSAAW" ),
		"use_featured_image" => __( "Use featured image", "RSAAW" ),
	);

	$args = array(
		"label" => __( "People", "RSAAW" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => array( "slug" => "people", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-buddicons-buddypress-logo",
		"supports" => array( "title", "editor", "custom-fields", "author" ),
	);

	register_post_type( "people", $args );
}

add_action( 'init', 'cptui_register_my_cpts_people' );

?>