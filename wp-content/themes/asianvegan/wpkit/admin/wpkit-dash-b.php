<?php

/*
Plugin Name: WPKit Dash B
Description: Turn your wordpress dashboard into a powerful admin panel
Plugin URI: http://www.wpkit
Author: Alberto Hartzet
Author URI: http://www.albertohartzet.com/
Copyright: Alberto Hartzet
Version: 1.0
Text Domain: wpkitdash
Domain Path: /lang
*/

defined( 'ABSPATH' ) or die( '¿Haciendo trampas?' );


/*******************************************************************************
Admin scripts */

	$GLOBALS['dashb_url'] = get_template_directory_uri() . '/wpkit/admin/';

	// Admin

		function wpkit_dashb_admin_enqueue_scripts() {

			//Style
				wp_enqueue_script( 'jquery-effects-core');
				wp_register_style( 'wpkit-dashb-theme', $GLOBALS['dashb_url'] . 'css/wpkit-theme.css' ); wp_enqueue_style( 'wpkit-dashb-theme' );
				wp_register_style( 'wpkit-dashb-reset-wp', $GLOBALS['dashb_url'] . 'css/reset-wp.css', 50 ); wp_enqueue_style( 'wpkit-dashb-reset-wp' );
				wp_register_style( 'wpkit-dashb-toolbar', $GLOBALS['dashb_url'] . 'css/toolbar.css' ); wp_enqueue_style( 'wpkit-dashb-toolbar' );
				wp_register_style( 'wpkit-dashb-admin-menu', $GLOBALS['dashb_url'] . 'css/admin-menu.css' ); wp_enqueue_style( 'wpkit-dashb-admin-menu' );
				wp_register_style( 'wpkit-dashb-admin-sidebar', $GLOBALS['dashb_url'] . 'css/admin-sidebar.css' ); wp_enqueue_style( 'wpkit-dashb-admin-sidebar' );
				if( get_option( 'wk_set_material_theme' ) ) {
					wp_register_style( 'wpkit-dashb-admin-theme', $GLOBALS['dashb_url'] . 'css/material-theme.css' ); wp_enqueue_style( 'wpkit-dashb-admin-theme' );
				}
				//wp_register_style( 'bootstrap', $dashb_url . 'assets/bootstrap/css/bootstrap.min.css', '', '3.3.6', 'all' ); wp_enqueue_style( 'bootstrap' );
				//wp_register_style( 'bootstrap-reset', $GLOBALS['dashb_url'] . 'assets/bootstrap/css/reset-bootstrap.css' ); wp_enqueue_style( 'bootstrap-reset' );

			//Script
				wp_enqueue_script( 'wpkit-dashb-scripts',  $GLOBALS['dashb_url'] . 'js/wpkit-dashb-scripts.js' );
				//wp_enqueue_script( 'bootstrap-js', $GLOBALS['dashb_url'] . 'assets/bootstrap/js/bootstrap.min.js' );
				//wp_enqueue_script( 'script-jquery', $dashb_url . 'js/jquery-2.2.4.min.js' );
				//wp_enqueue_script("jquery");
				//wp_enqueue_script( 'jquery-ui', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js' );
				// wp_enqueue_script( 'jquery' );
				// wp_enqueue_script( 'jquery-form' );
				// wp_enqueue_script( 'jquery-color' );
				// wp_enqueue_script( 'jquery-ui-core' );
				// wp_enqueue_script( 'jquery-ui-tabs' );
				// wp_enqueue_script( 'jquery-ui-sortable' );
				// wp_enqueue_script( 'jquery-ui-draggable' );
				// wp_enqueue_script( 'jquery-ui-selectable' );
				// wp_enqueue_script( 'jquery-ui-resizable' );
				// wp_enqueue_script( 'jquery-ui-dialog' );

		}

		add_action( 'admin_enqueue_scripts', 'wpkit_dashb_admin_enqueue_scripts', 70 );

	// WP

		function wpkit_dashb_wp_enqueue_scripts() {

			// Style
				wp_register_style( 'wpkit-dashb-site-toolbar', $GLOBALS['dashb_url'] . 'css/toolbar.css' ); wp_enqueue_style( 'wpkit-dashb-site-toolbar' );

			// Script

		}

		add_action( 'wp_enqueue_scripts', 'wpkit_dashb_wp_enqueue_scripts' );


	// Admin head

		function wpkit_dashb_admin_head() {

			echo '<style id="toolbar-fix">@media (min-width: 601px ) { html.wp-toolbar { padding-top: 60px; } }</style>';

		}

		add_action( 'admin_head', 'wpkit_admin_head', 20 );


	// WP head

		function wpkit_dashb_wp_head() {

			if ( is_admin_bar_showing() ) { ?>

					<style id="toolbar-fix" type="text/css" media="screen">
						html { margin-top: 60px !important; }
						@media ( max-width: 782px ) {
							html { margin-top: 45px !important; }
							#off-canvas {
								height: calc(100% - 45px);
								top: 45px;
							}
						}
					</style>

				<?php
			}

		}

		add_action( 'wp_head', 'wpkit_dashb_wp_head', 20 );

	// WP Footer

		/*
		Code
		*/

/*******************************************************************************
User deck
*/

	function wpkit_admin_user_deck() {

		include 'includes/user-deck.php';

		echo '<li class="wk-not-menu-item" id="wk-quick-tag"><input type="text" placeholder="Quick note ..."></li>';

	}

	add_filter('adminmenu', 'wpkit_admin_user_deck');


/*******************************************************************************
Admin sidebar
*/

	function wpkit_admin_sidebar() {
		include 'includes/admin-sidebar.php';
	}

	// Widgetized
	function wpkit_admin_sidebar_widget_sidebar() {

		$args = array(
			'name'          => __( 'Admin sidebar', 'wpkit_txt_domain' ),
			'description'   => __( 'Widgets en esta área solo se mostrarán en el panel de administración', 'wpkit_txt_domain' ),
			'id'            => 'widgetized-admin-sidebar',
			'class'         => 'widgetized',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
	        'after_widget'	=> '</li>',
	        'before_title'	=> '<h3>',
	        'after_title' 	=> '</h3>',
		);
		register_sidebar( $args );

	}

	// Toggle Icon toolbar

		function wpkit_toolbar_item_toggle( $wp_admin_bar ) {
			$args = array(
				'id'    => 'toggle_icon',
				'title' => '<span id="toggle-icon-sidebar" class="ab-icon dashicons-before dashicons-menu"></span>',
				'menu_icon' => 'dashicons-images-alt2',
				'parent' => 'top-secondary',
			);
			$wp_admin_bar->add_node( $args );
		}


	if( get_option( 'wk_set_admin_sidebar' ) ) {

		//Render sidebar
		add_action( 'in_admin_header', 'wpkit_admin_sidebar' );
		// Widget area
		add_action( 'widgets_init', 'wpkit_admin_sidebar_widget_sidebar' );
		// Tooble icon
		add_action( 'admin_bar_menu', 'wpkit_toolbar_item_toggle', 0 );
	}


