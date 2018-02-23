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

	<main>

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

					<section class="posts reveal" id="restaurantes">

						<h3 class="ui-title-small">Restaurantes</h3>

						<hr class="ui-restaurantes">

						<?php wpkit_query_home_posts( 'restaurantes', 3 ); ?>

					</section>

					<section class="posts reveals" id="recetas">

						<h3 class="ui-title-small">Recetas</h3>

						<hr class="ui-recetas">

						<?php wpkit_query_home_posts( 'recetas', 3 ); ?>

					</section>

					<section class="posts reveals" id="recetas-de-comunidad">

						<h3 class="ui-title-small">Recetas de la comunidad</h3>

						<hr class="ui-recetas-comunidad">

						<?php wpkit_query_home_posts( 'recetas-de-la-comunidad', 3 ); ?>

					</section>

				</div>

				<div class="wk-col-2">

					<aside class="sidebar-single">

					</aside>

				</div>

			</div>

		</section>

	</main>

<?php get_footer(); ?>
