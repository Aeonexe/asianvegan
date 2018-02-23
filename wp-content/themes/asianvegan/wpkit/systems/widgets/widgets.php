<?php
/*¨**********************************************************************************************************************
WIdget Areas */

	function wk_widget_areas() {
			register_sidebar(array(
				'name'			=> 'Absolute Left',
				'id' 			=> 'wk-widget-absolute-left',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-absolute-left-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Absolute Right',
				'id' 			=> 'wk-widget-absolute-right',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-absolute-right-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Header',
				'id' 			=> 'wk-widget-header',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-header-%1$s" class="%2$s wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Top first',
				'id' 			=> 'wk-widget-top-first',
				'class' 		=> 'wk-class',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-top-first-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Top secondary',
				'id' 			=> 'wk-widget-top-secondary',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-top-secondary-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Inner top',
				'id' 			=> 'wk-widget-inner-top',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-inner-top-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Inner bottom',
				'id' 			=> 'wk-widget-inner-bottom',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-innet-bottom-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Sidebar Main',
				'id' 			=> 'wk-widget-sidebar-main',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-sidebar-main-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Sidebar secondary',
				'id' 			=> 'wk-widget-sidebar-secondary',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-sidebar-secondary-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Bottom first',
				'id' 			=> 'wk-widget-bottom-first',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-bottom-first-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Bottom secondary',
				'id' 			=> 'wk-widget-bottom-secondary',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-bottom-secondary-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Footer bar left',
				'id' 			=> 'wk-widget-footer-bar-left',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-footer-bar-left-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Footer bar right',
				'id' 			=> 'wk-widget-footer-bar-right',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-footer-bar-right-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
			register_sidebar(array(
				'name'			=> 'Footer',
				'id' 			=> 'wk-widget-footer',
				'description'   => __( '' ),
				'before_widget' => '<div id="wk-widget-footer-%1$s" class="wk-widget-area">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h3 style="display: none;">',
				'after_title' 	=> '</h3>',
			));
		}

		if( get_option( 'wk_option_layouts_widget' ) ) {

			add_action( 'widgets_init', 'wk_widget_areas' );

		}

/*******************************************************************************
Layout de widgets */


		function wk_widgets_header() {

			if( get_option( 'wk_option_layouts_widget' ) ) {

				get_template_part( 'templates/widgets_header' );

			} else {

				get_template_part( 'wpkit/systems/layouts/parts/menu-responsive' );
			}

		}

		add_action( 'wk_widgets_header_layout', 'wk_widgets_header' );



		function wk_widgets() {

			get_template_part( 'templates/widgets' );

		}

		function wk_widgets_footer() {

			get_template_part( 'templates/widgets_footer' );

		}


		if( get_option( 'wk_option_layouts_widget' ) ) {

			add_action( 'wk_widgets_layout', 'wk_widgets' );
			add_action( 'wk_widgets_footer_layout', 'wk_widgets_footer' );

		}


/************************************************************************************************************************
*Custom widgets */

	// Inicia las variables para cada widget

	function wk_widget_ids() {
		global $wp_registered_widgets;
		$get_widgets = wp_get_sidebars_widgets();
		$widgets = $get_widgets['widgetized-dashboard'];

		foreach ($widgets as $widget) {
			$dashboard_widget_name =  $wp_registered_widgets[$widget]['name'];
			$dashboard_widget_id =  $wp_registered_widgets[$widget]['id'];
			$widgetnumber = $wp_registered_widgets[$widget]["params"][0]["number"];
			$widgetid = $wp_registered_widgets[$widget]["id"];
			$widget_settings = $wp_registered_widgets[$widget]["callback"][0]->get_settings();
			$title = $widget_settings[$widgetnumber]["title"];
			$text = $widget_settings[$widgetnumber]["text"];
			$widgetid;

		}
	}

/************************************************************************************************************************
* Widget Slider */

		class wk_widget_slider extends WP_Widget {
		    // constructor
			function __construct() {
				parent::__construct(
						'slider', // ID base del widet
						__('Slider', 'wpkit-txt-domain'), // Nombre del widget, aparecerá en el administrador
						array( 'description' => __( 'Añade un slider', 'wpkit-txt-domain' ), ) // Descripción
					);
				}

		    // @see WP_Widget::widget
			function widget($args, $instance) {
		        extract( $args );
		        $title = apply_filters('widget_title', $instance['title']);

					// echo $before_widget; ?>

					<li id="<?php echo $args[widget_id]; ?>" class="widget widget_slider">
							<?php if ( $title )
		                       	echo $before_title . $title . $after_title . '<br>';
								//$field = get_field('wpkit_testfield', 'widget_' . $widget_id );
								///echo 'Field: ' . $field . '<br>';
								//echo 'ID: ' . $widget_id . '<br>';
								//echo 'Widget name: ' . $widget_name . '<br>';
								//print_r($args);

								// START WIDGET CONTENT
								echo 'algo';
								//END WIDGET CONTENT

							?>
					</li>

				<?php
		    }


		    // @see WP_Widget::update
		    function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
		        return $instance;
		    }

		    // @see WP_Widget::form
		    function form($instance) {
		        $title = esc_attr($instance['title']);
		        ?>
		            <p>
						<label for="<?php echo $this->get_field_id('title'); ?>">
							<?php _e('Title:'); ?>
							<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
						</label>
					</p>
		        <?php
		    }

		}
		add_action('widgets_init', create_function('', 'return register_widget("wk_widget_slider");'));

/************************************************************************************************************************
* Widget Breadcrumb */

		class wk_widget_breadcrumb extends WP_Widget {
		    // constructor
			function __construct() {
				parent::__construct(
						'breadcrumb', // ID base del widet
						__('Breadcrumb', 'wk-txt-domain'), // Nombre del widget, aparecerá en el administrador
						array( 'description' => __( '', 'wk-txt-domain' ), ) // Descripción
					);
				}

		    // @see WP_Widget::widget
			function widget($args, $instance) {
		        extract( $args );
		        $title = apply_filters('widget_title', $instance['title']);

					// echo $before_widget; ?>

					<div id="<?php echo $args[widget_id]; ?>" class="widget widget_breadcrumb">
							<?php if ( $title )

		                       	echo $before_title . $title . $after_title . '<br>';

								// START WIDGET CONTENT
								if( is_home() ) {
									echo '<nav id="breadcrumb"><a href="' . site_url() . '">Home</a></nav>';
								}
								if ( !is_home() ) {
									echo '<nav id="breadcrumb">';
									echo '<span class="removed_link"><a href="' . site_url() . '">Home</a></span> / ';
									if ( is_category() || is_single() ) {
										the_category('title_li=');
										if (is_single()) {
											echo ' / ';
											the_title();
										}
									} elseif (is_page()) {
										echo the_title();
									} elseif(is_tag()) {
										echo 'etiquetas / ';
										single_tag_title();
									} elseif( is_author() ) {
										echo 'autores / ';
										global $post; $author_id = $post->post_author;
										the_author_meta('display_name', $author_id);
									} elseif( is_archive() ) {
										echo 'archivo / ';
										if( is_year() ) {
											the_time('Y');
										} elseif( is_month()) {
											the_time('Y');
											echo ' / ';
											the_time('M');
										} elseif( is_day() ) {
											the_time('Y');
											echo ' / ';
											the_time('M');
											echo ' / ';
											the_time('j');
										}
									} elseif( is_search() ) {
										echo 'búsqueda';
									} elseif( is_attachment() ) {
										echo 'medio';
									}
									echo '</nav>';
								}
								//END WIDGET CONTENT

							?>
					</div>

				<?php
		    }


		    // @see WP_Widget::update
		    function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
		        return $instance;
		    }

		    // @see WP_Widget::form
		    function form($instance) {
		        $title = esc_attr($instance['title']);
		        ?>
		            <p>
						<label for="<?php echo $this->get_field_id('title'); ?>">
							<?php _e('Home title:'); ?>
							<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
						</label>
					</p>
		        <?php
		    }

		}
		add_action('widgets_init', create_function('', 'return register_widget("wk_widget_breadcrumb");'));