/*******************************************************************************
Toolbar
*/

		function wpkit_customize_toolbar() {

			global $wp_admin_bar;
			$wp_admin_bar->remove_node( 'wp-logo' );
			$wp_admin_bar->remove_node( 'view-site' );
			$wp_admin_bar->remove_node( 'site-name' );

			if( get_option( 'wk_toolbar_color' ) == '#ffffff' xor get_option( 'wk_toolbar_color' ) == '' )  {

				$site_logo_source = $GLOBALS['dashb_url'] . '/img/wpkit-logo.svg';

			} else {

				$site_logo_source = $GLOBALS['dashb_url'] . '/img/wpkit-logo-w.svg';

			}

			if ( get_option( 'wk_custom_admin_logo' ) ) {

				$blavatar = '<img style="max-height: 22px;" src="' . get_option( 'wk_custom_admin_logo' ) . '" alt="' . esc_attr__( get_bloginfo('name') ) . '" class="blavatar"/>';

			} else {

				$blavatar = '<img style="max-height: 22px;" src="' . $site_logo_source . '" alt="' . esc_attr__( get_bloginfo('name') ) . '" class="blavatar"/>';

			}

				?>

					<style>

						#wpadminbar {
						background-color: <?php echo get_option( 'wk_toolbar_color', '#ffffff' ); ?>;
						color: <?php echo get_option( 'wk_toolbar_text_color', '#000000' ); ?>;
						}

						/* Admin menu back --*/
						#adminmenu,
						#adminmenu .wp-submenu,
						#adminmenuback,
						#adminmenuwrap,
						#adminmenu .wp-has-current-submenu .wp-submenu {
						background-color: <?php echo get_option( 'wk_admin_menu_bg', '#2e2c3a' ); ?>;
						}

						/* Current menu -- */
						#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
					    	background-color: <?php echo get_option( 'wk_admin_menu_current' ); ?> !important;
						}

						/* Text & icon -- */
						#adminmenu,
						#adminmenu .wp-menu-name,
						#adminmenu div.wp-menu-image:before,
						#adminmenu .wp-submenu a {
						color: <?php echo get_option( 'wk_admin_menu_color', '#ffffff' ); ?> !important;
						}

							/* Arrow indicator current menu -- */
							#adminmenu > .wp-has-submenu.wp-not-current-submenu:after {
							border-color:<?php echo get_option( 'wk_admin_menu_color' ); ?>;
							}
					</style>

				<?php

			$wp_admin_bar->add_menu( array(
				'id' => 'site-logo',
				'title' => $blavatar,
				'href' => get_site_url(),
				'meta'  => array( 'class' => 'toolbar-logo-text' ) )
			);

		}

		add_action('wp_before_admin_bar_render', 'wpkit_customize_toolbar', 0); // Añade el estilo al header
		add_action('admin_bar_menu', 'wpkit_customize_toolbar', 0 ); // Añade el item al menú
		//add_action('admin_head', 'wpkit_theme_alpha_custom_toolbar');

		function wpkit_theme_alpha_custom_toolbar_style() {

			?>

			<style type="text/css">
					#wp-admin-bar-comments {width: 60px; }
					<?php if( get_option('custom_admin_background') ) : ?>
						#wp-admin-bar-site-logo a,
						#wp-admin-bar-comments a {
						background: #1d242a;
						}

						#wp-admin-bar-comments * {
						color: white;
						}

						#wp-admin-bar-comments a span, #wp-admin-bar-comments a .ab-icon:before {
						color: white !important;
						}
					<?php endif; ?>
			</style>

			<?php
		}
		add_action('wp_before_admin_bar_render', 'wpkit_theme_alpha_custom_toolbar_style');


	// Toolbar secondary menu

	function wk_add_nodes_and_groups_to_toolbar( $wp_admin_bar ) {

		// add a parent item
		$args = array(
			'id'    => 'parent_node',
			'title' => '<span class="ab-icon dashicons-before dashicons-carrot"></span> Menu',
			'menu_icon' => 'dashicons-images-alt2',
			'parent' => 'top-secondary',
		);

		$wp_admin_bar->add_node( $args );

			// add a child item to our parent item
			$args = array(
				'id'     => 'child_node',
				'title'  => 'Child node',
				'parent' => 'parent_node',
				'href'	=> 'http://www.google.com',
				'meta' 	 => array(
					'target' => '_blank'
				),
			);

			$wp_admin_bar->add_node( $args );

		// add a group node with a class "first-toolbar-group"
		$args = array(
			'id'     => 'first_group',
			'parent' => 'parent_node',
			'meta'   => array( 'class' => 'first-toolbar-group' )
		);
		$wp_admin_bar->add_group( $args );

			// add an item to our group item
			$args = array(
				'id'     => 'first_grouped_node',
				'title'  => 'First group node',
				'parent' => 'first_group'
			);
			$wp_admin_bar->add_node( $args );

		// add another child item to our parent item (not to our first group)
			$args = array(
				'id'     => 'another_child_node',
				'title'  => 'Another child node',
				'parent' => 'first_group'
			);
			$wp_admin_bar->add_node( $args );

	}

	if( get_option( 'wk_set_toolbar_menu' ) ) {

		add_action( 'admin_bar_menu', 'wk_add_nodes_and_groups_to_toolbar', 999 );

	}


/*******************************************************************************
User info en toolbar fixed
*/

	function wpkit_customize_my_acc( $wp_admin_bar ) {
		global $current_user;
		$user_id = get_current_user_id();
		$current_user = wp_get_current_user();
		$profile_url = get_edit_profile_url( $user_id );
		get_currentuserinfo();

		if ( 0 != $user_id ) {

			$wk_avatar = get_field('wk_custom_avatar', 'user_' . $current_user->ID );

			if( $wk_avatar ) :

				// ACF custom avatar

				$current_screen = get_current_screen();

				if( $current_screen->id == 'acf-field-group' || $current_screen->id == 'custom-fields_page_acf-settings-tools' ) {

					$avatar_size = wp_get_attachment_image_src( $wk_avatar, 'thumbnail' );

					$avatar = '<span class="avatar" id="wk-menu-user-avatar" style="background-image: url( ' . $avatar_size[0] . ' );"></span>';

				} else {

					$avatar = '<span class="avatar" style="background-image: url(' . $wk_avatar['sizes']['thumbnail'] . ')"></span>';

				}


			else :

				$avatar = '<style>.wk-avatar .avatar { width: 100%; height: auto; border-radius: 100px !important; }</style><span class="wk-avatar">' . get_avatar( $user_id, 32 ) . '</span>';

			endif;

		$howdy = sprintf( __('<span class="display-name" style="margin-left: 3px; 	text-transform: capitalize;"> %1$s</span>'), $current_user->display_name );

		$class = empty( $avatar ) ? '' : 'with-avatar';

		$wp_admin_bar->add_menu( array(
			'id' => 'my-account',
			'parent' => 'top-secondary',
			'title' => $howdy . $avatar,
			'href' => $profile_url,
			'meta' => array(
			'class' => $class,
			),
			) );
		}
	}
	add_action( 'admin_bar_menu', 'wpkit_customize_my_acc', 12 );

