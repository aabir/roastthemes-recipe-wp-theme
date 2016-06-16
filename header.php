<?php
/**
 * Main header file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; } ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php global $roast_options; ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="">
<meta name="author" content="Shible Noman, shblnmn@gmail.com">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php wp_title( ' | ', true, 'right' ); ?></title>

<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/selectivizr-min.js"></script>
<![endif]-->

<!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ) ?>/js/html5shiv.min.js"></script>
<![endif]-->

<script>
	var stylesheet_directory = '<?php echo esc_url( get_template_directory_uri() ); ?>';
	var site_title = '<?php bloginfo('name'); ?>';
	var map_latitude = '<?php echo $roast_options['map_latitude']; ?>';
	var map_longitude = '<?php echo $roast_options['map_longitude']; ?>';
</script>

<?php wp_head(); ?>

<?php if( @$roast_options['roast_editor_css'] ): ?>
	<style id='style-inline-css' type='text/css'>
		<?php echo $roast_options['roast_editor_css']; ?>
	</style>
<?php endif; ?>
</head>

<body <?php body_class(); ?>>
<!-- header -->
<?php $dynamicBanner2 = get_post_meta( get_the_ID(), 'roast_header_bg', true );
if($dynamicBanner2): ?>
<style>.banner2 { background: url("<?php echo $dynamicBanner2; ?>") no-repeat 0px 0px; background-size: cover; }</style>
<?php endif; ?>

<?php if( is_front_page() && is_page_template() ): get_template_part( 'template/header-home' ) ; else : ?>

<div class="banner2">
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
							 <li><a href="tel: <?php echo $roast_options['header_phone']; ?>"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span><?php echo $roast_options['header_phone']; ?></a></li>
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
	 </div>
</div>
<?php endif; ?>
