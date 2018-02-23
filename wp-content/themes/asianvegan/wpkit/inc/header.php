<?php //info ?>
	<meta charset="<?php bloginfo('charset'); ?>">

<?php //site info ?>
	<?php
		// Título
		if( is_single() || is_page() ) :
			if( get_post_meta( $post->ID, 'seo_titulo-seo', true) ) :
				$title = get_post_meta( $post->ID, 'seo_titulo-seo', true) . ' | ' . get_bloginfo( 'name' );
			else :
				$title = get_the_title() . ' | ' . get_bloginfo( 'name' );
			endif;
		elseif( is_author() ) :
			$title = 'Publicaciones de ' . get_the_author() . ' en ' . get_bloginfo( 'name' );
		elseif( is_archive() ) :
			if( is_category() ) :
				$title = single_cat_title( "", false ) . ' | ' . get_bloginfo('name');
			elseif( is_tag() ) :
				$title = single_tag_title( "", false ) . ' | ' . get_bloginfo('name');
			elseif( is_day() ) :
				$title = 'Archivo del día ' . get_the_time('l, F j, Y') . ' | ' . get_bloginfo('name');
			elseif( is_month() ) :
				$title = 'Archivo del mes de ' . get_the_time('F Y') . ' | ' . get_bloginfo('name');
			elseif( is_year() ) :
				$title = 'Archivo del año ' . get_the_time('Y') . ' | ' . get_bloginfo('name');
			else :
				$title = get_the_title() . ' | ' . get_bloginfo('name');
			endif;
		else :
			$title = get_bloginfo( 'name' );
		endif;
	?>
	<title><?php echo $title; ?></title>
	<?php
		// Descripción
		if( is_front_page() ) :
			$description = get_bloginfo( 'description' );
		elseif( is_page() ) :
			if( get_post_meta( $post->ID, 'seo_descripcion-seo', true) ) :
				$description = get_post_meta( $post->ID, 'seo_descripcion-seo', true);
			else :
				$description = get_bloginfo( 'description' );
			endif;
		elseif( is_single() ) :
			if( get_post_meta( $post->ID, 'seo_descripcion-seo', true) ) :
				$description = get_post_meta( $post->ID, 'seo_descripcion-seo', true);
			elseif( get_the_excerpt() ) :
				$description = get_the_excerpt();
			else :
				$description = get_bloginfo( 'description' );
			endif;
		elseif( is_author() ) :
			$author_description = get_the_author_meta( 'description' );
			if( $author_description ) :
				$description = $author_description;
			else :
				$description = get_bloginfo( 'description' );
			endif;
		elseif( is_archive() ) :
			if( is_category() ) :
				remove_filter('term_description','wpautop');
				$category_description = category_description();
				if( $category_description ) :
					$description = $category_description;
				else :
					$description = get_bloginfo( 'description' );
				endif;
			elseif( is_tag() ) :
				remove_filter('term_description','wpautop');
				$tag_description = tag_description();
				if( $tag_description ) :
					$description = $tag_description;
				else :
					$description = get_bloginfo( 'description' );
				endif;
			elseif( is_day() ) :
				$description = 'Archivo del día ' . get_the_time('l, F j, Y') . ' | ' . get_bloginfo('name');
			elseif( is_month() ) :
				$description = 'Archivo del mes de ' . get_the_time('F Y') . ' | ' . get_bloginfo('name');
			elseif( is_year() ) :
				$description = 'Archivo del año ' . get_the_time('Y') . ' | ' . get_bloginfo('name');
			else :
				$description = get_the_title() . ' | ' . get_bloginfo('name');
			endif;
		else :
			$description = get_bloginfo( 'description' );
		endif;
	?>
	<meta name="description" content="<?php echo $description; ?>">
	<?php if( is_single() ) : ?>
		<meta name="keywords" content="<?php echo strip_tags(get_the_tag_list('',', ','')); ?>">
	<?php endif; ?>
<?php //content info ?>
	<meta name="author" content="<?php if( is_front_page() || is_archive() ) : ?><?php bloginfo('name'); ?><?php else : ?><?php $current_user = wp_get_current_user(); echo get_author_posts_url( $current_user->ID ); ?><?php endif; ?>">
	<meta name="author" content="<?php if( is_front_page() || is_archive() ) : ?><?php bloginfo('name'); ?><?php else : ?><?php the_author_meta('display_name', 1); ?><?php endif; ?>">
	<meta name="creation_date" content="<?php echo get_post_time('l, F jS, Y, g:i a') ?>">
	<meta name="revised" content="<?php echo get_the_modified_time('l, F jS, Y, g:i a') ?>">

