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
          <?php while ( have_posts() ) : the_post(); ?>
					<article class="list-article">

						<?php
							$thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_url($thumb_id, 'full');
							if($thumb_url){
						?>
						<div class="blog-media">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo $thumb_url; ?>" />
							</a>
						</div>
						<?php } ?>

						<div class="blog-content <?php echo ( $thumb_url ? 'half': 'full' ); ?>">
							<h3 class="entry-title"> <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"> <?php echo get_the_title(); ?> </a></h3>
							<?php echo content(30); ?>

							<a href="<?php echo get_the_permalink(); ?>" class="details"> Details &raquo; </a>

							<?php roast_entry_meta(); ?>

						</div>

					</article>

				<?php endwhile; ?>

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
