<?php
/*
*
*  Contiene las funciones implementadas en el template.
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/

/*******************************************************************************
WPKit Dash B */


		include_once( get_template_directory() . '/wpkit/admin/wpkit-dash-b.php' );


/*******************************************************************************
Admin scripts */

	$GLOBALS['wpkit_url'] = get_template_directory_uri() . '/wpkit/';

	// Admin

		function wpkit_admin_enqueue_scripts() {

			// Style
			wp_register_style( 'wk-style', $GLOBALS['wpkit_url'] . 'css/style.css' ); wp_enqueue_style( 'wk-style' );
			wp_register_style( 'wk-admin-wkui-style', $GLOBALS['wpkit_url'] . 'assets/wpkitui/wpkitui.css' ); wp_enqueue_style( 'wk-admin-wkui-style' );
			wp_register_style( 'codemirror-style', $GLOBALS['wpkit_url'] . 'assets/codemirror/codemirror.css' ); wp_enqueue_style( 'codemirror-style' );
			wp_register_style( 'wk-admin-style', get_template_directory_uri() . '/css/admin.css' ); wp_enqueue_style( 'wk-admin-style' );

			// Script
			wp_enqueue_media();
			wp_register_script( 'wk-scripts', $GLOBALS['wpkit_url'] . '/js/admin.js', array('jquery') ); wp_enqueue_script( 'wk-scripts' );
			wp_register_script( 'wk-admin-wkui-scripts', $GLOBALS['wpkit_url'] . 'assets/wpkitui/wpkitui.js', array('jquery') ); wp_enqueue_script( 'wk-admin-wkui-scripts' );
			wp_register_script( 'codemirror-scripts', $GLOBALS['wpkit_url'] . 'assets/codemirror/codemirror.js', array('jquery') ); wp_enqueue_script( 'codemirror-scripts' );
			wp_register_script( 'codemirror-mode-scripts', $GLOBALS['wpkit_url'] . 'assets/codemirror/mode/javascript.js', array('jquery') ); wp_enqueue_script( 'codemirror-mode-scripts' );

	 	}

		 add_action('admin_enqueue_scripts', 'wpkit_admin_enqueue_scripts');

	// WP

		function wpkit_wp_enqueue_scripts() {

			// Script
				wp_register_script( 'wk-site-scripts', $GLOBALS['wpkit_url'] . 'js/site.js', array('jquery') ); wp_enqueue_script( 'wk-site-scripts' );

		}

		add_action( 'wp_enqueue_scripts', 'wpkit_wp_enqueue_scripts' );

	// Admin head

	 	function wpkit_admin_head() {

	 		echo '<link rel="Shortcut Icon" type="image/ico" href="' . $GLOBALS['wpkit_url'] . '/img/favicon.png">';

	 	}

	 	add_action( 'admin_head', 'wpkit_admin_head', 20 );

	// WP head

 		function wpkit_wp_head() {

 			get_template_part( 'wpkit/inc/header' );

			if( get_option( 'wk_option_loader' ) ) :

				?>

					<style id="wk-loader-style">
						.no-js .wk-preloading { display: none; }
						.js .wk-preloading { display: block; position: absolute; left: 100px; top: 0; }
						.wk-preloading { position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; z-index: 999999; <?php if( get_option( 'wk_option_loader_background' ) ) : ?> background-color: <?php echo get_option( 'wk_option_loader_background' ); ?>; <?php endif; ?> }
						.wk-preloading-custom { position: fixed; top: 0; bottom: 0; left: 0; right: 0; margin: auto; max-width: 400px; height: auto; z-index: 999999; }
						.wk-preloading-loader { animation-duration: 3s; }
						.wk-preloading-loader,
						.wk-preloading-loader:before,
						.wk-preloading-loader:after {
						    background-color: transparent;
						    border: 3px solid;
						    border-color: transparent;
						    border-top-color: <?php echo get_option( 'wk_option_loader_color' ); ?>;
						    border-radius: 100px;
						    width: 110px;
						    height: 110px;
						    position: absolute;
						    top: 0;
						    left: 0;
						    right: 0;
						    bottom: 0;
						    margin: auto;
						    transform-origin: center;
						    animation-name: spin;
						    animation-timing-function: cubic-bezier(0.83, 0.01, 0.4, 0.93);
						    animation-iteration-count: infinite;
						}
						.wk-preloading-loader:before, .wk-preloading-loader:after { content: ""; display: block; background-color: transparent; }
						.wk-preloading-loader:before { width: 60%; height: 60%; animation-duration: 6s; }
						.wk-preloading-loader:after { width: 80%; height: 80%; animation-duration: 3s; }
						 @keyframes spin {
							0%   { -webkit-transform: rotate(0deg); -ms-transform: rotate(0deg); transform: rotate(0deg); }
							100% { -webkit-transform: rotate(720deg); -ms-transform: rotate(720deg); transform: rotate(720deg); }
						}
					</style>

				<?php

			endif;

 		}

 		add_action( 'wp_head', 'wpkit_wp_head', 0 );

 	// WP Footer

		function wpkit_wp_footer() {

			get_template_part( 'wpkit/inc/footer' );

		}

		add_action( 'wp_footer', 'wpkit_wp_footer' );