<?php //development info ?>
	<meta name="template" content="WPKit Framework">
	<meta name="version" content="<?php $theme = wp_get_theme(); echo $theme->version; ?>">

<?php //Mobile ?>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="<?php if( get_option('option_mobile_callback') ) : echo get_option('option_mobile_callback'); ?><?php else : ?>756<?php endif; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo get_option( 'wk_option_theme_color' ); ?>">
	<meta name="format-detection" content="telephone=no">

<?php //Icons ?>
	<link rel="apple-touch-icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png">
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/apple-startup.png">
	<?php if( get_option( 'option_favicon' ) ) : ?>
		<link rel="icon" type="image/ico" href="<?php echo get_option( 'option_favicon' ); ?>">
	<?php else : ?>
		<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
	<?php endif; ?>

	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.png">
	<?php if( get_option( 'wk_option_theme_icon' ) ) : ?>
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_option( 'wk_option_theme_icon' ); ?>">
	<?php endif; ?>
	<meta name="msapplication-TileColor" content="<?php echo get_option( 'wk_option_theme_color' ); ?>">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img//ms-app-icon.png">
	<?php if( get_option( 'wk_option_theme_color' ) ) : ?>
		<meta name="theme-color" content="<?php echo get_option( 'wk_option_theme_color' ); ?>">
	<?php endif; ?>

<?php //Links ?>
	<meta name="url" content="<?php bloginfo('url'); ?>">
	<meta name="identifier-URL" content="<?php bloginfo('url'); ?>">
	<link rel="shortlink" href="<?php if( is_home() ) : bloginfo('url'); else : echo wp_get_shortlink(); endif; ?>">
	<link rel="canonical" href="<?php if( is_front_page() ) : ?><?php bloginfo('url'); ?><?php else : ?><?php echo get_permalink(); ?><?php endif; ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" rel="alternate" type="application/rss+xml">
	<?php global $paged;
		if ( get_previous_posts_link() ) : ?>
		<link rel="prev" href="<?php echo get_pagenum_link( $paged - 1 ); ?>">
	<?php endif; ?>
	<?php if ( get_next_posts_link() ) : ?>
		<link rel="next" href="<?php echo get_pagenum_link( $paged +1 ); ?>">
	<?php endif; ?>

