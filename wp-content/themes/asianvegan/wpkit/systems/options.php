<?php

/* ***********************************************************************************************************************
* Options WPKit */

	function wk_options_wpkit() {

		//Página de opciones / WPKit
		$page_title = 'WPKit Master';
		$menu_title = 'WPKit';
		$capability = 'administrator';
		$menu_slug = 'options-wpkit';
		$callback_function = 'wk_options_wpkit_callback';
		$icon_url = 'dashicons-marker';
		$position = 98;

		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $callback_function, $icon_url, $position );

	}

	add_action( 'admin_menu', 'wk_options_wpkit' );

	function wk_register_settings_options_wpkit() {

		register_setting( 'wpkit-settings-group', 'wk_option_input' );
		register_setting( 'wpkit-settings-group', 'wk_option_radio' );
		register_setting( 'wpkit-settings-group', 'wk_option_checkbox' );
		register_setting( 'wpkit-settings-group', 'wk_option_select' );
		register_setting( 'wpkit-settings-group', 'wk_option_textarea' );
		register_setting( 'wpkit-settings-group', 'wk_option_image_uploader' );

		// Opciones
			register_setting( 'wpkit-settings-group', 'option_private_site' );
			register_setting( 'wpkit-settings-group', 'option_private_site_form' );
			register_setting( 'wpkit-settings-group', 'option_private_site_message' );
			// Loader
			register_setting( 'wpkit-settings-group', 'wk_option_loader' );
			register_setting( 'wpkit-settings-group', 'wk_option_loader_background' );
			register_setting( 'wpkit-settings-group', 'wk_option_loader_color' );
			register_setting( 'wpkit-settings-group', 'wk_option_loader_timing' );
			register_setting( 'wpkit-settings-group', 'wk_option_loader_img' );

			// Theme
				// para meta "theme-color : cambia el color de la barra superior en chrome para móviles"
				register_setting( 'wpkit-settings-group', 'option_favicon' );
				register_setting( 'wpkit-settings-group', 'wk_option_theme_color' );
				register_setting( 'wpkit-settings-group', 'wk_option_theme_icon' );
				register_setting( 'wpkit-settings-group', 'option_mobile_callback' );

		// Layout
			// Sidebars
				register_setting( 'wpkit-settings-group', 'wk_option_layouts_sidebar_a_show' );
				register_setting( 'wpkit-settings-group', 'wk_option_layouts_sidebar_a_width' );
				register_setting( 'wpkit-settings-group', 'wk_option_layouts_sidebar_a_position' );
				register_setting( 'wpkit-settings-group', 'wk_option_layouts_sidebar_b_show' );
				register_setting( 'wpkit-settings-group', 'wk_option_layouts_sidebar_b_width' );
				register_setting( 'wpkit-settings-group', 'wk_option_layouts_sidebar_b_position' );
			// Widgets
				register_setting( 'wpkit-settings-group', 'wk_option_layouts_widget' );

		// SEO
			// Schema.org
				register_setting( 'wpkit-settings-group', 'option_schema_org' );
				register_setting( 'wpkit-settings-group', 'option_schema_type' );
				register_setting( 'wpkit-settings-group', 'option_schema_type_manual' );
				register_setting( 'wpkit-settings-group', 'option_schema_name' );
				register_setting( 'wpkit-settings-group', 'option_schema_description' );
				register_setting( 'wpkit-settings-group', 'option_schema_image' );

		// Redes sociales
			// Facebook
				register_setting( 'wpkit-settings-group', 'option_open_graph' );
				register_setting( 'wpkit-settings-group', 'option_facebook_id' );
				register_setting( 'wpkit-settings-group', 'option_facebook_title' );
				register_setting( 'wpkit-settings-group', 'option_facebook_description' );
				register_setting( 'wpkit-settings-group', 'option_facebook_site_name' );
				register_setting( 'wpkit-settings-group', 'option_facebook_site_image' );
				register_setting( 'wpkit-settings-group', 'option_facebook_author' );
				register_setting( 'wpkit-settings-group', 'option_facebook_author_global' );
				register_setting( 'wpkit-settings-group', 'option_facebook_image' );
			// Twitter
				register_setting( 'wpkit-settings-group', 'option_twitter_cards' );
				register_setting( 'wpkit-settings-group', 'option_twitter_acc' );
				register_setting( 'wpkit-settings-group', 'option_twitter_type' );
				register_setting( 'wpkit-settings-group', 'option_twitter_title' );
				register_setting( 'wpkit-settings-group', 'option_twitter_description' );
				register_setting( 'wpkit-settings-group', 'option_twitter_image' );
			// Google
				register_setting( 'wpkit-settings-group', 'option_google_profile' );

		// Analytics
				register_setting( 'wpkit-settings-group', 'wk_option_analytics' );


	}

	add_action( 'admin_init', 'wk_register_settings_options_wpkit'  );


	function wk_options_wpkit_callback() { ?>

		<div class="wrap">

			<!-- <h1><?php esc_attr_e( 'WPKit 3 Options', 'wpkit_txt_domain' ); ?></h1> -->

			<?php settings_errors(); ?>

			<h2>
				<img style="width: 120px; margin: 20px 0;" src="<?php echo get_template_directory_uri(); ?>/wpkit/admin/img/wpkit-logo.svg">
			</h2>

			<form method="post" action="options.php">
				<?php settings_fields( 'wpkit-settings-group' ); ?>
				<?php do_settings_sections( 'wpkit-settings-group' ); ?>

				<!-- <h2 class="nav-tab-wrapper">
					<a href="#" class="nav-tab nav-tab-active">Tab #1</a>
					<a href="#" class="nav-tab">Tab #2</a>
					<a href="#" class="nav-tab">Tab #3</a>
				</h2> -->

				<div id="poststuff">

					<div id="post-body" class="metabox-holder columns-2">

						<div id="post-body-content">

							<div class="wk-tabs-content-left">

								<ul class="wk-tabs-list clearfix" data-tabgroup="first-tab-group">
									<li><a href="#tab1" class="active"><i class="dashicons-before dashicons-admin-settings"></i> Opciones</a></li>
									<li><a href="#tab2"><i class="dashicons-before dashicons-layout"></i> Layout</a></li>
									<li><a href="#tab3"><i class="dashicons-before dashicons-screenoptions"></i> Widgets</a></li>
									<li><a href="#tab4"><i class="dashicons-before dashicons-shield-alt"></i> SEO</a></li>
									<li><a href="#tab5"><i class="dashicons-before dashicons-shield-alt"></i> Analytics</a></li>
									<li><a href="#tab6"><i class="dashicons-before dashicons-welcome-widgets-menus"></i> Contenidos</a></li>
									<li><a href="#tab7"><i class="dashicons-before dashicons-networking"></i> Redes</a></li>
									<li><a href="#tab8"><i class="dashicons-before dashicons-admin-appearance"></i> Apariencia</a></li>
									<li><a href="#tab9"><i class="dashicons-before dashicons-info"></i> Información</a></li>
								</ul>
								<section id="first-tab-group" class="wk-tabgroup">

									<div id="tab1" class="wk-tab">
											<!--<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Heading 1</h2>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_input">Input</label>
														<p class="description">Descripciòn</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" name="wk_option_input" id="wk_option_input" value="<?php echo esc_attr( get_option('wk_option_input') ); ?>" class="regular-text"/>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="">Radio</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<p class="wk-input-radio-container">
															<input type="radio" name="wk_option_radio" id="wk_option_radio_1" value="1" <?php checked(1 == get_option('wk_option_radio') ); ?> /><i class="description">Descripción</i>
														</p>
														<p class="wk-input-radio-container">
															<input type="radio" name="wk_option_radio" id="wk_option_radio_2" value="2" <?php checked(2 == get_option('wk_option_radio') ); ?> /><i class="description">Descripción</i>
														</p>
														<p class="wk-input-radio-container">
															<input type="radio" name="wk_option_radio" id="wk_option_radio_2" value="3" <?php checked(3 == get_option('wk_option_radio') ); ?> /><i class="description">Descripción</i>
														</p>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_select">Select</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<select name="wk_option_select" id="wk_option_select">
															<option value="1" <?php selected( get_option('wk_option_select'), 1 ); ?>>Opción 1</option>
															<option value="2" <?php selected( get_option('wk_option_select'), 2 ); ?>>Una opción más</option>
															<option value="3" <?php selected( get_option('wk_option_select'), 3 ); ?>>Tercera opción x</option>
														</select>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_checkbox">Checkbox</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="checkbox" name="wk_option_checkbox" id="wk_option_checkbox" value="1" <?php checked(1, get_option('wk_option_checkbox'), true); ?> />
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_textarea">Textarea</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<textarea rows="10" cols="60" type="textarea" name="wk_option_textarea" id="wk_option_textarea"><?php echo esc_attr( get_option('wk_option_textarea') ); ?></textarea>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_image_uploader">Subir imagen</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data upload-img">
										    			<?php if( ! get_option( 'wk_option_image_uploader' ) ) : ?>
									    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
									    					<?php $wk_hide_image = 'style="display: none;"'; ?>
										    			<?php else : ?>
									    					<?php $wk_hide = 'style="display: none;"'; ?>
									    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
										    			<?php endif; ?>
									    				<?php
									    					// global $wpdb;
									    					// $image_url = get_option( 'wk_option_image_uploader' );
								    						// $attachment_id = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
									    					// $attachment = wp_get_attachment_thumb_url( $attachment_id[0] );
									    				?><!--
											    		<div class="wk_wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
										    				<img class="image_src" height="150" src="<?php echo get_option( 'wk_option_image_uploader' ); ?>">
											    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
											    		</div>
														<div class="flex-item wk_wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
														    <input style="display: none;" type="text" name="wk_option_image_uploader" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_option_image_uploader') ); ?>" >
														    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
														</div>
													</div>
												</div>
												<!-- color --
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_color">Color del loader</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="color" name="wk_option_color" id="wk_option_color" value="<?php if( get_option( 'wk_option_color' ) ) : echo esc_attr( get_option('wk_option_color') ); else : echo '#000'; endif; ?>" class=""/>
													</div>
												</div>
											</div>-->
											<!--<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Header</h2>
													<p class="description">Descripción</p>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">a</div>
													<div class="wk-col wk-col-2e wk-col-data">b</div>
												</div>
											</div>-->
											<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Bloquear el sitio</h2>
													<p class="description">Bloquea el sitio temporalmente.</p>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_private_site">Hacer el sitio privado</label>
														<p class="description">Requerir acceso para visualizar el sitio.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="checkbox" name="option_private_site" id="option_private_site" value="1" <?php checked(1, get_option('option_private_site'), true); ?> class="wk-checkbox"/>
														<label class="wk-checkbox-label" for="option_private_site"><i></i></label>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_private_site_form">Mostrar un formulario</label>
														<p class="description">Muestra un formulario de acceso mientras el sitio está bloqueado.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="checkbox" name="option_private_site_form" id="option_private_site_form" value="1" <?php checked(1, get_option('option_private_site_form'), true); ?> class="wk-checkbox"/>
														<label class="wk-checkbox-label" for="option_private_site_form"><i></i></label>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_private_site_message">Mostrar un mensaje</label>
														<p class="description">Muesra un mensaje mientras el sitio está bloqueado.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" name="option_private_site_message" id="option_private_site_message" value="<?php echo esc_attr( get_option('option_private_site_message') ); ?>" class="regular-text"/>
													</div>
												</div>
											</div>
											<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Loader</h2>
													<p class="description">Muestra un loader screen al cargar el sitio.</p>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_loader">Mostrar loader</label>
														<p class="description">Activa o desactiva el loading screen.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="checkbox" name="wk_option_loader" id="wk_option_loader" value="1" <?php checked(1, get_option('wk_option_loader'), true); ?> class="wk-checkbox"/>
														<label class="wk-checkbox-label" for="wk_option_loader"><i></i></label>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_loader_background">Color de fondo</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="color" name="wk_option_loader_background" id="wk_option_loader_background" value="<?php if( get_option( 'wk_option_loader_background' ) ) : echo esc_attr( get_option('wk_option_loader_background') ); else : echo '#191919'; endif; ?>" class=""/>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_loader_color">Color del loader</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="color" name="wk_option_loader_color" id="wk_option_loader_color" value="<?php if( get_option( 'wk_option_loader_color' ) ) : echo esc_attr( get_option('wk_option_loader_color') ); else : echo '#7d4989'; endif; ?>" class=""/>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_loader_timing">Timing</label>
														<p class="description">Personaliza el tiempo que se mostrará en milisegundos, p.ej. 1500ms.<br> Si no se indica el sitio se mostrará una véz haya cargado.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="number" step="50" min="200" max="10000" name="wk_option_loader_timing" id="wk_option_loader_timing" value="<?php echo esc_attr( get_option('wk_option_loader_timing') ); ?>" class="regular-text" style="max-width: 76px;"/>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_loader_img">Loader personalizado</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data upload-img">
										    			<?php if( ! get_option( 'wk_option_loader_img' ) ) : ?>
									    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
									    					<?php $wk_hide_image = 'style="display: none;"'; ?>
										    			<?php else : ?>
									    					<?php $wk_hide = 'style="display: none;"'; ?>
									    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
										    			<?php endif; ?>
											    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
										    				<img class="image_src" height="36" src="<?php echo get_option( 'wk_option_loader_img' ); ?>">
											    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
											    		</div>
														<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
														    <input style="display: none;" type="text" name="wk_option_loader_img" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_option_loader_img') ); ?>" >
														    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir gif</button>
														</div>
													</div>
												</div>
											</div>
											<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Iconos</h2>
													<p class="description">Cambia el favicon, iconos de apple y android y color de la barra superior.</p>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_favicon">Favicon</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data upload-img">
										    			<?php if( ! get_option( 'option_favicon' ) ) : ?>
									    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
									    					<?php $wk_hide_image = 'style="display: none;"'; ?>
										    			<?php else : ?>
									    					<?php $wk_hide = 'style="display: none;"'; ?>
									    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
										    			<?php endif; ?>
											    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
										    				<img class="image_src" height="36" src="<?php echo get_option( 'option_favicon' ); ?>">
											    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
											    		</div>
														<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
														    <input style="display: none;" type="text" name="option_favicon" class="image_url regular-text" value="<?php echo esc_attr( get_option('option_favicon') ); ?>" >
														    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
														</div>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_theme_icon">Icono de android</label>
														<p class="description">Se mostrará como icono de app al agregar a la pantalla principal y al cargar el sitio desde el acceso directo.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data upload-img">
										    			<?php if( ! get_option( 'wk_option_theme_icon' ) ) : ?>
									    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
									    					<?php $wk_hide_image = 'style="display: none;"'; ?>
										    			<?php else : ?>
									    					<?php $wk_hide = 'style="display: none;"'; ?>
									    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
										    			<?php endif; ?>
											    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
										    				<img class="image_src" height="48" src="<?php echo get_option( 'wk_option_theme_icon' ); ?>">
											    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
											    		</div>
														<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
														    <input style="display: none;" type="text" name="wk_option_theme_icon" class="image_url regular-text" value="<?php echo esc_attr( get_option('wk_option_theme_icon') ); ?>" >
														    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
														</div>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_theme_color">Color de la barra superior</label>
														<p class="description">Cambia el color (hexadecimal) de la barra superior en Chrome para android.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="color" name="wk_option_theme_color" id="wk_option_theme_color" value="<?php if( get_option( 'wk_option_theme_color' ) ) : echo esc_attr( get_option('wk_option_theme_color') ); else : echo '#000'; endif; ?>" class=""/>
													</div>
												</div>
											</div>
											<div class="wk-tab-rows">
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option-mobile-callback">Media Query break point</label>
														<p class="description">A que medida se aplicará la hoja de estílo mobile.css Si no se especifíca, por default se aplicará a 770px.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="number" step="" placeholder="756" min="320" name="option_mobile_callback" id="option-mobile-callback" value="<?php echo esc_attr( get_option('option_mobile_callback') ); ?>" class="regular-text"/>
													</div>
												</div>
											</div>
									</div><!--.wk-tab-->

									<div id="tab2" class="wk-tab">
											<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Widgets</h2>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label>Usar layout de widgets</label>
														<p class="description">Se añadirán areas de widget</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="checkbox" name="wk_option_layouts_widget" id="wk_option_layouts_widget" value="1" <?php checked(1, get_option('wk_option_layouts_widget'), true); ?> class="wk-checkbox"/>
														<label class="wk-checkbox-label" for="wk_option_layouts_widget"><i></i></label>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label>Layout de widgets</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<img style="width: 100%; max-width: 350px; height: auto;" src="<?php echo get_template_directory_uri(); ?>/wpkit/img/wk-layouts.jpg">
													</div>
												</div>
											</div>
											<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Sidebars</h2>
													<p class="description description-header">Controla la forma en que se muestran las barras laterales.</p>
												</div>
												<div class="wk-tab-row wk-cols wk-tab-row-header">
													<div class="wk-col wk-col-2e wk-col-data">
														<label>Sidebars</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data wk-d">
														<div class="wk-cols">
															<div class="wk-col wk-col-1">
																<p class="">Mostrar</p>
															</div>
															<div class="wk-col wk-col-1">
																<p class="">Posición</p>
															</div>
															<div class="wk-col wk-col-1">
																<p class="">Proporción</p>
															</div>
														</div>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_layouts_sidebar_a_show">Sidebar A</label>
														<p class="description">Sidebar principal</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<div class="wk-cols">
															<div class="wk-col wk-col-1 wk-flex-item wk-flex-align-center">
																<span>
																	<input type="checkbox" name="wk_option_layouts_sidebar_a_show" id="wk_option_layouts_sidebar_a_show" value="1" <?php checked(1, get_option('wk_option_layouts_sidebar_a_show'), true); ?> class="wk-checkbox"/>
																	<label class="wk-checkbox-label" for="wk_option_layouts_sidebar_a_show"><i></i></label>
																</span>

															</div>
															<div class="wk-col wk-col-1">
																<select name="wk_option_layouts_sidebar_a_position" id="wk_option_layouts_sidebar_a_position">
																	<option value="left" <?php selected( get_option('wk_option_layouts_sidebar_a_position'), 'left' ); ?>>Left</option>
																	<option value="right" <?php selected( get_option('wk_option_layouts_sidebar_a_position'), 'right' ); ?>>Right</option>
																</select>
															</div>
															<div class="wk-col wk-col-1">
																<select name="wk_option_layouts_sidebar_a_width" id="wk_option_layouts_sidebar_a_width">
																	<option value="1" <?php selected( get_option('wk_option_layouts_sidebar_a_width'), 1 ); ?>>Normal</option>
																	<option value="2" <?php selected( get_option('wk_option_layouts_sidebar_a_width'), 2 ); ?>>Doble</option>
																</select>
															</div>
														</div>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="wk_option_layouts_sidebar_b_show">Sidebar B</label>
														<p class="description">Sidebar secundaria</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<div class="wk-cols">
															<div class="wk-col wk-col-1 wk-flex-item wk-flex-align-center">
																<span>
																	<input type="checkbox" name="wk_option_layouts_sidebar_b_show" id="wk_option_layouts_sidebar_b_show" value="1" <?php checked(1, get_option('wk_option_layouts_sidebar_b_show'), true); ?> class="wk-checkbox"/>
																	<label class="wk-checkbox-label" for="wk_option_layouts_sidebar_b_show"><i></i></label>
																</span>

															</div>
															<div class="wk-col wk-col-1">
																<select name="wk_option_layouts_sidebar_b_position" id="wk_option_layouts_sidebar_b_position">
																	<option value="left" <?php selected( get_option('wk_option_layouts_sidebar_b_position'), 'left' ); ?>>Left</option>
																	<option value="right" <?php selected( get_option('wk_option_layouts_sidebar_b_position'), 'right' ); ?>>Right</option>
																</select>
															</div>
															<div class="wk-col wk-col-1">
																<select name="wk_option_layouts_sidebar_b_width" id="wk_option_layouts_sidebar_b_width">
																	<option value="1" <?php selected( get_option('wk_option_layouts_sidebar_b_width'), 1 ); ?>>Normal</option>
																	<option value="2" <?php selected( get_option('wk_option_layouts_sidebar_b_width'), 2 ); ?>>Doble</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
									</div><!--.wk-tab-->

									<div id="tab3" class="wk-tab">
										<div class="wk-tab-rows">
											<div class="wk-tab-header">
												<h2>Widgets</h2>
												<p class="description description-header">Quidem perferendis id sapiente cumque ullam repellendus dolorum odit rerum quibusdam tempora.</p>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">a</div>
												<div class="wk-col wk-col-2e wk-col-data">b</div>
											</div>
										</div>
									</div><!--.wk-tab-->

									<div id="tab4" class="wk-tab">
											<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Meta etiquetas</h2>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">Título del sitio</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" value="<?php bloginfo( 'name' ); ?>" disabled style="margin: 0;">
														<p class="description">Cambia el título del sitio en ajustes generales</p>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">Descripción</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" value="<?php bloginfo( 'description' ); ?>" disabled style="margin: 0;">
														<p class="description">Cambia la descripción del sitio en ajustes generales</p>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">URL Canónica de homepage</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" value="<?php bloginfo( 'url' ); ?>" disabled style="margin: 0;">
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">Codificación de caractéres</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" value="<?php bloginfo( 'charset' ); ?>" disabled style="margin: 0;">
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">Idioma</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" value="<?php bloginfo( 'language' ); ?>" disabled style="margin: 0;">
													</div>
												</div>
											</div>
											<div class="wk-tab-rows">
												<div class="wk-tab-header">
													<h2>Schema.org</h2>
													<p class="description description-header">Los datos estructurados se presentarán en formato de microdata.</p>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_schema_org">Usar Schema.org</label>
														<p class="description">Las etiquetas de schema solo se incluirán en la cabecera del sitio (para todas las secciones), será neceasario incluirlas manualmente para cada objeto, por ejemplo, en el feed de posts, catálogo, autor o cualquier otro. </p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="checkbox" name="option_schema_org" id="option_schema_org" value="1" <?php checked(1, get_option('option_schema_org'), true); ?> class="wk-checkbox"/>
														<label class="wk-checkbox-label" for="option_schema_org"><i></i></label>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_schema_type">Schemas</label>
														<p class="description">Selecciona el Schema que se usará en la página princcipal.<br>Especifica el Schema para cada publicación en la página de edición de cada una.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<select name="option_schema_type" id="option_schema_type">
															<?php

															$schemas = array( 'Article' => 'Article' , 'Blog','Book','Corporation','EducationalOrganization','Event','Game','JobPosting','LegalService','LocalBusiness','Movie','Organization','Place','Product','ProfessionalService','Receipe','Restaurant','Review','Store',);

															$counter = 0;

															foreach( $schemas as $schema ) :

																$counter++; ?>

																<option value="<?php echo $schema;; ?>" <?php selected( get_option('option_schema_type'), $schema ); ?>><?php echo $schema; ?></option>

															<?php endforeach; ?>

														</select>
														<input type="text" name="option_schema_type_manual" id="option_schema_type_manual" value="<?php echo esc_attr( get_option('option_schema_type_manual') ); ?>" class="regular-text" style="max-width: 180px; display: inline-block; height: 27px; margin: 0; margin-left: 12px; margin-top: 1px; vertical-align: inherit;">
														<p class="description"><a href="https://schema.org/docs/full.html" target="_blank">¿Necesitas ayuda para decidir? <i class="icon dashicons dashicons-external"></i></a></p>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_schema_name">Título</label>
														<p class="description">Si dejas en blanco esta opción se utilizará el título de wordpress, actualmente <strong>"<?php bloginfo( 'title' ); ?>"</strong></p>
														<p class="description">Solo se usará para la página de inicio, las páginas interiores usarán su propio título.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" name="option_schema_name" id="option_schema_name" value="<?php echo esc_attr( get_option('option_schema_name') ); ?>" class="regular-text"/>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_schema_description">Descripción</label>
														<p class="description">Si dejas en blanco esta opción se utilizará la descripción de wordpress, actualmente <strong>"<?php bloginfo( 'description' ); ?>"</strong></p>
														<p class="description">Solo se usará para la página de inicio, las páginas interiores usarán su propia descripción.</p>
													</div>
													<div class="wk-col wk-col-2e wk-col-data">
														<input type="text" name="option_schema_description" id="option_schema_description" value="<?php echo esc_attr( get_option('option_schema_description') ); ?>" class="regular-text"/>
													</div>
												</div>
												<div class="wk-tab-row wk-cols">
													<div class="wk-col wk-col-2e wk-col-data">
														<label for="option_schema_image">Imagen</label>
													</div>
													<div class="wk-col wk-col-2e wk-col-data upload-img">
										    			<?php if( ! get_option( 'option_schema_image' ) ) : ?>
									    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
									    					<?php $wk_hide_image = 'style="display: none;"'; ?>
										    			<?php else : ?>
									    					<?php $wk_hide = 'style="display: none;"'; ?>
									    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
										    			<?php endif; ?>
											    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
										    				<img class="image_src" height="150" src="<?php echo get_option( 'option_schema_image' ); ?>">
											    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
											    		</div>
														<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
														    <input style="display: none;" type="text" name="option_schema_image" class="image_url regular-text" value="<?php echo esc_attr( get_option('option_schema_image') ); ?>" >
														    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
														</div>
													</div>
												</div>
											</div>
									</div><!--.wk-tab-->

									<div id="tab5" class="wk-tab">
										<div class="wk-tab-rows">
											<div class="wk-tab-header">
												<h2>Scripts de seguimiento</h2>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="wk_option_analytics">Analytics</label>
													<p class="description">Còdigo de Google analytics</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<textarea type="text" name="wk_option_analytics" id="wk_option_analytics" value="" class="regular-text" rows="8"><?php echo esc_attr( get_option('wk_option_analytics') ); ?></textarea>
												</div>
											</div>
										</div>
									</div><!--.wk-tab-->

									<div id="tab6" class="wk-tab">
										<div class="wk-tab-rows">
											<div class="wk-tab-header">
												<h2>Contenidos</h2>
												<p class="description description-header">Quidem perferendis id sapiente cumque ullam repellendus dolorum odit rerum quibusdam tempora.</p>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">a</div>
												<div class="wk-col wk-col-2e wk-col-data">b</div>
											</div>
										</div>
									</div><!--.wk-tab-->

									<div id="tab7" class="wk-tab">
										<div class="wk-tab-rows">
											<div class="wk-tab-header">
												<h2>Facebook</h2>
												<p class="description description-header">Los perfiles de redes sociales se usarán para generar meta etiquetas de Open graph y Twitter Cards.</p>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_open_graph">Usar Open Graph</label>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="checkbox" name="option_open_graph" id="option_open_graph" value="1" <?php checked(1, get_option('option_open_graph'), true); ?> class="wk-checkbox"/>
													<label class="wk-checkbox-label" for="option_open_graph"><i></i></label>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_facebook_id">Facebook id</label>
													<p class="description">En tu página de facebook ve a la pestaña "información de página" y encuentra en la parte inferior "Identificador de página de Facebook"</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_facebook_id" id="option_facebook_id" value="<?php echo esc_attr( get_option('option_facebook_id') ); ?>" class="regular-text"/>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_facebook_title">Título del sitio</label>
													<p class="description">Si dejas en blanco esta opción se utilizará el título de wordpress, actualmente <strong>"<?php bloginfo( 'title' ); ?>"</strong></p>
													<p class="description">Solo se usará para la página de inicio, las páginas interiores usarán su propio título.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_facebook_title" id="option_facebook_title" value="<?php echo esc_attr( get_option('option_facebook_title') ); ?>" class="regular-text"/>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_facebook_description">Descripción</label>
													<p class="description">Si dejas en blanco esta opción se utilizará la descripción de wordpress, actualmente <strong>"<?php bloginfo( 'description' ); ?>"</strong></p>
													<p class="description">Solo se usará para la página de inicio, las páginas interiores usarán su propia descripción.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_facebook_description" id="option_facebook_description" value="<?php echo esc_attr( get_option('option_facebook_description') ); ?>" class="regular-text"/>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_facebook_site_name">Nombre del sitio</label>
													<p class="description">Si dejas en blanco esta opción se utilizará el título del sitio de wordpress, actualmente <strong>"<?php bloginfo( 'title' ); ?>"</strong></p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_facebook_site_name" id="option_facebook_site_name" value="<?php echo esc_attr( get_option('option_facebook_site_name') ); ?>" class="regular-text"/>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_facebook_author">Autor global del sitio</label>
													<p class="description">Fan page del autor del sitio</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_facebook_author" id="option_facebook_author" value="<?php echo esc_attr( get_option('option_facebook_author') ); ?>" class="regular-text" placeholder="http://www.facebook.com/nombredepagina"/>
													<p class="wk-input-radio-container">
														<input type="radio" name="option_facebook_author_global" id="option_facebook_author_global_1" value="1" <?php checked(1 == get_option('option_facebook_author_global') ); ?> /><i class="description">Usar la etiqueta de autor global para todas las páginas del sitio.</i>
													</p>
													<p class="wk-input-radio-container">
														<input type="radio" name="option_facebook_author_global" id="option_facebook_author_global_2" value="2" <?php checked(2 == get_option('option_facebook_author_global') ); ?> /><i class="description">Usar etiquetas de autor de wordpress, usa esta opción si el autor de cada publicación es esencial, como en un blog. Cada autor deberá especificar su perfil de facebook en opciones de perfíl. Si el usuario no especifíca su perfíl, se usará el autor global del sitio.</i>
													</p>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_facebook_site_image">Imagen del sitio</label>
													<p class="description">Utiliza una imagen mayor a 600px x 315px (1200px x 630px óptima) para generar un snippet con imagen grande. Una imagen menor a estas dimensiones generará un snippet con imagen lateral pequeña.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data upload-img">
									    			<?php if( ! get_option( 'option_facebook_site_image' ) ) : ?>
									    					<?php $wk_hide = 'style="display: initial;"'; ?>
									    			<?php else : ?>
									    					<?php $wk_hide = 'style="display: none;"'; ?>
										    				<?php
										    					// global $wpdb;
										    					// $image_url = get_option( 'option_facebook_site_image' );
									    						// $attachment_id = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
										    					// $attachment = wp_get_attachment_thumb_url( $attachment_id[0] );
										    				?>
												    		<div class="wk_option_image_uploader_container">
											    				<img class="image_src" height="150" src="<?php echo get_option( 'option_facebook_site_image' ); ?>">
												    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
												    		</div>
									    			<?php endif; ?>
													<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
													    <input style="display: none;" type="text" name="option_facebook_site_image" class="image_url regular-text" value="<?php echo esc_attr( get_option('option_facebook_site_image') ); ?>" >
													    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
													</div>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_google_profile">Depurar los datos estructurados de Facebook</label>
													<p class="description">Utiliza la herramienta de Facebook para verificar los datos que se muestran en Facebook.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<a class="button" href="https://developers.facebook.com/tools/debug/" target="_blank">Depurar <i class="icon dashicons dashicons-external"></i></a>
												</div>
											</div>
										</div>

										<div class="wk-tab-rows">
											<div class="wk-tab-header">
												<h2>Google</h2>
												<p class="description description-header">Google usará los datos de schema.org / open graph / etiquetas meta en orden subsecuente.</p>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_google_profile">Perfíl de Google +</label>
													<p class="description">URL del perfil de Google +</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_google_profile" id="option_google_profile" value="<?php echo esc_attr( get_option('option_google_profile') ); ?>" class="regular-text" placeholder=" http://www.plus.google.com/me"/>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_google_profile">Validar los datos estructurados de Google+</label>
													<p class="description">Utiliza la herramienta de Google para verificar los datos que se muestran en Google+.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<a class="button" href="https://search.google.com/structured-data/testing-tool/u/0/" target="_blank">Validar <i class="icon dashicons dashicons-external"></i></a>
												</div>
											</div>
										</div>

										<div class="wk-tab-rows">
											<div class="wk-tab-header">
												<h2>Twitter</h2>
												<p class="description description-header">Los perfiles de redes sociales se usarán para generar meta etiquetas de Open graph y Twitter Cards.</p>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_twitter_cards">Usar Twitter Cards</label>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="checkbox" name="option_twitter_cards" id="option_twitter_cards" value="1" <?php checked(1, get_option('option_twitter_cards'), true); ?> class="wk-checkbox"/>
													<label class="wk-checkbox-label" for="option_twitter_cards"><i></i></label>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_twitter_acc">Cuenta de twitter</label>
													<p class="description">Cuenta de twitter</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_twitter_acc" id="option_twitter_acc" value="<?php echo esc_attr( get_option('option_twitter_acc') ); ?>" class="regular-text" placeholder="usuario"/>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_twitter_type">Select</label>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<select name="option_twitter_type" id="option_twitter_type">
														<option value="1" <?php selected( get_option('option_twitter_type'), 1 ); ?>>Summary Card con imagen grande</option>
														<option value="2" <?php selected( get_option('option_twitter_type'), 2 ); ?>>Summary Card</option>
														<option value="3" <?php selected( get_option('option_twitter_type'), 3 ); ?>>App Card</option>
														<option value="4" <?php selected( get_option('option_twitter_type'), 4 ); ?>>Player Card</option>
													</select>
													<p class="description"><a href="https://dev.twitter.com/cards/types" target="_blank">¿Necesitas ayuda para decidir? <i class="icon dashicons dashicons-external"></i></a></p>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_twitter_title">Título de TW</label>
													<p class="description">Si dejas en blanco esta opción se utilizará el título de wordpress, actualmente <strong>"<?php bloginfo( 'title' ); ?>"</strong></p>
													<p class="description">Solo se usará para la página de inicio, las páginas interiores usarán su propio título.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_twitter_title" id="option_twitter_title" value="<?php echo esc_attr( get_option('option_twitter_title') ); ?>" class="regular-text"/>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_twitter_description">Descripción de TW</label>
													<p class="description">Si dejas en blanco esta opción se utilizará la descripción de wordpress, actualmente <strong>"<?php bloginfo( 'description' ); ?>"</strong></p>
													<p class="description">Solo se usará para la página de inicio, las páginas interiores usarán su propia descripción.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<input type="text" name="option_twitter_description" id="option_twitter_description" value="<?php echo esc_attr( get_option('option_twitter_description') ); ?>" class="regular-text"/>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_twitter_image">Imagen</label>
													<p class="description">Deberá ser mayor de 280px x 150px para formato Summary con imagen grande, es recomendable incluir imágenes en hd, mayores a 720p. o cuadrada 1:1 para Formato Summary mayor a 120px x 120px.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data upload-img">
									    			<?php if( ! get_option( 'option_twitter_image' ) ) : ?>
									    					<?php $wk_hide = 'style="display: inline-block;"'; ?>
									    					<?php $wk_hide_image = 'style="display: none;"'; ?>
									    			<?php else : ?>
									    					<?php $wk_hide = 'style="display: none;"'; ?>
									    					<?php $wk_hide_image = 'style="display: inline-block;"'; ?>
									    			<?php endif; ?>
								    				<?php
								    					// global $wpdb;
								    					// $image_url = get_option( 'option_twitter_image' );
							    						// $attachment_id = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
								    					// $attachment = wp_get_attachment_thumb_url( $attachment_id[0] );
								    				?>
										    		<div class="wk_option_image_uploader_container" <?php echo $wk_hide_image; ?>>
									    				<img class="image_src" height="150" src="<?php echo get_option( 'option_twitter_image' ); ?>">
										    			<span class="dashicons-before dashicons-dismiss remove-image"></span>
										    		</div>
													<div class="flex-item wk_option_image_uploader_action" <?php echo $wk_hide; ?>>
													    <input style="display: none;" type="text" name="option_twitter_image" class="image_url regular-text" value="<?php echo esc_attr( get_option('option_twitter_image') ); ?>" >
													    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir imagen</button>
													</div>
												</div>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">
													<label for="option_google_profile">Validar los datos estructurados de Twitter Cards</label>
													<p class="description">Utiliza la herramienta de twitter para verificar los datos que se muestran en Twitter cards.</p>
												</div>
												<div class="wk-col wk-col-2e wk-col-data">
													<a class="button" href="https://search.google.com/structured-data/testing-tool/u/0/" target="_blank">Validar <i class="icon dashicons dashicons-external"></i></a>
												</div>
											</div>
										</div>
									</div><!--.wk-tab-->

									<div id="tab8" class="wk-tab">
										<div class="wk-tab-rows">
											<div class="wk-tab-header">
												<h2>Apariencia</h2>
												<p class="description description-header">Quidem perferendis id sapiente cumque ullam repellendus dolorum odit rerum quibusdam tempora.</p>
											</div>
											<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">a</div>
												<div class="wk-col wk-col-2e wk-col-data">b</div>
											</div>
										</div>
									</div><!--.wk-tab-->

									<div id="tab9" class="wk-tab">
										<div class="wk-tab-rows">
											<div class="wk-tab-header">
												<h2>Información</h2>
												<p>Desarrollado por A. Hartzet @ Alumin.agency</p>
											</div>
											<!--<div class="wk-tab-row wk-cols">
												<div class="wk-col wk-col-2e wk-col-data">a</div>
												<div class="wk-col wk-col-2e wk-col-data">b</div>
											</div>-->
										</div>
									</div><!--.wk-tab-->

								</section>

							</div><!--.tab-content-nnnn-->


						</div><!-- post-body-content -->

						<!--<div id="postbox-container-1" class="postbox-container">

							<div class="meta-box-sortables">

								<div class="postbox">

									<h2><span><?php esc_attr_e( 'Sidebar Content Header', 'wp_admin_style' ); ?></span></h2>

									<div class="inside">
										<p>
											A Everything you see here, from the documentation to the code itself, was created by and for the community. WordPress is an Open Source project, which means there are hundreds of people all over the world working on it. (More than most commercial platforms.) It also means you are free to use it for anything from your cat’s home page to a Fortune 500 web site without paying anyone a license fee and a number of other important freedoms.'

										</p>

									</div>

								</div>

							</div>

						</div> -->

						<div id="postbox-container-1" class="postbox-container">
							<div id="side-sortables" class="meta-box-sortables ui-sortable">
								<div id="submitdiv" class="postbox ">
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
									</div>
								</div>
							</div>
						</div>

						<div id="postbox-container-2" class="postbox-container">

							<!-- <h1><?php esc_attr_e( 'Heading String', 'wp_admin_style' ); ?></h1>

							<div id="col-container">

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

							<!-- <table class="widefat">
								<tr>
									<th class="row-title">
										<?php esc_attr_e( 'Table header cell #1', 'wp_admin_style' ); ?>
									</th>
									<th>
										<?php esc_attr_e( 'Table header cell #2', 'wp_admin_style' ); ?>
									</th>
								</tr>
								<tr>
									<td class="row-title">
										<label for="tablecell">
											<?php esc_attr_e( 'Table Cell #1, with label', 'wp_admin_style' ); ?>
										</label>
									</td>
									<td>
										<?php esc_attr_e( 'Table Cell #2', 'wp_admin_style' ); ?>
									</td>
								</tr>
								<tr class="alternate">
									<td class="row-title">
										<label for="tablecell">
											<?php esc_attr_e( 'Table Cell #3, with label and class', 'wp_admin_style' ); ?>
											<code>alternate</code>
										</label>
									</td>
									<td>
										<?php esc_attr_e( 'Table Cell #4', 'wp_admin_style' ); ?>
									</td>
								</tr>
								<tr>
									<td class="row-title">
										<?php esc_attr_e( 'Table Cell #5, without label', 'wp_admin_style' ); ?>
									</td>
									<td>
										<?php esc_attr_e( 'Table Cell #6', 'wp_admin_style' ); ?>
									</td>
								</tr>
						    </table> -->


							<span style="display: block; clear:both;"></span>

						</div><!--#postbox-container-2-->

					</div><!-- #post-body .metabox-holder .columns-2 -->

					<br class="clear">

				</div><!-- #poststuff -->

				<?php //submit_button( 'Guardar' ); ?>

			</form>

		</div> <!-- .wrap -->

	<?php }


	/**/