/*********************************************************************************
* ACF */

		// 1. Custom ACF path
		add_filter('acf/settings/path', 'acf_settings_path');

		function acf_settings_path( $path ) {

			$path = get_template_directory() . '/wpkit/acf/';

			return $path;

		}

		// 2. Custom ACF dir
		add_filter('acf/settings/dir', 'acf_settings_dir');

		function acf_settings_dir( $dir ) {

			$dir = get_template_directory_uri() . '/wpkit/acf/';

			return $dir;

		}

		include_once( get_template_directory() . '/wpkit/acf/acf.php' );

		if( get_current_user_id() != 1 ) {

			add_filter('acf/settings/show_admin', '__return_false');

		}

		/***************************************************************************
		* ACF Code field */

			include_once( get_template_directory() . '/wpkit/acf/acf-code-field/acf-code-field.php' );

		/***************************************************************************
		* Campos por default de Advanced Custom Fields */

			include_once( get_template_directory() . '/functions/acf-custom.php');


/*******************************************************************************
* Campos personalizados en el menú de administrador en General Settings */


	// Sección de opciones "Viewport" en ajustes generales

		add_action('admin_init', 'wk_register_section_mobile_optimization');
		function wk_register_section_mobile_optimization() {
			add_settings_section(
				'mobile_optimization_options', // ID
				'Mobile options', // Título
				'wk_section_mobile_optimization_options_callback', // Callback
				'general' // La página en la que se mostrará
			);

			add_settings_field( // Opción 1
				'viewport_size', // ID de la sección
				'Viewport size', // Label
				'section_viewport_size_textbox_callback', // !important - This is where the args go!
				'general', // La página en la que se mostrará
				'mobile_optimization_options', // Nombre de la sección
				array(
					'viewport_size' // Deberá ser el ID de la sección
				)
			);

			register_setting('general','viewport_size', 'esc_attr');
		}

		// Imprime los campos
			function wk_section_mobile_optimization_options_callback() { // Section Callback
				echo '<p>Opciones de visualización para exploradores y móviles.</p>';
			}

			function section_viewport_size_textbox_callback($args) {  // Textbox Callback
			    	$option = get_option($args[0]);
				echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
				echo '<p class="description">Indica un número integro, p.eg. 516. Default es 320';
			}




/* ***********************************************************************************************************************
* Añade páginas de opciones:
1. General settings / Contenidos
2. General settings / Redes sociales
*/


		function wk_options_general() {


			//Página options/Ajustes de redes sociales"
			add_options_page('Ajustes de redes sociales', 'Redes sociales', 'administrator', 'social-options', 'wk_options_social_callback');

			//Callback register settings function
			add_action( 'admin_init', 'wk_register_settings_options_general' );
		}

		add_action('admin_menu', 'wk_options_general');

		// Registra grupos de opciones

		function wk_register_settings_options_general() {

			// Registra grupo de opciones "Redes sociales"
			register_setting( 'social-settings-group-wpkit', 'site_facebook_id' );
			register_setting( 'social-settings-group-wpkit', 'site_google_plus_url' );
			register_setting( 'social-settings-group-wpkit', 'site_twitter_account' );

		}

		// Contenido options/social

		function wk_options_social_callback() {

			?>
				<div class="wrap">

					<h1>Redes sociales</h1>

					<form method="post" action="options.php">
						<?php settings_fields( 'social-settings-group-wpkit' ); ?>
						<?php do_settings_sections( 'social-settings-group-wpkit' ); ?>
						<h3>Perfiles</h3>
						<p>Los perfiles de redes sociales se usarán para generar meta etiquetas de Open graph y Twitter Cards.</p>
						<table class="form-table">
							<tr valign="top">
								<th scope="row">Facebook id</th>
								<td>
									<input type="text" name="site_facebook_id" value="<?php echo esc_attr( get_option('site_facebook_id') ); ?>" class="regular-text"/>
									<p class="description">En tu página de facebook ve a "configuración" / "información de página" y encuentra en la parte inferior "Identificador de página de Facebook"</p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">Google+</th>
								<td>
									<input type="text" name="site_google_plus_url" value="<?php echo esc_attr( get_option('site_google_plus_url') ); ?>" class="regular-text"/>
									<p class="description">URL del perfil de Google +, p.eg. http://www.plus.google.com/me</p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row">Twitter</th>
								<td>
									<input type="text" name="site_twitter_account" value="<?php echo esc_attr( get_option('site_twitter_account') ); ?>" class="regular-text"/>
									<p class="description">Cuenta de twitter, p.eg @wpkit</p>
								</td>
							</tr>
						</table>

					    <?php submit_button(); ?>

					</form>

				</div>

			<?php
		}



/************************************************************************************************************************
* Campos extra de usuario */

		// Redes sociales

			function wk_modify_contact_methods($profile_fields) {

				// Añade nuevos campos en las opciones de Perfil
				$profile_fields['twitter'] = 'Twitter Username';
				$profile_fields['facebook'] = 'Facebook Username';
				$profile_fields['gplus'] = 'Google+ Username';
				$profile_fields['instagram'] = 'Instagram Username';
				$profile_fields['pinterest'] = 'Pinterest Account';

				// Quita campos existentes
				//unset($profile_fields['aim']);

				return $profile_fields;
			}

			add_filter('user_contactmethods', 'wk_modify_contact_methods');

			/* Callback
			$twitter = get_the_author_meta('twitter');
			*/

