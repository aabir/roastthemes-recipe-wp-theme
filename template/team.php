<?php
/**
 * Team template Part
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
*/

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $roast_options; ?>

<div class="team">
  <div class="container">
      <?php if( is_front_page() || is_page_template('template-home.php') ){
          $team_title = $roast_options['roast_team_title'];
          $posts_per_page = $roast_options['roast_team_no'];
      } else {
          $team_title = get_post_meta( get_the_ID(), 'roast_team_title', true );
          $posts_per_page = get_post_meta( get_the_ID(), 'roast_team_profile_no', true );
      }
       ?>
     <h3><?php echo $team_title; ?></h3>
    <div class="team-sec">
      <?php
        $args = array(
          'post_type' => 'roast_team',
          'posts_per_page' => (int)$posts_per_page,
          'order_by'  => 'desc',
        );
        $wp_query = new WP_Query( $args );
        while( $wp_query->have_posts() ): $wp_query->the_post() ?>

     <div class="grid_4">
     <div class="team-grid">
       <?php
         $thumb = get_post_thumbnail_id();
         $img_url = wp_get_attachment_url( $thumb,'full');
         $img_url = ($img_url) ?: get_template_directory_uri().'/images/default-thumbnail.jpg'; ?>
        <img src="<?php echo $img_url; ?>" alt="<?php echo get_post($thumb)->post_title; ?>" />

        <h4><?php the_title(); ?> </h4>
        <?php if( $designation = get_post_meta( get_the_ID(), 'roast_team_designation', true ) ): ?>
        <div class="team-designation">
          <?php echo $designation; ?>
        </div>
        <?php endif; ?>
        <?php the_content(); ?>
        <?php $email = get_post_meta( get_the_ID(), 'roast_team_email', true );
        $skype = get_post_meta( get_the_ID(), 'roast_team_skype', true );
        $fb = get_post_meta( get_the_ID(), 'roast_team_fb', true );
        $twitter = get_post_meta( get_the_ID(), 'roast_team_twitter', true );
        $gplus = get_post_meta( get_the_ID(), 'roast_team_gplus', true );
        $pinterest = get_post_meta( get_the_ID(), 'roast_team_pinterest', true );

        if( $email || $skype || $fb || $twitter || $gplus || $pinterest ):  ?>

        <div class="social-links team-social">
          <?php if($email): ?>
          <a href="mailto:<?php echo $email; ?>" target="_blank"><i class="fa fa-envelope"></i></a>
          <?php endif; ?>
          <?php if($skype): ?>
          <a href="skype:<?php echo $skype; ?>" target="_blank"><i class="fa fa-skype"></i></a>
          <?php endif; ?>
          <?php if($fb): ?>
          <a href="<?php echo $fb; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
          <?php endif; ?>
          <?php if($twitter): ?>
          <a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
          <?php endif; ?>
          <?php if($gplus): ?>
          <a href="<?php echo $gplus; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
          <?php endif; ?>
          <?php if($pinterest): ?>
          <a href="<?php echo $pinterest; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
          <?php endif; ?>
        </div>
        <?php endif; ?>

     </div>
     </div>
     <?php endwhile; ?>
    <div class="clearfix"></div>
    </div>
   </div>
</div>
