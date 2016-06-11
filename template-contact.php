<?php
/* Template Name: Contact Page Template */

/**
 * Contact template file
 *
 * @package roast-recipe
 * @since roast-recipe 1.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header(); ?>

<div class="contact">
	 <div class="container">
				<h2><?php the_title(); ?></h2>

			<div class="footer-bottom">
					<div class="col-md-4 footer-left">
						<?php if($roast_options['contact_phone']) : ?>
						<div class="f-1">
							<span class="glyphicon3 glyphicon-phone-alt" aria-hidden="true"></span>
							<p><a href="tel: <?php echo $roast_options['contact_phone']; ?>"><?php echo $roast_options['contact_phone']; ?></a></p>
						</div>
						<?php endif; ?>

						<?php if($roast_options['contact_mail_address']) : ?>
						<div class="f-1">
							<span class="glyphicon3 glyphicon-envelope2" aria-hidden="true"></span>
							<p><a href="mailto: <?php echo $roast_options['contact_mail_address']; ?>"><?php echo $roast_options['contact_mail_address']; ?></a></p>
						</div>
						<?php endif; ?>

						<?php if($roast_options['contact_address']) : ?>
						<div class="f-1">
							<span class="glyphicon3 glyphicon-map-marker" aria-hidden="true"></span>
							<p><?php echo $roast_options['contact_address']; ?></p>
						</div>
						<?php endif; ?>

						<?php
							$fb_social_link = $roast_options['fb_social_link'];
							$twitter_social_link = $roast_options['twitter_social_link'];
							$pinterest_social_link = $roast_options['pinterest_social_link'];
							$gplus_social_link = $roast_options['gplus_social_link'];

							if($fb_social_link || $twitter_social_link || $pinterest_social_link || $gplus_social_link):
						?>
						<div class="f-1">
							<div class="social-links">
  							<a href="<?php echo $fb_social_link; ?>" target="_blank"><i class="fa fa-facebook "></i></a>
  							<a href="<?php echo $twitter_social_link; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
  							<a href="<?php echo $pinterest_social_link; ?>" target="_blank"><i class="fa fa-google-plus "></i></a>
  							<a href="<?php echo $gplus_social_link; ?>" target="_blank"><i class="fa fa-pinterest-p "></i></a>
  						</div>
						</div>
						<?php endif; ?>

					</div>
					<div class="col-md-8 footer-right">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>

						<div id="form-success" style="display: none; "></div>

						<form method="post" id="contact_form">

							<input type="text" name="contactname" value="" placeholder="Your Name" required />
							<input type="email" name="contactemail" value="" placeholder="Your Email" required />
							<textarea name="contactmessage" placeholder="Your Message" required></textarea>
							<input type="hidden" name="site_name" id="site_name" value="<?php bloginfo( 'name' ); ?>" />
							<input type="hidden" name="email_recepient" value="<?php echo $roast_options['contact_mail_recepient']; ?>" />
							<input type="submit" value="Send" />

						</form>

					</div>

				<div class="clearfix"></div>
		 </div>
		 <!---728x90--->

		 <div id="map"></div>

	 </div>
</div>
<script>
/* Google Map API V3 Customization Cod */
function initialize() {

	// Create an array of styles.
	var styles = [
{
		"featureType": "landscape",
		"elementType": "geometry.fill",
		"stylers": [
			{ "visibility": "off" }
		]
	},{
		"featureType": "water",
		"elementType": "geometry",
		"stylers": [
			{ "visibility": "off" }
		]
	},{
		"featureType": "road",
		"elementType": "geometry.fill",
		"stylers": [
			{ "visibility": "on" },
			{ "color": "#ffffff" }
		]
	},{
		"featureType": "road.arterial",
		"elementType": "labels.text.fill",
		"stylers": [
			{ "visibility": "on" },
			{ "color": "#303030" }
		]
	},{
		"featureType": "road.arterial",
		"elementType": "labels.text.stroke",
		"stylers": [
			{ "visibility": "off" }
		]
	},{
		"featureType": "road",
		"elementType": "geometry",
		"stylers": [
			{ "visibility": "simplified" }
		]
	},{
		"featureType": "road.highway",
		"elementType": "labels.icon",
		"stylers": [
			{ "visibility": "off" }
		]
	}

	 ,{
		"featureType": "road",
		"elementType": "geometry.fill",
		"stylers": [
			{ "visibility": "on" },
			{ "color": "#ffffff" },
			{ "weight": 7.5 }
		]
	}

	 ,{
		"featureType": "road.arterial",
		"elementType": "geometry.fill",
		"stylers": [
			{ "visibility": "on" },
			{ "color": "<?php echo $roast_options['site_accent_color']; ?>" }
		]
	}
	];

	// Create a new StyledMapType object, passing it the array of styles,
	// as well as the name to be displayed on the map type control.
	var styledMap = new google.maps.StyledMapType(styles,  {name: "Styled Map"});

	// Create a map object, and include the MapTypeId to add
	// to the map type control.
	var mapOptions = {
		zoom: 8,
		scrollwheel:false,
		center: new google.maps.LatLng(map_latitude, map_longitude),
			 mapTypeControlOptions: {
			 mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		},
		backgroundColor: '#F4F3F0'
	};


	//generate map
	var map = new google.maps.Map(document.getElementById('map'),   mapOptions);

	//Associate the styled map with the MapTypeId and set it to display.
	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');

	//add marker
	var marker = new google.maps.Marker({
	// position: myLatlng,
	icon: stylesheet_directory + '/images/map_icon.png',
	position: mapOptions.center,
	 map: map,
	 title: site_title
	});

	var infowindow = new google.maps.InfoWindow({
		content: '<p>' + site_title + '</p>'
	});

	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map, marker);
	});

}
/* initialize google map for contact page. */
jQuery(document).ready(function(){
	initialize();
});
</script>
<?php get_footer(); ?>
