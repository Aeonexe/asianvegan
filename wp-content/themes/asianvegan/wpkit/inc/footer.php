	<!--<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.1.3.min.js"></script>-->
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/wpkit/assets/wpkitui/wpkitui.js"></script>

	<?php if( get_option( 'wk_option_loader' ) ) : ?>

		<script>
			$(window).load(function() {

				<?php if( get_option( 'wk_option_loader_timing' ) ) : ?>

					setTimeout(function(){
						$(".wk-preloading").fadeOut("slow");
					}, <?php echo get_option( 'wk_option_loader_timing'); ?>);

				<?php else : ?>

					$(".wk-preloading").fadeOut("slow");

				<?php endif; ?>

			});
		</script>

	<?php endif; ?>

	<?php if( get_option( 'wk_option_smoothscroll' ) || get_option( 'wk_option_library_tweenmax' ) ) : ?>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

	<?php endif; ?>

	<?php

	/*

	Smooth scroll
	Depende de tweenmax

	*/

	if(get_option('wk_option_smoothscroll') ) : ?>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>

		<script>

			var $window = $(window);

			var scrollTime = .65;			//Timing de scroll
			var scrollDistance = 350;		//Distancia

			$window.on("mousewheel DOMMouseScroll", function(event){

				event.preventDefault();

				var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
				var scrollTop = $window.scrollTop();
				var finalScroll = scrollTop - parseInt(delta*scrollDistance);

				TweenMax.to($window, scrollTime, {
					scrollTo : { y: finalScroll, autoKill:true },
						ease: Power1.easeOut,	//For more easing functions see https://api.greensock.com/js/com/greensock/easing/package-detail.html
						autoKill: true,
						overwrite: 5
					});
			});

		</script>

	<?php endif; ?>

	<?php

		/*
		* Toma el campo guardado en metabox scriptdiv y opción Header
		*/

		if( is_page() || is_single() ) :

			global $post;

			if( wk_scriptdiv_get_meta( 'wk_scriptdiv_locate' ) == 'Footer' ) :

				$script = wk_scriptdiv_get_meta( 'wk_scriptdiv_scripts' );

				echo '<!--Page scripts-->';

				echo '<script id="' . $post->post_name . '-foot-scripts">' . $script . '</script>';

			endif;

		endif;

	?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
