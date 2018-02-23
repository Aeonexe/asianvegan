<?php 
/**
*
*  El loop para página o post. Este se incluye en el template de pagina page.php y post single.php.
*
* @see is_preview()
* @see post_class()
* @see has_post_thumbnail()
* @see get_post_thumbnail_id()
* @see wp_get_attachment_image_src()
* @see get_post_meta()
* @see the_title_attribute()
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
get_header(); ?>
                             
	<?php if ( is_preview()) : ?><div class="site-notice"><?php echo edit_post_link('Regresa a editar'); ?></div><?php endif; ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('wk-padding-22'); ?>>

            	<?php if( is_single() ) : ?>

        			<?php if( ! post_password_required() ) : ?>
				
						<?php if ( has_post_thumbnail() ) : ?>

							<?php   

								$featured_img_id = get_post_thumbnail_id($post->id); 					
								$featured_img_large_attr = wp_get_attachment_image_src( $featured_img_id, 'large' );
								$featured_img_thumb_attr = wp_get_attachment_image_src( $featured_img_id, 'thumbnail' );
								$featured_img_alt = get_post_meta($featured_img_id, '_wp_attachment_image_alt', true);   

							?>

							<section class="article-header">
									
								<div class="wk-cols">
									<div class="wk-col wk-col-2">
										<a class="attachment fancybox-thumb" href="<?php echo $featured_img_large_attr[0]; ?>" title="<?php the_title_attribute( 'echo=0' ); ?>">
											<figure>							
												<img src="<?php echo $featured_img_thumb_attr[0]; ?>" width="<?php echo $featured_img_thumb_attr[1];?>" height="<?php echo $featured_img_thumb_attr[2];?>" class="attachment" title="<?php echo get_the_title( $featured_img_thumb_attr ); ?>" alt="<?php echo $featured_img_alt; ?>" >	
											</figure> 					
										</a>	
									</div>
									
									<div class="wk-col wk-col-6">

									<?php the_excerpt(); ?>

									</div>

								</div>	
								
							</section>

						<?php endif; ?>

					<?php endif; ?>
			
				<?php endif ?>

				<section class="article-content">

					<div class="article-content-header">

						<h1><?php the_title(); ?></h1>	

						<?php if( is_single() ) : ?>

							<?php get_template_part('wpkit/systems/layouts/parts/post-meta'); ?>
							
						<?php endif; ?>

					</div>

					<div class="article-content-main">

						<?php the_content(); ?> 

					</div>

					<div class="article-content-footer">
						
						<?php get_template_part('wpkit/systems/layouts/parts/author-meta'); ?>

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
<?php the_excerpt(); ?>
      <?php endwhile; endif; ?>

<?php get_footer(); ?>