<?php 
/**
*
*  Es el template general para crear nuevas páginas.
*
* @see wp_get_attachment_image_src() 			Returns an array (url, width, height, is_intermediate), or false, if no image is available.
* @see wp_get_attachment_image()				Returns HTML img element or empty string on failure.
* @see wp_get_attachment_metadata()				Returns an array (width, height, file, sizez, image_meta)
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<section class="article-content">

					<div class="article-content-header">

						<h1><?php the_title(); ?></h1>	

					</div>

					<div class="article-content-main">

						<?php $attachment = wp_get_attachment_image_src( $post->id, 'full' ); ?>
						<a class="attachment fancybox-thumb" href="<?php echo $attachment[0]; ?>" title="<?php the_title(); ?>" rel="attachment">
							<img src="<?php echo $attachment[0]; ?>" width="<?php echo $attachment[1];?>" height="<?php echo $attachment[2];?>"  class="attachment wk-img-responsive" alt="<?php echo $post->post_excerpt; ?>" >		
						</a>

						<?php the_excerpt(); ?>

						<?php the_content(); ?> 

					</div>

					<div class="article-content-footer">
						
						<?php get_template_part('template-parts/author-meta'); ?>

						<span class="tags"><?php the_tags( 'Etiquetas: ' ); ?></span>
						<span class="edit-post-link"><?php edit_post_link( 'Editar' ); ?></span>
						<?php if( is_single() ) : ?>
							<span class="comments-count"><?php comments_popup_link('Comentar', '1 Comentario', '% Comentarios'); ?></span>
						<?php endif; ?>  

					</div>

				</section>
				
				<?php if( is_single() ) : ?>
				
					<section class="article-footer">
						
						<?php comments_template(); ?> 
				
					</section>
				
				<?php endif; ?>
				
				
			</article>


<?php endwhile; endif; ?>

<?php get_footer(); ?>