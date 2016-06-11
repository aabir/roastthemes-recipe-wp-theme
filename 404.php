<?php
/**
 * 404 file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
*/

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php get_header(); ?>


    <div class="container">
      <div class="col-md-<?php echo getMainColumnSize()['column']; ?>">

        <h2 class="top" style="margin-top: 33px;"><?php _e( 'Oops! That page can&rsquo;t be found.', 'roast' ); ?></h2>

          <div class="page-content">

            <p class="text-center"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'roast' ); ?></p>

            <div class="search-form">
  				<?php get_search_form(); ?>
            </div>

          </div>
      </div>

      <?php if( getMainColumnSize()['column'] != 12): ?>
      <div class="col-md-3">
          <?php get_sidebar(); ?>
      </div>
      <?PHP endif; ?>

    </div>

<?php get_footer(); ?>
