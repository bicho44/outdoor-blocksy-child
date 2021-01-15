<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
});


// Custom Post type para el Menu
if ( ! function_exists('gahan_menu') ) {

	// Register Custom Post Type
	function gahan_menu() {
	
		$labels = array(
			'name'                  => _x( 'Restaurant Items', 'Post Type General Name', 'imgd' ),
			'singular_name'         => _x( 'Restaurant Item', 'Post Type Singular Name', 'imgd' ),
			'menu_name'             => __( 'Restaurant', 'imgd' ),
			'name_admin_bar'        => __( 'Restaurant', 'imgd' ),
			'archives'              => __( 'Archivo de Items', 'imgd' ),
			'attributes'            => __( 'Atributos de los items', 'imgd' ),
			'parent_item_colon'     => __( 'item Padre', 'imgd' ),
			'all_items'             => __( 'Todos los Items', 'imgd' ),
			'add_new_item'          => __( 'Agrega un Nuevo Item', 'imgd' ),
			'add_new'               => __( 'Agregar Nuevo', 'imgd' ),
			'new_item'              => __( 'Nuevo Item', 'imgd' ),
			'edit_item'             => __( 'Editar Item', 'imgd' ),
			'update_item'           => __( 'Actualizar Item', 'imgd' ),
			'view_item'             => __( 'Ver Item', 'imgd' ),
			'view_items'            => __( 'Ver Items', 'imgd' ),
			'search_items'          => __( 'Buscar Item', 'imgd' ),
			'not_found'             => __( 'No encontrado', 'imgd' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'imgd' ),
			'featured_image'        => __( 'Imagen principal', 'imgd' ),
			'set_featured_image'    => __( 'Asignar Una Imagen principal', 'imgd' ),
			'remove_featured_image' => __( 'Borrar Imagen Principal', 'imgd' ),
			'use_featured_image'    => __( 'Usar la Imagen Principal', 'imgd' ),
			'insert_into_item'      => __( 'Insert into item', 'imgd' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'imgd' ),
			'items_list'            => __( 'Items list', 'imgd' ),
			'items_list_navigation' => __( 'Items list navigation', 'imgd' ),
			'filter_items_list'     => __( 'Filter items list', 'imgd' ),
		);
		$rewrite = array(
			'slug'                  => 'restaurant',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Restaurant Item', 'imgd' ),
			'description'           => __( 'Menu para el Bar', 'imgd' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor','excerpt', 'thumbnail', 'custom-fields' ),
			'taxonomies'            => array( 'seccion' ),
			'hierarchical'          => true,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-beer',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'imgd_restaurant', $args );
	
	}
	add_action( 'init', 'gahan_menu', 0 );
	
}

if ( ! function_exists( 'imgd_seccion' ) ) {

	// Register Custom Taxonomy
	function imgd_seccion() {
	
		$labels = array(
			'name'                       => _x( 'Secciones', 'Taxonomy General Name', 'imgd' ),
			'singular_name'              => _x( 'Seccion', 'Taxonomy Singular Name', 'imgd' ),
			'menu_name'                  => __( 'Secciones', 'imgd' ),
			'all_items'                  => __( 'Todas las Secciones', 'imgd' ),
			'parent_item'                => __( 'Seccion Padre', 'imgd' ),
			'parent_item_colon'          => __( 'Seccion Padre:', 'imgd' ),
			'new_item_name'              => __( 'Nombre de la Sección', 'imgd' ),
			'add_new_item'               => __( 'Agrega una Nueva Seccion', 'imgd' ),
			'edit_item'                  => __( 'Editar Sección', 'imgd' ),
			'update_item'                => __( 'Actualizar Sección', 'imgd' ),
			'view_item'                  => __( 'Ver Sección', 'imgd' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'imgd' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'imgd' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'imgd' ),
			'popular_items'              => __( 'Popular Items', 'imgd' ),
			'search_items'               => __( 'Search Items', 'imgd' ),
			'not_found'                  => __( 'Not Found', 'imgd' ),
			'no_terms'                   => __( 'No items', 'imgd' ),
			'items_list'                 => __( 'Items list', 'imgd' ),
			'items_list_navigation'      => __( 'Items list navigation', 'imgd' ),
		);
		$rewrite = array(
			'slug'                       => 'seccion',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'imgd_seccion', array( 'imgd_restaurant' ), $args );
	
	}
	add_action( 'init', 'imgd_seccion', 0 );
	
	}