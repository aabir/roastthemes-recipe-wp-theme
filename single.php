<?php
/**
 * Single for post
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
*/

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php get_header(); ?>

  <div class="container-fluid">
    <div class="container">
    <div class="blog-container-bg-color">

        <div class="col-md-<?php echo getMainColumnSize(); ?>">
          <?php while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template/content', 'single' ); ?>
          <?php endwhile; ?>
          <?php
          if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
          ?>
        </div>

        <?php if( getMainColumnSize() != 12): ?>
        <div class="col-md-3">
						<?php get_sidebar(); ?>
				</div>
        <?php endif; ?>

    </div>
    </div>
  </div>
<?php get_footer('blog'); ?>
