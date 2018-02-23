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




});