/***********************************************************************************************
Widgets grid */

		function wk_widgets_grid( $widget_area, $layout ) {

			if( $layout == 'columns') {
				$widgets_container = 'wk-cols';
				$widget_container = 'wk-col';
			} elseif( $layout == 'rows' ) {
				$widgets_container = 'wk-rows';
				$widget_container = 'wk-row';
			}

			?>

			<div class="<?php echo $widgets_container; ?>">

				<?php

				 global $wp_registered_sidebars, $wp_registered_widgets, $wp_widget_factory;

		    		$widgets = wp_get_sidebars_widgets();

				$widget_header_count = count($widgets[$widget_area]);

				$widget_count = 0;

				foreach( $widgets[$widget_area] as $widget ) : ?>

					<?php
						$widget_class 		= get_class($wp_registered_widgets[$widget]["callback"][0]);
						$widget_classname		= $wp_registered_widgets[$widget]['classname'];
						$idbase 		 	= $wp_registered_widgets[$widget]["callback"][0]->id_base;
						$widgetnumber 	 	= $wp_registered_widgets[$widget]["params"][0]["number"];
						$widget_name 	 	= $wp_registered_widgets[$widget]['name'];
						$widget_id 		 	= $wp_registered_widgets[$widget]["id"];
						$widget_settings 		= $wp_registered_widgets[$widget]["callback"][0]->get_settings(); // Get [title] y [text]
						$title 			= $widget_settings[$widgetnumber]["title"];
						$content 		 	= $widget_settings[$widgetnumber]["text"];
						$field			= get_field('wpkit_testfield', 'widget_' . $widgetid );

						$widget_count++;

					?>

					<div class="<?php if( $widget_count == 1 ) { echo $widget_container . '-first '; } echo $widget_container . ' ' . $widget_container . '-' . $widget_header_count . 'e'; ?>">

						<div class="wk-container">

							<div id="<?php echo $widget_area . '-' .$widget_id; ?>" class="<?php echo $widget_classname; ?> wk-widget-area">

								<h3><?php echo $title; ?></h3>

								<?php if( $widget_class == 'WP_Widget_Text') : ?>

									<div class="textwidget"><?php echo $content; ?></div>

								<?php else :

									$args = array(
									    'before_widget' => '<div class="widget %s">',
									    'after_widget' => '</div>',
									    'before_title' => '<h2 class="widget-title">',
									    'after_title' => '</h2>'
									    );
									$instance = array(
									    'title' => $title,
									    'text' => 'Text'
									    );

									the_widget( $widget_class );
									//echo $widget_class;

							 	?>

								<?php endif; ?>

							</div>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

			<?php
		}
