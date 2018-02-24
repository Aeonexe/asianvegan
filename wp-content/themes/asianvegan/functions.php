<?php
/*
*
*  Contiene las funciones implementadas en el template.
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/

/*******************************************************************************
WPKit */

	include_once( get_stylesheet_directory() . '/wpkit/config.php' );


/***************************************************************************
* Página de opciones ACF */

	if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Homepage',
			'menu_title'	=> 'Homepage',
			'menu_slug' 	=> 'oopciones-de-homepage',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'icon_url'		=> 'dashicons-marker',
		 	'position'		=> '4',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Slider',
			'menu_title'	=> 'Slider',
			'parent_slug'	=> 'oopciones-de-homepage',
		));

		// acf_add_options_sub_page(array(
		// 	'page_title' 	=> 'Homepage',
		// 	'menu_title'	=> 'Homepage',
		// 	'parent_slug'	=> 'options-wpkit',
		// ));

	}

/* ***********************************************************************************************************************
* Custom post type *

	// 'Custom_post_type_name'

		if ( ! function_exists('wk_custom_post_type') ) {

			// Register Custom Post Type
			function wk_custom_post_type() {

				$ctp_name = 'articulos';
				$name = 'Articulos';
				$names = 'Artículos';

				$labels = array(
					'name'                  => _x( $names, 'Post Type General Name', 'wpkit_text_domain' ),
					'singular_name'         => _x( $name, 'Post Type Singular Name', 'wpkit_text_domain' ),
					'menu_name'             => __( $names, 'wpkit_text_domain' ),
					'name_admin_bar'        => __( $names, 'wpkit_text_domain' ),
					'archives'              => __( $names, 'wpkit_text_domain' ),
					'attributes'            => __( $names . ' Attributes', 'text_domain' ),
					'parent_item_colon'     => __( 'Superior', 'wpkit_text_domain' ),
					'all_items'             => __( 'Todo', 'wpkit_text_domain' ),
					'add_new_item'          => __( 'Añadir', 'wpkit_text_domain' ),
					'add_new'               => __( 'Nuevo', 'wpkit_text_domain' ),
					'new_item'              => __( 'Nuevo', 'wpkit_text_domain' ),
					'edit_item'             => __( 'Editar', 'wpkit_text_domain' ),
					'update_item'           => __( 'Actualizar', 'wpkit_text_domain' ),
					'view_item'             => __( 'Ver', 'wpkit_text_domain' ),
					'search_items'          => __( 'Buscar', 'wpkit_text_domain' ),
					'not_found'             => __( 'No se encontró', 'wpkit_text_domain' ),
					'not_found_in_trash'    => __( 'No se encontró en la papelera', 'wpkit_text_domain' ),
					'featured_image'        => __( 'Imagen destacada', 'wpkit_text_domain' ),
					'set_featured_image'    => __( 'Seleccionar como imagen destacada', 'wpkit_text_domain' ),
					'remove_featured_image' => __( 'Quitar imagen destacada', 'wpkit_text_domain' ),
					'use_featured_image'    => __( 'Usar como imagen destacada', 'wpkit_text_domain' ),
					'insert_into_item'      => __( 'Insertar', 'wpkit_text_domain' ),
					'uploaded_to_this_item' => __( 'Adjuntas a esta publicación', 'wpkit_text_domain' ),
					'items_list'            => __( 'Listado de elementos', 'wpkit_text_domain' ),
					'items_list_navigation' => __( 'Navegación por items', 'wpkit_text_domain' ),
					'filter_items_list'     => __( 'Filtrar por item en el listado', 'wpkit_text_domain' ),
				);
				$rewrite = array(
					'slug'                  => $ctp_name,
					'with_front'            => true,
					'pages'                 => true,
					'feeds'                 => true,
				);
				// Requiere habilitar capabilities para el rol de usuario
				// $capabilities = array(
				// 	'edit_post'          => 'edit_articulo',
				// 	'read_post'          => 'read_articulo',
				// 	'delete_post'        => 'delete_articulo',
				// 	'edit_posts'         => 'edit_articulos',
				// 	'edit_others_posts'  => 'edit_others_articulos',
				// 	'publish_posts'      => 'publish_articulos',
				// 	'read_private_posts' => 'read_private_articulos',
				// 	'create_posts'       => 'edit_articulos',
				// );
				$args = array(
					'label'                 => __( $name, 'wpkit_text_domain' ),
					'description'           => __( 'Publicaciones en el sitio', 'wpkit_text_domain' ),
					'labels'                => $labels,
					'supports'              => array(
													'title',
													'editor',
													'excerpt',
													'author',
													'thumbnail',
													'comments',
													'trackbacks',
													'revisions',
													'custom-fields',
													'page-attributes',
													'post-formats',
												),
					'taxonomies'            => array(
													'post_tag',
													'category'
												),
					'hierarchical'          => true,
					'public'                => true,
					'show_ui'               => true,
					'menu_position'         => 5,
					'menu_icon'             => 'dashicons-admin-post',
					'show_in_menu'          => true,
					'show_in_admin_bar'     => true,
					'show_in_nav_menus'     => true,
					'can_export'            => true,
					'has_archive'           => true,
					'exclude_from_search'   => false,
					'publicly_queryable'    => true,
					'rewrite'               => $rewrite,
					// 'capabilities'          => $capabilities,
					'show_in_rest'			=> true,
				);
				register_post_type( $ctp_name, $args );

			}
			add_action( 'init', 'wk_custom_post_type', 0 );
		}

		// Añade capabilities al rol de usuario
		// Necesario si se añade capabilities como argumento en el post type
		// function add_theme_caps() {
		//     // gets the administrator role
		//     $admins = get_role( 'editor' );

		//     $admins->add_cap( 'edit_articulo' );
		//     $admins->add_cap( 'read_articulo' );
		//     $admins->add_cap( 'delete_articulo' );
		//     $admins->add_cap( 'edit_articulos' );
		//     $admins->add_cap( 'edit_others_articulos' );
		//     $admins->add_cap( 'publish_articulos' );
		//     $admins->add_cap( 'read_private_articulos' );
		//     $admins->add_cap( 'edit_articulos' );

		// }
		// add_action( 'admin_init', 'add_theme_caps');


/*******************************************************************************
Tus funciones */


