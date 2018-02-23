<?php
/*
*
* Este es el menú principal.
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
?>

<?php

	global $is_IE;

		if( ! $is_IE and get_option( 'wk_option_library_oknav' ) ) {

        $classes[] = 'iexplorer'; if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version)) $classes[] = 'iexplorer'.$browser_version[1];

		$container_class = 	'okayNav';

	} else {

		$container_class = 	'wk-main-nav';

	}

	$nav_args = array(
 		'theme_location'  => 'main-nav',
 		'menu'            => '',
 		'container'       => 'nav',
 		'container_class' => $container_class,
 		'container_id'    => 'wk-main-nav',
 		'menu_class'      => 'wk-main-nav-menu',
 		'menu_id'         => '',
 		'echo'            => true,
 		'fallback_cb'     => 'wp_page_menu',
 		'before'          => '',
 		'after'           => '',
 		'link_before'     => '',
 		'link_after'      => '',
 		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
 		'depth'           => 0, // Cuantos niveles de jerarquía se incluirán 0 es todos. -1 imprime todos los niveles en uno mismo.
 		'walker'          => ''
	);

	wp_nav_menu( $nav_args );

      /* Para pasar el menu sin los argumentos
      wp_nav_menu( 'theme_location=header-menu' );
      */

?>
