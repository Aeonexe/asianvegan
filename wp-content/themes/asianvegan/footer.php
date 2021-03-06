				</main>

				<?php

				/*
				* Layout de widgets
				*
				* Imprime el layout de widgets en el footer.
				*
				* Si no ocupas el layout de widgets, desactivalo desde el administrador
				* en WPKit / Layouts en lugar de borrar esta función, Si desactivas la opción
				* desde el administrador se seguirá imprimiendo el menú responsivo.
				*/

				do_action( 'wk_widgets_footer_layout' ); ?>

				<footer id="main-footer">

					<div id="main-footer-top">

						<img class="logo" src="<?php if( get_option('wk_custom_logo_main') ) : echo get_option('wk_custom_logo_main'); endif; ?>">

						<div class="newsletter">

							<div class="newsletter-copy">

								<?php if( get_field( 'wpkit_footer_newsletter_copy', 'option' ) ) : ?>

									<?php the_field( 'wpkit_footer_newsletter_copy', 'option' ); ?>

								<?php endif; ?>

								<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 2, 'title' => false, 'description' => false ) ); ?>

							</div>

						</div>

						<div class="social-media">


							<label>Síguenos en:</label>

							<?php wpkit_social_media(); ?>

						</div>

					</div>

					<div id="main-footer-bottom">

						<span>&copy; <?php bloginfo( 'name' ); ?> <?php echo date('Y'); ?></span>

					</div>

				</footer>

		</div>

	</body>

	<?php wp_footer(); ?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/slick/slick.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/slick/slick.min.js"></script>

	<style type="text/css">

		.acf-map {
			width: 100%;
			height: 400px;
			border: #ccc solid 1px;
			margin: 20px 0;
		}

		/* fixes potential theme css conflict */
		.acf-map img {
		   max-width: inherit !important;
		}

		</style>
		<script type="text/javascript">
		(function($) {

		/*
		*  new_map
		*
		*  This function will render a Google Map onto the selected jQuery element
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	$el (jQuery element)
		*  @return	n/a
		*/

		function new_map( $el ) {

			// var
			var $markers = $el.find('.marker');


			// vars
			var args = {
				zoom		: 16,
				center		: new google.maps.LatLng(0, 0),
				mapTypeId	: google.maps.MapTypeId.ROADMAP
			};


			// create map
			var map = new google.maps.Map( $el[0], args);


			// add a markers reference
			map.markers = [];


			// add markers
			$markers.each(function(){

				add_marker( $(this), map );

			});


			// center map
			center_map( map );


			// return
			return map;

		}

		/*
		*  add_marker
		*
		*  This function will add a marker to the selected Google Map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	$marker (jQuery element)
		*  @param	map (Google Map object)
		*  @return	n/a
		*/

		function add_marker( $marker, map ) {

			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map
			});

			// add to array
			map.markers.push( marker );

			// if marker contains HTML, add it to an infoWindow
			if( $marker.html() )
			{
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content		: $marker.html()
				});

				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {

					infowindow.open( map, marker );

				});
			}

		}

		/*
		*  center_map
		*
		*  This function will center the map, showing all markers attached to this map
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	4.3.0
		*
		*  @param	map (Google Map object)
		*  @return	n/a
		*/

		function center_map( map ) {

			// vars
			var bounds = new google.maps.LatLngBounds();

			// loop through all markers and create bounds
			$.each( map.markers, function( i, marker ){

				var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

				bounds.extend( latlng );

			});

			// only 1 marker?
			if( map.markers.length == 1 )
			{
				// set center of map
				map.setCenter( bounds.getCenter() );
				map.setZoom( 16 );
			}
			else
			{
				// fit to bounds
				map.fitBounds( bounds );
			}

		}

		/*
		*  document ready
		*
		*  This function will render each map when the document is ready (page has loaded)
		*
		*  @type	function
		*  @date	8/11/2013
		*  @since	5.0.0
		*
		*  @param	n/a
		*  @return	n/a
		*/
		// global var
		var map = null;

		$(document).ready(function(){

			$('.acf-map').each(function(){

				// create map
				map = new_map( $(this) );

			});

		});

		})(jQuery);
		</script>

</html>