/**
 * Generated by the WordPress Meta Box Generator at http://goo.gl/8nwllb
 */
class Rational_Meta_Box {
	private $screens = array(
		'post',
		'page',
		'attachment',
	);
	private $fields_seo = array(
		array(
			'id' => 'titulo-seo',
			'label' => 'Titulo SEO',
			'type' => 'text',
		),
		array(
			'id' => 'descripcion-seo',
			'label' => 'Descripcion SEO',
			'type' => 'textarea',
		)
	);
	private $fields_schema = array(
		array(
			'id' => 'tipo-de-schema',
			'label' => 'Tipo de schema',
			'type' => 'select',
			'options' => array(
				'Article ' => ' Artículo',
				'Blog ' => ' Blog',
				'Book ' => ' Libro',
				'Corporation ' => ' Corporación',
				'EducationalOrganization ' => ' Organización educacional',
				'Event ' => ' Evento',
				'Game ' => ' Juego',
				'JobPosting ' => ' Empleo',
				'LegalService ' => ' Servicio legal',
				'LocalBusiness ' => ' Negocio local',
				'Movie ' => ' Película',
				'Organization ' => ' Organización',
				'Place ' => ' Lugar',
				'Product ' => ' Producto',
				'ProfessionalService ' => ' Servicio profesional',
				'Receipe ' => ' Receta',
				'Restaurant ' => ' Restaurante',
				'Review ' => ' Revisión',
				'Store ' => ' Tienda',
			),
		),
		array(
			'id' => 'titulo-schema',
			'label' => 'Titulo schema',
			'type' => 'text',
		),
		array(
			'id' => 'descripcion-schema',
			'label' => 'Descripcion schema',
			'type' => 'textarea',
		),
		array(
			'id' => 'imagen-schema',
			'label' => 'Imagen schema',
			'type' => 'media',
		),
	);
	private $fields_fb = array(
		array(
			'id' => 'titulo-facebook',
			'label' => 'Titulo facebook',
			'type' => 'text',
		),
		array(
			'id' => 'descripcion-facebook',
			'label' => 'Descripcion facebook',
			'type' => 'textarea',
		),
		array(
			'id' => 'imagen-facebook',
			'label' => 'Imagen facebook',
			'type' => 'media',
		),
	);
	private $fields_tw = array(
		array(
			'id' => 'tipo-twitter-card',
			'label' => 'Tipo twitter card',
			'type' => 'select',
			'options' => array(
				'global' => ' -- Utilizar la configuración global --',
				'summary_large_image ' => ' Summary Card con imagen grande',
				'summary ' => ' Summary Card',
				'app ' => ' App card',
				'player ' => ' Player Card',
			),
		),
		array(
			'id' => 'titulo-twitter',
			'label' => 'Titulo twitter',
			'type' => 'text',
		),
		array(
			'id' => 'descripcion-twitter',
			'label' => 'Descripcion twitter',
			'type' => 'textarea',
		),
		array(
			'id' => 'imagen-twitter',
			'label' => 'Imagen twitter',
			'type' => 'media',
		),
		array(
			'id' => 'autor-twitter',
			'label' => 'Autor twitter',
			'type' => 'select',
			'options' => array(
				'1 ' => ' Autor del artículo',
				'2 ' => ' Autor del sitio',
				'3 ' => ' No mostrar un autor',
			),
		),
	);
	private $fields_robots = array(
		array(
			'id' => 'follow',
			'label' => 'Follow',
			'type' => 'select',
			'options' => array(
				'follow ' => ' Follow',
				'nofollow ' => ' No follow',
			),
		),
		array(
			'id' => 'index',
			'label' => 'Index',
			'type' => 'select',
			'options' => array(
				'index ' => ' Index',
				'noindex ' => ' No index',
			),
		),
	);

