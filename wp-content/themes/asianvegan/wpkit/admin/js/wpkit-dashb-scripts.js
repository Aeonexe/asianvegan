jQuery(document).ready(function($){

	// Prevent click on top level items
	/*$('#adminmenu .wp-has-submenu a.menu-top').click(function( toplevel_noclick ){
		toplevel_noclick.preventDefault();
		//var subm_items = $(this).parent().find('.wp-submenu li a').length;
		//var subm_height = $(this).parent().find('.wp-submenu').css('height', '0');
		//var subm_height = $(this).parent().find('.wp-submenu').height();
		//$(this).parent().find('.wp-submenu').css('height', subm_height);
		//console.log(subm_height);
	});


	/*$('#adminmenu .wp-has-submenu .wp-submenu').each(function(){
		var subm_height = $(this).outerHeight();
		$(this).css('height', subm_height);
	});*/





	// Añade clase a top level cuando ya están abiertos
	//$('#adminmenu li.wp-has-current-submenu').addClass('menu-is-showing');


	/*$('#adminmenu li.menu-top').click(function(){
		if($(this).hasClass('menu-is-showing')){
            $(this).removeClass('menu-is-showing');
        } else {
			$(this).addClass('menu-is-showing');
			$('#adminmenu li.menu-top').not(this).removeClass('menu-is-showing');
			$(this).find('.wp-submenu-wrap').show();
			$('#adminmenu li.menu-top').not(this).find('.wp-submenu-wrap').hide();
        }
	});

/* Admin menu */
	// User deck on top of menu items
	$('#adminmenu').prepend($('#usersidedeckwrap'));


	//$( '.wrap a:first' ).removeClass( 'page-title-action' );
	//$( '.wrap a:first' ).addClass( 'wpkit-classxsd' );
	//$( ".button" ).switchClass( "button", "btn btn-default", 0 );
	//$( ".page-title-action" ).switchClass( "page-title-action", "btn btn-default", 0 );
	//$( ".page-title-action" ).attr({
    //        "role" : "info"
    //    });

	//$( "#publish.button" ).switchClass( "button button-primary button-large", "wpk-button" );
	//$( ".button" ).switchClass( "button button-primary", "wpk-button" );

/* Toolbar */
	$('body').append($('#wpkaside'));

	$('#toggle-icon-sidebar').click(function(){
		$('body').toggleClass('admin-sidebar-is-showing');
	});






});
