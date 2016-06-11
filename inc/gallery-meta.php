<?php
/**
 * Gallery template meta
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'cmb2_admin_init', 'roast_gallery_template_meta' );

/** Define the metabox and field configurations. **/

function roast_gallery_template_meta() {

    $cmb = new_cmb2_box( array(
  		'id'            => 'gallery_metabox',
  		'title'         => 'Gallery Images',
  		'object_types'  => array( 'page', ), // Post type
		'show_on'       => array( 'key' => 'page-template', 'value' => 'template-gallery.php' ),
  	 ) );

   $cmb->add_field( array(
       'name' => 'Upload Gallery Images',
       'desc' => '',
       'id'   => 'roast_gallery_images',
       'type' => 'file_list',
       'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
       // Optional, override default text strings
       'text' => array(
           'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
           'remove_image_text' => 'Replacement', // default: "Remove Image"
           'file_text' => 'Replacement', // default: "File:"
           'file_download_text' => 'Replacement', // default: "Download"
           'remove_text' => 'Replacement', // default: "Remove"
       ),
   ) );
}
