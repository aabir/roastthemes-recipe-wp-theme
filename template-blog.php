<?php
/* Template Name: Blog List */

/**
 * Blog template file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

    $args = array(
      'post_type' 		  => 'post',
      'post_status' 		=> 'publish',
      'order'				    => 'DESC',
      'paged'				    => $paged,
    );
    $wp_query = new WP_Query($args);
?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <?php if( $wp_query->have_posts() ) { ?>
        <div class="col-md-9">
          <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
					       get_template_part( 'content', get_post_format() );
          endwhile; ?>

          <?php
            if ( function_exists('roast_pagination') )
              roast_pagination();
          ?>

        </div>

        <?php } else { ?>

          <div class="col-md-9">
            <article class="list-article">
            <?php if ( current_user_can( 'publish_posts' ) ) : ?>
  					       <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'roast' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
             <?php endif; ?>
           </article>
  				</div>

        <?php }?>

        <div class="col-md-3">
						<?php get_sidebar('blog'); ?>
				</div>
      </div>
    </div>
  </div>

<?php get_footer('blog'); ?>
