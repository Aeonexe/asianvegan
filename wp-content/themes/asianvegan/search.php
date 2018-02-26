<?php if( get_option( 'option_private_site' ) ) { if( ! is_user_logged_in() ) { get_template_part( 'wpkit/inc/login' ); return true; } }

/**
*
* Single
*
* @package WPKit
* @author ALUMIN
* @copyright Copyright (C) Alumin.Agency
* @version WPKIT 3.0
*
*/

get_header();

$query = new WP_Query( array( 's' => get_query_var('s')) );


// The Loop
if ( $query->have_posts() ) {
    echo '<ul>';
    while ( $query->have_posts() ) {
        $query->the_post(); ?>

            <div class="archive">

                <section id="feed-articulos" class="wk-section-wrap">

            		<div class="wk-cols">

            			<div class="wk-col-6">

            				<section class="posts" id="articulos">

            					<h3 class="ui-title-small">Resultados</h3>

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

            </div>


        <?php
    }
    echo '</ul>';
}

get_footer(); ?>
