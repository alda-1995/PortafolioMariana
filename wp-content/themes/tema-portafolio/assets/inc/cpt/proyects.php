<?php 

function cptui_register_my_cpts_projects() {

	/**
	 * Post Type: Projects.
	 */
	$labels = array(
		"name" => __( "Projects", "RSAAW" ),
		"singular_name" => __( "Project", "RSAAW" ),
		"menu_name" => __( "Projects", "RSAAW" ),
		"all_items" => __( "All Projects", "RSAAW" ),
		"add_new" => __( "Add project", "RSAAW" ),
		"add_new_item" => __( "Add new project", "RSAAW" ),
		"edit_item" => __( "Edit project", "RSAAW" ),
		"new_item" => __( "New project", "RSAAW" ),
		"view_item" => __( "View project", "RSAAW" ),
		"view_items" => __( "View project", "RSAAW" ),
		"search_items" => __( "Search project", "RSAAW" ),
		"not_found" => __( "Not results found", "RSAAW" ),
		"not_found_in_trash" => __( "Not found in trash", "RSAAW" ),
		"featured_image" => __( "Featured image", "RSAAW" ),
		"set_featured_image" => __( "Add featured image", "RSAAW" ),
		"remove_featured_image" => __( "Remove featured image", "RSAAW" ),
		"use_featured_image" => __( "Use featured image", "RSAAW" ),
	);

	$args = array(
		"label" => __( "Projects", "RSAAW" ),
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
		"hierarchical" => false,
		"rewrite" => array( "slug" => "projects", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-portfolio",
		"supports" => array( "title", "editor", "custom-fields", "author", "tag" ),
	);

	register_post_type( "projects", $args );
}

add_action( 'init', 'cptui_register_my_cpts_projects' );

add_action( 'init', 'crear_art_taxonomy' );
function crear_art_taxonomy() {
  register_taxonomy(
    'tags-projects', // Nombre de la taxonomía
    'projects', // Nombre del post type que se le asignará
    array(
      'label' => __( 'Tags' ),
      'rewrite' => array( 'slug' => 'tags-projects' ),
      'hierarchical' => false,
    )
  );
}
?>