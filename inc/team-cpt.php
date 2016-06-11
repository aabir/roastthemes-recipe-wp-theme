<?php
/**
 * Team custom post type 
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register Custom Post Type
function register_team_cpt() {

	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'roast' ),
		'singular_name'         => _x( 'Team', 'Post Type Singular Name', 'roast' ),
		'menu_name'             => __( 'Team', 'roast' ),
		'name_admin_bar'        => __( 'Team', 'roast' ),
		'archives'              => __( 'Team Archives', 'roast' ),
		'parent_item_colon'     => __( 'Parent Team:', 'roast' ),
		'all_items'             => __( 'All Team', 'roast' ),
		'add_new_item'          => __( 'Add New Team', 'roast' ),
		'add_new'               => __( 'Add Team', 'roast' ),
		'new_item'              => __( 'New Team', 'roast' ),
		'edit_item'             => __( 'Edit Team', 'roast' ),
		'update_item'           => __( 'Update Team', 'roast' ),
		'view_item'             => __( 'View Team', 'roast' ),
		'search_items'          => __( 'Search Team', 'roast' ),
		'not_found'             => __( 'Not found', 'roast' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'roast' ),
		'featured_image'        => __( 'Featured Image', 'roast' ),
		'set_featured_image'    => __( 'Set featured image', 'roast' ),
		'remove_featured_image' => __( 'Remove featured image', 'roast' ),
		'use_featured_image'    => __( 'Use as featured image', 'roast' ),
		'insert_into_item'      => __( 'Insert into item', 'roast' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'roast' ),
		'items_list'            => __( 'Items list', 'roast' ),
		'items_list_navigation' => __( 'Items list navigation', 'roast' ),
		'filter_items_list'     => __( 'Filter items list', 'roast' ),
	);
	$args = array(
		'label'                 => __( 'Team', 'roast' ),
		'description'           => __( 'Contain Team Information', 'roast' ),
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
		'menu_icon'   					=> 'dashicons-businessman',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'roast_team', $args );

}
add_action( 'init', 'register_team_cpt', 0 );


/* Meta boxes */

add_action( 'cmb2_admin_init', 'metaboxes_for_team' );

/**
 * Define the metabox and field configurations.
 */

function metaboxes_for_team() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = 'roast_team_';

    $cmb = new_cmb2_box( array(
  		'id'            => $prefix . 'team_metabox',
  		'title'         => 'Team Members Information',
  		'object_types'  => array( 'roast_team', ), // Post type
  	) );

		$cmb->add_field( array(
        'name'       => 'Designation',
        'id'         => $prefix . 'designation',
        'type'       => 'text',
    ) );

		$cmb->add_field( array(
        'name'       => 'Email Address',
        'id'         => $prefix . 'email',
        'type'       => 'text',
    ) );

		$cmb->add_field( array(
        'name'       => 'Skype ID',
        'id'         => $prefix . 'skype',
        'type'       => 'text',
    ) );

		$cmb->add_field( array(
        'name'       => 'Facebook Link',
        'id'         => $prefix . 'fb',
        'type'       => 'text',
    ) );

		$cmb->add_field( array(
        'name'       => 'Twitter Link',
        'id'         => $prefix . 'twitter',
        'type'       => 'text',
    ) );

		$cmb->add_field( array(
        'name'       => 'Google Plus Link',
        'id'         => $prefix . 'gplus',
        'type'       => 'text',
    ) );

		$cmb->add_field( array(
        'name'       => 'Pinterest Link',
        'id'         => $prefix . 'pinterest',
        'type'       => 'text',
    ) );

}
