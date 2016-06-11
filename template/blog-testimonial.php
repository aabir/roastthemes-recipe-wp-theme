<?php
/**
 *  Blog and testimonial template part
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

//File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $roast_options; ?>

<div class="latest_news">
	 <div class="container">
	     <div class="news-sec">
			 <div class="col-md-6 news">
					 <div class="news-head">
						 <h3><?php echo $roast_options['roast_blog_title']; ?></h3>
					 </div>
					 <?php
						 $args = array(
							 'post_type' 	=> 'post',
							 'p'		=> (int)$roast_options['roast_home_post'],
							 'posts_per_page' => 1
						 );

						 $wp_query = new WP_Query( $args );
						 if( have_posts() ): while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
					 <div class="news_grid">
						 <?php
						 $thumb = get_post_thumbnail_id();
						 $img_url = wp_get_attachment_url( $thumb,'full');
						 $img_url = ($img_url) ?: get_template_directory_uri().'/images/default-thumbnail.jpg'; ?>

						 <img src="<?php echo $img_url; ?>" class="img-responsive" alt="<?php echo get_post($thumb)->post_title; ?>" />

						 <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

						 <?php roast_entry_meta(); ?>

						 <p><?php echo content(42); ?></p>
						 <a class="read" href="<?php echo the_permalink(); ?>">Read More...</a>
					 </div>
				 	<?php endwhile; endif; wp_reset_query(); ?>
			 </div>
			 <div class="col-md-6 testimonal">
					 <div class="testi-head">
						 <h3><?php echo $roast_options['roast_testimonial_title']; ?></h3>
					 </div>

					 <?php
					 $args = array(
						 'post_type' => 'roast_testimonial',
						 'posts_per_page' => (int)$roast_options['roast_testimonial_no'],
						 'order_by'	=> 'desc'
					 );

					 $wp_query = new WP_Query( $args );
					 if( have_posts() ): while ($wp_query -> have_posts()) : $wp_query -> the_post(); ?>
					 <div class="testi-grids">
						 <div class="testi-grid">
							 <div class="people">
								 	<?php
								 	$thumb = get_post_thumbnail_id();
									$img_url = wp_get_attachment_url( $thumb,'full');
									$img_url = ($img_url) ?: get_template_directory_uri().'/images/default-thumbnail.jpg'; ?>
									<img src="<?php echo $img_url; ?>" alt="<?php echo get_post($thumb)->post_title; ?>" />
							 </div>
							 <div class="testi-info">
								 <h4><?php the_title(); ?></h4>
								 <a href="<?php echo get_post_meta( get_the_ID(), 'roast_testimonial_url', true ); ?>" target="_blank"><?php echo get_post_meta( get_the_ID(), 'roast_testimonial_designation', true );?></a>
								 <?php the_content(); ?>
							 </div>
							 <div class="clearfix"></div>
						 </div>
					 	 <?php endwhile; endif; wp_reset_query(); ?>
					 </div>
			  </div>
			  <div class="clearfix"></div>
		 </div>
	 </div>
</div>
</div>
