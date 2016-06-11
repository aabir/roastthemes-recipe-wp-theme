<?php
/**
 * Theme custom functions
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Deceide a column width for sidebar */
if ( ! function_exists('getMainColumnSize') ) {

	function getMainColumnSize()
	{
    global $roast_options;

    if( is_page() || is_single() )
    {
      $sidebar = get_post_meta( get_the_ID(), 'roast_sidebar_options', true );

      if( $sidebar != 'sidebar_right' ){
        return 12;
      } else {
        return 9;
      }

    } else if ( is_author() )
    {
      if($roast_options['roast_author_sidebar']){
        return array( 'sidebar' => $roast_options['roast_author_sidebar'], 'column' => 9 );
      } else {
        return array( 'column' => 12 );
      }
    }
    else if ( is_date() )
    {
      if($roast_options['roast_date_sidebar']){
        return array( 'sidebar' => $roast_options['roast_date_sidebar'], 'column' => 9 );
      } else {
        return array( 'column' => 12 );
      }
    }
    else if( is_category() )
    {
      if($roast_options['roast_blog_cat_sidebar']){
        return array( 'sidebar' => $roast_options['roast_blog_cat_sidebar'], 'column' => 9 );
      } else {
        return array( 'column' => 12 );
      }
    }
    else if( is_tag() )
    {
      if($roast_options['roast_blog_tag_sidebar']){
        return array( 'sidebar' => $roast_options['roast_blog_tag_sidebar'], 'column' => 9 );
      } else {
        return array( 'column' => 12 );
      }
    }
    else if( is_search() )
    {
      if($roast_options['roast_search_sidebar']){
        return array( 'sidebar' => $roast_options['roast_search_sidebar'], 'column' => 9 );
      } else {
        return array( 'column' => 12 );
      }
    }
    else if( is_404() )
    {
      if($roast_options['roast_404_sidebar']){
        return array( 'sidebar' => $roast_options['roast_404_sidebar'], 'column' => 9 );
      } else {
        return array( 'column' => 12 );
      }
    }
	}
}

/* returns number of words from the_content. */
if ( !function_exists ('content') ):

  function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
    	array_pop($content);
    	$content = implode(" ",$content);
    	$content = preg_replace('/<img[^>]+./','', $content);
    } else {
    	$content = implode(" ",$content);
    	$content = preg_replace('/<img[^>]+./','', $content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
  }

endif;

/* return attachment details from image ID */
function wp_get_attachment( $attachment_id ) {
  $attachment = get_post( $attachment_id );
  return array(
      'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
      'caption' => $attachment->post_excerpt,
      'description' => $attachment->post_content,
      'href' => get_permalink( $attachment->ID ),
      'src' => $attachment->guid,
      'title' => $attachment->post_title
  );
}


/* Theme widget init */
add_action( 'widgets_init', 'roast_widget_areas' );

function roast_widget_areas() {

    register_sidebar( array(
        'name'          => __( 'Blog Widget', 'roast' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'Blog page sidebars.', 'roast' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
      	'after_widget'  => '</li>',
      	'before_title'  => '<h4 class="widget-title">',
      	'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Widget', 'roast' ),
        'id'            => 'footer-sidebar',
        'description'   => __( 'Footer widget area.', 'roast' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
      	'after_widget'  => '</div>',
      	'before_title'  => '<h4 class="footer-title">',
      	'after_title'   => '</h4>',
    ) );
}

/* Search form customization */
function roast_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" />
    <input class="btn btn-primary" type="submit" id="search_submit" value="'. esc_attr__( 'Search', 'roast' ) .'" />
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'roast_search_form' );

/* Display template for comments and pingbacks. */
if ( !function_exists('roast_comment') ) :
    function roast_comment($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' : ?>

                <li class="comment media" id="comment-<?php comment_ID(); ?>">
                    <div class="media-body">
                        <p>
                            <?php _e('Pingback:', 'roast'); ?> <?php comment_author_link(); ?>
                        </p>
                    </div><!--/.media-body -->
                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post; ?>

                <li class="comment media" id="li-comment-<?php comment_ID(); ?>">
                        <a href="<?php echo $comment->comment_author_url;?>" class="pull-left">
                            <?php echo get_avatar($comment, 64); ?>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading comment-author vcard">
                                <?php
                                printf('<cite class="fn">%1$s %2$s</cite>',
                                    get_comment_author_link(),
                                    // If current post author is also comment author, make it known visually.
                                    ($comment->user_id === $post->post_author) ? '<span class="label"> ' . __(
                                        'Post author',
                                        'roast'
                                    ) . '</span> ' : ''); ?>
                            </h4>

                            <?php if ('0' == $comment->comment_approved) : ?>
                                <p class="comment-awaiting-moderation"><?php _e(
                                    'Your comment is awaiting moderation.',
                                    'roast'
                                ); ?></p>
                            <?php endif; ?>

                            <?php comment_text(); ?>
                            <p class="meta">
                                <?php printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                            esc_url(get_comment_link($comment->comment_ID)),
                                            get_comment_time('c'),
                                            sprintf(
                                                __('%1$s at %2$s', 'roast'),
                                                get_comment_date(),
                                                get_comment_time()
                                            )
                                        ); ?>
                            </p>
                            <p class="reply">
                                <?php comment_reply_link( array_merge($args, array(
                                            'reply_text' => __('Reply <span>&darr;</span>', 'roast'),
                                            'depth'      => $depth,
                                            'max_depth'  => $args['max_depth']
                                        )
                                    )); ?>
                            </p>
                        </div>
                        <!--/.media-body -->
                <?php
                break;
        endswitch;
    }
