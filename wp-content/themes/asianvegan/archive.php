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

            <!-- <h1><span><?php _e( '' ); ?></span> <?php single_cat_title(); ?></h1> -->

      <?php elseif( is_tag() ) : ?>

            <h1><span><?php _e( ' ' ); ?></span> <?php single_tag_title(); ?></h1>

      <?php elseif( is_author() ) : global $post; $author_id = $post->post_author; ?>

            <h1><?php _e( '' ); ?><strong><?php the_author_meta('display_name', $author_id); ?></strong></h1>

      <?php elseif( is_day() ) : ?>

            <h1><span><?php _e( 'Archivo por día:' ); ?></span> <?php the_time('l, F j, Y'); ?></h1>

      <?php elseif( is_month() ) : ?>

                  <h1><span><?php _e( 'Archivo por mes:' ); ?></span> <?php the_time('F Y'); ?></h1>

      <?php elseif( is_year() ) : ?>

                  <h1><span><?php _e( 'Archivo por año:' ); ?></span> <?php the_time('Y'); ?> </h1>
      <?php endif; ?>

      <section id="feed-articulos" class="wk-section-wrap">

  		<div class="wk-cols">

  			<div class="wk-col-6">

  				<section class="posts" id="articulos">

  					<h3 class="ui-title-small"><?php single_cat_title(); ?></h3>

  					<hr class="ui-articulos">

                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

                        <?php $image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

                        <article class="post first-post">


                                <div class="wk-cols">

                                    <div class="wk-col-3">

                                        <span class="feed-thumbnail" style="background-image: url(<?php echo $image_url; ?>);">
                                        </span>


                                    </div>

                                    <div class="wk-col-5 excerpt">

                                        <h1 class="ui-feed-title"><?php the_title(); ?></h1>
                                        <div class="post-meta">
                                            <div class="category"><?php echo get_the_category_list(', '); ?></div>
                                            <time class="published"><?php echo get_the_date('M j, Y'); ?></time>	                                            
                                        </div>
                                        <?php the_excerpt(); ?>

                                        <a class="wk-button ui-button" href="<?php the_permalink(); ?>">Leer más</a>

                                    </div>

                                </div>

                        </article>

                    <?php endwhile; endif; ?>

  				</section>

                <?php get_template_part( 'wpkit/systems/layouts/parts/pagination' ); ?>

  			</div>

  			<div class="wk-col-2">

  				<aside class="sidebar-single">

  					<?php if( dynamic_sidebar( 'wpkit-widget-sidebar' ) ) : endif; ?>

  				</aside>

  			</div>

  		</div>

  	</section>



<?php get_footer(); ?>