/*******************************************************************************
Admin menú secundario
*/
	// Aparece en el panel de administración en la parte superior de wpbody

	function wpkit_admin_secondary_menu() {
	  register_nav_menus(
	    array(
	      'admin-secondary-menu' => __( 'Admin secondary menu' )
	    )
	  );
	}
	//add_action( 'in_admin_header', 'wpkit_admin_secondary_menu' );
	add_action( 'init', 'wpkit_admin_secondary_menu' );

	function wk_admin_secondary_menu_load() {
		$args = array(
			'theme_location'  => 'admin-secondary-menu',
			'menu'            => '',
			'container'       => 'div',
			'container_class' => '',
			'container_id'    => 'wk-header-menu',
			'menu_class'      => 'wk-menu',
			'menu_id'         => 'wk-header-menu-items',
			'echo'            => false,
			'fallback_cb'     => '__return_false',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
			//'walker'          => new description_walker()
		);

		$menu = wp_nav_menu( $args );

		if ( ! empty ( $menu ) )
		{
		    echo '' . $menu . '';
		}

		echo '<style>.wp-toolbar {padding-top: 60px !important; }</style>';

	}
	add_action( 'in_admin_header', 'wk_admin_secondary_menu_load' );

/* ******************************************************************************
* Reemplaza admin footer */

		function wpkit_admin_footer() {
			$my_theme = wp_get_theme();

			$custom_footer_text = get_option( 'wk_footer_text' );

			if( $custom_footer_text ) {
				echo $custom_footer_text;
			} else {
				echo '<strong>' . get_bloginfo( 'name' ) . '</strong>  Powered by <strong>WPKit Framework</strong> V.4.0 developed by <a href="http://www.alumin.agency" target="_blank">alumin.agency</a>';
			}

		}
		add_filter('admin_footer_text', 'wpkit_admin_footer');

		function wpkit_admin_footer_version() {
			$my_theme = wp_get_theme();
		  // return '<strong>' . $my_theme->get( 'Name' ) . '</strong>' . " V" . $my_theme->get( 'Version' );
			return '<strong>WPKit </strong> V 4.0';
		}
		add_filter( 'update_footer', 'wpkit_admin_footer_version', 9999 );

		/* ***********************************************************************************************************************
		* Oculta  wpfooter en wp-admin (la función arriba no debe de existir) *

			function adminFooter_hide_wpkit () {return ' ';}
			add_filter('admin_footer_text', 'adminFooter_hide_wpkit', 9999);
			function adminFooter_version_hide_wpkit() {return ' ';}
			add_filter( 'update_footer', 'adminFooter_version_hide_wpkit', 9999);

/* ***********************************************************************************************************************
*  Elimina el bloque "Esquema de color de administración" en el perfíl de usuario *

		function admin_color_scheme() {
		   global $_wp_admin_css_colors;
		   $_wp_admin_css_colors = 0;
		}
		add_action('admin_head', 'admin_color_scheme');

/* ***********************************************************************************************************************
*  Reemplaza el widget "News feed" en el dashboard con un custom feed */

		add_action('wp_dashboard_setup', 'remove_add_dashboard_widgets_wpkit');

		function remove_add_dashboard_widgets_wpkit () {

			//Completely remove various dashboard widgets
			//remove_meta_box( 'dashboard_quick_press',   'dashboard', 'side' );      //Quick Press widget
			//remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );      //Recent Drafts
			remove_meta_box( 'dashboard_primary',       'dashboard', 'side' );      //WordPress.com Blog
			remove_meta_box( 'dashboard_secondary',     'dashboard', 'side' );      //Other WordPress News
			remove_meta_box( 'dashboard_incoming_links','dashboard', 'normal' );    //Incoming Links
			remove_meta_box( 'dashboard_plugins',       'dashboard', 'normal' );    //Plugins
			add_meta_box('dashboard_widget_feed', 'Publicaciones recientes', 'dashboard_custom_feed_output_wpkit', 'dashboard', 'side', 'high');
			//add_meta_box('dashboard_widget-calendar', 'Publicaciones por fecha', 'dashboard_custom_widget_calendar_output_wpkit', 'dashboard', 'side', 'high');
			//add_meta_box('dashboard_widget', 'Widget', 'dashboard_custom_widget_output_wpkit', 'dashboard', 'side', 'high');
		}


		function dashboard_custom_feed_output_wpkit() {
			 echo '<div class="rss-widget">';
			 wp_widget_rss_output(array(
				'url' => get_site_url() . '/feed',
				'title' => 'MY_FEED_TITLE',
				'items' => 2,
				'show_summary' => 1,
				'show_author' => 0,
				'show_date' => 1
			 ));
			 echo '</div>';
		}

		/*function dashboard_custom_widget_calendar_output_wpkit() {
			echo '<div class="calendar-widget">' . get_calendar() . '</div>';
		}

		function dashboard_custom_widget_output_wpkit() {
			if ( dynamic_sidebar('widgetized-dashboard') ) : endif;
		}*/

