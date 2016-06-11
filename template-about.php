<?php
/* Template Name: About Template */

/**
 * About template file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<?php if( have_posts() ): while( have_posts() ): the_post() ?>

<div class="about">
	 <div class="container">
		 <h2><?php the_title(); ?></h2>
		 <div class="about-info-grids">
			 <?php $thumb = get_post_thumbnail_id();
			 	$image_title = get_post(get_post_thumbnail_id())->post_title; ?>

			 <div class="col-md-<?php echo ($thumb) ? '7' : '12'; ?> abt-info-pic">
				 <?php the_content(); ?>
			 </div>

				<?php if($thumb): ?>
			 	<div class="col-md-5 abt-pic">
					<img src="<?php echo $img_url = wp_get_attachment_url( $thumb, 'full' ); ?>" alt="<?php echo $image_title; ?>" class="img-responsive" />
			 	</div>
		 		<?php endif; ?>
			 <div class="clearfix"></div>
		 </div>
	 </div>
	 <!---728x90--->
	 <?php $raost_about_full_image = get_post_meta( get_the_ID(), 'roast_about_full_image', true );
	 if( $raost_about_full_image ): ?>
	 <style>.about-slid { background: url( <?php echo $raost_about_full_image ?> ) no-repeat 0px 0px; background-size: cover; }</style>

	 <div class="about-slid">
			<div class="container">
				<div class="about-slid-info">
					<?php echo get_post_meta( get_the_ID(), 'roast_about_full_content', true )?>
				</div>
			</div>
	 </div>
 <?php endif; ?> <!-- end full screen image -->

<?php $page_id = $post->ID; endwhile; endif; ?> <!-- while loop end -->

<?php $show_team = get_post_meta( $page_id, 'roast_show_team', true );
if($show_team == 'yes'):

	get_template_part( 'template/team' );

endif; ?>

</div>



<?php get_footer(); ?>
