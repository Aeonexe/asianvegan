<?php if( get_option( 'option_private_site' ) ) { if( ! is_user_logged_in() ) { get_template_part( 'wpkit/inc/login' ); return true; } }
/**
*  Página Single
*
* @package WPKit
* @author ALUMIN
* @copyright Copyright (C) Alumin.Agency
* @version WPKIT 3.0
*/
get_header(); ?>

	<?php get_template_part('wpkit/systems/layouts/parts/author-meta'); ?>

	<?php get_template_part('wpkit/systems/layouts/posts'); ?>

<?php get_footer(); ?>