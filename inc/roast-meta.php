<?php
/**
 * Theme's common metas
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* call back function */
function cmb2_get_widgets_areas() {

  Redux::init( 'roast_options' );
  global $roast_options;
  $sidebars = $roast_options['roast_widget_areas'];
  $sidebar_areas_id = array();
  /* Add old widget areas to list */
  $sidebar_areas_id['blog-sidebar'] = "Blog Widget";

  foreach($sidebars as $sidebar){
    $sidebar_id = strtolower ( preg_replace('#[ -]+#', '-', $sidebar) );
    $sidebar_areas_id[$sidebar_id] = $sidebar;
  }

  return $sidebar_areas_id;
}

function exclude_from_page_function( $cmb ) {

	$exclude_from = $cmb->prop( 'exclude_from', array() );

  if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
  } elseif ( isset( $_POST['post_ID'] ) ) {
      $post_id = $_POST['post_ID'];
  }

  if ( ! $post_id ) {
      return false;
  }

	$excluded = in_array(get_page_template_slug( $post_id ), $exclude_from, true );
	return ! $excluded;
}


add_action( 'cmb2_admin_init', 'roast_pages_widget' );
function roast_pages_widget(){
  $cmb = new_cmb2_box( array(
    'id'            => 'pages_widget',
    'title'         => 'Sidebar Options',
    'context'       => 'side',
    'object_types'  => array( 'page', 'post' ), // Post type
    'exclude_from' => array( 'template-about.php',  'template-blog.php', 'template-contact.php', 'template-gallery.php', 'template-home.php', 'template-recipe.php' ), // Exclude page template
	  'show_on_cb'   => 'exclude_from_page_function', // function should return a bool value
   ) );

   $cmb->add_field( array(
     'name'       => __( 'Sidebar position', 'roast' ),
     'id'         => 'roast_sidebar_options',
     'default'    => 'sidebar_none',
     'type'       => 'radio_inline',
     'options'          => array(
       'sidebar_none'   => __( 'Disabled', 'roast' ),
       'sidebar_right'  => __( 'Right', 'roast' ),
     ),
   ) );

   $cmb->add_field( array(
     'name'    => __( 'Select Widget Area', 'roast' ),
     'id'      => 'roast_side_widget',
     'type'    => 'select',
     'options_cb' => 'cmb2_get_widgets_areas',
     'attributes' => array(
       'required' => true, // Will be required only if visible.
       'data-conditional-id' => 'roast_sidebar_options',
       'data-conditional-value' => json_encode(array('sidebar_right'))
     )
   ) );
}

/* Meta show on every page */
add_action( 'cmb2_admin_init', 'roast_pages_meta' );

function roast_pages_meta() {

    $cmb = new_cmb2_box( array(
    	'id'            => 'pages_metabox',
    	'title'         => __('Page Header Background', 'roast'),
    	'object_types'  => array( 'page', ), // Post type
  	 ) );

    $cmb->add_field( array(
        'name'    => __('Upload Image', 'roast'),
        'desc'    => __('Upload an image', 'roast'),
        'id'      => 'roast_header_bg',
        'type'    => 'file',
        'options' => array(
            'url' => false, // Hide the text input for the url
        ),
        'text'    => array(
            'add_upload_file_text' => 'Add File' // Change upload button text. Default: "Add or Upload File"
        ),
    ) );

    $cmb->add_field( array(
        'name'    => __('Header Background Height', 'roast'),
        'desc'    => __('Background image height without px.', 'roast'),
        'id'      => 'roast_header_bg_height',
        'type'    => 'text',
        'default' => '270',
    ) );
}
