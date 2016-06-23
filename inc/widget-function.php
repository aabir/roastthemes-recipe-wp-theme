<?php
/**
 * Widget related all functions
 *
 * @package roast-recipe
 * @since roast-recipe 0.1
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/* Recent widget customization */
Class Roast_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {

		extract( $args );

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'roast') : $instance['title'], $instance, $this->id_base);

		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :

			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
			<ul class="recent-post">
				<?php while( $r->have_posts() ) : $r->the_post(); ?>

				<li>
					<?php 	$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_url($thumb_id, 'full');
						if($thumb_url){ ?>
					<div class="widget-feature">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<img src="<?php echo $thumb_url; ?>" title="<?php the_title(); ?>" width="45" height="45" />
						</a>
					</div>
						<?php }	?>
					<div class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</div>
					<?php if ( $show_date ) : ?>
					<div class="widget-date"><?php echo get_the_date(); ?> </div>
					<?php endif; ?>
				</li>
				<?php endwhile; ?>
			</ul>

			<?php
			echo $after_widget;

		wp_reset_postdata();

		endif;
	}
}

function roast_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('Roast_Recent_Posts_Widget');
}
add_action('widgets_init', 'roast_recent_widget_registration');


/* Footer sidebar generate */
function roast_footer_sidebar_params($params) {

    $sidebar_id = $params[0]['id'];

    if ( $sidebar_id == 'footer-sidebar' ) {

        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);

        $params[0]['before_widget'] = str_replace('class="', 'class="col-md-' . floor(12 / $sidebar_widgets) . ' ', $params[0]['before_widget']);
    }

    return $params;
}
add_filter('dynamic_sidebar_params','roast_footer_sidebar_params');


/* Contact widget */
final class Contact_Widget_Class extends WP_Widget {

		function __construct() {

      $widget_ops = array('classname' => 'footer_contact_widget_class', 'description' => __('Footer Contact Widget', 'roast'));

      $control_ops = array('width' => 250, 'height' => 250);

      parent::__construct(false, $name = __('Roast Contact Widget', 'roast'), $widget_ops, $control_ops );

		}

		function form($instance) {

			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : ''; ?>

			<p>
			     <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'roast'); ?></label>
			     <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>

			<?php
		}

		function update($new_instance, $old_instance) {
			  $instance = $old_instance;

			  $instance['title'] = strip_tags($new_instance['title']);
			 return $instance;
		}

		function widget($args, $instance) {

        //Init Redux
         global $roast_options;

			   extract( $args );
			   // these are the widget options
			   $title = apply_filters('widget_title', $instance['title']);

			   echo $before_widget;
			   // Display the widget

         if ( $title ) {
				  echo $before_title . $title . $after_title;
			   }

         if($roast_options['contact_address']){
            echo '<p><i class="fa fa-map-marker"></i> '.$roast_options['contact_address'].'</p>';
         }

         if($roast_options['header_phone']){
           $header_phone = $roast_options['header_phone'];
           echo '<p><i class="fa fa-phone"></i> Phone : <a href="tel: ' .$header_phone.' ">'.$header_phone.'</a>';
         }

         if($roast_options['header_mail']){
           $header_mail = $roast_options['header_mail'];
           echo '<br /><i class="fa fa-envelope-o"></i> Email : <a href="mailto: '.$header_mail.' ">'.$header_mail.'</a></p>';
         }

         if( $roast_options['fb_social_link'] || $roast_options['twitter_social_link'] || $roast_options['pinterest_social_link'] || $roast_options['gplus_social_link'] ) {

            echo '<div class="social-links">';

            if($roast_options['fb_social_link']){
              echo '<a href="'.$roast_options['fb_social_link'].'" target="_blank"><i class="fa fa-facebook"></i></a>';
            }

            if($roast_options['twitter_social_link']){
              echo '<a href="'.$roast_options['twitter_social_link'].'" target="_blank"><i class="fa fa-twitter"></i></a>';
            }

            if($roast_options['gplus_social_link']){
              echo '<a href="'.$roast_options['gplus_social_link'].'" target="_blank"><i class="fa fa-google-plus"></i></a>';
            }

            if($roast_options['pinterest_social_link']){
              echo '<a href="'.$roast_options['pinterest_social_link'].'" target="_blank"><i class="fa fa-pinterest-p"></i></a>';
            }

            echo '</div>';
         }

			   echo $after_widget;
		}

	}

function load_contact_widget() {
	register_widget( 'Contact_Widget_Class' );
}
add_action( 'widgets_init', 'load_contact_widget' );

/* Newletter Widget */

final class Newletter_Widget_Class extends WP_Widget {

	function __construct() {

      $widget_ops = array('classname' => 'news-ltr', 'description' => __('This widget will only work when MailChimp API key and List ID provided in Theme Options', 'roast'));

      $control_ops = array('width' => 250, 'height' => 250);

      parent::__construct('newsletter_widget', $name = __('Roast mailchimp API Newsletter Widget', 'roast'), $widget_ops, $control_ops );
	}


