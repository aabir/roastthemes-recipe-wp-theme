<?php
/**
 * Footer file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $roast_options; ?>

<div class="footer">
	 <div class="container">
		 <div class="footer-sec">

			 <?php get_sidebar('footer'); ?>

			 <div class="clearfix"></div>
     	 </div>
	 </div>
</div>
<?php if($roast_options['footer_copyright']) : ?>
<div class="copywrite">
	<div class="container">
		<p> <?php echo $roast_options['footer_copyright']; ?> </p>
	</div>
</div>
<?php endif; ?>
<a href="#" class="scrollup">Scroll</a>
<?php echo @$roast_options['google_analytics']; ?>
<?php wp_footer(); ?>
</body>
</html>
