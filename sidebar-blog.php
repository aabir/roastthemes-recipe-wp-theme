<?php
/**
 * Sidebar for default blog 
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

if( is_active_sidebar('blog-sidebar') ){ ?>
  <div class="widget-area">
    <?php dynamic_sidebar('blog-sidebar'); ?>
  </div>
<?php }