/* ***********************************************************************************************************************
*  Snippets */

		/* ***********************************************************************************************************************
		*  Oculta toolbar para todos los usuarios excepto admin */


				function wk_remove_admin_bar() {
					if( get_option( 'wk_hide_wp_toolbar' ) == 1 ) {
						show_admin_bar(false);
					} elseif( get_option( 'wk_hide_wp_toolbar' ) == 2 ) {
						if (!current_user_can('administrator') && !is_admin()) {
						  show_admin_bar(false);
						}
					}
				}
				add_action('after_setup_theme', 'wk_remove_admin_bar');

		/* ***********************************************************************************************************************
		*  User agent */

				function wk_user_agent_class() {

  					global $is_lynx, $is_gecko, $is_IE, $is_winIE, $is_opera , $is_NS4, $is_safari, $is_chrome, $is_edge, $is_iphone;

  					$opera = strpos( $_SERVER['HTTP_USER_AGENT'], 'OPR');

  					$operaneon = strpos( $_SERVER['HTTP_USER_AGENT'], 'MMS');

  					$useragent = $_SERVER['HTTP_USER_AGENT'];

  					if( $is_lynx ) : echo ' linux';

  						elseif( $is_gecko ) : echo 'firefox';

  						elseif( $is_winIE ) : echo 'iexplorer';

  						elseif( $is_opera ) : echo 'opera';

  						elseif( $is_NS4 ) : echo 'ns4';

  						elseif( $is_safari ) : echo 'safari';

  						// No opera u opera neon
  						elseif( $is_chrome && strpos( $useragent, 'WOW64') == false ) : echo 'chrome';

  						elseif( $is_chrome && strpos( $useragent, $opera) == true ) : echo 'opera';

  						elseif( $is_chrome && strpos( $useragent, $operaneon) == true ) : echo 'operaneon';

  						elseif( $is_edge ) : echo ' edge ';

  						else : echo ' unknown_browser ';

  					endif;

  					if($is_iphone) : echo ' iphone '; endif;

  					if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) : echo ' osx';

  						elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) : echo ' linux';

  						elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) : echo ' windows';

  					endif;

  				}

		/* ***********************************************************************************************************************
		*  Slug de página en boddy_class */

				function wk_bodyclass_slug( $classes ) {
					global $post;
					if ( isset( $post ) ) {
						$classes[] = $post->post_type . '-' . $post->post_name;

					}
					return $classes;
				}
				add_filter( 'body_class', 'wk_bodyclass_slug' );

		/* ***********************************************************************************************************************
		*  Oculta notificaciones de WP

				function remove_core_updates_wpkit(){
					global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
				}
				add_filter('pre_site_transient_update_core','remove_core_updates_wpkit');
				add_filter('pre_site_transient_update_plugins','remove_core_updates_wpkit');
				add_filter('pre_site_transient_update_themes','remove_core_updates_wpkit');

		/* ***********************************************************************************************************************
		*  Redirecciona al home después de loggear

				function redirect_after_login_wpkit() {
						global $redirect_to;
						if (!isset($_GET['redirect_to'])) {
								$redirect_to = get_option('siteurl');
						}
				}
				add_action('login_form', 'redirect_after_login_wpkit');

		/* ***********************************************************************************************************************
		*  Oculta items de menu en admin menu

				function remove_menu_items_wpkit() {
					remove_menu_page('tools.php');
					remove_menu_page('index.php');
				}
				add_action('admin_menu', 'remove_menu_items_wpkit');

		/* ***********************************************************************************************************************
		* Redirecciona después de publicar un comentario

				function redirect_after_comment_wpkit($location)	{
					global $wpdb;
					return $_SERVER["HTTP_REFERER"]."#comment-".$wpdb->insert_id;
				}
				add_filter('comment_post_redirect', 'redirect_after_comment_wpkit');

		/* ***********************************************************************************************************************
		*  Incrementa el tamaño permitido en subida de archivos

				@ini_set( 'upload_max_size' , '50MB' );

				ò agrego esto al htacces

				php_value upload_max_filesize 64M
				php_value post_max_size 64M
				php_value max_execution_time 300
				php_value max_input_time 300

		/* ***********************************************************************************************************************
		* Cambia la categoría por defaul de 'Sin categoría' o 'Uncatecorized' a 'Sin categorizar'

				update_option( 'default_category', 'Sin categorizar' );

		/************************************************************************************************************************
		* Reemplaza labels en admin menu *

		    function wpkit_change_admin_menu_posts_label() {
			  global $menu;
			  global $submenu;
			  $menu[5][0] = 'Artículos';
			  $submenu['edit.php'][5][0] = 'Artículos';
			  //$submenu['edit.php'][10][0] = 'Añadir';
			  //$submenu['edit.php'][15][0] = 'Status'; // Change name for categories
			  //$submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
			  echo '';
		    }

		    function wpkit_change_admin_menu_labels() {
				global $wp_post_types;
				$labels = &$wp_post_types['post']->labels;
				$labels->name = 'Artículos';
				$labels->singular_name = 'Artículo';
				$labels->add_new = 'Añadir artículo';
				$labels->add_new_item = 'Nuevo artículo';
				$labels->edit_item = 'Editar artículo';
				$labels->new_item = 'Artículo';
				$labels->view_item = 'Ver artículo';
				//$labels->search_items = '';
				//$labels->not_found = '';
				//$labels->not_found_in_trash = '';
			  }
			  add_action( 'init', 'wpkit_change_admin_menu_labels' );
			  add_action( 'admin_menu', 'wpkit_change_admin_menu_posts_label' );


		/************************************************************************************************************************
		* Muestra solo los posts de usuario al autor del post, excepto admin *

	  		function wk_parse_query_useronly( $wp_query ) {
	  		    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/edit.php' ) !== false ) {
	  		        if ( !current_user_can( 'level_10' ) ) {
	  		            global $current_user;
	  		            $wp_query->set( 'author', $current_user->id );
	  		        }
	  		    }
	  		}

	  		add_filter('parse_query', 'wk_parse_query_useronly' );

	  		/************************************************************************************************************************
			* Muestra solo imagenes que ha subido el usuario desde el dialogo insetar en las publicaciones, en media library podrá segui
			viendo todas las imágenes. *

	  		// Muestra solo las imagenes que ha subido el usuario

				function wk_users_own_attachments( $wp_query_obj ) {

				    global $current_user, $pagenow;

				    $is_attachment_request = ($wp_query_obj->get('post_type')=='attachment');

				    if( !$is_attachment_request )
				        return;

				    if( !is_a( $current_user, 'WP_User') )
				        return;

				    if( !in_array( $pagenow, array( 'upload.php', 'admin-ajax.php' ) ) )
				        return;

				    if( !current_user_can('delete_pages') )
				        $wp_query_obj->set('author', $current_user->ID );

				    return;
				}

				add_action('pre_get_posts','wk_users_own_attachments');


  		/************************************************************************************************************************
		Requiere "Featured image" para poder publicar *

	  		add_action('save_post', 'wpds_check_thumbnail');
	  		add_action('admin_notices', 'wpds_thumbnail_error');
	  		function wpds_check_thumbnail($post_id) {
	  		    // change to any custom post type
	  		    if(get_post_type($post_id) != 'portafolios')
	  		        return;
	  		    if ( !has_post_thumbnail( $post_id ) ) {
	  		        // set a transient to show the users an admin message
	  		        set_transient( "has_post_thumbnail", "no" );
	  		        // unhook this function so it doesn't loop infinitely
	  		        remove_action('save_post', 'wpds_check_thumbnail');
	  		        // update the post set it to draft
	  		        wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
	  		        add_action('save_post', 'wpds_check_thumbnail');
	  		    } else {
	  		        delete_transient( "has_post_thumbnail" );
	  		    }
	  		}
	  		function wpds_thumbnail_error()
	  		{
	  		    // check if the transient is set, and display the error message
	  		    if ( get_transient( "has_post_thumbnail" ) == "no" ) {
	  		        echo "<div id='message' class='error'><p><strong>Debes seleccionar una imagen para poder publicar. Se ha guardado el borrador.</strong></p></div>";
	  		        delete_transient( "has_post_thumbnail" );
	  		    }
	  		}


  		/************************************************************************************************************************
		Permite subir solo jpeg gif y png *

	  		function restrict_mime($mimes) {
		  		$mimes = array(
		  		                'jpg|jpeg|jpe' => 'image/jpeg',
		  		                'gif' => 'image/gif',
		  		                'png' => 'image/png',
		  		);
		  		return $mimes;
	  		}

	  			add_filter('upload_mimes','restrict_mime');

		/***********************************************************************************************************************
		Remove Meta boxes - esconde metaboxes */

			// https://codex.wordpress.org/Function_Reference/remove_meta_box

			//function wk_remove_meta_boxes() {

				//$post_type = array('post', 'page');

				// remove_meta_box('authordiv', $post_type, 'normal');
				// remove_meta_box('categorydiv', $post_type, 'normal');
				// remove_meta_box('commentstatusdiv', $post_type, 'normal');
				// remove_meta_box('commentsdiv', $post_type, 'normal');
				// remove_meta_box('formatdiv', $post_type, 'normal');
				// remove_meta_box('pageparentdiv', $post_type, 'normal');
				//remove_meta_box('postcustom', $post_type, 'normal');
				// remove_meta_box('postexcerpt', $post_type, 'normal');
				// remove_meta_box('postimagediv', $post_type, 'normal');
				// remove_meta_box('revisionsdiv', $post_type, 'normal');
				// remove_meta_box('slugdiv', $post_type, 'normal');
				// remove_meta_box('submitdiv', $post_type, 'normal');
				// remove_meta_box('tagsdiv-post_tag', $post_type, 'normal');
				// remove_meta_box('trackbacksdiv', $post_type, 'normal');

				// Dashboard

				// remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   // Right Now
				// remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // Recent Comments
				// remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );  // Incoming Links
				// remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );   // Plugins
				// remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );  // Quick Press
				// remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );  // Recent Drafts
				// remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );   // WordPress blog
				// remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );   // Other WordPress News
				// use 'dashboard-network' para remover widgets del dashboard de red

			//}

			//add_action( 'admin_menu', 'wk_remove_meta_boxes' );
			//add_action( 'wp_dashboard_setup', 'wk_remove_meta_boxes' );

		/************************************************************************************************************************
		* Añade widgets en el dashboard */

			// https://codex.wordpress.org/Function_Reference/wp_add_dashboard_widget

			// Imprime el contenido del widget
			function wk_dashboard_widget( $post, $callback_args ) { ?>

				    <html>
				      <head>
				        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
				        <script type="text/javascript">
				          google.charts.load('upcoming', {'packages':['geochart']});
				          google.charts.setOnLoadCallback(drawRegionsMap);

				          function drawRegionsMap() {

				            var data = google.visualization.arrayToDataTable([
				              ['Country', 'Popularity'],
				              ['Germany', 100],
				              ['United States', 150],
				              ['Brazil', 100],
				              ['Canada', 10],
				              ['France', 60],
				              ['Mexico', 1700]
				            ]);

				            var options = {};

				            var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

				            chart.draw(data, options);
				          }
				        </script>
				      </head>
				      <body>
				        <div id="regions_div" style="width: 350px; height: 350px; display: block; margin: auto;"></div>
				      </body>
				    </html>
			<?php }

			// Action hook
			function wk_add_dashboard_widgets() {
				wp_add_dashboard_widget('dashboard_widget', 'Dashboard Widget', 'wk_dashboard_widget');
			}

			// Registra el widget
			add_action('wp_dashboard_setup', 'wk_add_dashboard_widgets' );


		/************************************************************************************************************************
		Permite subir .svg */

			function wk_mime_types( $mimes ){
			    $mimes['svg'] = 'image/svg+xml';
			    return $mimes;
			}

            add_filter( 'upload_mimes', 'wk_mime_types' );

		/************************************************************************************************************************
		WP pointer *

			function wk_admin_pointer() {
			    wp_enqueue_style( 'wp-pointer' );
			    wp_enqueue_script( 'wp-pointer' );
			    add_action( 'admin_print_footer_scripts', 'wk_admin_pointer_print_scripts' );
			}
			function wk_admin_pointer_print_scripts() {
			    $pointer_content = '<h3>WPKit | Notice</h3>';
			    $pointer_content .= '<p>Ajusta las opciones de este sitio en el menú de administración</p>';
			?>
			   <script type="text/javascript">
			   //<![CDATA[
			   jQuery(document).ready( function($) {
			    $('#toplevel_page_options-wpkit').pointer({
			        content: '<?php echo $pointer_content; ?>',
			        position: 'left',
			        close: function() {
			            // Once the close button is hit
			        }
			      }).pointer('open');
			   });
			   //]]>
			   </script>
			<?php
			}

				add_action( 'admin_enqueue_scripts', 'wk_admin_pointer' );

  		/************************************************************************************************************************

	  		///////////////////////////////////////////////////////
	  		// TinyMCE //////////////////////////////////////////
	  		///////////////////////////////////////////////////////

	  		function wk_format_TinyMCE($in)
	  		{
	  		 $in['remove_linebreaks']=false;
	  		 $in['gecko_spellcheck']=false;
	  		 $in['keep_styles']=true;
	  		 $in['accessibility_focus']=true;
	  		 $in['tabfocus_elements']='major-publishing-actions';
	  		 $in['media_strict']=true;
	  		 $in['paste_remove_styles']=false;
	  		 $in['paste_remove_spans']=false;
	  		 $in['paste_strip_class_attributes']='none';
	  		 $in['paste_text_use_dialog']=true;
	  		 $in['wpeditimage_disable_captions']=true;
	  		 $in['plugins']='inlinepopups,tabfocus,paste,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpfullscreen';
	  		 $in['content_css']=get_template_directory_uri() . "/editor-style.css";
	  		 $in['wpautop']=true;
	  		 $in['apply_source_formatting']=false;
	  		 $in['theme_advanced_buttons1']='forecolor,|,bold,italic,underline,|,bullist,numlist,|,wp_fullscreen,wp_adv';
	  		 $in['theme_advanced_buttons2']='pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,undo,redo';
	  		 $in['theme_advanced_buttons3']='';
	  		 $in['theme_advanced_buttons4']='';
	  		 return $in;
	  		}
	  		add_filter('tiny_mce_before_init', 'wk_format_TinyMCE' );

			/************************************************************************************************************************
			Creates post duplicate as a draft and redirects then to the edit post screen
			https://rudrastyh.com/wordpress/duplicate-post.html */

		  		function rd_duplicate_post_as_draft(){
		  			global $wpdb;
		  			if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		  				wp_die('No post to duplicate has been supplied!');
		  			}

		  			/*
		  			 * get the original post id
		  			 */
		  			$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
		  			/*
		  			 * and all the original post data then
		  			 */
		  			$post = get_post( $post_id );

		  			/*
		  			 * if you don't want current user to be the new post author,
		  			 * then change next couple of lines to this: $new_post_author = $post->post_author;
		  			 */
		  			$current_user = wp_get_current_user();
		  			$new_post_author = $current_user->ID;

		  			/*
		  			 * if post data exists, create the post duplicate
		  			 */
		  			if (isset( $post ) && $post != null) {

		  				/*
		  				 * new post data array
		  				 */
		  				$args = array(
		  					'comment_status' => $post->comment_status,
		  					'ping_status'    => $post->ping_status,
		  					'post_author'    => $new_post_author,
		  					'post_content'   => $post->post_content,
		  					'post_excerpt'   => $post->post_excerpt,
		  					'post_name'      => $post->post_name,
		  					'post_parent'    => $post->post_parent,
		  					'post_password'  => $post->post_password,
		  					'post_status'    => 'draft',
		  					'post_title'     => $post->post_title,
		  					'post_type'      => $post->post_type,
		  					'to_ping'        => $post->to_ping,
		  					'menu_order'     => $post->menu_order
		  				);

		  				/*
		  				 * insert the post by wp_insert_post() function
		  				 */
		  				$new_post_id = wp_insert_post( $args );

		  				/*
		  				 * get all current post terms ad set them to the new post draft
		  				 */
		  				$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		  				foreach ($taxonomies as $taxonomy) {
		  					$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
		  					wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		  				}

		  				/*
		  				 * duplicate all post meta just in two SQL queries
		  				 */
		  				$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		  				if (count($post_meta_infos)!=0) {
		  					$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
		  					foreach ($post_meta_infos as $meta_info) {
		  						$meta_key = $meta_info->meta_key;
		  						$meta_value = addslashes($meta_info->meta_value);
		  						$sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
		  					}
		  					$sql_query.= implode(" UNION ALL ", $sql_query_sel);
		  					$wpdb->query($sql_query);
		  				}


		  				/*
		  				 * finally, redirect to the edit post screen for the new draft
		  				 */
		  				wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		  				exit;
		  			} else {
		  				wp_die('Post creation failed, could not find original post: ' . $post_id);
		  			}
		  		}
		  		add_action( 'admin_action_rd_duplicate_post_as_draft', 'rd_duplicate_post_as_draft' );

		  		/*
		  		 * Add the duplicate link to action list for post_row_actions
		  		 */
		  		function rd_duplicate_post_link( $actions, $post ) {
		  			if (current_user_can('edit_posts')) {
		  				$actions['duplicate'] = '<a href="admin.php?action=rd_duplicate_post_as_draft&amp;post=' . $post->ID . '" title="Duplicar esta publicación" rel="permalink">Duplicar</a>';
		  			}
		  			return $actions;
		  		}

		  		add_filter( 'post_row_actions', 'rd_duplicate_post_link', 10, 2 );

