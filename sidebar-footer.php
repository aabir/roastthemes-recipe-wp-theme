<?php
/**
 * Sidebar for footer widgets
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

if( is_active_sidebar('footer-sidebar') ){ ?>
  <div class="footer-widget-area">
    <?php dynamic_sidebar('footer-sidebar'); ?>
  </div>
<?php }
