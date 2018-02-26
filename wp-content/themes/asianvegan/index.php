<?php if( get_option( 'option_private_site' ) ) { if( ! is_user_logged_in() ) { get_template_part( 'wpkit/inc/login' ); return true; } }

/**
*
* Main page
*
* @package WPKit
* @author ALUMIN
* @copyright Copyright (C) Alumin.Agency
* @version WPKIT 3.0
*
*/

get_header(); ?>

	<section class="wk-section-wrap" id="main-slider">

		<div class="slider">

			<?php if( have_rows( 'wpkit_slider', 'option' ) ) : ?>

				<?php while( have_rows( 'wpkit_slider', 'option' ) ) : the_row(); ?>

					<div class="slide">

						<img class="bg" src="<?php the_sub_field( 'wpkit_slide', 'option' ); ?>">
						<a class="ui-button wk-button" href="<?php the_sub_field( 'wpkit_button_link', 'option' ); ?>" <?php if( get_sub_field( 'wpkit_button_target', 'option' ) ) : ?>target="_blank"<?php endif; ?>><?php the_sub_field( 'wpkit_button_text', 'option' ); ?></a>

					</div>

				<?php endwhile; ?>

			<?php endif; ?>

		</div>

	</section>

	<section  class="wk-section-wrap" id="feed-articulos-featured">

		<div class="wk-cols">

			<div class="wk-col">

				<?php wpkit_query_home_posts_cat( 'articulos', 1 ); ?>

			</div>

			<div class="wk-col">

				<?php wpkit_query_home_posts_cat( 'restaurantes', 1 ); ?>

			</div>

			<div class="wk-col">

				<?php wpkit_query_home_posts_cat( 'recetas', 1 ); ?>

			</div>

			<div class="wk-col">

				<?php wpkit_query_home_posts_cat( 'recetas-de-la-comunidad', 1 ); ?>

			</div>

		</div>

	</section>

	<section id="feed-articulos" class="wk-section-wrap">

		<div class="wk-cols">

			<div class="wk-col-6">

				<section class="posts" id="articulos">

					<h3 class="ui-title-small">Artículos</h3>

					<hr class="ui-articulos">

					<?php wpkit_query_home_posts( 'articulos', 3 ); ?>

				</section>

				<section class="posts reveal-bottom" id="restaurantes">

					<h3 class="ui-title-small">Restaurantes</h3>

					<hr class="ui-restaurantes">

					<?php wpkit_query_home_posts( 'restaurantes', 3 ); ?>

				</section>

				<section class="posts reveal-bottom" id="recetas">

					<h3 class="ui-title-small">Recetas</h3>

					<hr class="ui-recetas">

					<?php wpkit_query_home_posts( 'recetas', 3 ); ?>

				</section>

				<section class="posts reveal-bottom" id="recetas-de-comunidad">

					<h3 class="ui-title-small">Recetas de la comunidad</h3>

					<hr class="ui-recetas-comunidad">

					<?php wpkit_query_home_posts( 'recetas-de-la-comunidad', 3 ); ?>

				</section>

			</div>

			<div class="wk-col-2">

				<aside class="sidebar-single reveal-bottom">

					<?php if( dynamic_sidebar( 'wpkit-widget-sidebar' ) ) : endif; ?>

				</aside>

			</div>

		</div>

	</section>

	<section class="wk-section-wrap reveal-bottom" id="video-playlist">

		<!-- ​<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?list=PL474LruqQPTb5LMAuOOnH_Cm9r3dggGFy&showinfo=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->

		<?php echo do_shortcode('[wonderplugin_gallery id="1"]'); ?>

	</section>

<?php get_footer(); ?>
