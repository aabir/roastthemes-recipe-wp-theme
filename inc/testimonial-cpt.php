<?php
/**
 * Testimonial custom post type 
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register Custom Post Type
function register_testimonial_cpt() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'roast' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'roast' ),
		'menu_name'             => __( 'Testimonials', 'roast' ),
		'name_admin_bar'        => __( 'Testimonials', 'roast' ),
		'archives'              => __( 'Testimonials Archives', 'roast' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'roast' ),
		'all_items'             => __( 'All Testimonials', 'roast' ),
		'add_new_item'          => __( 'Add New Testimonial', 'roast' ),
		'add_new'               => __( 'Add New Testimonial', 'roast' ),
		'new_item'              => __( 'New Testimonial', 'roast' ),
		'edit_item'             => __( 'Edit Testimonial', 'roast' ),
		'update_item'           => __( 'Update Testimonial', 'roast' ),
		'view_item'             => __( 'View Testimonial', 'roast' ),
		'search_items'          => __( 'Search Testimonial', 'roast' ),
		'not_found'             => __( 'Not found', 'roast' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'roast' ),
		'featured_image'        => __( 'Featured Image', 'roast' ),
		'set_featured_image'    => __( 'Set featured image', 'roast' ),
		'remove_featured_image' => __( 'Remove featured image', 'roast' ),
		'use_featured_image'    => __( 'Use as featured image', 'roast' ),
		'insert_into_item'      => __( 'Insert into Testimonial', 'roast' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'roast' ),
		'items_list'            => __( 'Testimonial list', 'roast' ),
		'items_list_navigation' => __( 'Testimonial list navigation', 'roast' ),
		'filter_items_list'     => __( 'Filter Testimonials list', 'roast' ),
	);
	$args = array(
		'label'                 => __( 'Testimonials', 'roast' ),
		'description'           => __( 'Contain Testimonials data', 'roast' ),
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
		'menu_icon'   					=> 'dashicons-money',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'roast_testimonial', $args );

}
add_action( 'init', 'register_testimonial_cpt', 0 );

/* Meta boxes */

add_action( 'cmb2_admin_init', 'metaboxes_for_testimonial' );

/**
 * Define the metabox and field configurations.
 */

function metaboxes_for_testimonial() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'roast_';

    $cmb = new_cmb2_box( array(
  		'id'            => $prefix . 'testimonial_metabox',
  		'title'         => 'Testimonial Information',
  		'object_types'  => array( 'roast_testimonial', ), // Post type
  	) );

    $cmb->add_field( array(
        'name'       => 'Designation',
        'id'         => $prefix . 'testimonial_designation',
        'type'       => 'text',
    ) );
		$cmb->add_field( array(
        'name'       => 'Web URL',
        'id'         => $prefix . 'testimonial_url',
        'type'       => 'text',
    ) );
}
