<?php
/**
 * index file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php get_header(); ?>

  <div class="container-fluid">
    <div class="container">

      <div class="row">

				<?php if ( have_posts() ) : ?>
        <div class="col-md-9">
          <?php while ( have_posts() ) : the_post();

            get_template_part( 'content', get_post_format() );

					endwhile; ?>

        <?php
          if ( function_exists('roast_pagination') )
            roast_pagination();
        ?>

        </div>

				<?php else : ?>

          <div class="col-md-9">
            <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'roast' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
            <?php else: ?>
              <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'roast' ); ?></p>
               <?php get_search_form(); ?>
             <?php endif; ?>
          </div>

				<?php endif; ?>

        <div class="col-md-3">
						<?php get_sidebar('blog'); ?>
				</div>

      </div>

    </div>
  </div>

<?php get_footer(); ?>