<?php if( get_option( 'option_schema_org' ) ) : ?>
<?php //Schema ?>
	<?php
		// Schema Título
		if( is_front_page() ) :
			if( get_option( 'option_schema_name' ) ) :
				$schema_name = get_option( 'option_schema_name' ) . ' | ' . get_bloginfo('name');
			else :
				$schema_name = get_bloginfo('name');
			endif;
		elseif( is_single() || is_page() ) :
			if( get_post_meta( $post->ID, 'seo_titulo-schema', true) ) :
				$schema_name = get_post_meta( $post->ID, 'seo_titulo-schema', true) . ' | ' . get_bloginfo('name');
			else :
				$schema_name = get_the_title() . ' | ' . get_bloginfo('name');
			endif;
		elseif( is_author() ) :
			$schema_name = get_the_author();
		elseif( is_archive() ) :
			if( is_category() ) :
				$schema_name = single_cat_title( "", false ) . ' | ' . get_bloginfo('name');
			elseif( is_tag() ) :
				$schema_name = single_tag_title( "", false ) . ' | ' . get_bloginfo('name');
			elseif( is_author() ) : global $post; $author_id = $post->post_author;
				$schema_name = the_author_meta('display_name', $author_id) . ' | ' . get_bloginfo('name');
			elseif( is_day() ) :
				$schema_name = 'Archivo del día ' . get_the_time('l, F j, Y') . ' | ' . get_bloginfo('name');
			elseif( is_month() ) :
				$schema_name = 'Archivo del mes de ' . get_the_time('F Y') . ' | ' . get_bloginfo('name');
			elseif( is_year() ) :
				$schema_name = 'Archivo del año ' . get_the_time('Y') . ' | ' . get_bloginfo('name');
			else :
				$schema_name = get_the_title() . ' | ' . get_bloginfo('name');
			endif;
		else :
			$schema_name = get_bloginfo('name');
		endif;
	?>
	<meta itemprop="name" content="<?php echo $schema_name; ?>">
	<?php
		// Schema Descripción
		if( is_front_page() ) :
			if( get_option( 'option_schema_description' ) ) :
				$schema_description = get_option( 'option_schema_description' );
			else :
				$schema_description = get_bloginfo( 'description' );
			endif;
		elseif( is_page() ) :
			if( get_post_meta( $post->ID, 'seo_descripcion-schema', true) ) :
				$schema_description = get_post_meta( $post->ID, 'seo_descripcion-schema', true);
			else :
				$schema_description = get_bloginfo( 'description' );
			endif;
		elseif( is_single() ) :
			if( get_post_meta( $post->ID, 'seo_descripcion-schema', true) ) :
				$schema_description = get_post_meta( $post->ID, 'seo_descripcion-schema', true);
			elseif( get_the_excerpt() ) :
				$schema_description = get_the_excerpt();
			else :
				$schema_description = get_bloginfo( 'description' );
			endif;
		elseif( is_author() ) :
			$author_description = get_the_author_meta( 'description' );
			if( $author_description ) :
				$schema_description = $author_description;
			else :
				$schema_description = get_bloginfo( 'description' );
			endif;
		elseif( is_archive() ) :
			if( is_category() ) :
				remove_filter('term_description','wpautop');
				$category_description = category_description();
				if( $category_description ) :
					$schema_description = $category_description;
				else :
					$schema_description = get_bloginfo( 'description' );
				endif;
			elseif( is_tag() ) :
				remove_filter('term_description','wpautop');
				$tag_description = tag_description();
				if( $tag_description ) :
					$schema_description = $tag_description;
				else :
					$schema_description = get_bloginfo( 'description' );
				endif;
			else :
				$schema_description = get_bloginfo('description');
			endif;
		else :
			$schema_description = get_bloginfo( 'description' );
		endif;
	?>
	<meta itemprop="description" content="<?php echo $schema_description; ?>">

	<?php
		// Shcema Image
		if( is_single() or is_page() or is_front_page() ) :
			if( get_post_meta( $post->ID, 'seo_imagen-schema', true) ) :
				$schema_image = get_post_meta( $post->ID, 'seo_imagen-schema', true);
			elseif( get_option( 'option_schema_image' ) ) :
				$schema_image = get_option( 'option_schema_image' );
			elseif( has_post_thumbnail() ) :
				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
				$schema_image = $attachment_url[0];
			endif;
		elseif( is_attachment() ) :
			$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			$schema_image = $attachment_url[0];
		else:
			if( get_option( 'option_schema_image' ) ) :
				$schema_image = get_option( 'option_schema_image' );
			else :
				$schema_image = get_option('wk_custom_logo_main');
			endif;
		endif;
	?>

		<meta itemprop="image" content="<?php echo $schema_image; ?>">

