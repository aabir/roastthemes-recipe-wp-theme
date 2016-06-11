<?php
/**
 * sidebar file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
*/

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

$sidebar = get_post_meta( get_the_ID(), 'roast_side_widget', true ); // post and page
$sidebar = getMainColumnSize()['sidebar']; // archives, search, 404 

if( !$sidebar ) $sidebar = 'blog-sidebar';
if( is_active_sidebar($sidebar) ){ ?>
  <div class="widget-area">
    <?php dynamic_sidebar($sidebar); ?>
  </div>
<?php }
