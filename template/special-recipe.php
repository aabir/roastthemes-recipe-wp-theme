<?php
/**
 * special recipe template part
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

//File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $roast_options; ?>

<?php @$recipe_permalink = get_permalink($roast_options['roast_recipe_page_link']); ?>

<div class="special">
	 <div class="container">
		 <h3><?php echo $roast_options['roast_special_recipe_title']; ?></h3>
		 <div class="arrival-grids">
			 <ul id="flexiselDemo1">
				 <?php
					 	$meta_query = array(
					 		 array(
					 			 'key' 		=> 'roast_recipe_special',
					 			 'value' 	=> 'on',
					 		 )
					  );
					  $args = array(
					 		 'post_type' 			=> 'raost_recipe',
					 		 'post_status' 		=> 'publish',
							 'posts_per_page'	=> (int)$roast_options['roast_special_recipe_no'],
							 'meta_query'			=> $meta_query,
					 		 'order'					=> 'desc'
					  );
					  $wp_query = new WP_Query( $args );
				    if( have_posts() ): while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				 <li>
					 <a href="<?php echo $recipe_permalink; ?>">
						 <?php
							 $thumb = get_post_thumbnail_id();
							 $img_url = wp_get_attachment_url( $thumb,'full');
							 $img_url = ($img_url) ?: get_template_directory_uri().'/images/default-thumbnail.jpg'; ?>

							 <div class="pop-thumb-info thumb-home">
							 		<?php  $roast_recipe_special = get_post_meta($post->ID, 'roast_recipe_special', true);
							 		 if($roast_recipe_special == 'on'){ ?>
							 		<div class="pop-recipe-special">Special</div>
							 		<?php } ?>
							 		<?php if($roast_recipe_price = get_post_meta($post->ID, 'roast_recipe_price', true)){ ?>
							 		<div class="pop-recipe-price"> <?php echo $roast_recipe_price; ?> </div>
							 		<?php } ?>
							 </div>

						 <img src="<?php echo $img_url; ?>" alt="<?php echo get_post($thumb)->post_title; ?>" />
					 <h4><?php the_title(); ?></h4>
					 </a>
				 </li>
			 	<?php endwhile; endif; wp_reset_query(); ?>
				</ul>
		  </div>

	 </div>
</div>
