	jQuery(document).ready(function($){

		/* Content tabs */

		$('.wk-tabgroup > div').hide();
		$('.wk-tabgroup > div:first-of-type').show();
		$('.wk-tabs-list a').click(function(e){
		  e.preventDefault();
		    var $this = $(this),
		        tabgroup = '#'+$this.parents('.wk-tabs-list').data('tabgroup'),
		        others = $this.closest('li').siblings().children('a'),
		        target = $this.attr('href');
		    others.removeClass('active');
		    $this.addClass('active');
		    $(tabgroup).children('div').hide();
		    $(target).show();

		});

		// Clase .mobile en body
			$(window).on('resize', function(){
				var win = $(this);
				if(win.width() < 770) {
					$('body').addClass('mobile');
					$('body').removeClass('desktop');
				} else {
					$('body').removeClass('mobile');
					$('body').addClass('desktop');
				}
			});

			// Si se carga inicialmente
			if ($(window).width() < 770) {
			   $('body').addClass('mobile');
			}

			if ($(window).width() > 771) {
			   $('body').addClass('desktop');
			}

		// Clase is-scrolled en body
			$(window).scroll(function(){
				var scroll = $(window).scrollTop();

				if( scroll >= 10 ) {
					$('body').addClass('is-scrolled');
				} else {
					$('body').removeClass('is-scrolled');
				}
			});

	});