/************************************************************************************************************************
Columnas de posts:*/

	//Imagen destacada y ID en posts y páginas


  		function wk_posts_columns($defaults){
  		    $defaults['wps_post_thumbs'] = __('<span class="dashicons dashicons-format-image" style="font-size: 13px;opacity: .75;vertical-align: baseline;"></span>');
  		    $defaults['wps_post_id'] = __('ID');
  		    $defaults['wps_post_attachments'] = __('<span title="Archivos adjuntos" class="dashicons dashicons-images-alt2" style="font-size: 15px; opacity: .75; vertical-align: baseline; cursor: help;"></span>');
  		    return $defaults;
  		}

  		function wk_posts_custom_columns($column_name, $id){
		        //Imagen destacada
		        if($column_name === 'wps_post_thumbs'){
  		        echo the_post_thumbnail( array(125,40) );
  		    }
			//ID de post a Admin
		        if($column_name === 'wps_post_id'){
	                echo $id;
  		    }

  		    if($column_name === 'wps_post_attachments'){
	        	$attachments = get_children(array('post_parent'=>$id));
				$count = count($attachments);
	        	if($count !=0){ echo $count; }
	    	}
  		}

  			//Posts
  		    add_filter('manage_posts_columns', 'wk_posts_columns', 5);

  		    add_action('manage_posts_custom_column', 'wk_posts_custom_columns', 5, 2);

  		    // Pages
  		    add_filter('manage_pages_columns', 'wk_posts_columns', 5);

  		    add_action('manage_pages_custom_column', 'wk_posts_custom_columns', 5, 2);

	// ID de attachment en Media

  		function wk_posts_columns_attachment_id($defaults) {
  		    $defaults['wps_post_attachments_id'] = __('ID');
  		    return $defaults;
  		}

  		function wk_posts_custom_columns_attachment_id($column_name, $id) {
  		        if($column_name === 'wps_post_attachments_id'){
  		        echo $id;
  		    }
  		}

	  		add_filter('manage_media_columns', 'wk_posts_columns_attachment_id'); // Añade la columna

	  		add_action('manage_media_custom_column', 'wk_posts_custom_columns_attachment_id', 10, 5); // Añade el valor

  	// Style para columnas

  		function wk_post_columns_style() {
  			?>
  				<style id="wk-columns-style">
					/* Columna: Thumbs */
					#wps_post_thumbs {width: 64px; }
					.wps_post_thumbs img {margin: auto; display: block; }
		  			/* Columna: ID */
		  			#comments, #wps_post_attachments_id, #wps_post_id, #wps_post_attachments {width: 28px; }
				</style>
  			<?php
  		}

  			add_action( 'admin_footer', 'wk_post_columns_style' );

  		/************************************************************************************************************************
		Colores por status de publicación */

	  		function wk_posts_status_color(){
	  		?>
		  		<style>
			  		.status-draft .check-column,
			  		.status-pending .check-column,
			  		.status-publish .check-column,
			  		.status-future .check-column,
			  		.status-private .check-column {
			  			border-left-style: solid;
			  			border-left-width: 4px;
			  		}
			  		.status-draft .check-column{border-left-color: gold !important;}
			  		.status-pending .check-column{border-left-color: deeppink !important;}
			  		.status-publish .check-column{ border-left-color: transparent; }
			  		.status-future .check-column{border-left-color: cornflowerblue !important;}
			  		.status-private .check-column{border-left-color: rebeccapurple !important;}
		  		</style>
	  		<?php
	  		}

	  		add_action('admin_footer','wk_posts_status_color');




