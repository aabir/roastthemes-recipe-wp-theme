<?php
/**
 * Ajax load for recipe
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
*/

$the_slug = ($_REQUEST['post_link']);

    $parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );

    $args = array(
      'post_type' => 'raost_recipe',
      'name'        => $the_slug,
      'post_status' => 'publish',
      'numberposts' => 1
    );
    $wp_query = new WP_Query( $args );
    while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
    <div class="container">
        <div class="row">

                <div class="col-md-6 pop-thumb">
                    <?php
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb,'full');
                    $img_url = ($img_url) ?: get_template_directory_uri().'/images/default-thumbnail.jpg'; ?>

                    <div class="pop-thumb-info">
                        <?php  $roast_recipe_special = get_post_meta($post->ID, 'roast_recipe_special', true);
                         if($roast_recipe_special == 'on'){ ?>
                        <div class="pop-recipe-special">Special</div>
                        <?php } ?>
                        <?php if($roast_recipe_price = get_post_meta($post->ID, 'roast_recipe_price', true)){ ?>
                        <div class="pop-recipe-price"> <?php echo $roast_recipe_price; ?> </div>
                        <?php } ?>
                    </div>

                   <img src="<?php echo $img_url; ?>" alt="<?php echo get_post($thumb)->post_title; ?>" />
                </div>

                <div class="col-md-6 pop-content">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <?php $roast_recipe_ingredient = get_post_meta($post->ID, 'roast_recipe_ingredient', true);
                    if($roast_recipe_ingredient): ?>
                    <div class="recipe-meta">
                        <span>Ingredients: </span> <?php echo $roast_recipe_ingredient; ?>
                    </div>
                    <?php endif; ?>

                    <?php $roast_recipe_price = get_post_meta($post->ID, 'roast_recipe_price', true);
                    if($roast_recipe_price): ?>
                    <div class="recipe-meta">
                        <span>Price: </span> <?php echo $roast_recipe_price; ?>
                    </div>
                    <?php endif; ?>
                </div>

        </div>
    </div>
    <?php endwhile;