/***********************************************************************************************************************
Widgets en Dashboard */

	 function wpkit_dashboard_widget_callback($post, $metabox) {

	 	//Get global variables
	 	global $wp_registered_sidebars, $wp_registered_widgets;

	 	//Get sidebars
	 	$sidebars = wp_get_sidebars_widgets();

	 	//Get widgets
	 	$dws_widgets = $sidebars["widgetized-dashboard"];

	 	//Get current widget
	 	$id = $metabox["args"]["id"];

	 	//Get the sidebar
	 	$sidebar = $wp_registered_sidebars["widgetized-dashboard"];

	 	//Gets widgets unique number
	 	$widgetnumber = $wp_registered_widgets[$id]["params"][0]["number"];

	 	//Check if the required data is set
	 	if( isset($wp_registered_widgets[$id]) && isset($wp_registered_widgets[$id]["callback"]) && isset($wp_registered_widgets[$id]["callback"][0]) && $wp_registered_widgets[$id]["params"][0]["number"] == $widgetnumber)
	 	{
	 		/* Code borrowed from widget.php in the WordPress core */
	 		$params = array_merge(
	 		                array( array_merge( $sidebar, array('widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name']) ) ),
	 		                (array) $wp_registered_widgets[$id]['params']
	 		        );

	         // Substitute HTML id and class attributes into before_widget
	         $classname_ = '';
	         foreach ( (array) $wp_registered_widgets[$id]['classname'] as $cn ) {
	                 if ( is_string($cn) )
	                         $classname_ .= '_' . $cn;
	                 elseif ( is_object($cn) )
	                         $classname_ .= '_' . get_class($cn);
	         }
	         $classname_ = ltrim($classname_, '_');
	         $params[0]['before_widget'] = sprintf($params[0]['before_widget'], $id, $classname_);

	         $params = apply_filters( 'dynamic_sidebar_params', $params );

	         $callback = $wp_registered_widgets[$id]['callback'];

	         do_action( 'dynamic_sidebar', $wp_registered_widgets[$id] );

	 		if ( is_callable($callback) ) {
	 			//Call the function, that outputs the widget content
	 			call_user_func_array($callback, $params);
	         }

	 		/* ---------------------------------------------------- */
	 	}

	 }

	 // Action hook
	 function wk_dashboard_widgets() {

	 	global $wp_registered_sidebars, $wp_registered_widgets;

	 	//Current settings
	 	$widgetSettings = get_option('wpkit_widget_settings', array());

	 	//Sidebars
	 	$sidebars = wp_get_sidebars_widgets();

	 	//Widgets de sidebar
	 	$dws_widgets = $sidebars["widgetized-dashboard"];

	 	//Añade cada widget al dashboard
	 	if(is_array($dws_widgets) && count($dws_widgets) > 0) {
	 		foreach($dws_widgets as $id)
	 		{
	 			if(!isset($wp_registered_widgets[$id]))
	 				continue;
	 			//Widget unique number
	 			$widgetnumber = $wp_registered_widgets[$id]["params"][0]["number"];

	 			//Si data que se requiere está
	 			if( isset($wp_registered_widgets[$id]) && isset($wp_registered_widgets[$id]["callback"]) && isset($wp_registered_widgets[$id]["callback"][0]) && $wp_registered_widgets[$id]["params"][0]["number"] == $widgetnumber)
	 			{
	 				//Get widgets settings
	 				$widget = $wp_registered_widgets[$id]["callback"][0]->get_settings();

	 				//Set title
	 				if(trim($widget[$widgetnumber]["title"]) == "") {
	 					$title = '&nbsp;';
	 				} else {
	 					$title = $widget[$widgetnumber]["title"];
	 				}

	 				//Settings - default
	 				if(!isset($widgetSettings[$id])) {
	 					$widgetSettings[$id] = array(
	 						'priority' => 'default',
	 						'context' => 'normal'
	 					);
	 				}

	 				//Añade el widget al dashboard
	 				add_meta_box(
	 					'dashboard_widget_' . $id, 					    //ID
	 					$title, 										//Title
	 					'wpkit_dashboard_widget_callback', 				//Callback function
	 					'dashboard', 									//Where?
	 					$widgetSettings[$id]['context'], 				//Context
	 					$widgetSettings[$id]['priority'], 				//Priority
	 					array('id' => $id,)								//Meta data
	 				);
	 			}
	 		}
	 	}
	 }

	 // Registra el nuevo widget en dashboard con 'wp_dashboard_setup' action
	 add_action('wp_dashboard_setup', 'wk_dashboard_widgets' );

	 //Registra widget area de dashboard
	 register_sidebar(array(
	 	'name' => __( 'Dashboard' ),
	 	'id' => 'widgetized-dashboard',
	 	'class' => '',
	 	'description' => __( 'Estos widgets se mostrarán en el dashboard' ),
	 	'before_title' => '<div style="display: none;">',
	 	'after_title' => '</div>',
	 	'before_widget' => '',
	 	'after_widget' => ''
	 ));

