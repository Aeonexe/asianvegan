<?php 
/*
*
*  Información acerca del Autor, fecha de publicación y categoría
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
?>

	<div class="post-meta">
		<?php if( !is_single() || is_archive() || is_search() || is_author() || ! is_attachment() ) : ?>
		
	     	<span class="author">Escrito por: <?php the_author_posts_link(); ?></span>		
			<time class="published"><?php echo get_the_date('M j, Y'); ?></time>		
			<span class="category">Publicado en: <?php echo get_the_category_list(', '); ?></span>
			
		<?php elseif( is_attachment() ) : ?>
			<?php if ( wp_attachment_is_image() ) : ?>
				<span id="image-icon">Imagen</span>
			<?php endif; ?>
			<?php
			$date = '<time datetime="'.get_the_date('Y-m-d').'" pubdate>'.get_the_date().'</time>';
			$image_attributes = wp_get_attachment_image_src( $attachment_id ); 
			printf(__('%s %s'), $date, get_the_category_list(', '));
			?>
			<a class="attachment-size" href="<?php echo esc_url( wp_get_attachment_url() ); ?>">
				<?php echo $image_attributes[1]; ?> &times; <?php echo $image_attributes[2]; ?>
			</a>
			
		<?php endif; ?>
	</div>


		
		