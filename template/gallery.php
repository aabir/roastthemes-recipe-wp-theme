<?php
/**
 *  Gallery template part
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

//File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

global $roast_options; ?>

<div class="special">
	 <div class="container">
		 <h3><?php echo $roast_options['roast_gallery_title']; ?></h3>
		 <?php
		 @$imageIDs = $roast_options['roast_home_gallery'];
			if( $imageIDs ) : ?>
		 <div class="arrival-grids">
			 <ul id="flexiselGallery">
				 <?php $imageIDs = explode(',', $imageIDs);
            	 foreach ($imageIDs as $imageID) :  ?>
				<li>
					<div class="gallery-thumb-box">
			        <a class="fancybox" rel="gallery1" href="<?php echo wp_get_attachment_url($imageID); ?>" title="<?php echo wp_get_attachment($imageID)['caption']; ?>">

								<div class="gallery-thumb-box-overlay">
									<div class="imghovercirle"><span><i class="fa fa-expand"></i></span></div>
								</div>
				        <span class="rollover"></span>

		            <img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo wp_get_attachment_url($imageID);?>&w=257&h=162" alt="<?php echo wp_get_attachment($imageID)['caption']; ?>" />
	            </a>
		    	</div>
				</li>
			 <?php endforeach; ?>

				</ul>
		  </div>
			<?php endif; ?>
	 </div>
</div>