/***********************************************************************************************************************
 Inhabilita los widgets por default de wp *

    function wk_disable_default_dashboard_widgets() {

	 	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	 	remove_meta_box('dashboard_activity', 'dashboard', 'core');
	 	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	 	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	 	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	 	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	 	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	 	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	 	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	 }

	 add_action('admin_menu', 'wk_disable_default_dashboard_widgets');

/***********************************************************************************************************************
Dev menu */

		include( get_template_directory() . '/wpkit/inc/dev-menu.php' );


/***********************************************************************************************************************
Widgets */


		include( get_template_directory() . '/wpkit/systems/widgets/widgets.php' );


/***********************************************************************************************************************
Options */

		include( get_template_directory() . '/wpkit/systems/options.php' );


/***********************************************************************************************************************
Options functions */

	function wk_opengraph_header() {
		if( get_option( 'option_open_graph' ) ) {

			echo 'prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#"';

		}
	}

	function wk_schema_global_type() {

		global $post;

		 if( get_option( 'option_schema_org' ) ) {

		 		if( is_front_page() ) {

		 			if( get_option( 'option_schema_type_manual' ) ) {

		 				$schema_type = get_option( 'option_schema_type_manual' );

		 			} else {

		 				$schema_type = get_option( 'option_schema_type' );
		 			}

				} elseif( is_single() || is_page() ) {

					if( get_post_meta( $post->ID, 'seo_tipo-de-schema', true) ) {

						$schema_type = get_post_meta( $post->ID, 'seo_tipo-de-schema', true);

					} else {

						if( get_option( 'option_schema_type_manual' ) ) {

			 				$schema_type = get_option( 'option_schema_type_manual' );

			 			} else {

			 				$schema_type = get_option( 'option_schema_type' );
			 			}

					}

	 			} elseif( is_author() ) {

	 				$schema_type = 'Person';

	 			} else {

	 				$schema_type = 'Article';

	 			}

	 		echo 'itemscope itemtype="http://schema.org/' . $schema_type . '"';
	 	}

	}

