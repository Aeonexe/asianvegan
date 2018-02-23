<?php
/**
*
* Este código está insertado en wp-admin/menu-header.php
* Inserción vía <?php include(ABSPATH . 'wp-content/themes/WPKit/includes/user-deck.php'); ? >
* Empieza el user deck
*
*
* @package WPKit Dash
* @author Alumin
* @version  1.0
*/




	global $current_user;
	$current_user = wp_get_current_user();
	get_currentuserinfo();

	 	?>

	 	<li class="wk-not-menu-item" id="usersidedeckwrap" >

			<a id="wk-menu-edit-profile" title="Profile settings" href="<?php echo get_edit_user_link(); ?>"><span class="dashicons-before dashicons-admin-generic icon"></span></a>

			<section id="wk-menu-user-dashboard">

	 			<span class="avatar-container" id="wk-menu-user-avatar">

					<?php $wk_avatar = get_field('wk_custom_avatar', 'user_' . $current_user->ID ); ?>

					<?php

						if( $wk_avatar ) :

                    		// ACF custom avatar

							$current_screen = get_current_screen();

							if( $current_screen->id == 'acf-field-group' || $current_screen->id == 'custom-fields_page_acf-settings-tools' ) {

								$wk_avatar = wp_get_attachment_image_src( $wk_avatar, 'thumbnail' );

                           		echo '<span class="avatar" id="wk-menu-user-avatar" style="background-image: url( ' . $wk_avatar[0] . ' );"></span>';

                           	} else {

                           		echo '<span class="avatar" style="background-image: url(' . $wk_avatar['sizes']['thumbnail'] . ')"></span>';

                           	}


						else :

							echo get_avatar( $current_user->ID, 64 );
							
						endif;

              		?>

				</span>

	 			<div id="wk-menu-user-meta">
					<?php
					$greet = array( 'Hello!', 'Hi!', 'Howdy', 'Hallo', '¡Hola!', '¡Qué tal!' );
					$random = rand(0, 6);
					?>
	 				<span id="wk-greet"><?php echo $greet[$random]; ?></span>
	 				<span id="wk-display-name"><?php echo $current_user->display_name; ?></span>
	 				<span id="wk-role">
						<?php $user = new WP_User( $current_user->ID );
	 					if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
	 						foreach ( $user->roles as $role )
	 							echo $role;
	 					}
	 				?></span>
	 			</div>
	 		</section>

	 		<!--<section class="at-search">
	 			<?php //echo get_search_form( 'true' ); ?>
	 		</section>-->

	 			<table id="wk-today" style="clear: both;">
					<?php if ( ! get_option('wk_posts_by_you') ) : ?>
		 				<tr>
		 					<td>Hoy</td>
		 					<td><?php echo date( 'D n' ); ?></td>
		 				</tr>

		 				<tr>
		 					<td>Your posts: <span><?php echo count_user_posts( $current_user->ID ); ?></span></td>
		 					<td style="text-align: right">All posts: <span><?php $published_posts = wp_count_posts()->publish; echo $published_posts; ?></span></td>
		 				</tr>
					<?php endif; ?>
	 			</table>

			<!--<span id="wk-logout-link"><?php wp_loginout(); ?></span>-->

	 	</li>


	 	<?php /*

	    echo '<div id="user-side-deck-container" class="">';
	    echo '<adress id="user-side-deck"  class="side-deck">';
 	    echo  get_avatar( $current_user->ID, 64 );
	    echo '<div id="user-side-deck-u">';
	    echo '<span class="greet">Hola</span><br /><span class="display-name-u"> ' . $current_user->display_name . '</span><br />';
	    //echo 'Username: ' . $current_user->user_login . '<br />';
	    echo '<span class="email">' . $current_user->user_email . ' </span>';

	    //echo 'User first name: ' . $current_user->user_firstname . '<br />';
	    //echo 'User last name: ' . $current_user->user_lastname . '<br />';
	    echo 'User ID: ' . $current_user->ID . '<br />';
	    echo '</div>';
	    echo '</adress>';
	    echo '<div class="side-deck side-deck-text feather-icon"><span>NAVIGATE</span></div>';
	    echo date(get_option('date_format')) . '<br />';

		?>
		<span>Posts by:</span>
		<p><?php echo 'You: ' . count_user_posts( $current_user->ID ); ?></p>
		<?php
		echo 'Everyone: ' . count_user_posts(  );
	    echo '</div>';

	// Termina user deck*/


?>
