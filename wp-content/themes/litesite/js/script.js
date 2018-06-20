$ = jQuery;
$(document).ready(function () { 

	/*language sumo select*/
	$('#lang_choice_1').SumoSelect();

	/*mobile menu*/
	jQuery('.mobile-nav').on("click", function () {
	    jQuery('#menu').toggleClass('active');
	});
	jQuery('#menu').append('<span id="close-nav"></span>');
	jQuery('#close-nav').on("click", function () {
	    jQuery('#menu').removeClass('active');
	});

	/*---Swiper---*/
	var swiper = new Swiper('.swiper-container_h', {
	  pagination: {
	    el: '.swiper-pagination_h',
	  },
	});

});

