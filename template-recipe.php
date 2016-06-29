<?php
/* Template Name: Recipe Template */

/**
 * Recipe template file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<div class="recp-sec">
	 <div class="container">
		 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		 <h2><?php the_title(); ?></h2>
		 <div class="center-content">
			 <?php the_content(); ?>
		 </div>
	 	 <?php endwhile; endif; ?>

		 <ul class="recipe-filter">
        <li><a class="btn btn-default active" href="javascript:void(0);" data-filter="*">All Recipes</a></li>

        <?php
        $term_list = get_terms('roast_recipe_cat','hide_empty=0');
        if(count($term_list > 0))
        foreach ($term_list as $term) { ?>

          <li><a class="btn btn-default" href="javascript:void(0);" data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
          <?php
        } ?>
      </ul>

			<?php
          $args = array(
          	'post_type' => 'raost_recipe',
            'posts_per_page' => '-1',
          );
          $wp_query = new WP_Query( $args );
					$i = 1;
      ?>

	 <div class="recip-grid">
				<ul id="myList">

					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
						<?php $terms = get_the_terms( $post->ID, 'roast_recipe_cat' );
							if ( $terms && ! is_wp_error( $terms ) ) :
									$slug = "";
									 foreach ( $terms as $term ) {
											$slug .= $term->slug.' ';
									 }
							endif;
						?>
						<?php if( $i%3 == 1 ){ echo '<li>'; } // echo l_g class after 3 items. ?>
						 <div class="col-md-4 recip-sec <?php echo $slug; ?>">
							 <?php
								 $thumb = get_post_thumbnail_id();
								 $img_url = wp_get_attachment_url( $thumb,'full');
								 $img_url = ($img_url) ?: get_template_directory_uri().'/images/default-thumbnail.jpg'; ?>

								 <div class="pop-thumb-info">
                     <?php  $roast_recipe_special = get_post_meta($post->ID, 'roast_recipe_special', true);
                      if($roast_recipe_special == 'on'){ ?>
                     <div class="pop-recipe-special">Special</div>
                     <?php } ?>
                     <?php if($roast_recipe_price = get_post_meta($post->ID, 'roast_recipe_price', true)){ ?>
                     <div class="pop-recipe-price"> <?php echo $roast_recipe_price; ?> </div>
                     <?php } ?>
                 </div>

								 <img src="<?php echo $img_url; ?>" alt="<?php echo get_post($thumb)->post_title; ?>" />

							 <h3><a href="<?php echo $post->post_name ?>" class="pop-title"><?php the_title(); ?></a></h3>
							 <?php the_content(); ?>
						 </div>
						 <?php
						 	if(( $i%3 == 0 )){
	 							echo '<div class="clearfix"></div>';
	 							echo '</li>';
							}
							$i++; endwhile; ?>
				 </ul>
			 </div>

	 </div>
</div>

<?php get_footer(); ?>
