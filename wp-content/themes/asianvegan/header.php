	<!DOCTYPE html>

	<html lang="<?php bloginfo('language'); ?>" dir="<?php bloginfo('text_direction'); ?>" <?php wk_schema_global_type(); ?> class="<?php wk_user_agent_class(); ?>">

		<head <?php wk_opengraph_header(); ?>>

			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCr7WDeWei6HmJs1E50MqH92TuKtEKhvsI"></script>
			<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

			<?php wp_head(); ?>

			<?php // Eso es todo Puedes añadir tags a la cabecera desde aquí ?>

		</head>

		<body <?php body_class('wk-wrap-1400'); ?>>

            <div class="wk-preloading"><?php if( get_option( 'wk_option_loader_img' ) ) : echo '<img class="wk-preloading-custom" src="' . get_option( 'wk_option_loader_img' ) . '">'; else : ?><span class="wk-preloading-loader"></span><?php endif; ?></div>

			<div id="wrapper">

				<div id="main-header-absolute-bar">

					<div class="wk-section-wrap">

						<div class="wk-cols-m">

							<div class="wk-col absolute-left">

								<?php if( is_user_logged_in() ) : ?>

									<a href="<?php echo wp_logout_url(); ?>">Cerrar sesión</a>

								<?php else : ?>

									<a href="<?php echo wp_login_url(); ?>">Iniciar sesión</a>

								<?php endif; ?>


							</div>

							<div class="wk-col absolute-right">

								<div class="social-media">

									<?php wpkit_social_media(); ?>

								</div>

							</div>

						</div>

					</div>

				</div>

				<header id="main-header">

					<div class="wk-section-wrap">

						<div class="wk-cols-me">

							<div class="wk-col-3 wk-main-logo-container">

								<a id="wk-main-logo" href="<?php bloginfo( 'url' ); ?>">

									<span>

										<?php if ( get_option('wk_custom_logo_main') ) : ?>

											<img width="" src="<?php echo get_option( 'wk_custom_logo_main' ); ?>">

										<?php else : ?>

											<img width="" src="<?php echo get_template_directory_uri(); ?>/wpkit/admin/img/wpkit-logo.svg">

										<?php endif; ?>

									</span>

								</a>

							</div>

							<div class="wk-col-8 wk-d wk-main-nav-container">

								<?php get_template_part('wpkit/systems/layouts/parts/menu-main'); ?>

							</div>

							<div class="wk-col-1 wk-d wk-text-right" style="position: relative;">

								<span id="search-icon" class="icon toggle fa fa-search"></span>

								<section id="searchform">

									  <form method="get" action="<?php bloginfo('home'); ?>/">


											<div class="holder">
												<input class="search" type="text" name="s" value="Buscar..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
												<button type="submit" value="" class="button" />Buscar</button>

											</div>

									  </form>

								</section>

							</div>

							<div class="wk-col wk-m wk-offcanvas-icon-container">

								<span id="wk-off-canvas-icon">

									<i class="wk-icon"></i>

								</span>

							</div>

						</div>

					</div>

				</header>

				<section id="off-canvas">

					<?php

						$nav_args = array(
							'theme_location'  => 'main-nav',
							'menu'            => '',
							'container'       => 'nav',
							'container_class' => 'menu main-menu',
							'container_id'    => 'nav-main-mobile',
							'menu_class'      => '',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul id="%1$s" class="menu %2$s">%3$s</ul>',
							'depth'           => 0, // How many levels of the hierarchy are to be included where 0 means all. -1 displays links at any depth and arranges them in a single, flat list.
							'walker'          => ''
						);

						wp_nav_menu( $nav_args );

						/* Para pasar el menu sin los argumentos
						wp_nav_menu( 'theme_location=header-menu' );
						*/

					?>

				</section>

				<main>