/*******************************************************************************
Options page
*/


	function wk_options_pages() {

		// Options page appearance/Admin panel
		add_theme_page( __( 'WPKit Dash B Options', 'wpkit_txt_domain' ), __( 'Admin panel', 'wpkit_txt_domain' ), 'manage_options', 'administrator', 'wk_options_administrator_callback' );

		// Options page appearance/Login
		add_theme_page( __( 'WPKit Login page', 'wpkit_txt_domain' ), __( 'Login page', 'wpkit_txt_domain' ), 'manage_options', 'login_page', 'wk_options_login_callback' );

		// Options page appearance/Branding
		add_theme_page( __( 'WPKit Branding', 'wpkit_txt_domain' ), __( 'Branding', 'wpkit_txt_domain' ), 'manage_options', 'branding_page', 'wk_options_branding_callback' );

		// Callback
		add_action( 'admin_init', 'wk_dashb_register_settings' );
	}
	add_action( 'admin_menu', 'wk_options_pages' );

	// Register settings

	function wk_dashb_register_settings() {
		//register settings Admin panel
		register_setting( 'wk-admin-theme-settings-group', 'wk_custom_admin_logo' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_set_material_theme' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_set_admin_sidebar' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_set_toolbar_menu' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_posts_by_you' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_footer_text' );

		register_setting( 'wk-admin-theme-settings-group', 'wk_toolbar_color' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_admin_menu_bg' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_admin_menu_current' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_admin_menu_color' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_toolbar_text_color' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_hide_wp_toolbar' );
		register_setting( 'wk-admin-theme-settings-group', 'wk_use_wp_color_scheme' );

		//register settings Login
		register_setting( 'wk-login-settings-group', 'custom_logo' ); // Se queda para compatiblidad con sitios ya instalados con la versión anterior de wpkit
		register_setting( 'wk-login-settings-group', 'wk_custom_login_logo' );
		register_setting( 'wk-login-settings-group', 'wk_custom_login_background_image' );
		register_setting( 'wk-login-settings-group', 'wk_custom_login_background_color' );
		register_setting( 'wk-login-settings-group', 'wk_custom_login_color' );

		//register settings branding
		register_setting( 'wk-branding-settings-group', 'wk_custom_logo_main' );
		register_setting( 'wk-branding-settings-group', 'wk_custom_logo_alt' );
		register_setting( 'wk-branding-settings-group', 'wk_custom_logo_complementary' );
		register_setting( 'wk-branding-settings-group', 'wk_custom_site_background' );

	}


	// Contenido appearance/Admin Panel
	function wk_options_administrator_callback() {

		?>

			<div class="wrap">

				<h1><?php esc_attr_e( 'Admin panel', 'wpkit_txt_domain' ); ?></h1>

				<?php settings_errors(); ?>

				<form method="post" action="options.php">
					<?php settings_fields( 'wk-admin-theme-settings-group' ); ?>
					<?php do_settings_sections( 'wk-admin-theme-settings-group' ); ?>


					<!-- <h2 class="nav-tab-wrapper">
						<a href="#" class="nav-tab nav-tab-active">Tab #1</a>
						<a href="#" class="nav-tab">Tab #2</a>
						<a href="#" class="nav-tab">Tab #3</a>
					</h2> -->

					<div id="poststuff">

						<div id="post-body" class="metabox-holder columns-2">

							<!-- main content -->
							<div id="post-body-content">

								<!-- <div class="meta-box-sortables ui-sortable">

									<div class="postbox">

										<h2><span><?php esc_attr_e( 'Main Content Header', 'wp_admin_style' ); ?></span></h2>

										<div class="inside">
											<p><?php esc_attr_e('WordPress started in 2003 with a single bit of code to enhance the typography of everyday writing and with fewer users than you can count on your fingers and toes. Since then it has grown to be the largest self-hosted blogging tool in the world, used on millions of sites and seen by tens of millions of people every day.', 'wp_admin_style'); ?></p>
										</div>

									</div>

								</div> -->

								<!-- .meta-box-sortables .ui-sortable -->
								<table class="form-table widefat">
									<col width="200">
									<tr valign="top" class="alternate">
										<td scope="row">
											<?php esc_attr_e( 'Admin Logo', 'wp_admin_style' ); ?>
											<p class="description">Personaliza el logo en el panel de administración</p>
										</td>
										<td>
											<div class="upload-img">
				        		    			<?php if( ! get_option( 'wk_custom_admin_logo' ) ) : ?>
				        	    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: none;"'; ?>
				        		    			<?php else : ?>
				        	    					<?php $wk_hide = 'style="display: none;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
				        		    			<?php endif; ?>
				        			    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
				        		    				<img height="50" class="image_src" src="<?php echo get_option( 'wk_custom_admin_logo' ); ?>">
				        			    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
				        			    		</div>
				        						<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
				        						    <input style="display: none;" type="text" name="wk_custom_admin_logo" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_custom_admin_logo') ); ?>" >
				        						    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
				        						</div>
								        	</div>
										</td>
									</tr>
									<tr valign="top">
								        <td scope="row">
									       <label for="tablecell">Color de toolbar</label>
											<p class="description">Aplica un fondo obscuro al toolbar, útil cuando los logos son blancos.</p>
								        </td>
								        <td>
								        	<input type="color" name="wk_toolbar_color" id="wk_toolbar_color" value="<?php echo esc_attr( get_option('wk_toolbar_color', '#ffffff') ); ?>"/>
											<p class="description">#1d242a</p>
								        </td>
							        </tr>
									<tr valign="top" class="alternate">
								        <td scope="row">
									       <label for="tablecell">Color del texto del toolbar</label>
								        </td>
								        <td>
								        	<input type="color" name="wk_toolbar_text_color" id="wk_toolbar_text_color" value="<?php if( get_option( 'wk_toolbar_text_color' ) ) : echo esc_attr( get_option('wk_toolbar_text_color') ); else : echo '#000000'; endif; ?>"/>
								        </td>
							        </tr>
							        <tr valign="top">
								        <td scope="row">
									       <label for="tablecell">Color de admin menu</label>
											<p class="description">Aplica un fondo obscuro al toolbar, útil cuando los logos son blancos.</p>
								        </td>
								        <td>
								        	<input type="color" name="wk_admin_menu_bg" id="wk_admin_menu_bg" value="<?php if( get_option( 'wk_admin_menu_bg' ) ) : echo esc_attr( get_option('wk_admin_menu_bg') ); else : echo '#1d242a'; endif; ?>"/>
											<p class="description">#1d242a</p>
								        </td>
							        </tr>
							        <tr valign="top" class="alternate">
								        <td scope="row">
									       <label for="tablecell">Color de texto de admin menu</label>
											<p class="description">El color del texto en el menú de administración.</p>
								        </td>
								        <td>
								        	<input type="color" name="wk_admin_menu_color" id="wk_admin_menu_color" value="<?php if( get_option( 'wk_admin_menu_color' ) ) : echo esc_attr( get_option('wk_admin_menu_color') ); else : echo '#ffffff'; endif; ?>"/>
											<p class="description">#1d242a</p>
								        </td>
							        </tr>
							        <tr valign="top">
								        <td scope="row">
									       <label for="tablecell">Color de menú actual</label>
											<p class="description">Color del menú de administración seleccionado.</p>
								        </td>
								        <td>
								        	<input type="color" name="wk_admin_menu_current" id="wk_toolbar_color" value="<?php if( get_option( 'wk_admin_menu_current' ) ) : echo esc_attr( get_option('wk_admin_menu_current') ); else : echo '#005eef'; endif; ?>"/>
											<p class="description">#1d242a</p>
								        </td>
							        </tr>
									<tr valign="top" class="alternate">
										<td scope="row">
											<label for="tablecell">Material theme</label>
											<p class="description">Activa el tema "Material" para el panel de administración.</p>
										</td>
										<td>
											<input type="checkbox" name="wk_set_material_theme" id="wk_set_material_theme" value="1" <?php checked(1, get_option('wk_set_material_theme'), true); ?> />
										</td>
									</tr>
									<tr valign="top">
										<td scope="row">
											<label for="tablecell">Esquemas de color de WP</label>
											<p class="description">Utilizar los esquemas de color default de wordpress.</p>
										</td>
										<td>
											<input type="checkbox" name="wk_use_wp_color_scheme" id="wk_use_wp_color_scheme" value="1" <?php checked(1, get_option('wk_use_wp_color_scheme'), true); ?> />
										</td>
									</tr>
									<tr valign="top" class="alternate">
										<td scope="row">
											<label for="tablecell">Admin sidebar</label>
											<p class="description">Muestra un área de widgets en un sidebar lateral oculto.</p>
										</td>
										<td>
											<input type="checkbox" name="wk_set_admin_sidebar" id="wk_set_admin_sidebar" value="1" <?php checked(1, get_option('wk_set_admin_sidebar'), true); ?> />
										</td>
									</tr>
									<tr valign="top">
										<td scope="row">
											<label for="tablecell">Toolbar menu</label>
											<p class="description">Menú personalizado en toolbar</p>
										</td>
										<td>
											<input type="checkbox" name="wk_set_toolbar_menu" id="wk_set_toolbar_menu" value="1" <?php checked(1, get_option('wk_set_toolbar_menu'), true); ?> />
										</td>
									</tr>
									<tr valign="top"  class="alternate">
										<td scope="row">
											<label for="tablecell">Ocultar Posts by you</label>
											<p class="description">Muestra los posts publicados por el usuario en el user deck de admin menú.</p>
										</td>
										<td>
											<input type="checkbox" name="wk_posts_by_you" id="wk_posts_by_you" value="1" <?php checked(1, get_option('wk_posts_by_you'), true); ?> />
										</td>
									</tr>
									<tr valign="top">
										<td scope="row">
											<label for="tablecell">Texto en el footer</label>
											<p class="description">Personaliza el texto en el footer dentro panel de administración. Acepta html.</p>
										</td>
										<td>
											<input type="text" name="wk_footer_text" id="wk_footer_text" value="<?php echo esc_attr( get_option('wk_footer_text') ); ?>" class="regular-text"/>
										</td>
									</tr>
									<tr valign="top" class="alternate">
										<td scope="row">
											<label for="tablecell">Oculta Toolbar en el sitio</label>
											<p class="description">Solo se ocultará en el frente del sitio.</p>
										</td>
										<td>
											<select name="wk_hide_wp_toolbar" id="wk_hide_wp_toolbar">
												<option value="0" <?php selected( get_option('wk_hide_wp_toolbar'), 0 ); ?>>- Selecciona una opción</option>
												<option value="1" <?php selected( get_option('wk_hide_wp_toolbar'), 1 ); ?>>Para todos</option>
												<option value="2" <?php selected( get_option('wk_hide_wp_toolbar'), 2 ); ?>>Excepto para administradores</option>
											</select>
										</td>
									</tr>
								</table>

								<!--<table class="form-table widefat">
									<td valign="top">
										<th class="row-title"><?php esc_attr_e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
										<th><?php esc_attr_e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
									</td>
									<tr valign="top">
										<td scope="row"><label for="tablecell"><?php esc_attr_e('Table data cell #1, with label', 'wp_admin_style'); ?></label></td>
										<td><?php esc_attr_e( 'Table Cell #2', 'wp_admin_style' ); ?></td>
									</tr>
									<tr valign="top" class="alternate">
										<td scope="row"><label for="tablecell"><?php esc_attr_e('Table Cell #3, with label and class', 'wp_admin_style'); ?> <code>alternate</code></label></td>
										<td><?php esc_attr_e( 'Table Cell #4', 'wp_admin_style' ); ?></td>
									</tr>
									<tr valign="top">
										<td scope="row"><label for="tablecell"><?php esc_attr_e('Table Cell #5, with label', 'wp_admin_style'); ?></label></td>
										<td><?php esc_attr_e( 'Table Cell #6', 'wp_admin_style' ); ?></td>
									</tr>
								</table>-->

							</div>
							<!-- post-body-content -->

							<!-- sidebar -->
							<div id="postbox-container-1" class="postbox-container">
							<div id="side-sortables" class="meta-box-sortables ui-sortable">
								<div id="submitdiv" class="postbox ">

									<!-- Content box-->
									<button type="button" class="handlediv button-link" aria-expanded="true">
										<span class="screen-reader-text">Alternar panel: Publicar</span>
										<span class="toggle-indicator" aria-hidden="true"></span>
									</button>
									<h2 class="hndle ui-sortable-handle"><span>Publicar</span></h2>
									<div class="inside">
										<div class="submitbox" id="submitpost">
											<div id="minor-publishing">
												<div style="display:none;">
												<p class="submit"><input type="submit" name="save" id="save" class="button" value="Guardar"></p></div>
												<div id="minor-publishing-actions">
													<div id="save-action"></div>
													<div class="clear"></div>
												</div><!-- #minor-publishing-actions -->
												<div id="misc-publishing-actions">
													<div class="misc-pub-section misc-pub-post-status"><label for="post_status">Estado:</label>
														<span id="post-status-display">Active</span>
													</div><!-- .misc-pub-section -->
													<div class="misc-pub-section misc-pub-visibility" id="visibility">
														Visibilidad: <span id="post-visibility-display">Público</span>
													</div><!-- .misc-pub-section -->
													<div class="misc-pub-section curtime misc-pub-curtime">
														<span id="timestamp">
														Publicada el: <b>26 Nov de 2016 @ 05:49</b></span>
													</div>
													<script type="text/javascript">
														(function($) {

															// modify status
															$('#post-status-display').html('Active');


															// remove edit links
															$('#misc-publishing-actions a').remove();


															// remove editables (fixes status text changing on submit)
															$('#misc-publishing-actions .hide-if-js').remove();

														})(jQuery);
													</script>
												</div>
												<div class="clear"></div>
											</div>

											<div id="major-publishing-actions">
												<div id="publishing-action">
												<span class="spinner"></span>
													<input name="" type="submit" class="button button-primary button-large_" id="" value="Actualizar">
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div><!-- END content box-->

								</div>
							</div>
						</div>

						</div>
						<!-- #post-body .metabox-holder .columns-2 -->

						<br class="clear">
					</div>
					<!-- #poststuff -->

					<!-- <table class="widefat">
						<tr>
							<th class="row-title"><?php esc_attr_e( 'Table header cell #1', 'wp_admin_style' ); ?></th>
							<th><?php esc_attr_e( 'Table header cell #2', 'wp_admin_style' ); ?></th>
						</tr>
						<tr>
							<td class="row-title"><label for="tablecell"><?php esc_attr_e('Table Cell #1, with label', 'wp_admin_style'); ?></label></td>
							<td><?php esc_attr_e( 'Table Cell #2', 'wp_admin_style' ); ?></td>
						</tr>
						<tr class="alternate">
							<td class="row-title"><label for="tablecell"><?php esc_attr_e('Table Cell #3, with label and class', 'wp_admin_style'); ?> <code>alternate</code></label></td>
							<td><?php esc_attr_e( 'Table Cell #4', 'wp_admin_style' ); ?></td>
						</tr>
						<tr>
							<td class="row-title"><?php esc_attr_e( 'Table Cell #5, without label', 'wp_admin_style' ); ?></td>
							<td><?php esc_attr_e( 'Table Cell #6', 'wp_admin_style' ); ?></td>
						</tr>
					</table> -->

					<!-- <h1><?php esc_attr_e( 'Heading String', 'wp_admin_style' ); ?></h1> -->

					<!-- <div id="col-container">

						<div id="col-right">

							<div class="col-wrap">
								<?php esc_attr_e( 'Content Header', 'wp_admin_style' ); ?>
								<div class="inside">
									<p><?php esc_attr_e( 'WordPress started in 2003 with a single bit of code to enhance the typography of everyday writing and with fewer users than you can count on your fingers and toes. Since then it has grown to be the largest self-hosted blogging tool in the world, used on millions of sites and seen by tens of millions of people every day.', 'wp_admin_style' ); ?></p>
								</div>

							</div>

						</div>

						<div id="col-left">

							<div class="col-wrap">
								<?php esc_attr_e( 'Content Header', 'wp_admin_style' ); ?>
								<div class="inside">
									<p><?php esc_attr_e( 'Everything you see here, from the documentation to the code itself, was created by and for the community. WordPress is an Open Source project, which means there are hundreds of people all over the world working on it. (More than most commercial platforms.) It also means you are free to use it for anything from your cat’s home page to a Fortune 500 web site without paying anyone a license fee and a number of other important freedoms.', 'wp_admin_style' ); ?></p>
								</div>
							</div>

						</div>

					</div> -->
					<!-- /col-container -->

					<div style="clear: both;"></div>

					<?php //submit_button(); ?>

				</form>

			</div> <!-- .wrap -->

		<?php

	}

	// Content appearance/Login

	function wk_options_login_callback() {

		?>

			<div class="wrap">

				<h1>Login page</h1>

				<?php settings_errors(); ?>

				<form method="post" action="options.php">
				    <?php settings_fields( 'wk-login-settings-group' ); ?>
				    <?php do_settings_sections( 'wk-login-settings-group' ); ?>

				    <p>Puedes personalizar la página de Login en esta sección</p>

					<div id="poststuff">

						<div id="post-body" class="metabox-holder columns-2">

							<div id="post-body-content">

								<div class="meta-box-sortables ui-sortable">

							    	<!-- <h3>Logo</h3> -->

								</div><!--meta-box-sortables-->

							    <table class="widefat">
							    	<col width="200">
							        <tr valign="top">
								        <td class="row-title" scope="row">
								        	Logo
								        	<p class="description">Se usará unicamente en la página de login.</p>
							        	</td>
								        <td>
								        	<div class="upload-img">
				        		    			<?php if( ! get_option( 'wk_custom_login_logo' ) ) : ?>
				        	    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: none;"'; ?>
				        		    			<?php else : ?>
				        	    					<?php $wk_hide = 'style="display: none;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
				        		    			<?php endif; ?>
				        			    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
				        		    				<img width="200" class="image_src" src="<?php echo get_option( 'wk_custom_login_logo' ); ?>">
				        			    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
				        			    		</div>
				        						<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
				        						    <input style="display: none;" type="text" name="wk_custom_login_logo" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_custom_login_logo') ); ?>" >
				        						    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
				        						</div>
								        	</div>
								        	<p class="description">Callback: get_option('wk_custom_login_logo')</p>
								        </td>
							        </tr>
							        <tr valign="top" class="alternate">
								        <td scope="row">Background</td>
								        <td>
								        	<div class="upload-img">
				        		    			<?php if( ! get_option( 'wk_custom_login_background_image' ) ) : ?>
				        	    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: none;"'; ?>
				        		    			<?php else : ?>
				        	    					<?php $wk_hide = 'style="display: none;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
				        		    			<?php endif; ?>
				        			    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
				        		    				<img width="200" class="image_src" height="150" src="<?php echo get_option( 'wk_custom_login_background_image' ); ?>">
				        			    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
				        			    		</div>
				        						<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
				        						    <input style="display: none;" type="text" name="wk_custom_login_background_image" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_custom_login_background_image') ); ?>" >
				        						    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
				        						</div>
								        	</div>
								        	<p class="description">Callback: get_option('wk_custom_login_background_image')</p>
								        </td>
							        </tr>
							        <tr valign="top">
								        <td scope="row">
									        Color de fondo
								        </td>
								        <td>
								        	<input type="color" name="wk_custom_login_background_color" id="wk_custom_login_background_color" value="<?php echo esc_attr( get_option('wk_custom_login_background_color') ); ?>"/>
								        	<p class="description">Callback: get_option('wk_custom_login_background_color')</p>
								        </td>
							        </tr>
							        <tr valign="top">
								        <td scope="row">
									        Color de texto
								        </td>
								        <td>
								        	<input type="color" name="wk_custom_login_color" id="wk_custom_login_color" value="<?php echo esc_attr( get_option('wk_custom_login_color') ); ?>"/>
								        	<p class="description">Callback: get_option('wk_custom_login_color')</p>
								        </td>
							        </tr>
							        <!--<tr valign="top">
								        <th scope="row">Blur</th>
								        <td>
								       		<input style="width: initial;" type="checkbox" name="footer_text" value="<?php echo esc_attr( get_option('footer_text') ); ?>" class="regular-text"/>
								        	<p class="description">Apply a minor blurry effect</p>
								        </td>
							        </tr>-->
							    </table>

							</div><!--post-body-content-->

							<div id="postbox-container-1" class="postbox-container">

								<div class="meta-box-sortables">

									<div class="postbox">

										<h2><span><?php esc_attr_e('Login Logo', 'wp_admin_style' ); ?></span></h2>

										<div class="inside">
											<p>
												<?php esc_attr_e('El logo se usará en la sección de administrador y en el sitio', 'wp_admin_style'); ?> </p>
									        	<?php if ( get_option('custom_logo') ) : ?>
											        <p style="text-align: center; margin: 22px 0;">
												        <img width="160px" src="<?php echo esc_attr( get_option('custom_logo') ); ?>">
											        	<span style="display: block;" class="description"></span>

											     	</p>
											    <?php else: ?>
											    	<p style="text-align: center; margin: 22px 0;">
												        <img width="160px" src="<?php echo $GLOBALS['dashb_url']; ?>/img/wpkit-logo.svg" alt="<?php esc_attr__( get_bloginfo('name') ); ?>">
											        	<span style="display: block;" class="description"></span>
											     	</p>
										    	<?php endif; ?>
										</div><!-- .inside -->

									</div><!-- .postbox -->

								</div><!-- .meta-box-sortables -->

							</div><!-- #postbox-container-1 .postbox-container -->


						</div><!--post-body-->

					</div><!--poststuff-->

					<span style="display: block; clear:both;"></span>

				    <?php submit_button( 'Guardar' ); ?>

				</form>

			</div><!--wrap-->

		<?php
	}

	function wk_options_branding_callback() {

		?>

			<div class="wrap">

				<h1>Branding</h1>

				<?php settings_errors(); ?>

				<form method="post" action="options.php">
				    <?php settings_fields( 'wk-branding-settings-group' ); ?>
				    <?php do_settings_sections( 'wk-branding-settings-group' ); ?>

				    <p>Puedes personalizar la página de Login en esta sección</p>

					<div id="poststuff">

						<div id="post-body" class="metabox-holder columns-2">

							<div id="post-body-content">

								<div class="meta-box-sortables ui-sortable">

							    	<!-- <h3>Logo</h3> -->

								</div><!--meta-box-sortables-->


							    <table class="widefat">
							    	<col width="200">
							        <tr valign="top">
								        <td class="row-title" scope="row">
									        Logo principal
									        <p class="description">Se usará como logo principal, aparecerá en el sitio, login page y secciones de administración si se habilita en este último</p></td>
								        <td>
								        	<div class="upload-img">
				        		    			<?php if( ! get_option( 'wk_custom_logo_main' ) ) : ?>
				        	    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: none;"'; ?>
				        		    			<?php else : ?>
				        	    					<?php $wk_hide = 'style="display: none;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
				        		    			<?php endif; ?>
				        			    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
				        		    				<img width="250" class="image_src" src="<?php echo get_option( 'wk_custom_logo_main' ); ?>">
				        			    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
				        			    		</div>
				        						<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
				        						    <input style="display: none;" type="text" name="wk_custom_logo_main" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_custom_logo_main') ); ?>" >
				        						    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
				        						</div>
								        	</div>
								        	<?php if( is_admin() ) : ?><p class="description">Callback: get_option('wk_custom_logo_main')</p><?php endif; ?>
								        </td>
							        </tr>
							        <tr valign="top" class="alternate">
									        <td class="row-title" scope="row">
									        Logo alternativo
									        <p class="description">Se usará como logo alternativo. Es necesario consultar con el desarrollador si se ha implementado en el sitio.</p></td>
								        <td>
								        	<div class="upload-img">
				        		    			<?php if( ! get_option( 'wk_custom_logo_alt' ) ) : ?>
				        	    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: none;"'; ?>
				        		    			<?php else : ?>
				        	    					<?php $wk_hide = 'style="display: none;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
				        		    			<?php endif; ?>
				        			    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
				        		    				<img width="250" class="image_src" src="<?php echo get_option( 'wk_custom_logo_alt' ); ?>">
				        			    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
				        			    		</div>
				        						<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
				        						    <input style="display: none;" type="text" name="wk_custom_logo_alt" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_custom_logo_alt') ); ?>" >
				        						    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
				        						</div>
								        	</div>
								        	<?php if( is_admin() ) : ?><p class="description">Callback: get_option('wk_custom_logo_alt')</p><?php endif; ?>
								        </td>
							        </tr>
							        <tr valign="top">
								        <td class="row-title" scope="row">
									        Logo alternativo
									        <p class="description">Se usará como logo adicional para variacionesd de la marca. Es necesario consultar con el desarrollador si se ha implementado en el sitio.</p></td>
								        <td>
								        	<div class="upload-img">
				        		    			<?php if( ! get_option( 'wk_custom_logo_complementary' ) ) : ?>
				        	    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: none;"'; ?>
				        		    			<?php else : ?>
				        	    					<?php $wk_hide = 'style="display: none;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
				        		    			<?php endif; ?>
				        			    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
				        		    				<img width="250" class="image_src" src="<?php echo get_option( 'wk_custom_logo_complementary' ); ?>">
				        			    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
				        			    		</div>
				        						<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
				        						    <input style="display: none;" type="text" name="wk_custom_logo_complementary" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_custom_logo_complementary') ); ?>" >
				        						    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
				        						</div>
								        	</div>
								        	<?php if( is_admin() ) : ?><p class="description">Callback: get_option('wk_custom_logo_complementary')</p><?php endif; ?>
								        </td>
							        </tr>
							        <tr valign="top" class="alternate">
								        <td scope="row">
									        Background
									        <p class="description">URL de la imagen del background personalizado</p>
								        </td>
								        <td>
								        	<div class="upload-img">
				        		    			<?php if( ! get_option( 'wk_custom_site_background' ) ) : ?>
				        	    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: none;"'; ?>
				        		    			<?php else : ?>
				        	    					<?php $wk_hide = 'style="display: none;"'; ?>
				        	    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
				        		    			<?php endif; ?>
				        			    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
				        		    				<img width="250" class="image_src" height="150" src="<?php echo get_option( 'wk_custom_site_background' ); ?>">
				        			    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
				        			    		</div>
				        						<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
				        						    <input style="display: none;" type="text" name="wk_custom_site_background" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_custom_site_background') ); ?>" >
				        						    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
				        						</div>
								        	</div>
								        	<?php if( is_admin() ) : ?><p class="description">Callback: get_option('wk_custom_site_background')</p><?php endif; ?>
								        </td>
							        </tr>
							        <tr valign="top">
								        <td scope="row">
									        Fondo
									        <p class="description">Aplicar un fondo obscuro en el logo del panel de administración.</p>
								        </td>
								        <td>
								        	<input type="color" name="custom_admin_background" id="custom_admin_background" value="<?php echo esc_attr( get_option('custom_admin_background') ); ?>"/>

								        </td>
							        </tr>
							    </table>

							</div><!--post-body-content-->

							<div id="postbox-container-1" class="postbox-container">

								<div class="meta-box-sortables">

									<div id="submitdiv" class="postbox ">
										<button type="button" class="handlediv button-link" aria-expanded="true">
											<span class="screen-reader-text">Alternar panel: Publicar</span>
											<span class="toggle-indicator" aria-hidden="true"></span>
										</button>
										<h2 class="hndle ui-sortable-handle"><span>Logo principal</span></h2>
										<div class="inside">
											<div class="submitbox" id="submitpost">
												<div id="minor-publishing">
													<div style="display:none;">
													<p class="submit"><input type="submit" name="save" id="save" class="button" value="Guardar"></p></div>
													<div id="minor-publishing-actions">
														<div id="save-action"></div>
														<div class="clear"></div>
													</div><!-- #minor-publishing-actions -->
													<div id="misc-publishing-actions">
														<div class="inside">
												        	<?php if ( get_option('wk_custom_logo_main') ) : ?>
														        <p style="text-align: center; margin: 22px 0;">
															        <img width="160px" src="<?php echo esc_attr( get_option('wk_custom_logo_main') ); ?>">
														        	<span style="display: block;" class="description"></span>

														     	</p>
														    <?php else: ?>
														    	<p style="text-align: center; margin: 22px 0;">
															        <img width="160px" src="<?php echo $GLOBALS['dashb_url']; ?>/img/wpkit-logo.svg" alt="<?php esc_attr__( get_bloginfo('name') ); ?>">
														        	<span style="display: block;" class="description"></span>
														     	</p>
													    	<?php endif; ?>
														</div><!-- .inside -->
													</div>
													<div class="clear"></div>
												</div>

												<div id="major-publishing-actions">
													<div id="publishing-action">
													<span class="spinner"></span>
														<input name="" type="submit" class="button button-primary button-large" id="" value="Actualizar">
														 <?php //submit_button( 'Guardar' ); ?>
													</div>
													<div class="clear"></div>
												</div>
											</div>
										</div>
									</div>

								</div><!-- .meta-box-sortables -->

							</div><!-- #postbox-container-1 .postbox-container -->


						</div><!--post-body-->

					</div><!--poststuff-->

					<span style="display: block; clear:both;"></span>

				    <?php submit_button( 'Guardar' ); ?>

				</form>

			</div><!--wrap-->

		<?php

	}


	function wk_theme_alpha_login_style() {

		wp_enqueue_style('dash-b-login-style', get_template_directory_uri() . '/css/login.css' );

		?>

			<style type="text/css">
				body {
				<?php if( get_option( 'wk_custom_login_background_color' ) ) : ?>
					background-color:  <?php echo get_option('wk_custom_login_background_color'); ?> !important;
				<?php endif; ?>
				<?php if( get_option( 'wk_custom_login_background_image' ) ) : ?>
					background-image: url( <?php echo get_option( 'wk_custom_login_background_image' ); ?> ) !important;
				<?php endif; ?>
				background-repeat: no-repeat !important;
				background-position: center;
				background-size: cover !important;
				}

		        body.login div#login h1 a {
	        	<?php if( get_option( 'wk_custom_login_logo' ) ) : ?>
	        		background-image: url('<?php echo esc_attr( get_option('wk_custom_login_logo') ); ?>');
	        	<?php else : ?>
	        		background-image: url('<?php echo $GLOBALS['dashb_url'] . '/img/wpkit-logo.svg'; ?>');
	        	<?php endif; ?>
				width: 50%;
				background-size: contain;
				background-position: center !important;
				margin: 0 auto;
				}

				body.login label {
			    color: <?php echo get_option('wk_custom_login_color'); ?> !important;
			    font-size: 14px;
				}

				<?php if( get_option( 'wk_custom_login_color' ) ) : ?>
					#loginform,
					body.login a,
					body.login {
				    color: <?php echo get_option('wk_custom_login_color'); ?> !important;
					}
				<?php endif; ?>

				#loginform #user_pass, #loginform #user_login {
					background: transparent;
					border: 0;
					box-shadow: none;
					border-bottom: 1px solid rgba(142, 142, 142, 0.41);
					<?php if( get_option( 'wk_custom_login_color' ) ) : ?>
					border-color:  <?php echo get_option('wk_custom_login_color'); ?> !important;
					<?php endif; ?>
					transition: all .25s linear;
					-webkit-transition: all .25s linear;
				}

	    </style>

		<?php

	}

	add_action('login_enqueue_scripts', 'wk_theme_alpha_login_style', 10);
