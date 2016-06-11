<?php
/**
 * Service custom post type
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register Custom Post Type
function register_service_cpt() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'roast' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'roast' ),
		'menu_name'             => __( 'Services', 'roast' ),
		'name_admin_bar'        => __( 'Service', 'roast' ),
		'archives'              => __( 'Service Archives', 'roast' ),
		'parent_item_colon'     => __( 'Parent Service:', 'roast' ),
		'all_items'             => __( 'All Services', 'roast' ),
		'add_new_item'          => __( 'Add New Service', 'roast' ),
		'add_new'               => __( 'Add New Service', 'roast' ),
		'new_item'              => __( 'New Service', 'roast' ),
		'edit_item'             => __( 'Edit Service', 'roast' ),
		'update_item'           => __( 'Update Service', 'roast' ),
		'view_item'             => __( 'View Service', 'roast' ),
		'search_items'          => __( 'Search Service', 'roast' ),
		'not_found'             => __( 'Not found', 'roast' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'roast' ),
		'featured_image'        => __( 'Featured Image', 'roast' ),
		'set_featured_image'    => __( 'Set featured image', 'roast' ),
		'remove_featured_image' => __( 'Remove featured image', 'roast' ),
		'use_featured_image'    => __( 'Use as featured image', 'roast' ),
		'insert_into_item'      => __( 'Insert into item', 'roast' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Service', 'roast' ),
		'items_list'            => __( 'Service list', 'roast' ),
		'items_list_navigation' => __( 'Items list navigation', 'roast' ),
		'filter_items_list'     => __( 'Filter items list', 'roast' ),
	);
	$args = array(
		'label'                 => __( 'Service', 'roast' ),
		'description'           => __( 'Contain Service data', 'roast' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'menu_icon'   					=> 'dashicons-hammer',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'roast_services', $args );

}
add_action( 'init', 'register_service_cpt', 0 );


/* Meta boxes */
add_action( 'cmb2_admin_init', 'metaboxes_for_service' );

/**
 * Define the metabox and field configurations.
 */

function metaboxes_for_service() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'roast_';

    $cmb = new_cmb2_box( array(
  		'id'            => $prefix . 'service_metabox',
  		'title'         => 'Service Icons',
  		'object_types'  => array( 'roast_services', ), // Post type
			'context'    => 'side',
  	) );

		$cmb->add_field( array(
		  'name'        => __( 'Select Icon', 'roast' ),
		  'id'          => $prefix . 'service_icon',
		  'type'        => 'fontawesome_icon', // This field type
		) );
}