		function form($instance) {

			 $newsletter_title = ! empty( $instance['newsletter_title'] ) ? $instance['newsletter_title'] : '';
			 $newsletter_desc = isset( $instance['newsletter_desc'] ) ? esc_attr( $instance['newsletter_desc'] ) : '';
			 $newsletter_apikey = isset( $instance['newsletter_apikey'] ) ? esc_attr( $instance['newsletter_apikey'] ) : '';
			 $newsletter_listid = isset( $instance['newsletter_listid'] ) ? esc_attr( $instance['newsletter_listid'] ) : '';
			 $newsletter_successMsg = isset( $instance['newsletter_successMsg'] ) ? esc_attr( $instance['newsletter_successMsg'] ) : ''; ?>

			<p>
			  <label for="<?php echo $this->get_field_id('newsletter_title'); ?>"><?php _e('Title', 'roast'); ?></label>
			  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo $this->get_field_name('newsletter_title'); ?>" type="text" value="<?php echo esc_attr($newsletter_title); ?>" />
			</p>

			<p>
			  <label for="<?php echo $this->get_field_id('newsletter_desc'); ?>"><?php _e('Description', 'roast'); ?></label>
				<textarea class="widefat" name="<?php echo $this->get_field_name('newsletter_desc'); ?>"><?php echo $newsletter_desc; ?></textarea>
			</p>

			<p>
			  <label for="<?php echo $this->get_field_id('newsletter_apikey'); ?>"><?php _e('MailChimp APIKey', 'roast'); ?></label>
			  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'newsletter_apikey' ) ); ?>" name="<?php echo $this->get_field_name('newsletter_apikey'); ?>" type="text" value="<?php echo esc_attr($newsletter_apikey); ?>" placeholder="API Key" />
			</p>

			<p>
			  <label for="<?php echo $this->get_field_id('newsletter_listid'); ?>"><?php _e('MailChimp List ID', 'roast'); ?></label>
			  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'newsletter_listid' ) ); ?>" name="<?php echo $this->get_field_name('newsletter_listid'); ?>" type="text" value="<?php echo esc_attr($newsletter_listid); ?>" placeholder="List ID" />
			</p>

			<p>
			  <label for="<?php echo $this->get_field_id('newsletter_successMsg'); ?>"><?php _e('Message On Success', 'roast'); ?></label>
			  <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'newsletter_successMsg' ) ); ?>" name="<?php echo $this->get_field_name('newsletter_successMsg'); ?>" type="text" value="<?php echo esc_attr($newsletter_successMsg); ?>" placeholder="Thank You for subscription." />
			</p>

			<?php
		}

		function update($new_instance, $old_instance) {
			$instance = $old_instance;

			$instance['newsletter_title'] = strip_tags($new_instance['newsletter_title']);
			$instance['newsletter_desc'] = strip_tags($new_instance['newsletter_desc']);
			$instance['newsletter_apikey'] = strip_tags($new_instance['newsletter_apikey']);
			$instance['newsletter_listid'] = strip_tags($new_instance['newsletter_listid']);
			$instance['newsletter_successMsg'] = strip_tags($new_instance['newsletter_successMsg']);
			return $instance;
		}

		function widget($args, $instance) {

			   extract( $args );
			   // these are the widget options
			   $newsletter_title = apply_filters('widget_title', $instance['newsletter_title']);
				 $newsletter_desc = apply_filters('widget_description', $instance['newsletter_desc']);
				 $newsletter_apikey = apply_filters('widget_apikey', $instance['newsletter_apikey']);
				 $newsletter_listid = apply_filters('widget_listid', $instance['newsletter_listid']);
				 $newsletter_successMsg = apply_filters('widget_successmsg', $instance['newsletter_successMsg']);

			   echo $before_widget;
			   // Display the widget

        if ( $newsletter_title ) {
				  echo $before_title . $newsletter_title . $after_title;
				}

				if ( $newsletter_desc ) {
				  echo "<p>" . $newsletter_desc . "</p>";
				} ?>

				<p id="result2" style="text-align:center"></p>
				<form id="roast_newsletter">
					<input type="email" class="text" name="newsletter_email" id="newsletter_email" value="" placeholder="Enter Email" required />
					<input type="hidden" value="<?php echo $newsletter_apikey; ?>" id="newsletter_apikey" name="newsletter_apikey" />
					<input type="hidden" value="<?php echo $newsletter_listid; ?>" id="newsletter_listid" name="newsletter_listid" />
					<input type="hidden" value="<?php echo $newsletter_successMsg; ?>" id="newsletter_successMsg" name="newsletter_successMsg" />
					<input type="submit" value="Go" id="newsletter_subscribe" name="newsletter_subscribe">
					<div class="clearfix"></div>
				</form>

			  <?php  echo $after_widget; ?>

				<script>
				jQuery(function($){

					var newsletter_form = $('#roast_newsletter');
					newsletter_form.on('submit', function(e){
						e.preventDefault();

						var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

						var email=$('#newsletter_email').val();
						var apiKey=$('#newsletter_apikey').val();
						var listId=$('#newsletter_listid').val();
						var successMsg=$('#newsletter_successMsg').val();
						if( ! successMsg ) { successMsg = "Thank your for subscription."}

						if(pattern.test(email))
						{
							$.ajax({url: "<?php echo get_site_url(); ?>/wp-admin/admin-ajax.php",
								type:"post",
								data:"action=send_newsletter&email="+email+"&apiKey="+apiKey+"&listId="+listId,
								success:function(result){
									result = result.replace("0", "");
									if(result=='ok')
									{
										result = successMsg;
										$('#result2').css('color','#0093E2');
									}
									else
									{
										result=email+' is already subscribed to our newsletter list.';
										$('#result2').css('color','red');
									}
										$('#result2').html(result);
									}
							});
						}
					});
				});
				</script>

<?php
		}

	}

	function load_newsletter_widget() {
		register_widget( 'Newletter_Widget_Class' );
	}
	add_action( 'widgets_init', 'load_newsletter_widget' );
?>
