<?php
/**
 * Service template part
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

//File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $roast_options; ?>
<div class="company">
	 <div class="container">
		 <h3><?php echo $roast_options['roast_service_title']; ?></h3>
		 <div class="service-grids">
			 <?php
			 	 $roast_service_one = $roast_options['roast_service_one'];
				 if($roast_service_one):
				 $args = array(
					 'post_type' => 'roast_services',
					 'posts_per_page' => '1',
					 'page_id'	=> $roast_service_one
				 );

				 $wp_query = new WP_Query( $args );
				 if( have_posts() ): while ($wp_query -> have_posts()) : $wp_query -> the_post();
			 ?>
			  <div class="col-md-4 commpany-grid">
					 <div class="grid-pic">
						 <?php $service_icon = get_post_meta( get_the_ID(), 'roast_service_icon', true);  ?>
						 <i class="fa <?php echo $service_icon; ?>"></i>
					 </div>
					 <div class="grid-info">
						 <h4><?php the_title(); ?></h4>
						 <p><?php echo content($roast_options['roast_service_container_char_limit']);  ?></p>
					 </div>
					 <div class="clearfix"></div>
			  </div>
				<?php endwhile; endif; wp_reset_query(); endif; ?>

				<!-- second service conta start -->
				<?php
 			 	 $roast_service_two = $roast_options['roast_service_two'];
				 if($roast_service_two):
	 				 $args = array(
	 					 'post_type' => 'roast_services',
	 					 'posts_per_page' => '1',
	 					 'page_id'	=> $roast_service_two
	 				 );

	 				 $wp_query = new WP_Query( $args );
 				 	 if( have_posts() ): while ($wp_query -> have_posts()) : $wp_query -> the_post();
 			 ?>
			  <div class="col-md-4 commpany-grid">
					 <div class="grid-pic">
						 <?php $service_icon = get_post_meta( get_the_ID(), 'roast_service_icon', true);  ?>
 						 <i class="fa <?php echo $service_icon; ?>"></i>
					 </div>
					 <div class="grid-info">
						 <h4><?php the_title(); ?></h4>
						 <p><?php echo content($roast_options['roast_service_container_char_limit']);  ?></p>
					 </div>
					 <div class="clearfix"></div>
			  </div>
				<?php endwhile; endif; wp_reset_query(); endif; ?>
				<!-- end second service container -->

				<!-- Third service container -->
				<?php
 			 		$roast_service_three = $roast_options['roast_service_three'];
					if($roast_service_three):
	 				 $args = array(
	 					 'post_type' => 'roast_services',
	 					 'posts_per_page' => '1',
	 					 'page_id'	=> $roast_service_three
	 				 );

	 				 $wp_query = new WP_Query( $args );
	 				 if( have_posts() ): while ($wp_query -> have_posts()) : $wp_query -> the_post();
 			 ?>
			  <div class="col-md-4 commpany-grid">
					 <div class="grid-pic">
						 <?php $service_icon = get_post_meta( get_the_ID(), 'roast_service_icon', true);  ?>
						 <i class="fa <?php echo $service_icon; ?>"></i>
					 </div>
					 <div class="grid-info">
						 <h4><?php the_title(); ?></h4>
						 <p><?php echo content($roast_options['roast_service_container_char_limit']);  ?></p>
					 </div>
					 <div class="clearfix"></div>
			  </div>
				<?php endwhile; endif; wp_reset_query(); endif; ?>
				<!-- end third service container -->

			<div class="clearfix"></div>
			</div>
	  </div>
</div>
