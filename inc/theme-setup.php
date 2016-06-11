<?php
/**
 * Theme initialization functions
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* WP Bootstrap menu walker */
require_once('wp_bootstrap_navwalker.php');

/* All widget functions */
require_once('widget-function.php');

/* Load theme options */
require_once( 'ReduxCore/framework.php' );
require_once( 'config/barebones-config.php' );

/* For wp-less */
require_once( 'wp-less/bootstrap-for-theme.php' );

/* Pagination */
include_once('roast-pagination.php');

/* Init redux options needed for function.php file */
Redux::init( 'roast_options' );

/* Dynamic sidebar areas creation from theme options */

$sidebars = $roast_options['roast_widget_areas'];

if($sidebars):
foreach($sidebars as $sidebar){
	if( $sidebar) {
		$sidebar_id = preg_replace('#[ -]+#', '-', $sidebar);
		  register_sidebar(
				  array (
					  'name'           => $sidebar,
					  'id'             => strtolower($sidebar_id),
					  'description'   => __( $sidebar, 'roast' ),
					  'before_widget' => '<li id="%1$s" class="widget %2$s">',
						'after_widget'  => '</li>',
						'before_title'  => '<h4 class="widget-title">',
						'after_title'   => '</h4>',
				  )
		  );
	}
}
endif;

/*Send the variable to less file to dynamicly generate CSS. */
if( !is_admin() ){

  $less = WPLessPlugin::getInstance();

    $site_header_color = $roast_options['site_header_color'];
    $site_accent_color = $roast_options['site_accent_color'];
    $site_anchor_hover_color = $roast_options['site_anchor_hover_color'];
    $footer_bg = $roast_options['footer_bg_color'];
    $footer_title_color = $roast_options['footer_title_color'];
    $footer_text_color = $roast_options['footer_text_color'];
    $bottom_bar_bg_color = $roast_options['bottom_bar_bg_color'];
    $bottom_bar_text_color = $roast_options['bottom_bar_text_color'];


    $less->setVariables(array(
      'site_header_color' => $site_header_color,
      'site_accent_color' => $site_accent_color,
      'site_anchor_hover_color' => $site_anchor_hover_color,
      'footer_bg' => $footer_bg,
      'footer_title_color' => $footer_title_color,
      'footer_text_color' => $footer_text_color,
      'bottom_bar_bg_color' => $bottom_bar_bg_color,
      'bottom_bar_text_color' => $bottom_bar_text_color,
    ));

    $less->dispatch();
}

/* Theme basic setup function */
add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup(){

  if ( ! isset( $content_width ) ) $content_width = 1170;

	load_theme_textdomain( 'roast', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' ) );
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery' ) );
  add_theme_support( 'woocommerce' );

  /* Primary menu register */
  register_nav_menus(
  	array('primary-menu' => __( 'Primary Menu', 'roast') )
  );

  add_filter( 'widget_text', 'do_shortcode' );

  // create upload dir
  wp_upload_dir();

}

/* Site Favicon */
function site_favicon() { ?>
  <?php $favicon = (@$roast_options['site_favicon']['url']) ?: get_template_directory_uri().'/images/favicon.ico'; ?>
  <link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>"/>
<?php }

add_action('wp_head', 'site_favicon');

/* Enqueue stylesheet and scrpts */

function add_theme_scripts() {

/* stylesheet */
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false, '1.0', 'all' );
    wp_enqueue_style( 'app', get_template_directory_uri() . '/css/app.css', false, '1.0', 'all' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', false, '4.6.3', 'all' );
    wp_enqueue_style( 'jquery.fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css', false, '1.0', 'all' );
    wp_enqueue_style('theme-custom', get_stylesheet_directory_uri().'/css/dynamic-css.less', false, '1.0', 'all');

    /* scripts */

    wp_enqueue_script( 'bootstrap-3.1.1.min', get_template_directory_uri() . '/js/bootstrap-3.1.1.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'jquery.flexisel', get_template_directory_uri() . '/js/jquery.flexisel.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'jquery.isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'jquery.fancybox.pack', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'), '1.0.0', true);
    if( is_page_template('template-contact.php') ){
      wp_enqueue_script( 'maps.googleapis', 'http://maps.googleapis.com/maps/api/js?v=3&sensor=false', array(), '1.0.0', true);
    }
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/* return site title */
function theme_filter_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		  $title = "$title $sep " . sprintf( __( 'Page %s', 'roast' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'theme_filter_wp_title', 10, 2 );

/* For Metas framework */
require_once('cmb2/init.php');
require_once('cmb2/cmb2-conditionals.php');
require_once('cmb2-fontawesome-picker.php');

/*load CPT and their metaboxes */
include_once('team-cpt.php');
include_once('recipe-cpt.php');
include_once('testimonial-cpt.php');
include_once('gallery-meta.php');
include_once('about-meta.php');
include_once('service-cpt.php');
include_once('roast-meta.php');

/** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}
