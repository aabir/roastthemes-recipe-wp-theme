<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "roast_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'roast' ),
        'page_title'           => __( 'Theme Options', 'roast' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    /*$args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );*/

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    /*$args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );*/

    // Panel Intro text -> before the form
    /*if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }*/

    // Add content after the form.
    /*$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' ); */

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    /*$tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );*/

    // Set the help sidebar
    /*$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content ); */


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => __( 'General Settings', 'roast' ),
        'id'     => 'general',
        'desc'   => __( 'Header Settings', 'roast' ),
        'icon'   => 'el el-cog',
    ) );

    Redux::setSection( $opt_name, array(
      'title'            => __( 'Header Options', 'roast' ),
      'id'               => 'header-opt',
      'subsection'       => true,
      'fields'           => array(
            array(
                'id'       => 'header_phone',
                'type'     => 'text',
                'title'    => __( 'Header Phone', 'roast' ),
                'desc'     => __( 'Your phone number', 'roast' ),
                'default'  => '011 322 44 56'
            ),

            array(
                'id'       => 'header_mail',
                'type'     => 'text',
                'title'    => __( 'Header Email Address', 'roast' ),
                'desc'     => __( 'Your email address', 'roast' ),
                'validate' => 'email',
                'default'  => 'sales@yoursite.com'
            ),
            array(
                'id'       => 'site_logo',
                'type'     => 'media',
                'title'    => __( 'Upload site logo', 'roast' ),
                'desc'     => __( 'Use upload button to upload your site logo', 'roast' ),
            ),
            array(
                'id'       => 'site_favicon',
                'type'     => 'media',
                'title'    => __( 'Upload site favicon', 'roast' ),
                'desc'     => __( 'Use upload button to upload your site favicon', 'roast' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
      'title'            => __( 'Contact Options', 'roast' ),
      'id'               => 'contact-opt',
      'subsection'       => true,
      'fields'           => array(
        array(
            'id'       => 'contact_mail_recepient',
            'type'     => 'text',
            'title'    => __( 'Contact Form Mail Recepient', 'roast' ),
            'desc'     => __( 'Your email address', 'roast' ),
            'validate' => 'email',
            'default'  => 'sales@yoursite.com'
        ),
        array(
            'id'       => 'contact_phone',
            'type'     => 'text',
            'title'    => __( 'Contact Page Phone', 'roast' ),
            'desc'     => __( 'Your contact page phone number', 'roast' ),
            'default'  => '011 322 44 56'
        ),
        array(
            'id'       => 'contact_mail_address',
            'type'     => 'text',
            'title'    => __( 'Contact Page Email', 'roast' ),
            'desc'     => __( 'Your contact page email address', 'roast' ),
            'validate' => 'email',
            'default'  => 'sales@yoursite.com'
        ),
        array(
            'id'       => 'contact_address',
            'type'     => 'textarea',
            'title'    => __( 'Contact Page Address', 'roast' ),
            'desc'     => __( 'Your address for contact page', 'roast' ),
            'default'  => '756 gt globel Place, CD-Road,M 07 435.'
        ),
        array(
            'id'       => 'fb_social_link',
            'type'     => 'text',
            'title'    => __( 'Facebook Address', 'roast' ),
            'desc'     => __( 'Your facebook address', 'roast' ),
            'default'  => 'http://facebook.com/'
        ),
        array(
            'id'       => 'twitter_social_link',
            'type'     => 'text',
            'title'    => __( 'Twitter Address', 'roast' ),
            'desc'     => __( 'Your twitter address', 'roast' ),
            'default'  => 'http://twitter.com/'
        ),
        array(
            'id'       => 'pinterest_social_link',
            'type'     => 'text',
            'title'    => __( 'Pinterest Address', 'roast' ),
            'desc'     => __( 'Your google plus address', 'roast' ),
            'default'  => 'http://plus.google.com/'
        ),
        array(
            'id'       => 'gplus_social_link',
            'type'     => 'text',
            'title'    => __( 'Google Plus Address', 'roast' ),
            'desc'     => __( 'Your pinterest address', 'roast' ),
            'default'  => 'http://plus.google.com/'
        ),
        array(
			'id'       => 'map_latitude',
			'type'     => 'text',
			'title'    => __('Google Map Latitude', 'roast' ),
			'subtitle' => _( ' Find your latitude and longitude from here <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank"> universimmedia </a>'),
            'desc'     => __('Put your latitude', 'roast' ),
            'default'   => '23.81033'
		),
		array(
			'id'       => 'map_longitude',
			'type'     => 'text',
			'title'    => __('Google Map Longitude', 'roast' ),
            'desc'     => __('Put your longitude', 'roast' ),
            'default'   => '90.41252'
		),
      )
    ));

    Redux::setSection( $opt_name, array(
      'title'            => __( 'Advanced Options', 'roast' ),
      'id'               => 'advance-opt',
      'subsection'       => true,
      'fields'           => array(
        array(
            'id'       => 'roast_editor_css',
            'type'     => 'ace_editor',
            'title'    => __( 'CSS Code', 'roast' ),
            'subtitle' => __( 'Write or paste your CSS code here.', 'roast' ),
            'mode'     => 'css',
            'theme'    => 'chrome',
        ),
        array(
            'id'       => 'google_analytics',
            'type'     => 'textarea',
            'title'    => __( 'Google Analytics Code', 'roast' ),
            'subtitle' => __( 'Your google analytics code', 'roast' ),
            'desc'     => 'Analytics code with script tag.'
        )
      )
    ));

    Redux::setSection( $opt_name, array(
      'title'            => __( 'Footer & Bottom bar Options', 'roast' ),
      'id'               => 'footer-opt',
      'subsection'       => true,
      'fields'           => array(
        array(
            'id'       => 'footer_bg_color',
            'type'     => 'color',
            'title'    => __( 'Footer Background Color', 'roast' ),
            'desc'     => __( 'Select footer background color', 'roast' ),
            'default'  => '#343434',
            'transparent' => false
        ),
        array(
            'id'       => 'footer_title_color',
            'type'     => 'color',
            'title'    => __( 'Footer Title Color', 'roast' ),
            'desc'     => __( 'Select footer title color', 'roast' ),
            'default'  => '#ffffff',
            'transparent' => false
        ),
        array(
            'id'       => 'footer_text_color',
            'type'     => 'color',
            'title'    => __( 'Footer Text Color', 'roast' ),
            'desc'     => __( 'Select footer text color', 'roast' ),
            'default'  => '#A3A3A3',
            'transparent' => false
        ),
        array(
            'id'       => 'bottom_bar_bg_color',
            'type'     => 'color',
            'title'    => __( 'Bottom Bar Background Color', 'roast' ),
            'desc'     => __( 'Select bottom bar background color', 'roast' ),
            'default'  => '#4D4D4D',
            'transparent' => false
        ),
        array(
            'id'       => 'bottom_bar_text_color',
            'type'     => 'color',
            'title'    => __( 'Bottom Bar Text Color', 'roast' ),
            'desc'     => __( 'Select bottom bar text color', 'roast' ),
            'default'  => '#ffffff',
            'transparent' => false
        ),
        array(
            'id'       => 'footer_copyright',
            'type'     => 'textarea',
            'title'    => __( 'Copyright Text', 'roast' ),
            'desc'     => __( 'Copyright text for bottom bar', 'roast' ),
            'default'  => '&copy; 2016 Hot Foods. All rights reserved | Developed by <a href="http://shiblenoman.com" target="_blank">Shible Noman </a>',
        ),
      )
    ));

    Redux::setSection( $opt_name, array(
        'title' => __( 'Home Page Settings', 'roast' ),
        'id'    => 'home-opt',
        'desc'  => __( 'Home page banner', 'roast' ),
        'icon'  => 'el el-home'
    ));

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Home Page banner', 'roast' ),
        'id'        => 'home-slider',
        'subsection'=> true,
        'fields'    => array(
            array(
                'id'       => 'roast_front_banner',
                'type'     => 'media',
                'title'    => __( 'Upload Static Banner Image', 'roast' ),
                'desc'     => __( 'Use upload button to upload banner. Should be bigger image for fullscreen', 'roast' ),
                'required' => array( 'switch_slider', '=', false ),
            ),
            array(
                'id'       => 'roast_front_banner_caption',
                'type'     => 'textarea',
                'title'    => __( 'Caption On the Image', 'roast' ),
                'desc'     => __( 'Write your caption to show on the image', 'roast' ),
                'default'   => __('
              			 <h1>Aliquam In in elit <span>cursus quam interdum.</span></h1>
              			 <p>Duis porta diam vel arcu finibus, eget pellentesque lacus consequat. Morbi at dui quis nulla malesuada suscipit. Sed vitae leo eget felis gravida dignissim nec a ipsum.</p>
              			 <a class="btn-left" href="#">Click</a>
              			 <a class="btn-right" href="#">Read more</a>', 'roast'),
                'required' => array( 'switch_slider', '=', false ),
            ),
            array(
                'id'       => 'switch_slider',
                'type'     => 'switch',
                'title'    => 'Use Slide As Banner',
                'subtitle' => 'Use any one static image banner or image slide.',
                'default'  => false
            ),
            array(
                'id'          => 'roast_home_slides',
                'type'        => 'slides',
                'title'       => __( 'Home Page Slides', 'roast' ),
                'desc'        => __( 'Use large size image for full screen.', 'roast' ),
                'show' => array(
                    'title' => true,
                    'description' => true,
                    'url' => false,
                ),
                'placeholder' => array(
                    'title'       => __( 'H1 Caption', 'roast' ),
                    'description' => __( 'Description caption', 'roast' ),
                    'url'         => __( 'Caption link', 'roast' ),
                ),
                'required' => array( 'switch_slider', '=', true ),
            ),
            array(
                'id'       => 'roast_slider_nav_arrow',
                'type'     => 'radio',
                'title'    => __( 'Slider Arrow Navigation', 'roast' ),
                'desc'     => __( 'Slider left and right arrow navigation.', 'roast' ),
                'options'  => array(
                    '1' => 'Enable',
                    '2' => 'Disable',
                ),
                'default'  => '1',
                'required' => array( 'switch_slider', '=', true ),
            ),
            array(
                'id'       => 'roast_slider_nav_dots',
                'type'     => 'radio',
                'title'    => __( 'Slider Dots Navigation', 'roast' ),
                'desc'     => __( 'Dots navigation at slider bottom.', 'roast' ),
                'options'  => array(
                    '1' => 'Enable',
                    '2' => 'Disable',
                ),
                'default'  => '1',
                'required' => array( 'switch_slider', '=', true ),
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Homepage Layout Manager', 'roast' ),
        'id'        => 'home-layout',
        'subsection'=> true,
        'fields'    => array(
            array(
                'id'       => 'roast_home_block',
                'type'     => 'sorter',
                'title'    => 'Homepage Layout Manager',
                'desc'     => 'Organize how you want the layout to appear on the homepage',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
                        'roast_services' => 'Featured Service',
                        'roast_special_recipe' => 'Special Recipe',
                        'roast_blog_testi' => 'Blog+Testimonial',
                        'roast_team' => 'Team Block',
                        'roast_photo_gallery' => 'Photo Gallery',
                    ),
                    'disabled' => array(
                    ),
                ),
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'     => __( 'Home Page Content Settings', 'roast' ),
        'id'        => 'home-content-section',
        'subsection'=> true,
        'fields'     => array(
            array(
                'id'       => 'roast_service_container_char_limit',
                'type'     => 'text',
                'title'    => __( 'Service Container Character Limit', 'roast' ),
                'desc'     => __( 'Put a word limit', 'roast' ),
                'validate' => 'numeric',
                'default'  => '42'
            ),
            array(
                'id'       => 'roast_service_title',
                'type'     => 'text',
                'title'    => __( 'Service Container Title', 'roast' ),
                'desc'     => __( 'Service block title', 'roast' ),
                'default'   => __('Services','roast'),
            ),
            array(
                'id'       => 'roast_service_one',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     =>  array('post_type' => array('roast_services')),
                'title'    => __( 'Service Container One', 'roast' ),
                'desc'     => __( 'Select service for first container', 'roast' ),
            ),
            array(
                'id'       => 'roast_service_two',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     =>  array('post_type' => array('roast_services')),
                'title'    => __( 'Service Container Two', 'roast' ),
                'desc'     => __( 'Select service for second container', 'roast' ),
            ),
            array(
                'id'       => 'roast_service_three',
                'type'     => 'select',
                'data'     => 'posts',
                'args'     =>  array('post_type' => array('roast_services')),
                'title'    => __( 'Service Container Three', 'roast' ),
                'desc'     => __( 'Select service for third container', 'roast' ),
            ),
            array(
                'id'   => 'recipe-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'roast_special_recipe_title',
                'type'     => 'text',
                'title'    => __( 'Special Recipe Title', 'roast' ),
                'desc'     => __( 'Sepcial recipe block title', 'roast' ),
                'default'  => __( 'Our Specials', 'roast' )
            ),
            array(
                'id'       => 'roast_special_recipe_no',
                'type'     => 'text',
                'title'    => __( 'Number of Special Recipe to Show', 'roast' ),
                'desc'     => __( 'Put the number to show recipes', 'roast' ),
                'default'  => '6'
            ),
            array(
                'id'       => 'roast_recipe_page_link',
                'type'     => 'select',
                'data'     => 'page',
                'title'    => __( 'Recipe Page Link', 'roast' ),
                'desc'     => __( 'Link to all recipe page', 'roast' )
            ),
            array(
                'id'   => 'blog-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'roast_blog_title',
                'type'     => 'text',
                'title'    => __( 'Blog Title', 'roast' ),
                'desc'     => __( 'Blog block title', 'roast' ),
                'default'  => __( 'Latest News', 'roast' ),
            ),
            array(
                'id'       => 'roast_home_post',
                'type'     => 'select',
                'data'     => 'post',
                'title'    => __( 'Select Blog Post to Show', 'roast' ),
                'desc'     => __( 'Show blog post to show on home page', 'roast' ),
                'default'  => '1'
            ),
            array(
                'id'   => 'testimonial-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'roast_testimonial_title',
                'type'     => 'text',
                'title'    => __( 'Testimonial Title', 'roast' ),
                'desc'     => __( 'Testimonial block title', 'roast' ),
                'default'  => __( 'Testimonials', 'roast' ),
            ),
            array(
                'id'       => 'roast_testimonial_no',
                'type'     => 'text',
                'title'    => __( 'Number of Testimonial to Show', 'roast' ),
                'desc'     => __( 'Put the number to show testimonial post', 'roast' ),
                'default'  => '2'
            ),
            array(
                'id'   => 'team-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'roast_team_title',
                'type'     => 'text',
                'title'    => __( 'Team Title', 'roast' ),
                'desc'     => __( 'Team block title', 'roast' ),
                'default'  => __( 'Our Team', 'roast' ),
            ),
            array(
                'id'       => 'roast_team_no',
                'type'     => 'text',
                'title'    => __( 'Number of Team Profile to Show', 'roast' ),
                'desc'     => __( 'Put the number to show team post', 'roast' ),
                'default'  => '4'
            ),
            array(
                'id'   => 'blog-divide',
                'type' => 'divide'
            ),
            array(
                'id'       => 'roast_gallery_title',
                'type'     => 'text',
                'title'    => __( 'Gallery Title', 'roast' ),
                'desc'     => __( 'Title for the gallery', 'roast' ),
                'default'  => 'Photo Gallery'
            ),
            array(
                'id'       => 'roast_home_gallery',
                'type'     => 'gallery',
                'title'    => __( 'Add/Edit Gallery', 'roast' ),
                'desc'     => __( 'Select images to display on home page featured gallery', 'roast' ),
            ),
        )
    ));


    Redux::setSection( $opt_name, array(
        'title' => __( 'Color Settings', 'roast' ),
        'id'    => 'color-settings',
        'desc'  => __( 'Color setting for the site', 'roast' ),
        'icon'  => 'el el-pencil'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Site Color Settings', 'roast' ),
        'id'         => 'color-opt',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'site_accent_color',
              'type'     => 'color',
              'title'    => __( 'Site Accent Color', 'roast' ),
              'default'  => '#478D06',
              'transparent' => false
          ),
          array(
              'id'       => 'site_anchor_hover_color',
              'type'     => 'color',
              'title'    => __( 'Site Anchor Color', 'roast' ),
              'default'  => '#478D06',
              'transparent' => false
          ),
          array(
              'id'       => 'site_header_color',
              'type'     => 'color',
              'title'    => __( 'Header Color', 'roast' ),
              'default'  => '#DBC585',
              'transparent' => false
          ),
          array(
              'id'       => 'site_text_color',
              'type'     => 'color',
              'title'    => __( 'Text Color', 'roast' ),
              'default'  => '#999',
              'transparent' => false
          ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title' => __( 'Widget Areas', 'roast' ),
        'id'    => 'widget-area',
        'desc'  => __( 'Create New Blog Widget Area', 'roast' ),
        'icon'  => 'el el-th'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Widget Areas', 'roast' ),
        'id'         => 'widget-opt',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'roast_widget_areas',
              'type'     => 'multi_text',
              'validate' => 'no_special_chars',
              'title'    => __( 'Add New Widget Area', 'roast' ),
              'desc'     => __( 'Sidebar name', 'roast' )
          )
        )
    ));

    Redux::setSection( $opt_name, array(
        'title' => __( 'Archives Sidebar', 'roast' ),
        'id'    => 'archive-area',
        'desc'  => __( 'Assign Sidebars to Archive Areas', 'roast' ),
        'icon'  => 'el el-tasks'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Archives Sidebar', 'roast' ),
        'id'         => 'archive-opt',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'roast_author_sidebar',
              'type'     => 'select',
              'title'    => 'Select Sidebar for Author',
              'data'     => 'sidebars',
              'default'  => '',
          ),
          array(
              'id'       => 'roast_date_sidebar',
              'type'     => 'select',
              'title'    => 'Select Sidebar for Date',
              'data'     => 'sidebars',
              'default'  => '',
          ),
          array(
              'id'       => 'roast_blog_cat_sidebar',
              'type'     => 'select',
              'title'    => 'Select Sidebar for Blog Category',
              'data'     => 'sidebars',
              'default'  => '',
          ),
          array(
              'id'       => 'roast_blog_tag_sidebar',
              'type'     => 'select',
              'title'    => 'Select Sidebar for Blog Tag',
              'data'     => 'sidebars',
              'default'  => '',
          ),
          array(
              'id'       => 'roast_search_sidebar',
              'type'     => 'select',
              'title'    => 'Select Sidebar for Search',
              'data'     => 'sidebars',
              'default'  => '',
          ),
          array(
              'id'       => 'roast_404_sidebar',
              'type'     => 'select',
              'title'    => 'Select Sidebar for 404',
              'data'     => 'sidebars',
              'default'  => '',
          ),
        )
    ));

    /*
     * <--- END SECTIONS
     */
