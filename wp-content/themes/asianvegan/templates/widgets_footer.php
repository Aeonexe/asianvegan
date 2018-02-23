<?php
/**
*
*  Página Single
*
* @package WPKit
* @author ALUMIN
* @copyright Copyright (C) Alumin.Agency
* @version WPKIT 3.0
*/ ?>


                        <?php if( is_active_sidebar( 'wk-widget-inner-bottom' ) ) : ?>
                            <div id="wk-inner-bottom">

                                <?php wk_widgets_grid('wk-widget-inner-bottom', 'columns'); ?>

                            </div>
                        <?php endif; ?>

                    </main>

                </div>

                <?php if( get_option( 'wk_option_layouts_sidebar_a_show' ) == 1 ) : ?>

                    <?php if( get_option( 'wk_option_layouts_sidebar_a_position' ) == 'right' ) : ?>

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

                    <?php if( get_option( 'wk_option_layouts_sidebar_b_position' ) == 'right' ) : ?>

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

            </div>

        </section>

    <?php if( is_active_sidebar( 'wk-widget-bottom-first' ) ) : ?>
        <section id="wk-bottom-first">

            <?php wk_widgets_grid('wk-widget-bottom-first', 'columns'); ?>

        </section>
    <?php endif; ?>

    <?php if( is_active_sidebar( 'wk-widget-bottom-secondary' ) ) : ?>
        <section id="wk-bottom-secondary">

            <?php wk_widgets_grid('wk-widget-bottom-secondary', 'columns'); ?>

        </section>
    <?php endif; ?>

    <footer>

        <?php if( is_active_sidebar( 'wk-widget-footer-bar-left' ) || is_active_sidebar( 'wk-widget-footer-bar-right' ) ) : ?>
            <section id="wk-footer-bar">
                <div class="wk-cols">
                    <div class="wk-col wk-col-2e">

                        <?php wk_widgets_grid('wk-widget-footer-bar-left', 'columns'); ?>

                    </div>
                    <div class="wk-col wk-col-2e">

                        <?php wk_widgets_grid('wk-widget-footer-bar-right', 'columns'); ?>

                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if( is_active_sidebar( 'wk-widget-footer' ) ) : ?>
            <section id="wk-footer">

                <?php wk_widgets_grid('wk-widget-footer', 'columns'); ?>

                <div class="wk-rows">
                    <div class="wk-row">
                        <div class="wk-widget-area wk-text-center">
                            <div class="wk-container">
                                <?php echo date('Y'); ?> Alumin.Agency Powered by <strong>WPKit</strong> framework
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        <?php endif; ?>

    </footer>

</div><!--cols-setup-wrapper-->
