<?php 
/**
*
*  Sobreescribe el listado y formulario de comentarios.
*
* @see have_comments()
* @see get_comments_number()
* @see number_format_i18n()
* @see the_comments_navigation()
* @see wp_list_comments()
* @see comments_open()
* @see get_comments_number()
* @see post_type_supports()
* @see comment_form()
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
if ( post_password_required() ) {
	return;
}
?>

	<?php if ( have_comments() ) : ?>
		<h4 class="comments-title">
			<?php $comments_number = get_comments_number();
				if ( 1 === $comments_number ) :
					/* translators: %s: post title */
					printf( _x( 'Un comentario en %s', 'comments title' ), get_the_title() );
				else :
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s comentario en %2$s',
							'%1$s comentarios en %2$s',
							$comments_number,
							'comments title'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				endif;
			?>
		</h4>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; ?>

	<?php	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments">Los comentarios se han cerrado</p>
	<?php endif; ?>

	<?php // Formulario de envío de comentario
		comment_form( array(
			'id_form' 				=> 'comentarios',
			'class_form' 			=> 'formulario',
			'id_submit'  			=> 'enviar',                  
			'logged_in_as' 			=> '',
			'class_submit'  		=> 'wk-button',
			'title_reply'			=> 'Inicia una conversación',                  
			'title_reply_before'	=> '<h2>',
			'title_reply_after' 	=> '</h2>',
			'comment_notes_before' 	=> '', //solo se muestra para usuarios sin loggin
			'comment_field' 		=> '<label for="comment">Comentario</label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
			'comment_notes_after' 	=> '<p class="form-allowed-tags">Puedes usar HTML</p>',
			'label_submit'			=>'Enviar comentario',
		) );
	?>
