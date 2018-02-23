<?php

/************************************************************************************************************************
* Toolbar custom menu "Developer" */

	function wk_add_toolbar_items($admin_bar){
		if ( is_super_admin() ) {
		// Nivel 1 del menú
			$admin_bar->add_menu( array(
				'id'    => 'developer-menu',
				'title' => 'Developer',
				'meta'  => array(
						'title' => 'Developer',
					),
				));
			// Nivel 2 del menú : Wordpress
				$admin_bar->add_menu( array(
					'id'    => 'wordpress',
					'parent'=> 'developer-menu',
					'title' => 'Wordpress',
					'meta'  => array(
							'target' => '_blank',
							'class' => 'developer-sub'
						),
					));
				// Nivel 3 del menú : Generate WP
					$admin_bar->add_menu( array(
						'id'    => 'generate-wp',
						'parent'=> 'wordpress',
						'title' => 'Generate WP',
						'href'  => 'http://generatewp.com/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub'
							),
						));
				// Nivel 3 del menú : Jeremy Hixon Generator
					$admin_bar->add_menu( array(
						'id'    => 'wp-generator-1',
						'parent'=> 'wordpress',
						'title' => 'Jeremy Hixon Generator',
						'href'  => 'http://jeremyhixon.com/tools/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub'
							),
						));
				// Nivel 3 del menú : WP Codex
					$admin_bar->add_menu( array(
						'id'    => 'wp-codex',
						'parent'=> 'wordpress',
						'title' => 'WP Codex',
						'href'  => 'http://codex.wordpress.org/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub'
							),
						));
				// Nivel 3 del menú : WP Plugin API
					$admin_bar->add_menu( array(
						'id'    => 'wp-plugin-api',
						'parent'=> 'wordpress',
						'title' => 'The Plugin API',
						'href'  => 'http://codex.wordpress.org/Plugin_API/Action_Reference/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub'
							),
						));
				// Nivel 3 del menú : Function reference
					$admin_bar->add_menu( array(
						'id'    => 'wp-function-reference',
						'parent'=> 'wordpress',
						'title' => 'Function reference',
						'href'  => 'https://codex.wordpress.org/Function_Reference/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub'
							),
						));
				// Nivel 3 del menú : WP Code Reference
					$admin_bar->add_menu( array(
						'id'    => 'code-reference',
						'parent'=> 'wordpress',
						'title' => 'Code Reference',
						'href'  => 'https://developer.wordpress.org/reference/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub'
							),
						));
			// Nivel 2 del menú : Gúías adicionales
				$admin_bar->add_menu( array(
					'id'    => 'guias-adicionales',
					'parent'=> 'developer-menu',
					'title' => 'Guías adicionales',
					'meta'  => array(
							'target' => '_blank',
							'class' => 'developer-sub'
						),
					));
				// Nivel 3 del menú
					$admin_bar->add_menu( array(
						'id'    => 'dev-mozilla',
						'parent'=> 'guias-adicionales',
						'title' => 'Dev Mozilla HTML',
						'href'  => 'https://developer.mozilla.org/en-US/docs/Web/HTML/Element/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub-sub'
							),
						));
				// Nivel 3 del menú
					$admin_bar->add_menu( array(
						'id'    => 'dev-apple',
						'parent'=> 'guias-adicionales',
						'title' => 'Apple Developers',
						'href'  => 'https://developer.apple.com/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub-sub'
							),
						));
			// Nivel 2 del menú : Google tools
				$admin_bar->add_menu( array(
					'id'    => 'google-tools',
					'parent'=> 'developer-menu',
					'title' => 'Google Tools',
					'meta'  => array(
							'target' => '_blank',
							'class' => 'developer-sub'
						),
					));
				// Nivel 3 del menú : Google Pagespeed insights
					$admin_bar->add_menu( array(
						'id'    => 'google-pagespeed-insights',
						'parent'=> 'google-tools',
						'title' => 'Google Pagespeed insights',
						'href'  => 'https://developers.google.com/speed/pagespeed/insights/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub-sub'
							),
						));
				// Nivel 3 del menú : Google Pagespeed insights
					$admin_bar->add_menu( array(
						'id'    => 'google-markup-wizard',
						'parent'=> 'google-tools',
						'title' => 'Asistente de datos estructurados',
						'href'  => 'https://www.google.com/webmasters/markup-helper/u/0/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub-sub'
							),
						));
				// Nivel 3 del menú : Google Pagespeed insights
					$admin_bar->add_menu( array(
						'id'    => 'google-structured-data-tool',
						'parent'=> 'google-tools',
						'title' => 'Structured data testing',
						'href'  => 'https://developers.google.com/structured-data/testing-tool/',
						'meta'  => array(
								'target' => '_blank',
								'class' => 'developer-sub-sub'
							),
						));

	    }
	}
	if ( is_super_admin()) {

	    add_action('admin_bar_menu', 'wk_add_toolbar_items', 100);

	}

	function wk_admin_front_link($admin_bar) {

		if( is_admin() ) {

			$adminURL = site_url();

			$adminSiteLabel = 'Visitar sitio';

		} else {

			$adminURL = admin_url();

			$adminSiteLabel = 'Admin panel';

		}
			$admin_bar->add_menu( array(
					'id'    => 'admin-link',
					'title' => $adminSiteLabel,
					'href'  => $adminURL,
					'meta'  => array(
						//'target' => '_blank',
						'class' => ''
					),
				)
			);


	}

	add_action('admin_bar_menu', 'wk_admin_front_link', 0);
