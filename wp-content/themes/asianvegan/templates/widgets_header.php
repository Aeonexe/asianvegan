<?php
/**
*
*  Página Single
*
* @package WPKit
* @author ALUMIN
* @copyright Copyright (C) Alumin.Agency
* @version WPKIT 3.0
*/

	global $wp_registered_sidebars, $wp_registered_widgets, $wp_widget_factory; $widgets = wp_get_sidebars_widgets(); ?>

    <div id="cols-setup-wrapper" class="wk-cols-8">

        <?php if( is_active_sidebar( 'wk-widget-absolute-left' ) || is_active_sidebar( 'wk-widget-absolute-right' ) ) : ?>
            <section id="wk-absolute" class="wk-d">
                <div class="wk-cols">
                    <div class="wk-col wk-col-4">
                        <?php if( is_active_sidebar( 'wk-widget-absolute-left' ) ) : ?>
                            <div class="wk-container">
                                <?php dynamic_sidebar( 'wk-widget-absolute-left' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="wk-col wk-col-4">
                        <?php if( is_active_sidebar( 'wk-widget-absolute-right' ) ) : ?>
                            <div class="wk-container">
                                <?php dynamic_sidebar( 'wk-widget-absolute-right' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php get_template_part( 'wpkit/systems/layouts/parts/menu-responsive' ); ?>

        <?php if( is_active_sidebar( 'wk-widget-header' ) ) : ?>
            <section id="wk-header">

                <?php wk_widgets_grid('wk-widget-header', 'columns'); ?>
                <?php //dynamic_sidebar('wk-widget-header'); ?>
                <?php

                    //      print_r(wp_get_nav_menus());
                    //      $menus = wp_get_nav_menus();
                    //      foreach ( $menus as $menu ) :
                    //          $menu_name = $menu->name;
                    //      endforeach;
                    //      $instance = array(
                    //          'nav_menu' => 'Menú footer'
                    //              );
                    //      the_widget( 'WP_Nav_Menu_Widget', $instance );
                    //      https://core.trac.wordpress.org/browser/tags/4.7/src/wp-includes/widgets/class-wp-nav-menu-widget.php#L17
                ?>

            </section>
        <?php endif; ?>

        <?php if( is_active_sidebar( 'wk-widget-top-first' ) ) : ?>
            <section id="wk-top-first">
                <?php wk_widgets_grid('wk-widget-top-first', 'columns'); ?>
            </section>
        <?php endif; ?>

        <?php if( is_active_sidebar( 'wk-widget-top-secondary' ) ) : ?>
            <section id="wk-top-secondary">
                <?php wk_widgets_grid('wk-widget-top-secondary', 'columns'); ?>
            </section>
        <?php endif; ?>

            <section id="wk-inner">
                <div class="wk-cols">
                    <?php if( get_option( 'wk_option_layouts_sidebar_a_show' ) == 1 ) : ?>

                        <?php if( get_option( 'wk_option_layouts_sidebar_a_position' ) == 'left' ) : ?>

                            <div class="wk-col wk-col-2">

                                <section id="wk-inner-sidebar-main">
                                    <?php if( is_active_sidebar( 'wk-widget-sidebar-main' ) ) : ?>
                                        <aside id="wk-sidebar-main" class="wk-col">

                                            <?php wk_widgets_grid('wk-widget-sidebar-main', 'rows'); ?>

                                        </aside>
                                    <?php endif; ?>
                                </section>

                            </div>

                        <?php endif; ?>

                    <?php endif; ?>

                    <?php if( get_option( 'wk_option_layouts_sidebar_b_show' ) == 1 ) : ?>

                        <?php if( get_option( 'wk_option_layouts_sidebar_b_position' ) == 'left' ) : ?>

                            <div class="wk-col wk-col-2">

                                <section id="wk-inner-sidebar-secondary">
                                    <?php if( is_active_sidebar( 'wk-widget-sidebar-secondary' ) ) : ?>
                                        <aside id="wk-sidebar-secondary">

                                            <?php wk_widgets_grid('wk-widget-sidebar-secondary', 'rows'); ?>

                                        </aside>
                                    <?php endif; ?>
                                </section>

                            </div>

                        <?php endif; ?>

                    <?php endif; ?>

                    <?php

                        if( get_option( 'wk_option_layouts_sidebar_a_show' ) and get_option( 'wk_option_layouts_sidebar_b_show' ) ) :
                            $main_col_width = 'wk-col-4';
                        elseif( get_option( 'wk_option_layouts_sidebar_a_show' ) xor get_option( 'wk_option_layouts_sidebar_b_show' ) ) :
                            $main_col_width = 'wk-col-6';
                        else :
                            $main_col_width = '';
                        endif;

                    ?>

                    <div class="wk-col <?php echo $main_col_width; ?>">

                        <main role="main">

                            <?php if( is_active_sidebar( 'wk-widget-inner-top' ) ) : ?>
                                <div id="wk-inner-top">

                                    <?php wk_widgets_grid('wk-widget-inner-top', 'columns'); ?>

                                </div>
                            <?php endif; ?>



                               
