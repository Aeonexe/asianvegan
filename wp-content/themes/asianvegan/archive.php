<?php if( get_option( 'option_private_site' ) ) { if( ! is_user_logged_in() ) { get_template_part( 'wpkit/inc/login' ); return true; } }
/**
*
*  Página Single
*
* @package WPKit
* @author ALUMIN
* @copyright Copyright (C) Alumin.Agency
* @version WPKIT 3.0
*/
get_header(); ?>
      
      <?php if( is_category() ) : ?>

            <h1><span><?php _e( 'Posts en la categoría: ' ); ?></span> <?php single_cat_title(); ?></h1>

      <?php elseif( is_tag() ) : ?>

            <h1><span><?php _e( 'Posts con la etiqueta: ' ); ?></span> <?php single_tag_title(); ?></h1>

      <?php elseif( is_author() ) : global $post; $author_id = $post->post_author; ?>

            <h1><?php _e( 'Posts por:' ); ?><strong><?php the_author_meta('display_name', $author_id); ?></strong></h1>

      <?php elseif( is_day() ) : ?>

            <h1><span><?php _e( 'Archivo por día:' ); ?></span> <?php the_time('l, F j, Y'); ?></h1>

      <?php elseif( is_month() ) : ?>

                  <h1><span><?php _e( 'Archivo por mes:' ); ?></span> <?php the_time('F Y'); ?></h1>

      <?php elseif( is_year() ) : ?>

                  <h1><span><?php _e( 'Archivo por año:' ); ?></span> <?php the_time('Y'); ?> </h1>
      <?php endif; ?>

      <?php get_template_part('wpkit/systems/layouts/posts'); ?>

     

<?php get_footer(); ?>