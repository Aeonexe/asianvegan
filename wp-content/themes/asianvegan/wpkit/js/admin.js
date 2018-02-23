jQuery(document).ready(function($){

	// Upload de Media library

		$('.upload-btn').click(function(e) {
			e.preventDefault();
			var current = $(this);
			var image = wp.media({
				title: 'Upload Image',
				// mutiple: true if you want to upload multiple files at once
				multiple: false
			}).open()
			.on('select', function(e){
				// This will return the selected image from the Media Uploader, the result is an object
				var uploaded_image = image.state().get('selection').first();
				// We convert uploaded_image to a JSON object to make accessing it easier
				// Output to the console uploaded_image
				console.log(uploaded_image);
				var image_url = uploaded_image.toJSON().url;
				// Let's assign the url value to the input field
				$(current).closest('.upload-img').find('.image_url').val(image_url);
				$(current).closest('.upload-img').find('.image_src').attr( 'src', image_url);
				$(current).closest('.upload-img').find('.wk_option_image_uploader_container').css('display', '');
				$(current).closest('.upload-img').find('.wk_option_image_uploader_action').css('display', 'none');
			});
		});
		$('.remove-image').click(function(){
			var current = $(this);
			$(current).closest('.upload-img').find('.image_url').val('');
			$(current).closest('.upload-img').find('.image_src').attr('src', '');
			$(current).closest('.upload-img').find('.wk_option_image_uploader_container').css('display', 'none');
			$(current).closest('.upload-img').find('.wk_option_image_uploader_action').css('display', 'initial');
		});


		// Cambia de posición metabox de Excerpt arriba del editor
			$('#postdivrich').prepend($('#postexcerpt'));
			$('#postexcerpt').css( 'margin-top', '30px' );
			$('#postexcerpt .inside').prepend( 'Se usará para mostrar descripciones en google y redes sociales, manten este extracto abajo de 160 caracteres.' );
			$('#postexcerpt .inside p').remove();

});