	/**
	 * Class construct method. Adds actions to their respective WordPress hooks.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_footer', array( $this, 'admin_footer' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}

	/**
	 * Hooks into WordPress' add_meta_boxes function.
	 * Goes through screens (post types) and adds the meta box.
	 */
	public function add_meta_boxes() {
		foreach ( $this->screens as $screen ) {
			add_meta_box(
				'seodiv',
				__( 'SEO', 'rational-metabox' ),
				array( $this, 'add_meta_box_callback' ),
				$screen,
				'normal',
				'default'
			);
		}
	}

	/**
	 * Generates the HTML for the meta box
	 *
	 * @param object $post WordPress post object
	 */
	public function add_meta_box_callback( $post ) {
		wp_nonce_field( 'seo_data', 'seo_nonce' );
		$this->generate_fields( $post );
	}

	/**
	 * Hooks into WordPress' admin_footer function.
	 * Adds scripts for media uploader.
	 */
	public function admin_footer() {
		?><script>
			// https://codestag.com/how-to-use-wordpress-3-5-media-uploader-in-theme-options/
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.rational-metabox-media').click(function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id').replace('_button', '');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$("#"+id).val(attachment.url);
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
				}
			});
		</script><?php
	}


	/**
	* Tipos de campo antes de imprimir el html
	**/
	public function switch_fields( $field_type, $field_id, $db_value, $field_options ) {
		switch ( $field_type ) {
				case 'media':
				global $post;
				$seo_image_id = 'seo_' . $field_id;
				if( ! get_post_meta( $post->ID, $seo_image_id, true ) ) :
					$wk_hide = 'style="display: inline-block;"';
					$wk_hide_image = 'style="display: none;"';
				else :
					$wk_hide = 'style="display: none;"';
					$wk_hide_image = 'style="display: inline-block;"';
				endif;
					$input = sprintf(
						'<div class="upload-img"><div class="wk_option_image_uploader_container" ' . $wk_hide_image . '>
						    <img class="image_src" height="64" src="%s">
						    <span class="dashicons-before dashicons-dismiss remove-image"></span>
						</div>
						<div class="flex-item wk_option_image_uploader_action"' . $wk_hide . '>
						    <input style="display: none;" type="text" class="image_url regular-text" value="%s" id="%s" name="%s">
						    <button type="button" name="upload-btn" id="" class="upload-btn button-secondary">Añadir gif</button>
						</div></div>',
						$db_value,
						$db_value,
						$field_id,
						$field_id
					);
					break;
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$field_id,
						$field_id
					);
					foreach ( $field_options as $key => $value ) {
						$field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$db_value === $field_value ? 'selected' : '',
							$field_value,
							$value
						);
					}
					$input .= '</select>';
					break;
				case 'textarea':
					$input = sprintf(
						'<textarea class="large-text" id="%s" name="%s" rows="4">%s</textarea>',
						$field_id,
						$field_id,
						$db_value
					);
					break;
				default:
					$input = sprintf(
						'<input id="%s" name="%s" type="text" value="%s">',
						$field_type !== 'color' ? 'class="regular-text"' : '',
						$field_id,
						$db_value
					);
			}
			return $input;
	}

	/**
	 * Generates the field's HTML for the meta box.
	 */
	public function generate_fields( $post ) {

		echo '<div class="wk-tabs-content-left">
				<ul class="wk-tabs-list" data-tabgroup="first-tab-group">
					<li><a href="#tab1" class="active"><i class="dashicons-before dashicons-shield-alt"></i> SEO</a></li>
					<li><a href="#tab2"><i class="dashicons-before dashicons-index-card"></i> Schema</a></li>
					<li><a href="#tab3"><i class="dashicons-before dashicons-facebook-alt"></i> Facebook</a></li>
					<li><a href="#tab4"><i class="dashicons-before dashicons-twitter"></i> Twitter</a></li>
					<li><a href="#tab5"><i class="dashicons-before dashicons-share-alt"></i> Robots</a></li>
				</ul>
				<section id="first-tab-group" class="wk-tabgroup">';

		$output_seo = '';
		foreach ( $this->fields_seo as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'seo_' . $field['id'], true );
			$field_type = $field['type'];
			$field_id = $field['id'];
			$input = $this->switch_fields( $field_type, $field_id, $db_value, $field_options );
			$output_seo .= '<div class="wk-tabgroup-row">' . $this->row_format( $label, $input ) . '</div>';

		}
		//echo '<table id="fields_seo" class="form-table"><tbody>' . $output_seo . '</tbody></table>';
		echo '<div id="tab1" class="wk-tab"><div class="wk-tabgroup-row"><p class="description">Por default se mostrarán el título, el extracto y la url canónica de esta publicación, llena estos campos solo en el caso de querer mostrar un información distinto en los resultados de motores de búsqueda. Es recomendable dejar en blanco si desconoces el efecto de estos campos, la plantilla se encargará de mostrar esta información de forma automática.</p></div>' . $output_seo . '</div>';

		$output_schema = '';
		foreach ( $this->fields_schema as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'seo_' . $field['id'], true );
			$field_type = $field['type'];
			$field_id = $field['id'];
			$field_value = !is_numeric( $key ) ? $key : $value;
			$field_options = $field['options'];
			$input = $this->switch_fields( $field_type, $field_id, $db_value, $field_options );
			$output_schema .= '<div class="wk-tabgroup-row">' . $this->row_format( $label, $input ) . '</div>';
		}
		//echo '<table id="fields_schema" class="form-table"><tbody>' . $output_schema . '</tbody></table>';

		echo '<div id="tab2" class="wk-tab">' . $output_schema . '</div>';


		$output_fb = '';
		foreach ( $this->fields_fb as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'seo_' . $field['id'], true );
			$field_type = $field['type'];
			$field_id = $field['id'];
			$input = $this->switch_fields( $field_type, $field_id, $db_value, $field_options );
			$output_fb .= '<div class="wk-tabgroup-row">' . $this->row_format( $label, $input ) .' </div>';
		}
		//echo '<table id="fields_fb" class="form-table"><tbody>' . $output_fb . '</tbody></table>';

		echo '<div id="tab3" class="wk-tab">' . $output_fb . '</div>';

		$output_tw = '';
		foreach ( $this->fields_tw as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'seo_' . $field['id'], true );
			$field_type = $field['type'];
			$field_id = $field['id'];
			$field_value = !is_numeric( $key ) ? $key : $value;
			$field_options = $field['options'];
			$input = $this->switch_fields( $field_type, $field_id, $db_value, $field_options );
			$output_tw .= '<div class="wk-tabgroup-row">' . $this->row_format( $label, $input ) . '</div>';
		}
		//echo '<table id="fields_schema" class="form-table"><tbody>' . $output_tw . '</tbody></table>';

		echo '<div id="tab4" class="wk-tab">' . $output_tw . '</div>';

		$output_robots = '';
		foreach ( $this->fields_robots as $field ) {
			$label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
			$db_value = get_post_meta( $post->ID, 'seo_' . $field['id'], true );
			$field_type = $field['type'];
			$field_id = $field['id'];
			$field_value = !is_numeric( $key ) ? $key : $value;
			$field_options = $field['options'];
			$input = $this->switch_fields( $field_type, $field_id, $db_value, $field_options );
			$output_robots .= '<div class="wk-tabgroup-row">' . $this->row_format( $label, $input ) . '</div>';
		}
		//echo '<table id="fields_schema" class="form-table"><tbody>' . $output_robots . '</tbody></table>';

		echo '<div id="tab5" class="wk-tab">' . $output_robots . '</div>';

		echo '</section></div>';


	}

	/**
	 * Generates the HTML for table rows.
	 */
	public function row_format( $label, $input ) {
		return sprintf(
			'<tr><th scope="row">%s</th><td>%s</td></tr>',
			$label,
			$input
		);
	}
	/**
	 * Hooks into WordPress' save_post function
	 */
	public function save_post( $post_id ) {
		if ( ! isset( $_POST['seo_nonce'] ) )
			return $post_id;

		$nonce = $_POST['seo_nonce'];
		if ( !wp_verify_nonce( $nonce, 'seo_data' ) )
			return $post_id;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;

		$fields_seo = $this->fields_seo;
		$fields_schema = $this->fields_schema;
		$fields_fb = $this->fields_fb;
		$fields_tw = $this->fields_tw;
		$fields_robots = $this->fields_robots;

		$fields = array_merge( $fields_seo, $fields_schema, $fields_fb, $fields_tw, $fields_robots );

		foreach ( $fields as $field ) {
			if ( isset( $_POST[ $field['id'] ] ) ) {
				switch ( $field['type'] ) {
					case 'email':
						$_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
						break;
					case 'text':
						$_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
						break;
				}
				update_post_meta( $post_id, 'seo_' . $field['id'], $_POST[ $field['id'] ] );
			} else if ( $field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, 'seo_' . $field['id'], '0' );
			}
		}
	}
}
new Rational_Meta_Box;

