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

	/*---width < 1200 add active class category---*/
	if($(window).width() < 1200){
		$('#h_category .title').click(function () {
	        $('#h_category .title').not($(this).parent()).removeClass('active');
	        $(this).parent().toggleClass('active');
		});

		$('#h_category .block-category-li').on("click", function(){
			$(this).toggleClass('active');
		});
	}

});

