<?php 
/*
*
*  Template name: Authors
* (Usa este template para crear una página de usuarios)
* @package WPKit
* @author ALUMIN
* @version WPKIT 2.0
*/
get_header(); ?>

	<?php 
		$args = array (
			'role'           => '',
			//'include'        => array( 1, 2, 3 ), //ID del usuario
			//'exclude'        => array( 2, 4, 6 ), //ID del usuario
			//'search'         => '', //Keyword dentro de user meta
			//'search_columns' => array( 'id', 'user_login', 'user_nicename', 'user_email', 'user_url' ), //Utiliza solo en las que quieres buscar
			//'number'         => '12', // El número de usuarios a mostrar
			//'offset'         => '6', // Desde que usuario empieza
			//'order'          => 'ASC', // default DESC
			//'orderby'        => 'display_name',
			/*'meta_query'     => array(
				'relation' => 'AND', // Imprime los usuarios con estos valores en "Key"
				array(
					'key'       => '', // meta key
					'value'     => '', 
					'compare'   => '=', // Operadores: !=, >, >=, <, <=, LIKE, NOT LIKE, IN, NOT IN, BETWEEN, NOT BETWEEN, EXIST
					'type'      => 'CHAR', // NUMERIC, BINARY, DATE, CHAR (default), DATETIME, DECIMAL, SIGNED, TIME, UNSIGNED
				),
				array(
					'key'       => '', // meta key
					'value'     => '', 
					'compare'   => '=', // Operadores: !=, >, >=, <, <=, LIKE, NOT LIKE, IN, NOT IN, BETWEEN, NOT BETWEEN, EXIST
					'type'      => 'CHAR', // NUMERIC, BINARY, DATE, CHAR (default), DATETIME, DECIMAL, SIGNED, TIME, UNSIGNED
				),
			),*/
			//'who'            => '',
			//'count_total'    => true,
			//'fields'         => 'all',
		);

		$user_query = new WP_User_Query( $args ); 
		
		if ( ! empty( $user_query->results ) ) : ?>
			<?php foreach ( $user_query->results as $user ) { ?>
				<article>
					<span class="author"><?php echo $user->display_name; ?></span>
					<details>
						<summary>Más información acerca del usuario</summary>
						<span class="author"><a href="http://www.twitter.com/<?php echo $user->twitter; ?>" target="_blank"><?php echo $user->twitter; ?></a></span>
						<span class="author"><a href="http://fb.me/<?php echo $user->facebook; ?>" target="_blank">FB</a></span>
						<span class="author"><a href="http://plus.google.com/+<?php echo $user->gplus; ?>" target="_blank">Google Plus</a></span>
						<?php $date = $user->birthdate_user; 
							$y = substr($date, 0, 4);
							$m = substr($date, 4, 2);
							$d = substr($date, 6, 2); 
							//$time = strtotime("{$d}-{$m}-{$y}"); 
							// echo $y . '/' . $m . '/' . $d; 
							if($date) :
								echo '<time>' . $d . '/';
								switch($m) {
									case '01'; echo 'Ene'; break;
									case '02'; echo 'Feb'; break;
									case '03'; echo 'Mar'; break;
									case '04'; echo 'Abr'; break;
									case '05'; echo 'May'; break;
									case '06'; echo 'Jun'; break;
									case '07'; echo 'Jul'; break;
									case '08'; echo 'Ago'; break;
									case '09'; echo 'Sep'; break;
									case '10'; echo 'Oct'; break;
									case '11'; echo 'Nov'; break;
									case '12'; echo 'Dic'; break;
								}
								 echo '/' . $y . '</time>';
							endif;
						?>
					</details>
				</article>
			<?php } ?>
		<?php else : ?>

			<p>Aún no se han registrado usuarios</p>

		<?php endif; ?>

<?php get_footer(); ?>