<?php endif; ?>

		<?php //Social ?>
		<?php global $post; $author_id = $post->post_author; ?>
		<?php if( is_front_page() && get_option('option_google_profile') ) : ?>
			<?php // Google ?>
		<link rel="me" type="text/html" href="<?php echo get_option('option_google_profile'); ?>">
		<?php elseif( ! is_front_page() && get_the_author_meta( 'gplus', $author_id ) ) : ?>
			<link rel="me" type="text/html" href="http://plus.google.com/+<?php the_author_meta( 'gplus', $author_id ); ?>">
		<?php endif; ?>
	<?php if( get_option( 'option_open_graph' ) ) : ?>
		<?php // Facebook ?>
		<?php if( get_option('option_facebook_id') ) : ?>
			<meta name="fb:page_id" content="<?php echo get_option('option_facebook_id'); ?>">
		<?php endif; ?>
		<meta property="og:url" content="<?php if( is_front_page() ) : ?><?php bloginfo('url'); ?><?php else : ?><?php echo get_permalink(); ?><?php endif; ?>">
		<?php
			if( is_front_page() ) :
				if( get_option( 'option_facebook_title' ) ) :
					$facebook_title = get_option( 'option_facebook_title' );
				else :
					$facebook_title = bloginfo( 'name' );
				endif;
			elseif( is_single() || is_page() ) :
				if( get_post_meta( $post->ID, 'seo_titulo-facebook', true) ) :
					$facebook_title = get_post_meta( $post->ID, 'seo_titulo-facebook', true);
				else :
					$facebook_title = get_the_title($post->ID);
				endif;
			elseif( is_author() ) :
				$facebook_title = get_the_author();
			elseif( is_archive() ) :
				if( is_category() ) :
					$facebook_title = single_cat_title( "", false ) . ' | ' . get_bloginfo('name');
				elseif( is_tag() ) :
					$facebook_title = single_tag_title( "", false ) . ' | ' . get_bloginfo('name');
				elseif( is_author() ) : global $post; $author_id = $post->post_author;
					$facebook_title = the_author_meta('display_name', $author_id) . ' | ' . get_bloginfo('name');
				elseif( is_day() ) :
					$facebook_title = 'Archivo del día ' . get_the_time('l, F j, Y') . ' | ' . get_bloginfo('name');
				elseif( is_month() ) :
					$facebook_title = 'Archivo del mes de ' . get_the_time('F Y') . ' | ' . get_bloginfo('name');
				elseif( is_year() ) :
					$facebook_title = 'Archivo del año ' . get_the_time('Y') . ' | ' . get_bloginfo('name');
				else :
					$facebook_title = get_the_title() . ' | ' . get_bloginfo('name');
				endif;
			else :
				$facebook_title = get_bloginfo('name');
			endif;
		?>
		<meta property="og:title" content="<?php echo $facebook_title; ?>">

		<?php
			if( is_front_page() ) :
				if( get_option( 'option_facebook_description' ) ) :
					$facebook_description = get_option( 'option_facebook_description' );
				else :
					$facebook_description = bloginfo( 'description' );
				endif;
			elseif( is_single() || is_page() ) :
				if( get_post_meta( $post->ID, 'seo_descripcion-facebook', true) ) :
					$facebook_description = get_post_meta( $post->ID, 'seo_descripcion-facebook', true);
				elseif( get_the_excerpt() ) :
					$facebook_description = get_the_excerpt();
				else :
					$facebook_description = bloginfo( 'description' );
				endif;
			elseif( is_author() ) :
				$author_description = get_the_author_meta( 'description' );
				if( $author_description ) :
					$schema_description = $author_description;
				else :
					$schema_description = get_bloginfo( 'description' );
				endif;
			elseif( is_archive() ) :
				if( is_category() ) :
					remove_filter('term_description','wpautop');
					$category_description = category_description();
					if( $category_description ) :
						$schema_description = $category_description;
					else :
						$schema_description = get_bloginfo( 'description' );
					endif;
				elseif( is_tag() ) :
					remove_filter('term_description','wpautop');
					$tag_description = tag_description();
					if( $tag_description ) :
						$schema_description = $tag_description;
					else :
						$schema_description = get_bloginfo( 'description' );
					endif;
				else :
					$schema_description = get_bloginfo('description');
				endif;
			else :
				$schema_description = get_bloginfo( 'description' );
			endif;
		?>
		<meta property="og:description" content="<?php echo $facebook_description; ?>">
		<meta property="og:locale" content="<?php bloginfo('language'); ?>">
		<meta property="og:type" content="<?php if ( is_front_page() ) : ?>website<?php else : ?>article<?php endif; ?>">
		<?php
			// Facebook Image
			if( is_front_page() ) :
				if( get_option( 'option_facebook_site_image' ) ) :
					$facebook_image = get_option( 'option_facebook_site_image' );
				elseif( has_post_thumbnail() ) :
					$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
					$facebook_image = $attachment_url[0];
				endif;
			elseif( is_single() or is_page() ) :
				if( get_post_meta( $post->ID, 'seo_imagen-facebook', true) ) :
					$facebook_image = get_post_meta( $post->ID, 'seo_imagen-facebook', true);
				elseif( has_post_thumbnail() ) :
					$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
					$facebook_image = $attachment_url[0];
				endif;
			elseif( is_attachment() ) :
				$attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
				$facebook_image = $attachment_url[0];
			else:
				if( get_option( 'option_facebook_site_image' ) ) :
					$facebook_image = get_option( 'option_facebook_site_image' );
				else :
					$facebook_image = get_option('wk_custom_logo_main');
				endif;
			endif;
		?>
		<meta property="og:image" content="<?php echo $facebook_image; ?>">
		<meta property="og:site_name" content="<?php if( get_option( 'option_facebook_site_name' ) ) : echo get_option( 'option_facebook_site_name' ); else : bloginfo('name'); endif; ?>">
		<meta name="og:region" content="MX">
		<meta name="og:country-name" content="Mexico">
		<?php if( is_single() || is_attachment() ) : ?>
			<?php if( get_option( 'option_facebook_author' ) or get_the_author_meta('facebook', $author_id ) ) : ?>
					<?php if( get_option( 'option_facebook_author_global' ) == 1 ) : ?>
						<?php if( get_option( 'option_facebook_author' ) ) : ?>
							<meta name="article:author" content="<?php echo get_option( 'option_facebook_author' ); ?>">
						<?php else : ?>
							<meta name="article:author" content="http://www.facebook.com/<?php the_author_meta( 'facebook', $author_id ); ?>">
						<?php endif; ?>
					<?php else : ?>
						<?php if( get_the_author_meta('facebook', $author_id ) ) : ?>
							<meta name="article:author" content="http://www.facebook.com/<?php the_author_meta( 'facebook', $author_id ); ?>">
						<?php else : ?>
							<meta name="article:author" content="<?php echo get_option( 'option_facebook_author' ); ?>">
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php else : ?>
				<?php if( get_option( 'option_facebook_author' ) ) : ?>
					<meta name="article:author" content="<?php echo get_option( 'option_facebook_author' ); ?>">
				<?php endif; ?>
			<?php endif; ?>
		<meta property="article:published_time" content="<?php echo get_post_time('c') ?>">
		<meta property="article:modified_time" content="<?php echo get_the_modified_time('c') ?>">
	<?php endif; ?>
	<?php if( get_option( 'option_twitter_cards' ) ) : ?>
		<!-- Twitter -->
		<?php
			if( is_front_page() ) :
				if( get_option( 'option_twitter_type' ) ) :
					if( get_option( 'option_twitter_type') == 1 ) :
						$twitter_card_type = 'summary_large_image';
					elseif( get_option( 'option_twitter_type' ) == 2 ) :
						$twitter_card_type = 'summary';
					elseif( get_option( 'option_twitter_type') == 3 ) :
						$twitter_card_type = 'app';
					elseif( get_option( 'option_twitter_type') == 4 ) :
						$twitter_card_type = 'player';
					endif;
				else :
					$twitter_card_type = 'summary_large_image';
				endif;
			elseif( is_single() || is_page() ) :
				if( get_post_meta( $post->ID, 'seo_tipo-twitter-card', true) ) :
					if( get_post_meta( $post->ID, 'seo_tipo-twitter-card', true) == 'global' ) :
						if( get_option( 'option_twitter_type') == 1 ) :
							$twitter_card_type = 'summary_large_image';
							elseif( get_option( 'option_twitter_type' ) == 2 ) :
								$twitter_card_type = 'summary';
								elseif( get_option( 'option_twitter_type') == 3 ) :
									$twitter_card_type = 'app';
									elseif( get_option( 'option_twitter_type') == 4 ) :
										$twitter_card_type = 'player';
									endif;
					else :
						$twitter_card_type = get_post_meta( $post->ID, 'seo_tipo-twitter-card', true);
					endif;
				elseif( get_option( 'option_twitter_type' ) ) :
					if( get_option( 'option_twitter_type') == 1 ) :
						$twitter_card_type = 'summary_large_image';
					elseif( get_option( 'option_twitter_type' ) == 2 ) :
						$twitter_card_type = 'summary';
					elseif( get_option( 'option_twitter_type') == 3 ) :
						$twitter_card_type = 'app';
					elseif( get_option( 'option_twitter_type') == 4 ) :
						$twitter_card_type = 'player';
					endif;
				else :
					$twitter_card_type = 'summary_large_image';
				endif;
			else :
				$twitter_card_type = 'summary_large_image';
			endif;
		?>

		<meta name="twitter:card" content="<?php echo $twitter_card_type; ?> ">
		<meta name="twitter:site" content="@<?php echo get_option('option_twitter_acc'); ?>">
		<?php global $post; $author_id = $post->post_author; ?>


		<?php if( is_single() || is_page() ) : ?>

			<?php if( get_post_meta( $post->ID, 'seo_autor-twitter', true) == 1 ) : ?>
				<?php if(get_the_author_meta('twitter', $author_id ) ) : ?>
					<meta name="twitter:creator" content="http://www.twitter.com/<?php the_author_meta( 'twitter', $author_id ); ?>">
				<?php elseif( get_option( 'option_twitter_acc' ) ) : ?>
					<meta name="twitter:creator" content="http://www.twitter.com/<?php echo get_option( 'option_twitter_acc' ); ?>">
				<?php endif; ?>
			<?php elseif( get_post_meta( $post->ID, 'seo_autor-twitter', true) == 2 && get_option( 'option_twitter_acc' ) ) : ?>
				<meta name="twitter:creator" content="http://www.twitter.com/<?php echo get_option( 'option_twitter_acc' ); ?>">
			<?php endif; ?>

		<?php else : ?>

			<?php if( get_option( 'option_twitter_acc' ) ) : ?>
				<meta name="twitter:creator" content="http://www.twitter.com/<?php echo get_option( 'option_twitter_acc' ); ?>">
			<?php endif; ?>

		<?php endif; ?>


		<meta name="twitter:title" content="<?php if( is_home() ) : if( get_option( 'option_twitter_title' ) ) : echo get_option( 'option_twitter_title' ); else : bloginfo('name'); endif; else : the_title(); endif; ?>">
		<meta name="twitter:description" content="<?php if( is_home() || is_page() ) : if( get_option( 'option_twitter_description' ) ) : echo get_option( 'option_twitter_description' ); else : bloginfo('description'); endif; elseif( is_single() ) : echo get_the_excerpt(); elseif( is_attachment() ) : echo $post->post_content; endif; ?>">
		<?php if( is_home() && get_option( 'option_twitter_image' ) ) : ?>
			<meta name="twitter:image" content="<?php echo get_option( 'option_twitter_image' ); ?>">
		<?php elseif( is_single() && has_post_thumbnail() ) : ?>
			<meta name="twitter:image" content="<?php $attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); echo $attachment_url[0]; ?>">
		<?php elseif( is_attachment() ) : ?>
			<meta name="twitter:image" content="<?php echo wp_get_attachment_url($post->id); ?>">
		<?php endif; ?>
		<?php if( is_attachment() ) : ?>
			<meta name="twitter:url" content="<?php the_permalink(); ?>" />
		<?php endif; ?>
	<?php endif; ?>

