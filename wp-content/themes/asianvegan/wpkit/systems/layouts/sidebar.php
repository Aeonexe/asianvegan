<?php 
/*
*
*  Es el template general para crear nuevas páginas.
*
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
?>

	<?php if( is_active_sidebar('widgetized-aside') ) : ?>

		<aside>
			<ul class="widget-list">
				<?php if ( dynamic_sidebar('widgetized-aside') ) : endif; ?> 
			</ul>
		</aside>

	<?php endif; ?>