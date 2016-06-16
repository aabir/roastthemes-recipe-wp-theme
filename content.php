<?php
/**
 * Content Template Part
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

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
