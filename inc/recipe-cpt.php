<?php
/**
 * Recipe custom post type 
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Register Custom Post Type
function register_recipe_cpt() {

	$labels = array(
		'name'                  => _x( 'Recipes', 'Post Type General Name', 'roast' ),
		'singular_name'         => _x( 'Recipe', 'Post Type Singular Name', 'roast' ),
		'menu_name'             => __( 'Recipes', 'roast' ),
		'name_admin_bar'        => __( 'Recipes', 'roast' ),
		'archives'              => __( 'Recipes Archives', 'roast' ),
		'parent_item_colon'     => __( 'Parent Recipe:', 'roast' ),
		'all_items'             => __( 'All Recipes', 'roast' ),
		'add_new_item'          => __( 'Add New Recipe', 'roast' ),
		'add_new'               => __( 'Add New Recipe', 'roast' ),
		'new_item'              => __( 'New Recipe', 'roast' ),
		'edit_item'             => __( 'Edit Recipe', 'roast' ),
		'update_item'           => __( 'Update Recipe', 'roast' ),
		'view_item'             => __( 'View Recipe', 'roast' ),
		'search_items'          => __( 'Search Recipe', 'roast' ),
		'not_found'             => __( 'Not found', 'roast' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'roast' ),
		'featured_image'        => __( 'Featured Image', 'roast' ),
		'set_featured_image'    => __( 'Set featured image', 'roast' ),
		'remove_featured_image' => __( 'Remove featured image', 'roast' ),
		'use_featured_image'    => __( 'Use as featured image', 'roast' ),
		'insert_into_item'      => __( 'Insert into Recipe', 'roast' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Recipe', 'roast' ),
		'items_list'            => __( 'Recipe list', 'roast' ),
		'items_list_navigation' => __( 'Recipe list navigation', 'roast' ),
		'filter_items_list'     => __( 'Filter Recipes list', 'roast' ),
	);
	$args = array(
		'label'                 => __( 'Recipes', 'roast' ),
		'description'           => __( 'Contain Recipes data', 'roast' ),
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
		'menu_icon'   					=> 'dashicons-carrot',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'raost_recipe', $args );

}
add_action( 'init', 'register_recipe_cpt', 0 );

// Register Custom Taxonomy
function roast_recipe_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Recipe Category', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Recipe Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Recipe Category', 'text_domain' ),
		'all_items'                  => __( 'All Recipes', 'text_domain' ),
		'parent_item'                => __( 'Parent Recipe', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Recipe:', 'text_domain' ),
		'new_item_name'              => __( 'New Recipe Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Recipe', 'text_domain' ),
		'edit_item'                  => __( 'Edit Recipe', 'text_domain' ),
		'update_item'                => __( 'Update Recipe', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Recipe with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Recipe', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used Recipe', 'text_domain' ),
		'popular_items'              => __( 'Popular Recipe', 'text_domain' ),
		'search_items'               => __( 'Search Recipe', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Recipe', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'roast_recipe_cat', array( 'raost_recipe' ), $args );

}
add_action( 'init', 'roast_recipe_taxonomy', 0 );


/* Meta boxes */

add_action( 'cmb2_admin_init', 'metaboxes_for_recipe' );

/**
 * Define the metabox and field configurations.
 */

function metaboxes_for_recipe() {

    $cmb = new_cmb2_box( array(
  		'id'            => 'recipe_metabox',
  		'title'         => 'Recipe Information',
  		'object_types'  => array( 'raost_recipe', ), // Post type
  	) );

    $cmb->add_field( array(
        'name'       => 'Ingredient',
        'id'         => 'roast_recipe_ingredient',
        'type'       => 'text',
    ) );

		$cmb->add_field( array(
        'name'       => 'Price',
        'id'         => 'roast_recipe_price',
        'type'       => 'text',
    ) );

		$cmb->add_field( array(
        'name'       => 'Special Recipe?',
        'id'         => 'roast_recipe_special',
        'type'       => 'checkbox',
    ) );
}
