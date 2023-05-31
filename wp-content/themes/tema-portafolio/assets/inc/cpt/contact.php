<?php 

function cptui_register_emails_contact() {

	/**
	 * Post Type: Contact emails.
	 */
	$labels = array(
		"name" => __( "Contact emails", "RSAAW" ),
		"singular_name" => __( "contact email", "RSAAW" ),
		"menu_name" => __( "Contact emails", "RSAAW" ),
		"all_items" => __( "All Contact emails", "RSAAW" ),
		"add_new" => __( "Add contact email", "RSAAW" ),
		"add_new_item" => __( "Add new email", "RSAAW" ),
		"edit_item" => __( "Edit contact email", "RSAAW" ),
		"new_item" => __( "New contact email", "RSAAW" ),
		"view_item" => __( "View contact email", "RSAAW" ),
		"view_items" => __( "View contact email", "RSAAW" ),
		"search_items" => __( "Search contact email", "RSAAW" ),
		"not_found" => __( "Not results found", "RSAAW" ),
		"not_found_in_trash" => __( "Not found in trash", "RSAAW" ),
		"featured_image" => __( "Featured image", "RSAAW" ),
		"set_featured_image" => __( "Add featured image", "RSAAW" ),
		"remove_featured_image" => __( "Remove featured image", "RSAAW" ),
		"use_featured_image" => __( "Use featured image", "RSAAW" ),
	);

	$args = array(
		"label" => __( "Contact emails", "RSAAW" ),
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
		"rewrite" => array( "slug" => "emails-contact", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-portfolio",
		"supports" => array( "title", "editor", "custom-fields", "author" ),
	);

	register_post_type( "emails-contact", $args );
}

add_action( 'init', 'cptui_register_emails_contact' );
?>