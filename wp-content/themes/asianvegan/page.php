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

get_header(); ?>

	<?php if ( is_preview()) : ?><div class="site-notice"><?php echo edit_post_link('Regresa a editar'); ?></div><?php endif; ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<section class="wk-section-wrap">

			<div class="wk-cols">

				<div class="wk-col-6">

					<article id="post-<?php the_ID(); ?>" <?php post_class('wk-padding-22'); ?>>

						<?php if( ! post_password_required() ) : ?>

							<h1 class="ui-title-big"><?php the_title(); ?></h1>

							<?php if ( has_post_thumbnail() ) : ?>

								<?php

								$featured_img_id = get_post_thumbnail_id($post->id);
								$featured_img_large_attr = wp_get_attachment_image_src( $featured_img_id, 'medium' );
								$featured_img_thumb_attr = wp_get_attachment_image_src( $featured_img_id, 'thumbnail' );
								$featured_img_alt = get_post_meta($featured_img_id, '_wp_attachment_image_alt', true);

								?>

								<section class="article-header">

									<a class="attachment fancybox-thumb" href="<?php echo $featured_img_large_attr[0]; ?>" title="<?php the_title_attribute( 'echo=0' ); ?>">
										<figure>
											<img src="<?php echo $featured_img_large_attr[0]; ?>" width="<?php echo $featured_img_large_attr[1];?>" height="<?php echo $featured_img_large_attr[2];?>" class="attachment" title="<?php echo get_the_title( $featured_img_large_attr ); ?>" alt="<?php echo $featured_img_alt; ?>" >
										</figure>
									</a>

								</section>

							<?php endif; ?>

						<?php endif; ?>

						<section class="article-content">

							<!-- <div class="article-content-header">

								<?php get_template_part('wpkit/systems/layouts/parts/post-meta'); ?>

							</div> -->

							<div class="article-content-main">

								<?php the_content(); ?>

							</div>

							<?php if( get_field( 'wpkit_restaurante_map' ) ) : ?>

								<div class="article-map">

									<h5 class="ui-title-small">Ubicación</h5>

									<?php $location = get_field( 'wpkit_restaurante_map' ); ?>

									<div class="acf-map">
										<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
									</div>

								</div>

							<?php endif; ?>

							<!-- <div class="article-content-footer">

								<?php get_template_part('wpkit/systems/layouts/parts/author-meta'); ?>

								<span class="tags"><?php the_tags( 'Etiquetas: ' ); ?></span>
								<span class="edit-post-link"><?php edit_post_link( 'Editar' ); ?></span>
								<?php if( is_single() ) : ?>
									<span class="comments-count"><?php comments_popup_link('Comentar', '1 Comentario', '% Comentarios'); ?></span>
								<?php endif; ?>

							</div> -->

						</section>

						<?php if( is_page() ) : ?>

							<section class="article-related"  id="feed-articulos">

								<div class="posts">

									<?php $category = 'restaurantes, recetas, recetas-de-la-comunidad, restaurantes'; ?>

									<h3 class="ui-title-small">También te puede interesar</h3>

									<hr class="ui-articulos">

									<?php wpkit_query_home_posts( $category, 3 ); ?>


								</div>

							</section>

							<section class="article-footer">

								<?php comments_template(); ?>

							</section>

						<?php endif; ?>

					</article>

				</div>

				<div class="wk-col-2">

					<aside class="sidebar-single">

						<?php if( is_singular( 'forum' ) ) : ?>

							<?php if( is_user_logged_in() ) : ?>

								<?php if( dynamic_sidebar( 'wpkit-widget-sidebar' ) ) : endif; ?>

							<?php else : ?>


								<div class="custom-login-form">

									<h1 class="ui-title-small">Login</h1>

									<div class="holder">

										<?php $loginargs = array(
											'label_username' => __( 'Usuario' ),
											'label_password' => __( 'Contraseña' ),
											'label_remember' => __( 'Recuerdame' ),
											'label_log_in'   => __( 'Log In' ),
											'value_username' => 'Usuario',
										); ?>

										<?php wp_login_form($loginargs); ?>

										<span class="clear"></span>

									</div>

								</div>

							<?php endif; ?>

						<?php else : ?>

							<?php if( dynamic_sidebar( 'wpkit-widget-sidebar' ) ) : endif; ?>


						<?php endif; ?>


					</aside>

				</div>

			</div>

		</section>


	<?php endwhile;  endif; wp_reset_query(); ?>


<?php get_footer(); ?>
