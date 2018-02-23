	<!DOCTYPE html>

	<html lang="<?php bloginfo('language'); ?>" dir="<?php bloginfo('text_direction'); ?>" <?php wk_schema_global_type(); ?> class="<?php wk_user_agent_class(); ?>">

		<head <?php wk_opengraph_header(); ?>>

			<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>

			<?php wp_head(); ?>

			<?php // Eso es todo Puedes añadir tags a la cabecera desde aquí ?>

		</head>

		<body <?php body_class('wk-wrap-1300'); ?>>

            <div class="wk-preloading"><?php if( get_option( 'wk_option_loader_img' ) ) : echo '<img class="wk-preloading-custom" src="' . get_option( 'wk_option_loader_img' ) . '">'; else : ?><span class="wk-preloading-loader"></span><?php endif; ?></div>

			<div id="wrapper">

				<?php

				/*
				* Layout de widgets
				*
				* Imprime el layout de widgets en la cabezera.
				*
				* Si no ocupas el layout de widgets, desactivalo desde el administrador
				* en WPKit / Layouts en lugar de borrar esta función, Si desactivas la opción
				* desde el administrador se seguirá imprimiendo el menú principal.
				*/

				do_action( 'wk_widgets_header_layout' ); ?>
