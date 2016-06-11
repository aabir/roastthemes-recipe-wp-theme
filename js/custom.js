
/* Open Bootstrap menu on hover */
jQuery('ul.nav li.dropdown').hover(function() {
  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

/* Contact Form */
jQuery(function($){

	var form = $('#contact_form');

	form.on('submit', function(e){
		e.preventDefault();

			data = form.serialize();

			$.ajax({
				url: stylesheet_directory + "/inc/contact_processor.php",
				type: "POST",
				dataType: "json",
				data: data,
				success: function(rt){
					if(rt && rt.success == true) {
						$("#form-success").show().html(' <p class="text-success">Thank you, your messge was sent successfully.</p> ');
						$("#contact_form")[0].reset();
					} else if(rt && rt.success == false) {

					}
				}
			});
	})
});

/* Scroll to top */
jQuery(document).ready(function ($) {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
});

//recipe filter
jQuery(function($){
	$recipe_selectors = $('.recipe-filter >li>a');
	if($recipe_selectors!='undefined'){
		$recipe = $('#myList');
		$recipe.isotope({
			itemSelector : 'div.recip-sec',
			layoutMode : 'fitRows'
		});

		$recipe_selectors.on('click', function(){
			$recipe_selectors.removeClass('active');
			$(this).addClass('active');
			var selector = $(this).attr('data-filter');
			$recipe.isotope({ filter: selector });
			return false;
		});
	}
});

jQuery(function($){
	$('.pop-title').on('click', function(e){
			var post_link = $(this).attr("href");
			e.preventDefault();
	    $.fancybox({
					closeBtn: false,
	        autoSize: true,
	        href: stylesheet_directory + '/ajax-recipe.php' + "?post_link=" + post_link,
	        type: 'ajax',
					helpers: {
				    overlay: {
				      locked: false
				    }
				  }
	    });
	});
	/* Gallery Pop Up */
	$(".pop-gallery").fancybox({
		padding: '0px',
		helpers: {
	    overlay: {
	      locked: false
	    }
  	}
	});

	/* front page gallery */
	$(".fancybox").fancybox({
		padding: '0px',
		helpers: {
	    overlay: {
	      locked: false
	    }
  	}
	});

	var $item = $('.carousel .item');
	var $wHeight = $(window).height();
	$item.eq(0).addClass('active');
	$item.height($wHeight);
	$item.addClass('full-screen');

	$('.carousel img').each(function() {
	  var $src = $(this).attr('src');
	  var $color = $(this).attr('data-color');
	  $(this).parent().css({
	    'background-image' : 'url(' + $src + ')',
	    'background-color' : $color
	  });
	  $(this).remove();
	});

	$(window).on('resize', function (){
	  $wHeight = $(window).height();
	  $item.height($wHeight);
	});

	$('.carousel').carousel({
	  interval: 4000,
	  pause: "false"
	});

})

/*Special recipe carousel */
jQuery(function($){
	$("#flexiselDemo1").flexisel({
		 visibleItems: 4,
		 animationSpeed: 1000,
		 autoPlay: false,
		 autoPlaySpeed: 3000,
		 pauseOnHover:true,
		 enableResponsiveBreakpoints: true,
		 responsiveBreakpoints: {
			 portrait: {
				 changePoint:480,
				 visibleItems: 1
			 },
			 landscape: {
				 changePoint:640,
				 visibleItems: 2
			 },
			 tablet: {
				 changePoint:768,
				 visibleItems: 3
			 }
		 }
	});

	$("#flexiselGallery").flexisel({
		 visibleItems: 4,
		 animationSpeed: 1000,
		 autoPlay: false,
		 autoPlaySpeed: 3000,
		 pauseOnHover:true,
		 enableResponsiveBreakpoints: true,
		 responsiveBreakpoints: {
			 portrait: {
				 changePoint:480,
				 visibleItems: 1
			 },
			 landscape: {
				 changePoint:640,
				 visibleItems: 2
			 },
			 tablet: {
				 changePoint:768,
				 visibleItems: 3
			 }
		 }
	});

});
