<?php 

function cptui_register_my_cpts_projects() {

	/**
	 * Post Type: Proyectos.
	 */
	$labels = array(
		"name" => __( "Proyectos", "Portafolio Mariana" ),
		"singular_name" => __( "Proyecto", "Portafolio Mariana" ),
		"menu_name" => __( "Proyectos", "Portafolio Mariana" ),
		"all_items" => __( "All Proyectos", "Portafolio Mariana" ),
		"add_new" => __( "Agregar proyecto", "Portafolio Mariana" ),
		"add_new_item" => __( "Agregar nuevo proyecto", "Portafolio Mariana" ),
		"edit_item" => __( "Editar proyecto", "Portafolio Mariana" ),
		"new_item" => __( "Nuevo proyecto", "Portafolio Mariana" ),
		"view_item" => __( "Ver proyecto", "Portafolio Mariana" ),
		"view_items" => __( "Ver proyectos", "Portafolio Mariana" ),
		"search_items" => __( "Buscar proyecto", "Portafolio Mariana" ),
		"not_found" => __( "No se encontro resultados", "Portafolio Mariana" ),
		"not_found_in_trash" => __( "No se encontro en la basura", "Portafolio Mariana" ),
		"featured_image" => __( "Imagen destacada", "Portafolio Mariana" ),
		"set_featured_image" => __( "Agregar imagen destacada", "Portafolio Mariana" ),
		"remove_featured_image" => __( "Eliminar imagen destacada", "Portafolio Mariana" ),
		"use_featured_image" => __( "Usar imagen destacada", "Portafolio Mariana" ),
	);

	$args = array(
		"label" => __( "Proyectos", "Portafolio Mariana" ),
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
?>