<?php 
/*
*
*  Es el template general para crear nuevas páginas.
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
get_header(); ?>

            <h1>Encontramos ests publicaciones con el término wpkit "<mark><?php echo get_search_query(); ?></mark>"</h1>

        	<?php get_template_part('wpkit/systems/layouts/posts'); ?>
            	
<?php get_footer(); ?>
