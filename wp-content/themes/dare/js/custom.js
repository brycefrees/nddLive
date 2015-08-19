/*
Theme Name: Dare
Theme URI: http://www.themeforest.net/user/mounte/portfolio
Author: Dor Bens / Mounte
Author URI: http://www.themeforest.net/user/mounte
Description: The perfect theme for creative agencies.
Version: 1.0.0
Tags: responsive, 960 grid system
*/

jQuery(function($){


	/* superfish initialize
	=================================================================================*/
	$('#nav ul li').each(function(){
		if ($(this).has('ul').length)
			$(this).addClass('hasChilds');
	});


	var $menu_select = $("<select />");	
	$("<option />", {"selected": "selected", "value": "", "text": "Navigation Menu"}).appendTo($menu_select);
	$menu_select.appendTo("#nav");
	
	$("#nav ul li a").each(function(){
		var menu_url = $(this).attr("href");
		var menu_text = $(this).text();
		if ($(this).parents("li").length == 2) { menu_text = '- ' + menu_text; }
		if ($(this).parents("li").length == 3) { menu_text = "-- " + menu_text; }
		if ($(this).parents("li").length > 3) { menu_text = "--- " + menu_text; }
		$("<option />", {"value": menu_url, "text": menu_text}).appendTo($menu_select)
	})
	
	field_id = "#nav select";
	$(field_id).change(function()
	{
	   value = $(this).attr('value');
	   window.location = value;		
	});


	/* load prettyPhoto
	=================================================================================*/
	$("a[rel^='prettyPhoto']").prettyPhoto({
	
		show_title: false,
		default_width: 700,
		default_height: 411,
	
	});


	/* load responsive slideshow
	=================================================================================*/
	$(".slideshow").responsiveSlides({
		auto: false,
		pager: false,
		nav: true,
		speed: 500,
		namespace: "slides"
	});


	/* load flexslider
	=================================================================================*/
	$('.flexslider').flexslider({
		animation: "slide",
		smoothHeight: true,
		easing: 'easeInOutExpo',
		controlNav: true,
		slideshowSpeed: 7000,
		video: true,
		start: function(slider) {
		
			$(slider).delay(200).fadeTo(600,1);
			$('#slider').removeClass('loading');
			
		}
	});


	/* accordion settings
	=================================================================================*/
	$(".accordion h5").click(function(){
		$(this).toggleClass('active').siblings().removeClass('active');
		$(this).next('.content').toggleClass('active').siblings('.content').removeClass('active');
		$(this).next("div.content").slideToggle(300).siblings("div.content").slideUp(300);
	});
	$('.accordion h5:first-child').trigger("click");


	/* placeHolder
	=================================================================================*/
	$("input[placeholder]").placeholder();
	
	/* fitVids
	=================================================================================*/
	$(".video-wrap").fitVids();

	
	/* socialite script
	=================================================================================*/
	 $('.social-buttons').one('mouseenter', function() {
        Socialite.load($(this)[0]);
    });


	/* Team navigation functionality
	=================================================================================*/
	animateMember('load'); // Activate the slider for 'Our Team' page and other
	$('.team-members .nav .down').click(function(){
		if ($memberSlideDone == false)
			return false;
		if ($($teamMember +'.active').next().length == 0)
			animateMember("next",false,true);
		else
			animateMember("next",false,false);
	}); //
	$('.team-members .nav .up').click(function(){
		if ($memberSlideDone == false)
			return false;
		if ($($teamMember +'.active').prev().length == 0)
			animateMember("prev",true,false);
		else
			animateMember("prev",false,false);
	}); //


	/* tooltips
	=================================================================================*/
	$(".tooltip").tipTip({maxWidth: "auto", edgeOffset: 10,delay: 200});
	$(".tooltip-top").tipTip({maxWidth: "auto", edgeOffset: 10,delay: 200,defaultPosition: "top"});


	/* Testimonial
	=================================================================================*/
	$('.testimonials-wrapper').each(function(i){
	
		$(this).find('.testimonial').first().show().addClass('active').siblings('.testimonial').hide().removeClass('active');
		
	});
	
	//$(".testimonials-wrapper .testimonial").first().show().addClass('active').siblings('.testimonial').hide().removeClass('active');
	$(".testimonials-wrapper .testimonial-next").click(function(){
		if (typeof($finish)=="undefined" || $finish == true)
			$finish = false;
		else
			return false;

		if ($(this).parent().find('.testimonial.active').next('.testimonial').length == 0) {
			$(this).parent().find('.testimonial.active').animate({ left: '400%' },{ duration: 300, easing: 'easeInOutExpo', complete: function(){
				$(this).hide().removeClass('active').parent().find('.testimonial').first().addClass('active').css('position','relative').css('left','-400%').fadeIn().animate({left:0},{ duration: 400, easing: 'easeInOutExpo', complete: function() { $finish = true; } });
			}});
		} else {
			$(this).parent().find('.testimonial.active').animate({ left: '400%' },{ duration: 300, easing: 'easeInOutExpo', complete: function(){
				$(this).hide().removeClass('active').css('position','absolute').next('.testimonial').addClass('active').css('position','relative').css('left','-400%').fadeIn().animate({left:0},{ duration: 400, easing: 'easeInOutExpo', complete: function() { $finish = true; } });
			}});
		}
	});
	$(".testimonials-wrapper .testimonial-prev").click(function(){
		if (typeof($finish)=="undefined" || $finish == true)
			$finish = false;
		else
			return false;

		if ($(this).parent().find('.testimonial.active').prev('.testimonial').length == 0) {
			$(this).parent().find('.testimonial.active').animate({ left: '-400%' },{ duration: 300, easing: 'easeInOutExpo', complete: function(){
				$(this).hide().removeClass('active').parent().find('.testimonial').last().addClass('active').css('position','relative').css('left','400%').fadeIn().animate({left:0},{ duration: 400, easing: 'easeInOutExpo', complete: function() { $finish = true; } });
			}});
		} else {
			$(this).parent().find('.testimonial.active').animate({ left: '-400%' },{ duration: 300, easing: 'easeInOutExpo', complete: function(){
				$(this).hide().removeClass('active').css('position','absolute').prev('.testimonial').addClass('active').css('position','relative').css('left','400%').fadeIn().animate({left:0},{ duration: 400, easing: 'easeInOutExpo', complete: function() { $finish = true; } });
			}});
		}			
	});


	/* Tabs
	=================================================================================*/
	$('.tabs div').hide();
	$('.tabs div p').fadeIn('slow');
	$('.tabs div:first-of-type').show();
	$('.tabs ul li:first-of-type').addClass('active');
	$('.tabs ul li a').click(function(){
		$(this).parent().parent().find('li.active').removeClass('active');
		$(this).parent().addClass('active');
		var currentTab = $(this).attr('class')
		$(this).parent().parent().parent().find('div').hide();
		$(this).parent().parent().parent().find('div p').stop(true,true).fadeIn();
		$(this).parent().parent().parent().find('.' + currentTab).show();
		return false;
	});



	/* Isotope settings
	=================================================================================*/
	var $container = $('#portfolio');
	
	if($container.length==1) $container.isotope({
		itemSelector : '.item',
		layoutMode : 'fitRows'

	});

	var $optionSets = $('#filter'),
	$optionLinks = $optionSets.find('a');

	if($container.length==1) $optionLinks.click(function(){
		var $this = $(this);
		if ( $this.hasClass('selected') ) {
			return false;
		}
		var $optionSet = $this.parents('ul');
		$optionSet.find('.active').removeClass('active');
		$(this).parent().addClass('active');

		var options = {},
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
		value = value === 'false' ? false : value;
		options[ key ] = value;
		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
			changeLayoutMode( $this, options )
		} else {
			$container.isotope( options );
		}
		return false;
	});
	
	function animateMember($action,$first,$last){
		$teamMember = '.team-members .member';

		$memberSlideDone = false;

		if ($action == 'load') {
			
			$('.team-members .member').each(function(i){
				$(this).addClass('member' + i);
			});
			$($teamMember).first().fadeIn('slow').addClass('active').siblings().removeClass('active');
			$($teamMember + '.active .picture').animate({
				left: '0' }, {
				duration: 700,
				easing: 'easeInOutExpo'
			});
			$($teamMember + '.active .desc').delay(300).animate({
				top: '0' }, {
				duration: 1200,
				easing: 'easeInOutExpo',
				complete: function(){
					$memberSlideDone = true;
				}
			});
			return false;
		}



		/* first, hide the current member */
		$($teamMember + '.active .picture').stop(true,true).animate({
			left: '-100%' }, {
			duration: 700,
			easing: 'easeInOutExpo'
		});

		$($teamMember + '.active .desc').stop(true,true).delay(300).animate({
			top: '-300px' }, {
			duration: 700,
			easing: 'easeInOutExpo',
			complete: function(){
				/* old member hiding is complete, now move on to the next/prev one */

				/* Next - Not last - Show next*/
				if ($action == "next" && $last == false)
					$($teamMember +'.active').next().addClass('active').show().siblings().removeClass('active').hide();
				/* Next - Last - Go to first*/
				if ($action == "next" && $last == true)
					$($teamMember).first().addClass('active').show().siblings().removeClass('active').hide();

				/* Previous - Not first - Show previous*/
				if ($action == "prev" && $first == false)
					$($teamMember +'.active').prev().addClass('active').show().siblings().removeClass('active').hide();
				/* Previous - First - Show Last*/
				if ($action == "prev" && $first == true)
					$($teamMember).last().addClass('active').show().siblings().removeClass('active').hide();

				$($teamMember + '.active .picture').stop(true,true).animate({
					left: '0' }, {
					duration: 700,
					easing: 'easeInOutExpo'
				});
				$($teamMember + '.active .desc').stop(true,true).delay(300).animate({
					top: '0' }, {
					duration: 1200,
					easing: 'easeInOutExpo'
				});
				$memberSlideDone = true;
			}
		});

	}


	/* Back to top
	=================================================================================*/
	(function() {
		var settings = {
			button      : '#back-to-top',
			text        : '',
			min         : 500,
			fadeIn      : 500,
			fadeOut     : 300,
			scrollSpeed : 900,
			easingType  : 'easeInOutExpo'
		},
		oldiOS     = false,
		oldAndroid = false;
		if( /(iPhone|iPod|iPad)\sOS\s[0-4][_\d]+/i.test(navigator.userAgent) )
			oldiOS = true;
		if( /Android\s+([0-2][\.\d]+)/i.test(navigator.userAgent) )
			oldAndroid = true;
		$('body').append('<a href="#" id="' + settings.button.substring(1) + '" title="' + settings.text + '">' + settings.text + '</a>');
		$( settings.button ).click(function( e ){
			$('html, body').animate({ scrollTop : 0 }, settings.scrollSpeed, settings.easingType );
			e.preventDefault();
		});
		$(window).scroll(function() {
			var position = $(window).scrollTop();
			if( oldiOS || oldAndroid ) {
				$( settings.button ).css({
					'position' : 'absolute',
					'top'      : position + $(window).height()
				});
			}
			if ( position > settings.min ) 
				$( settings.button ).fadeIn( settings.fadeIn );
			else 
				$( settings.button ).fadeOut( settings.fadeOut );
		});
	})();
	
	/* Contact Form Validate
	=================================================================================*/
	$('.contact-form').each(function(i){
	
		$(this).validate({

			highlight: function(element, errorClass) {
				$(element).addClass('invalid');
			},

			unhighlight: function(element, errorClass) {
				$(element).removeClass('invalid');
			},

			errorPlacement: function(error, element) {
			},

			submitHandler: function(form) {
			
				$.post(form.action+'?'+$(form).serialize(),function(){
			
					$(form).find('.alert-success').fadeIn(200);
					
				});
				
			}
		
		});
	});


}); // function