/************************************************************************************************************************
* WP defaults */

	/************************************************************************************************************************
	* Habilita menú en header y footer */

		function wk_register_menus() {
			register_nav_menus(
				array(
					'main-nav' => __( 'Main menu' ),
					'footer-menu' => __( 'Footer menu' ),
				)
			);
		}

		add_action( 'init', 'wk_register_menus' );

	/************************************************************************************************************************
	* Habilita las imágenes destacadas */

		if ( function_exists( 'add_theme_support' ) ) {
			update_option('thumbnail_size_w', 414);
			update_option('thumbnail_size_h', 414);
			update_option('medium_size_w', 736);
			update_option('medium_size_h', 736);
			add_image_size( 'icon', 32, 32 );
			add_image_size( 'icon-large', 150, 150 );

			add_theme_support( 'post-thumbnails' );
			//add_theme_support( 'post-thumbnails', array( 'post' ) ); // Solo posts
		}

/************************************************************************************************************************
Notificaciones en panel de administración *

		function wk_notification() {
			?>

			<div class="notice notice-success is-dismissible">
		        <p>Esta es una notificación</p>
		    </div>

		    <?php
		}

		add_action( 'admin_notices', 'wk_notification' );

/************************************************************************************************************************
Buscar en el codex en admin menu */

		function wp_codex_search_form() { ?>
		    <form id="search-codex" class="wk-padding-h-22 wk-flex-item wk-flex-align-center wk-flex-justify-between" target="_blank" method="get" action="http://wordpress.org/search/do-search.php" class="alignright" style="margin: 11px 5px 0;">
		        <input style="width: 77%;height: 29px;" type="text" onblur="this.value=(this.value==\'\') ? \'Search the Codex\' : this.value;" onfocus="this.value=(this.value==\'Search the Codex\') ? \'\' : this.value;" maxlength="150" placeholder="Buscar en el codex" ="Search the Codex" name="search" class="text">
		        <input type="submit" value="Go" class="button" />
		    </form>
		<?php }

		if(is_admin()) {
			add_filter( 'adminmenu', 'wp_codex_search_form', 11 );
		}

