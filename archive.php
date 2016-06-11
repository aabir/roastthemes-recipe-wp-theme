<?php
/**
 * Archive file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php get_header('blog'); ?>

  <div class="container-fluid">
    <div class="container">
      <div class="blog-container-bg-color">
      <div class="row">
        <?php if ( have_posts() ) { ?>
        <div class="col-md-<?php echo getMainColumnSize()['column']; ?>">
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

						<div class="blog-content <?php echo ( $thumb_url? 'half': 'full' ); ?>">
							<h3 class="entry-title"> <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"> <?php echo get_the_title(); ?> </a></h3>
							<?php echo content(30); ?>

							<a href="<?php echo get_the_permalink(); ?>" class="details"> Details &raquo; </a>

							<?php roast_entry_meta(); ?>

						</div>
            <div class="blog-seperator"></div>
					</article>
          <?php endwhile; ?>

          <?php
            if ( function_exists('wp_bootstrap_pagination') )
              wp_bootstrap_pagination();
          ?>

        </div>
        <?php } else { ?>

          <div class="col-md-9">
            <article class="list-article">
              <p><?php _e( 'Sorry, but nothing found. Please try search.', 'roast' ); ?></p>
  	           <?php get_search_form(); ?>
            </article>
  				</div>

          <?php } ?>

        <?php if( getMainColumnSize()['column'] != 12): ?>
        <div class="col-md-3">
						<?php get_sidebar(); ?>
				</div>
        <?php endif; ?>

      </div>
    </div>
    </div>
  </div>

<?php get_footer('blog'); ?>