endif;

/* Modify comments form. */
function roast_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();

    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
    );

    return $fields;
}
add_filter( 'comment_form_default_fields', 'roast_comment_form_fields' );

/* Modify comments textarea field. */
function roast_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    $args['class_submit'] = 'btn btn-primary';

    return $args;
}
add_filter( 'comment_form_defaults', 'roast_comment_form' );

/* return meta info of a post */
if ( ! function_exists( 'roast_entry_meta' ) ) :

  function roast_entry_meta(){ ?>

    <div class="entry-meta">
      <?php
      if ( 'post' === get_post_type() ) {
    		$author_avatar_size = apply_filters( 'roast_author_avatar_size', 49 );
    		printf( '<i class="fa fa-user" aria-hidden="true"></i> <span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span> /',
    			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
    			_x( 'Author', 'Used before post author name.', 'roast' ),
    			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
    			get_the_author()
    		);
	    }

      if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		      roast_entry_date();
	    }

      $categories = get_the_category();
      $separator = ', ';
      $output = '<i class="fa fa-folder-open-o"></i> ';
      $output .= '';
      if ( ! empty( $categories ) ) {
        foreach( $categories as $category ) {
          $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
        }
        echo trim( $output, $separator );
      }
      ?>
      <?php $posttags = get_the_tags();
      if($posttags){ ?>
        / <i class="fa fa-tag"></i> <?php the_tags( 'Tags: ', ', ', '' ); ?>
      <?php } ?>

      <?php $comments_count = wp_count_comments( get_the_ID() );
            if( $comments_count->total_comments > 0 ): ?>
              / <i class="fa fa-comments-o"></i> <a href="<?php comments_link(); ?>"><?php echo $comments_count->total_comments; ?></a>
            <?php endif;
      ?>

    </div>
    <?php
  }
endif;

/** Prints HTML with date information for current post. */
if ( ! function_exists( 'roast_entry_date' ) ) :

function roast_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( ' <i class="fa fa-calendar-o"></i> <span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span> / ',
		_x( 'Posted on', 'Used before publish date.', 'roast' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

/* mailchimp API integration */

add_action( 'wp_ajax_nopriv_send_newsletter', 'send_newsletter' );
add_action( 'wp_ajax_send_newsletter', 'send_newsletter' );

	function send_newsletter()
	{
		$email = $_POST['email'];
    $newsletter_apikey = $_POST['newsletter_apikey'];
    $newsletter_listid = $_POST['newsletter_listid'];

		if($email && $newsletter_apikey && $newsletter_listid)
		{
      $prefix_url = explode('-', $newsletter_listid); //explode hypen(-) to get server url first portion.
      $prefix_url = $prefix_url[1];
			echo $submit_url = "https://".$prefix_url.".api.mailchimp.com/2.0/lists/subscribe.json"; //Submit URL

			$send_data=array(
				'email'=>array('email'=> $email),
				'apikey'=> $newsletter_apikey,
				'id'=> $newsletter_listid,
				'double_optin'=>false,
				'update_existing'=>false,
				'replace_interests'=>false,
				'send_welcome'=>false,
				'email_type'=>"html",
			);
			$payload = json_encode($send_data);

			$ch=curl_init();
			curl_setopt($ch,CURLOPT_URL,$submit_url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch,CURLOPT_POST,true);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$payload);
			$result=curl_exec($ch);
			curl_close($ch);

			$data = json_decode($result);

			if (isset($data->error)){
				echo $data->error;
			} else {
				echo "ok";
			}
		}
		else
		echo 'Error!!!!';
	}