// Api Google Maps
function acf_initmap() {

	acf_update_setting('google_api_key', 'AIzaSyCr7WDeWei6HmJs1E50MqH92TuKtEKhvsI');
}

add_action('acf/init', 'acf_initmap');

// theme supports background

add_theme_support( 'custom-background' );

// Query posts feed homepage
	function wpkit_query_home_posts( $category, $posts_per_page ) {

			$args = array(
				'post_type' 	=> 'post',
				'category_name'	=> $category,
				'posts_per_page'=> $posts_per_page,

			);

			$wp_query = new WP_Query( $args );


			if( $wp_query->have_posts() ) : ?>

				<div class="wk-cols">

					<?php $i = 0; while( $wp_query->have_posts() ) : $i++; $wp_query->the_post(); ?>

						<?php $image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

						<div class="wk-col-3">

							<article class="post <?php if( $i === 1 ) : ?>first-post<?php endif; ?> <?php if( $i === $posts_per_page ) : ?>last-post<?php endif; ?>">

								<a href="<?php the_permalink(); ?>">
									<span class="feed-thumbnail" style="background-image: url(<?php echo $image_url; ?>);">
									</span>

									<h1 class="ui-feed-title"><?php the_title(); ?></h1>
								</a>

							</article>

						</div>

					<?php

					endwhile; wp_reset_postdata(); ?>

				</div><?php

			endif;

	}

