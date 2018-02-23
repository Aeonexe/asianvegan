<style>

	body {
	    font-family: sans-serif;
	    background-color: gainsboro;
	}
	.container {
	    position: absolute;
	    top: 0;
	    bottom: 0;
	    left: 0;
	    right: 0;
	    width: 220px;
	    margin: auto;
	    text-align: center;
	    margin: auto;
	    height: 267px;
	    text-align: left;
	}

	form label, form input {
	    width: 100%;
	    display: block;
	    margin: 6px 0;
	}

	input#wp-submit {
	    width: initial;
	}

	input[type="text"], input[type="password"] {
	    border-radius: 2px;
	    box-shadow: none;
	    outline: 0;
	    border: 1px solid gainsboro;
	    height: 27px;
	}

	.login-remember input {position: absolute;top: -3px;}

	.login-remember {
	    position: relative;
	}

	.logo {
		width: auto;
	    height: 60px;
	    margin: auto;
	    margin-bottom: 0px;
	    display: block;
		
	}

</style>

<div class="wrapper">

	<div id="login" class="container">

		<?php if( get_option( 'custom_logo' ) ) : ?>
			<img class="logo" src="<?php echo get_option( 'custom_logo' ); ?>">
		<?php else: ?>
			<?php bloginfo( 'name' ); ?>
		<?php endif; ?>

		<?php if( get_option( 'option_private_site_message' ) ) : echo '<p>' . get_option( 'option_private_site_message' ) . '</p>'; endif; ?>
		
		<?php if( get_option( 'option_private_site_form' ) ) : wp_login_form( 'label_username=Usuario' ); endif; ?>
	
	</div>

</div>