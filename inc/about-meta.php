<?php
/**
 * About template meta
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'cmb2_admin_init', 'roast_about_template_meta' );

/**Define the metabox and field configurations.*/

function roast_about_template_meta() {

   $prefix = "roast_";

   $cmb = new_cmb2_box( array(
  		'id'            => 'about_metabox',
  		'title'         => 'About Page Settings',
  		'object_types'  => array( 'page', ), // Post type
		'show_on'       => array( 'key' => 'page-template', 'value' => 'template-about.php' ),
  	) );

   $cmb->add_field( array(
      'name' => 'Full Width Image Section',
      'desc' => 'Upload a image for full width section.',
      'id'   => $prefix . 'about_full_image',
		'type'    => 'file',
      'options' => array(
       'url' => false,
      ),
      'text'    => array(
         'add_upload_file_text' => 'Add File'
      ),
   ) );

   $cmb->add_field( array(
      'name' => 'Content on Full Width Image',
      'desc' => 'Write content to show on full width image.',
      'id'   => $prefix . 'about_full_content',
      'type' => 'wysiwyg',
      'options'  => array(
         'media_buttons' => false,
         'textarea_rows' => get_option('default_post_edit_rows', 10),
      )
   ) );

   $cmb->add_field( array(
      'name' => 'Show Team Profile at Below',
      'desc' => 'Check to show team profile ',
      'id'   => $prefix . 'show_team',
      'type' => 'radio_inline',
      'default' => 'no',
      'options'          => array(
			'yes'   => __( 'Yes', 'cmb2' ),
			'no'  => __( 'No', 'cmb2' ),
		),
   ) );

	 $cmb->add_field( array(
			 'name'       => 'Team Title',
			 'id'         => $prefix . 'team_title',
			 'type'       => 'text',
			 'attributes' => array(
           'data-conditional-id' => $prefix . 'show_team',
           'data-conditional-value' => 'yes'
       )
	 ) );

   $cmb->add_field( array(
      'name'    => __( 'Number of Team Profile to Show', 'cmb2' ),
      'desc'    => __( 'How many team profile will show', 'cmb2' ),
      'id'      => $prefix . 'team_profile_no',
      'type'    => 'text',
      'default'   => '4',
      'attributes' => array(
          'data-conditional-id' => $prefix . 'show_team',
          'data-conditional-value' => 'yes'
      )
   ) );
}
