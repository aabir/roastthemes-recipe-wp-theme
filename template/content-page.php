<?php
/**
 *  Page template part
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

 //File Security Check
 if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<article id="post-<?php the_ID(); ?>">

		<h2 class="top"><?php the_title(); ?></h2>

		<?php
		$thumb = get_post_thumbnail_id();
	  $image_title = get_post(get_post_thumbnail_id())->post_title;
		if($thumb): ?>

		 <img src="<?php echo $img_url = wp_get_attachment_url( $thumb,'full'); ?>" class="img-responsive" alt="<?php echo $image_title; ?>" >

		<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->

		<div class="clearfix"></div>

</article><!-- #post-## -->
