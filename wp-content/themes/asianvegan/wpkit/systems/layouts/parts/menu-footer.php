<?php 
/*
*
*  Es el template general para crear nuevas páginas.
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
?>

<?php 

	$nav_args = array(
		'theme_location'  => 'footer-menu',
		'menu'            => '',
		'container'       => 'nav',
		'container_class' => 'menu footer-menu',
		'container_id'    => 'footer-nav',
		'menu_class'      => 'menu',
		'menu_id'         => 'footer-menu',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0, // How many levels of the hierarchy are to be included where 0 means all. -1 displays links at any depth and arranges them in a single, flat list.
		'walker'          => ''
	);

	wp_nav_menu( $nav_args );

      /* Para pasar el menu sin los argumentos
      wp_nav_menu( 'theme_location=header-menu' );
      */

?>