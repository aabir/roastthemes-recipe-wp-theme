<?php
/**
 * Header for home page
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

 //File Security Check
 if ( ! defined( 'ABSPATH' ) ) { exit; }

global $roast_options; ?>

<?php $switch_slider = $roast_options['switch_slider']; if( $switch_slider == 1) : ?>
<div class="carousel-wrapper">
<?php if(isset($roast_options['roast_home_slides']) && !empty ($roast_options['roast_home_slides'])): ?>
<div id="roast_carousel" class="carousel slide" data-ride="carousel">

	<?php if($roast_options['roast_slider_nav_dots'] == 1): ?>
  <!-- Indicators -->
  <ol class="carousel-indicators">
		<?php $i = 0; foreach($roast_options['roast_home_slides'] as $slide): ?>
    <li data-target="#roast_carousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $active = ($i == 0) ? "active" : ""; ?>"></li>
		<?php $i++; endforeach; ?>
  </ol>
	<?php endif; ?>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
		<?php foreach($roast_options['roast_home_slides'] as $slide): ?>
    <div class="item">
				<img src="<?php echo $slide['image']; ?>" data-color="lightblue" alt="" />
        <div class="carousel-caption">
					<div class="banner-info">
						<h1><?php echo $slide['title']; ?></h1>
						<p><?php echo $slide['description']; ?></p>
					</div>
        </div>
    </div>
		<?php endforeach; ?>
  </div>

	<?php if($roast_options['roast_slider_nav_arrow'] == 1): ?>
  <!-- Controls -->
  <a class="left carousel-control" href="#roast_carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#roast_carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
<?php endif; ?> <!--theme options dots navigation -->

</div> <!-- slider end -->
<?php endif; ?>
</div>
<?php endif; //checking slider is on or not  ?>

<?php @$roast_front_banner = $roast_options['roast_front_banner'];
 if( isset($roast_front_banner['url'] ) && ( $switch_slider == 0) ){
	 	$banner = "url(".$roast_front_banner['url'].")";
	 } else {
		 $banner = "linear-gradient(to bottom, rgba(0,0,0,0.65) 0%,rgba(0,0,0,0) 100%); filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 );";
	 } ?>
	 <style>.banner { background: <?php echo $banner ?> no-repeat 0px 0px; background-size: cover; }</style>

<div class="banner">
	 <div class="container">
		 <div class="banner_head_top">
			 <div class="banner-head">
				 <div class="logo">
					 <?php
					 if(@$roast_options['site_logo']['url']) {
					 		$site_logo = $roast_options['site_logo']['url']; ?>
							<a href="<?php echo site_url(); ?>"> <img src="<?php echo $site_logo; ?>" alt="<?php bloginfo('title') ?>" /> </a>
					 <?php } else { ?>
						 <h1><a href="<?php echo site_url(); ?>">Hot<span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span><span>Foods</span></a></h1>
					 <?php } ?>
				 </div>
				 <div class="headr-right">
					 <div class="details">
						 <ul>
							 <li><a href="mailto:<?php echo $roast_options['header_mail']; ?>"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><?php echo $roast_options['header_mail']; ?></a></li>
							 <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><a href="tel: <?php echo $roast_options['header_phone']; ?>"><?php echo $roast_options['header_phone']; ?></a></li>
						 </ul>
					 </div>
				 </div>
				 <div class="clearfix"></div>
			 </div>

			 <div class="top-menu">
				<div class="content white">
					<nav class="navbar navbar-default" role="navigation">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							  </button>
							</div>

							<?php
								wp_nav_menu( array(
									'menu'              => 'primary menu',
									'theme_location'    => 'primary menu',
									'depth'             => 2,
									'container'         => 'div',
									'container_class'   => 'collapse navbar-collapse',
									'container_id'      => 'bs-example-navbar-collapse-1',
									'menu_class'        => 'nav navbar-nav',
									'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
									'walker'            => new wp_bootstrap_navwalker())
								);
							?>
						</div>
					</nav>
				  <!--/navbar-->
				</div>
				 <div class="clearfix"></div>
			  </div>
		</div>

		<?php if( is_front_page() && ($switch_slider == 0) ) : ?>
		<div class="banner-info">
			 <?php echo $roast_options['roast_front_banner_caption']; ?>
		</div>
		<?php endif; ?>

	 </div>
</div>
