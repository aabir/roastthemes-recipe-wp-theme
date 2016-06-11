<?php
/* Template Name: Home Template */

/**
 * Home template file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
*/

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<div class="welcome">
	 <div class="container">
		 <?php if( have_posts() ): while ( have_posts() ) : the_post() ?>

		 <h3><?php the_title(); ?></h3>
		 <?php the_content(); ?>
		 <?php $thumb = get_post_thumbnail_id();
		 	$image_title = get_post(get_post_thumbnail_id())->post_title;
			if($thumb): ?>
		 <div class="welcome_pic">
			 <img src="<?php echo $img_url = wp_get_attachment_url( $thumb, 'full' ); ?>" alt="<?php echo $image_title; ?>"/>
		 </div>
	 	<?php endif; ?>
		<?php endwhile; endif; wp_reset_query(); ?>
	</div>
</div>

<?php

$layout = $roast_options['roast_home_block']['enabled'];

if ($layout): foreach ($layout as $key=>$value) {

    switch($key) {

        case 'roast_services': get_template_part( 'template/services', 'roast_services' );
        break;

        case 'roast_special_recipe': get_template_part( 'template/special-recipe', 'roast_special_recipe' );
        break;

        case 'roast_blog_testi': get_template_part( 'template/blog-testimonial', 'roast_blog_testi' );
        break;

				case 'roast_team': get_template_part( 'template/team', 'roast_team' );
        break;

        case 'roast_photo_gallery': get_template_part( 'template/gallery', 'roast_photo_gallery' );
        break;

    }
}
endif;
?>

<?php get_footer(); ?>
