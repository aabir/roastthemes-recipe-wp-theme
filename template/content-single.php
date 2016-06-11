<?php
/**
 *  Single template part
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

 //File Security Check
 if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('list-article-single'); ?>>

  <h2> <?php echo the_title(); ?> </h2>

  <?php roast_entry_meta(); ?>

  <?php
    $thumb_id = get_post_thumbnail_id();
    $thumb_url = wp_get_attachment_url($thumb_id, 'full');
    if($thumb_url){
  ?>
  <div class="blog-media-single">
    <img src="<?php echo $thumb_url; ?>" title />
  </div>
  <?php } ?>

  <div class="blog-content-single">
    <?php the_content(); ?>
  </div>

</article>