<?php // Style ?>
	<meta http-equiv="Content-Style-Type" content="text/css">
	<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet">-->
	<!--<link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css">-->
	<link type="text/css" rel="stylesheet" media="screen,projection" href="<?php echo get_template_directory_uri(); ?>/fonts/font-awesome/font-awesome.css">
	<link type="text/css" rel="stylesheet" media="screen,projection" href="<?php echo get_template_directory_uri(); ?>/wpkit/assets/wpkitui/wpkitui.css">
	<link type="text/css" rel="stylesheet" media="screen,projection" href="<?php bloginfo('stylesheet_url'); ?>">


<?php if( get_option('wk_option_analytics') ) : ?>
	<script id="analytics"><?php echo esc_attr( get_option('wk_option_analytics') ); ?></script>
<?php endif; ?>

	<?php

		/*
		* Toma el campo guardado en metabox codediv
		*/

		if( is_page() || is_single() ) :

			global $post;

			$code = wk_codediv_get_meta( 'wk_codediv_cdigo' );

			if( $code ) :

				echo '<!--page-style-->';

				echo '<style id="' . $post->post_name . '-style">' . $code . '</style>';

			endif;

		endif;

		/*
		* Toma el campo guardado en metabox scriptdiv y opción Header
		*/

		if( is_page() || is_single() ) :

			if( wk_scriptdiv_get_meta( 'wk_scriptdiv_locate' ) == 'Header' ) :

				$script = wk_scriptdiv_get_meta( 'wk_scriptdiv_scripts' );

				echo '<!--Page scripts-->';

				echo '<script id="' . $post->post_name . '-head-scripts">' . $script . '</script>';

			endif;

		endif;

	?>
