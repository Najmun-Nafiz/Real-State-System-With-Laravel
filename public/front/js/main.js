$(document).ready(function () {
	"use strict";
	
	// MixItUp:
	$('#container-mix').mixItUp();
	
	//Testimonial Carousel
	$("#testimonial-carousel").owlCarousel({
		items: 3,
        itemsDesktop : [1199, 3],
        itemsDesktopSmall : [979, 2],
        itemsTablet : [768, 2],
        itemsMobile : [479, 1],
		afterAction: function(el){
		   this
		   .$owlItems
		   .removeClass('active')
		  
		   this
		   .$owlItems
		   .eq(this.currentItem + 1)
		   .addClass('active')
		},
        pagination : true,
        paginationNumbers: true
	});
	new WOW().init();
	
	//Smooth Scroll
	$('nav a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
			$('html, body').animate({
			  scrollTop: target.offset().top
			}, 1000);
			return false;
		  }
		}
	  });
	
	//Mailchimp Setup
	$('#mc-form').ajaxChimp({
        callback: mailchimpCallback,
        url: "http://blahblah.us13.list-manage.com/subscribe/post?u=1dc1b222717db8f0b81b0ed9c&id=5c4f4f89aa"
    });
    function mailchimpCallback(resp) {
        alert("We have sent you a confirmation email!");
    }
	
	//Gallery
	$('.container-mix').magnificPopup({
		delegate: 'a.preview-btn',
		type: 'image',
		gallery: {
			// options for gallery
			enabled: true
		},
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});
	
	//Preloader
	$(window).load(function() {
		$('#status').fadeOut();
		$('#preloader').delay(350).fadeOut('slow'); 
		$('body').delay(350).css({'overflow':'visible'});
	})
	
	// Contact Form
	
	$('#contactform').submit(function(){
		var action = $(this).attr('action');
		$("#message").slideUp(750,function() {
		$('#message').hide();
 		$('#submit')
			.after('')
			.attr('disabled','disabled');
		$.post(action, {
			name: $('#name').val(),
			email: $('#email').val(),
			subject: $('#subject').val(),
			comments: $('#comments').val()
		},
			function(data){
				document.getElementById('message').innerHTML = data;
				$('#message').slideDown('slow');
				$('#contactform img.loader').fadeOut('slow',function(){$(this).remove()});
				$('#submit').removeAttr('disabled');
				if(data.match('success') != null) $('#contactform').slideUp('slow');
			}
		);
		});
		return false;
	});
	
});
