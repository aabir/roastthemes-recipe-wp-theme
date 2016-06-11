<?php
/**
 * Page file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
*/

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php get_header(); ?>

  <div class="pages">
    <div class="container">

      <div class="col-md-<?php echo getMainColumnSize(); ?>">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php get_template_part( 'template/content', 'page' ); ?>
      <?php if ( comments_open() || get_comments_number() ) {
        comments_template();
      } ?>
      <?php endwhile; endif; ?>
      </div>

      <?php if( getMainColumnSize() != 12): ?>
      <div class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
      <?php endif; ?>

    </div>
  </div>



<?php get_footer(); ?>
