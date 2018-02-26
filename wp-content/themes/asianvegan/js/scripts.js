jQuery(document).ready(function($){




	$(window).scroll(function(){
        var height = ($(window).height());
        var currentScreenPosition  = $(document).scrollTop();
        var scroll = $(window).scrollTop();
        var element = $('.reveal').offset().top+60;

        if( height > element ) {
			$('.reveal').addClass('toTop');
		}else{
			$('.reveal').removeClass('toTop');

		}
        //alert(height);
	});


	// Slick slide
	$('.slider').slick({
		dots: true,
		arrows: false,
		//variableWidth: true,
	});

	//search icon

	$('#search-icon').click(function(){
			$('#searchform').toggleClass('active');
	});

	// Scroll reveal

		window.sr = ScrollReveal();
		sr.reveal('.reveal-left', {
			duration: 500,
			origin: 'left',
			distance: '200px',
			delay: 150,
			reset: true,
			mobile: false
		});
		sr.reveal('.reveal-right', {
			duration: 500,
			origin: 'right',
			distance: '200px',
			delay: 150,
			reset: true,
			mobile: false
		});
		sr.reveal('.reveal-bottom', {
			duration: 500,
			origin: 'bottom',
			distance: '200px',
			delay: 150,
			reset: true,
			mobile: false
		});
		sr.reveal('.reveal-top', {
			duration: 500,
			origin: 'top',
			distance: '200px',
			delay: 150,
			reset: true,
			mobile: false
		});




});
