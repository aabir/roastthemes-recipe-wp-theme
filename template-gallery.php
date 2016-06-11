<?php
/* Template Name: Gallery Template */

/**
 * Gallery template file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<div class="gallery">
	  <div class="container">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		 	<h2><?php the_title(); ?></h2>
		 	<div class="center-content">
				<?php the_content(); ?>
		 	</div>
	 	<?php endwhile; endif; ?>
		 <?php $roast_gallery_images = get_post_meta( get_the_ID(), 'roast_gallery_images', 1 );
		 				if($roast_gallery_images): $i = 1; ?>
		 <div class="gallery-bottom">
					<?php foreach ( (array) $roast_gallery_images as $attachment_id => $attachment_url ):
						$attachment = get_post( $attachment_id ); // to get image info. ?>
						<?php if( $i%4 == 1 ){ echo '<div class="gallery-1">'; } // echo gallery-1 class after 4 items. ?>
						<div class="col-md-3 gallery-grid">
							<a class="pop-gallery" href="<?php echo $attachment_url; ?>" rel="gallery" title="<?php echo $attachment->post_excerpt; ?>">
								<img src="<?php echo $attachment_url; ?>" alt="<?php echo $attachment->post_title; ?>" />
							</a>
						</div>

					<?php if(( $i%4 == 0 )){
							echo '<div class="clearfix"></div>';
							echo '</div>';
					}
				$i++;  endforeach;
				if ($i%4 != 1) echo "</div>"; ?>
		 </div>
		 <?php endif; ?>
	 </div>
</div>

<?php get_footer(); ?>
