<?php 
/**
*
*  Página Single
*
* @see the_ID()
* @see post_class()
* @see has_post_thumbnail()
* @see the_title_attribute()
* @see the_permalink()
* @see the_tags()
* @see edit_post_link()
* @see comments_popup_link()
* @see paginate_links()
*
* @package WPKit
* @author ALUMIN
* @copyright Copyright (C) Alumin.Agency
* @version WPKIT 3.0
*/
?>
	
	<section class="feed">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('feed'); ?>>

				<section class="article-header">

					<?php if ( has_post_thumbnail() ) : ?>
						<figure>
							<?php the_post_thumbnail( 'thumbnail' ); ?>
						</figure>                             
					<?php else : ?>
						 <figure>
							 <img class="attachment-thumbnail size-thumbnail wp-post-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/thumbnail-default.jpg" alt="Thumbnail" >
						</figure> 
					<?php endif ?>

				</section>

				<section class="article-content">

					<div class="article-content-header">

						<h1><?php the_title(); ?></h1>					
						<?php get_template_part('wpkit/systems/layouts/parts/post-meta'); ?>

					</div>

					<div class="article-content-main">

						<?php the_excerpt(); ?> 

					</div>

					<div class="article-content-footer">

						<a class="read-more" rel="bookmark" title="<?php the_title_attribute(); ?>" href="<?php the_permalink() ?>" >Leer más...</a>
						<span class="tags"><?php the_tags( 'Etiquetas: ' ); ?></span>
						<span class="edit-post-link"><?php edit_post_link( 'Editar' ); ?></span>
						<span class="comments-count"><?php comments_popup_link('Comentar', '1 Comentario', '% Comentarios'); ?></span>  

					</div>

				</section>

			</article>

		<?php endwhile; else : ?>

			<p>Aún no se ha publicado nada.</p>

		<?php endif; ?>

	</section>

	<?php echo '<nav id="pagination">' . paginate_links('prev_text=Anterior&next_text=Siguiente') . '</nav>' ?>

