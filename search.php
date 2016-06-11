<?php
/**
 * Search file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
*/

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<?php get_header(); ?>

    <div class="container">

      <div class="row">

	<?php if ( have_posts() ) : ?>
        <div class="col-md-<?php echo getMainColumnSize()['column']; ?>">

            <h2 class="top" style="margin-top:33px;" ><?php printf( __( 'Search Results for: %s', 'roast' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>

            <?php while ( have_posts() ) : the_post(); ?>
    		    <?php get_template_part( 'template/content', 'search' ); ?>
    		<?php endwhile; ?>

        </div>

	<?php else : ?>

    <div class="col-md-<?php echo getMainColumnSize()['column']; ?>">

         <p class="text-center" style="margin-top: 33px;"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'roast' ); ?></p>

         <div class="search-form">
		  <?php get_search_form(); ?>
         </div>

        </div>

        <?php endif; ?>

        <?php if( getMainColumnSize()['column'] != 12): ?>
        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>
        <?php endif; ?>

      </div>

    </div>

<?php get_footer(); ?>
