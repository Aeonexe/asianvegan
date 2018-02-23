<?php if( get_option( 'option_private_site' ) ) { if( ! is_user_logged_in() ) { get_template_part( 'wpkit/inc/private-site' ); return true; } } ?>


<?php get_header(); ?>

			<style>

				#wrapper {
				    width: 100%;
				    margin: auto;
				    max-width: 1200px;
				}

				section {
				    margin: 1px 0;
				}
				.wk-widget-area {
				    padding: 22px;
				    background: white;
				}

				aside {
					height: 100%;
				}

				.wk-sidebar {
					background: white;
					margin: 0px 1px;
				}

				.wk-widget-area:not(:last-child) {
				    margin: 0px 1px 0px 0px;
				}

				.wk-widget-area:nth-child(1) {
				    margin: 0 1px 0 0;
				}
				

			</style>

			<?php if( is_active_sidebar( 'wk-widget-absolute-left' ) || is_active_sidebar( 'wk-widget-absolute-right' ) ) : ?>
				<section id="wk-absolute">
					<div class="wk-cols">
						<div class="wk-col">
							<div id="wk-absolute-left">
								<?php if( dynamic_sidebar( 'wk-widget-absolute-left' ) ) : endif; ?>
							</div>
						</div>
						<div class="wk-col">
							<div id="wk-absolute-rigth" class="wk-text-right">
								<?php if( dynamic_sidebar( 'wk-widget-absolute-right' ) ) : endif; ?>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

		    <header id="header" class="okayNav-header">
		        <a style="height: 100%;" id="logo" class="okayNav-header__logo" href="<?php bloginfo( 'url' ); ?>">
		        	<?php if ( get_option('custom_logo') ) : ?>
			           <img width="140" src="<?php echo get_option( 'custom_logo' ); ?>">
			        <?php else : ?>
			        	<img width="140" src="<?php echo get_template_directory_uri(); ?>/wpkit/admin/img/wpkit-logo.svg">
			       <?php endif; ?>
		        </a>
				<?php get_template_part('includes/menu-main'); ?> 		    
		    </header>


		    <?php if( is_active_sidebar( 'wk-widget-header' ) ) : ?>
				<section id="wk-header">
					<div class="wk-cols">
						<?php dynamic_sidebar( 'wk-widget-header' ); ?>
					</div>
				</section>
			<?php endif; ?>

			<?php if( is_active_sidebar( 'wk-widget-top-first' ) ) : ?>
				<section id="wk-top-first">
					<div class="wk-cols">
						<?php dynamic_sidebar( 'wk-widget-top-first' ); ?>
					</div>
				</section>
			<?php endif; ?>

			<?php if( is_active_sidebar( 'wk-widget-top-secondary' ) ) : ?>
				<section id="wk-top-secondary">
					<div class="wk-cols">
						<?php dynamic_sidebar( 'wk-widget-top-secondary' ); ?>
					</div>
				</section>
			<?php endif; ?>

				<section id="wk-inner">
					
					<div class="wk-cols">
						
						<div class="wk-col wk-sidebar">
							
							<section id="wk-inner-sidebar-main">
								<?php if( is_active_sidebar( 'wk-widget-sidebar-main' ) ) : ?>
									<aside id="wk-sidebar-main" class="wk-col">
										<?php dynamic_sidebar( 'wk-widget-sidebar-main' ); ?>
									</aside>
								<?php endif; ?>
							</section>
							
						</div>

						<div class="wk-col">
							
							<section id="wk-inner-main">

								<main role="main">

									<?php if( is_active_sidebar( 'wk-widget-inner-top' ) ) : ?>
										<div id="wk-inner-top">
											<?php dynamic_sidebar( 'wk-widget-inner-top' ); ?>
										</div>
									<?php endif; ?>

									<div class="slider js-flickity" data-flickity-options='{ "wrapAround": true, "setGallerySize": true, "lazyLoad": 1 }'>
										<img class="slider-cell-image" data-flickity-lazyload="<?php echo get_template_directory_uri(); ?>/wpkit/img/generic-thumb.jpg" alt="Generic"  />
										<img class="slider-cell-image" data-flickity-lazyload="<?php echo get_template_directory_uri(); ?>/wpkit/img/generic-thumb.jpg" alt="Generic"  />
										<img class="slider-cell-image" data-flickity-lazyload="<?php echo get_template_directory_uri(); ?>/wpkit/img/generic-thumb.jpg" alt="Generic"  />
										<img class="slider-cell-image" data-flickity-lazyload="<?php echo get_template_directory_uri(); ?>/wpkit/img/generic-thumb.jpg" alt="Generic"  />
										<img class="slider-cell-image" data-flickity-lazyload="<?php echo get_template_directory_uri(); ?>/wpkit/img/generic-thumb.jpg" alt="Generic"  />
										<img class="slider-cell-image" data-flickity-lazyload="<?php echo get_template_directory_uri(); ?>/wpkit/img/generic-thumb.jpg" alt="Generic"  />
										<img class="slider-cell-image" data-flickity-lazyload="<?php echo get_template_directory_uri(); ?>/wpkit/img/generic-thumb.jpg" alt="Generic"  />
									</div>
										
									<?php if( is_active_sidebar( 'wk-widget-inner-bottom' ) ) : ?>
										<div id="wk-inner-bottom">
											<?php dynamic_sidebar( 'wk-widget-inner-bottom' ); ?>
										</div>
									<?php endif; ?>

								</main>

							</section>

						</div>

						<div class="wk-col wk-sidebar">
							
							<section id="wk-inner-sidebar-secondary" class="wk-sidebar">
								<?php if( is_active_sidebar( 'wk-widget-sidebar-secondary' ) ) : ?>
									<aside id="wk-sidebar-secondary">
										<?php dynamic_sidebar( 'wk-widget-sidebar-secondary' ); ?>
									</aside>
								<?php endif; ?>
							</section>

						</div>

					</div>

				</section><!--#wk-inner-->			


			<?php if( is_active_sidebar( 'wk-widget-bottom-first' ) ) : ?>
				<div class="wk-cols">
					<section id="wk-bottom-first">
						<?php dynamic_sidebar( 'wk-widget-bottom-first' ); ?>
					</section>
				</div>
			<?php endif; ?>

			<?php if( is_active_sidebar( 'wk-widget-bottom-secondary' ) ) : ?>
				<div class="wk-cols">
					<section id="wk-bottom-secondary">
						<?php dynamic_sidebar( 'wk-widget-bottom-secondary' ); ?>
					</section>					
				</div>
			<?php endif; ?>

			<footer>

				<?php if( is_active_sidebar( 'wk-widget-footer-bar-left' ) || is_active_sidebar( 'wk-widget-footer-bar-right' ) ) : ?>
					<section id="wk-footer-bar">
						<div class="wk-cols">
							<div class="wk-col">
								<section id="wk-footer-bar-left" class="wk-footer-bar-widget-area">
									<?php if( dynamic_sidebar( 'wk-widget-footer-bar-left' ) ) : endif; ?>
								</section>
							</div>
							<div class="wk-col">
								<section id="wk-footer-bar-rigth" class="wk-footer-bar-widget-area">
									<?php if( dynamic_sidebar( 'wk-widget-footer-bar-right' ) ) : endif; ?>
								</section>
							</div>
						</div>
					</section>
				<?php endif; ?>

				<?php if( is_active_sidebar( 'wk-widget-footer' ) ) : ?>
					<div class="wk-cols">
						<section id="wk-footer">
							<?php dynamic_sidebar( 'wk-widget-footer' ); ?>
							<div class="wk-widget-area wk-text-center"><?php echo date('Y'); ?> Alumin.Agency Powered by <strong>WPKit</strong> framework</div>
						</section>
					</div>
				<?php endif; ?>

			</footer>
		</div><!--wrapper-->
			
	</body>

<?php get_footer(); ?>