/************************************************************************************************************************
Cuenta caracteres en el excerpt *

		 function wk_excerpt_count_js(){
		       echo '<script>jQuery(document).ready(function(){
		 jQuery("#postexcerpt .handlediv").after("<div style=\"position: absolute; top: -1px; right: 35px; color: #666; height: 36px; display: flex; align-items: center; width: 140px; justify-content: space-between; padding: 0 10px;\"><small></small><input type=\"text\" value=\"0\" maxlength=\"3\" size=\"3\" id=\"excerpt_counter\" readonly=\"\" style=\"background:#fff;\"> <small>character(s).</small></div>"); jQuery("#excerpt_counter").val(jQuery("#excerpt").val().length);
		      jQuery("#excerpt").keyup( function() {
		      jQuery("#excerpt_counter").val(jQuery("#excerpt").val().length);
		    });
		 });</script>';
		 }
		 add_action( 'admin_head-post.php', 'wk_excerpt_count_js');
		 add_action( 'admin_head-post-new.php', 'wk_excerpt_count_js');

/************************************************************************************************************************
Meta boxes */


		/**
		 * Generated by the WordPress Meta Box generator
		 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
		 */

		// Estílos adicionales

				function wk_codediv_get_meta( $value ) {
					global $post;

					$field = get_post_meta( $post->ID, $value, true );
					if ( ! empty( $field ) ) {
						return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
					} else {
						return false;
					}
				}

				function wk_codediv_add_meta_box() {

					$args = array(
						'public'	=> true,
						//'_builtin' 	=> false
					);

					$post_types = get_post_types( $args, 'names' );

					add_meta_box(
						'wk-codediv',
						__( 'Estílos adicionales', 'wk_codediv' ),
						'wk_codediv_html',
						$post_types,
						'advanced',
						'low'
					);
				}
				add_action( 'add_meta_boxes', 'wk_codediv_add_meta_box' );

				function wk_codediv_html( $post) {
					wp_nonce_field( '_wk_codediv_nonce', 'wk_codediv_nonce' ); ?>

						<style id="codediv-style-inline">#wk-codediv .inside {margin-top: 0; padding: 0; } </style>
						<!-- <label for="wk_codediv_cdigo"><?php _e( 'Inserta estílos y escripts adicionales', 'wk_codediv' ); ?></label><br> -->
						<form><textarea name="wk_codediv_cdigo" id="wk_codediv_cdigo" rows="10" style="width: 100%;"><?php echo wk_codediv_get_meta( 'wk_codediv_cdigo' ); ?></textarea></form>

					<script>
					  var editor = CodeMirror.fromTextArea(document.getElementById("wk_codediv_cdigo"), {
					    lineNumbers: true,
					    styleActiveLine: true,
					    matchBrackets: true
					  });
					</script>

					<?php
				}

				function wk_codediv_save( $post_id ) {
					if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
					if ( ! isset( $_POST['wk_codediv_nonce'] ) || ! wp_verify_nonce( $_POST['wk_codediv_nonce'], '_wk_codediv_nonce' ) ) return;
					if ( ! current_user_can( 'edit_post', $post_id ) ) return;

					if ( isset( $_POST['wk_codediv_cdigo'] ) )
						update_post_meta( $post_id, 'wk_codediv_cdigo', esc_attr( $_POST['wk_codediv_cdigo'] ) );
				}
				add_action( 'save_post', 'wk_codediv_save' );

				/*
					Usage: wk_codediv_get_meta( 'wk_codediv_cdigo' )
				*/

		// Scripts adicionales

				function wk_scriptdiv_get_meta( $value ) {
					global $post;

					$field = get_post_meta( $post->ID, $value, true );
					if ( ! empty( $field ) ) {
						return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
					} else {
						return false;
					}
				}

				function wk_scriptdiv_add_meta_box() {

					$args = array(
						'public'	=> true,
						//'_builtin' 	=> false
					);

					$post_types = get_post_types( $args, 'names' );

					add_meta_box(
						'wk_scriptdiv',
						__( 'Scripts', 'wk_scriptdiv' ),
						'wk_scriptdiv_html',
						$post_types,
						'advanced',
						'low'
					);
				}
				add_action( 'add_meta_boxes', 'wk_scriptdiv_add_meta_box' );

				function wk_scriptdiv_html( $post) {

					wp_nonce_field( '_wk_scriptdiv_nonce', 'wk_scriptdiv_nonce' );

					?>

						<style id="scriptdiv-style-inline">#wk_scriptdiv .inside {margin-top: 0; padding: 0; } </style>
						<!-- <label for="wk_scriptdiv_scripts"><?php _e( 'Scripts', 'wk_scriptdiv' ); ?></label><br> -->
						<textarea name="wk_scriptdiv_scripts" id="wk_scriptdiv_scripts" ><?php echo wk_scriptdiv_get_meta( 'wk_scriptdiv_scripts' ); ?></textarea>
						<script>
						  var editor = CodeMirror.fromTextArea(document.getElementById("wk_scriptdiv_scripts"), {
						    lineNumbers: true,
						    styleActiveLine: true,
						    matchBrackets: true
						  });
						</script>
						<p class="description" style="padding: 12px;">

							<span>¿En dónde se aplicarán?</span>

							<input type="radio" name="wk_scriptdiv_locate" id="wk_scriptdiv_locate_0" value="Header" <?php echo ( wk_scriptdiv_get_meta( 'wk_scriptdiv_locate' ) === 'Header' ) ? 'checked' : ''; ?>>
							<label for="wk_scriptdiv_locate_0">Header</label>

							<input type="radio" name="wk_scriptdiv_locate" id="wk_scriptdiv_locate_1" value="Footer" <?php echo ( wk_scriptdiv_get_meta( 'wk_scriptdiv_locate' ) === 'Footer' ) ? 'checked' : ''; ?> style="margin-left: 12px;">
							<label for="wk_scriptdiv_locate_1">Footer</label><br>
						</p>

					<?php

				}

				function wk_scriptdiv_save( $post_id ) {
					if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
					if ( ! isset( $_POST['wk_scriptdiv_nonce'] ) || ! wp_verify_nonce( $_POST['wk_scriptdiv_nonce'], '_wk_scriptdiv_nonce' ) ) return;
					if ( ! current_user_can( 'edit_post', $post_id ) ) return;

					if ( isset( $_POST['wk_scriptdiv_locate'] ) )
						update_post_meta( $post_id, 'wk_scriptdiv_locate', esc_attr( $_POST['wk_scriptdiv_locate'] ) );
					if ( isset( $_POST['wk_scriptdiv_scripts'] ) )
						update_post_meta( $post_id, 'wk_scriptdiv_scripts', esc_attr( $_POST['wk_scriptdiv_scripts'] ) );
				}
				add_action( 'save_post', 'wk_scriptdiv_save' );

				/*
					Usage: wk_scriptdiv_get_meta( 'wk_scriptdiv_locate' )
					Usage: wk_scriptdiv_get_meta( 'wk_scriptdiv_scripts' )
				*/