// Query posts feed homepage categories
	function wpkit_query_home_posts_cat( $category, $posts_per_page ) {

			$args = array(
				'post_type' 	=> 'post',
				'category_name'	=> $category,
				'posts_per_page'=> $posts_per_page,
				'orderby'        => 'rand',
			);

			$wp_query = new WP_Query( $args );


			if( $wp_query->have_posts() ) : ?>


					<?php $counter = 0; while( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

							<?php $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() ); ?>

							<article class="post">

								<a href="<?php the_permalink(); ?>">

									<div class="post-bg" style="background-image: url(<?php echo $feat_image_url; ?>);"></div>

									<div class="post-meta">

										<h1 class="ui-title-small"><?php the_title(); ?></h1>
										<span class="post-date"><?php echo get_the_date('F j, Y'); ?></span>

									</div>

								</a>


							</article>


					<?php

					endwhile; wp_reset_postdata(); ?>

				<?php

			endif;

	}

// WIdgets widget area widgetized

function wpkit_widget_sidebar() {
		register_sidebar(array(
			'name'			=> 'Sidebar',
			'id' 			=> 'wpkit-widget-sidebar',
			'description'   => __( '' ),
			'before_widget' => '<div id="wk-widget-absolute-left-%1$s" class="wk-widget-area">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h3 style="display: none;">',
			'after_title' 	=> '</h3>',
		));
	}

	add_action( 'widgets_init', 'wpkit_widget_sidebar' );

// social media redes sociales

function wpkit_social_media() {

	if( have_rows( 'wpkit_social_media', 'option' ) ) : while( have_rows( 'wpkit_social_media', 'option' ) ) : the_row(); ?>

		<a href="<?php the_sub_field( 'wpkit_social_media_red', 'option' ); ?>"><span class="fa fa-<?php the_sub_field( 'wpkit_social_media_icon', 'option' ); ?>"></span></a>

	<?php endwhile; endif;
}



add_filter('comment_form_defaults', 'set_my_comment_title', 20);
function set_my_comment_title( $defaults ){
  $defaults['title_reply'] = __('Custom leave a comment', 'customizr-child');
  return $defaults;
}



//
function custom_blockusers_init() {
  if ( is_user_logged_in() && is_admin() && !current_user_can( 'administrator' ) ) {
    wp_redirect( home_url() );
    exit;
  }
}
add_action( 'init', 'custom_blockusers_init' );
