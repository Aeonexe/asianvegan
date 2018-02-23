<style>	

	body {
	    background: #f1f1f1;
	    min-width: 0;
	    color: #444;
	    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
	    font-size: 13px;
	    line-height: 1.4em;
	}

	#login {
	    width: 320px;
	    padding: 8% 0 0;
	    margin: auto;
	}

	.login h1 {
	    text-align: center;
	}   

	.login h1 > a {		
		display: block;
		display: flex;
	    align-items: center;
	    justify-content: center;
	    text-decoration: none;
	    color: gray;
	}

	.login h1 > a img {
		width: 100%;
		height: auto;
		max-width: 300px;
	}

	#loginform #user_pass, #loginform #user_login {
		background: transparent;
		border: 0;
		box-shadow: none;
		border-bottom: 1px solid rgba(142, 142, 142, 0.41);
		<?php if( get_option( 'wk_custom_login_color' ) ) : ?>
		border-color:  <?php echo get_option('wk_custom_login_color'); ?> !important;
		<?php endif; ?>
		transition: all .25s linear;
		-webkit-transition: all .25s linear;
	}

	.message {
	    margin: 0;
	    padding: 24px 24px 0;
	    text-align: center;
	    /*background: white;
	    box-shadow: 0px 2px 3px rgba(0,0,0,.13);*/
	}

	.login form {
	    margin-top: 20px;
	    margin-left: 0;
	    padding: 26px 24px 46px;
	    background: #fff;
	    -webkit-box-shadow: 0 2px 3px rgba(0,0,0,.13);
	    box-shadow: 0 2px 3px rgba(0,0,0,.13);
	}

	.login form .input, 
	.login form input[type=checkbox], 
	.login input[type=text] {
	    background: #fbfbfb;
	}
	.login form .input, 
	.login input[type=text] {
	    font-size: 24px;
	    width: 100%;
	    padding: 3px;
	    margin: 2px 6px 16px 0;
       	border: 1px solid #ddd;
	}

	#loginform {
    background: none;
    font-weight: 100;
    font-size: 14px;
    box-shadow: none;
	}

	#loginform input:focus {
    outline: 0;
    cursor: text;
	}

	/* Button */
	    .wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
	        height: 30px;
	        line-height: 28px;
	        padding: 0 12px 2px;
	    }
	    .wp-core-ui p .button {
	        vertical-align: baseline;
	    }
	    .login .button-primary {
	        float: right;
	    }
	    .wp-core-ui .button-primary {
	        background: #0085ba;
	        border-color: #0073aa #006799 #006799;
	        -webkit-box-shadow: 0 1px 0 #006799;
	        box-shadow: 0 1px 0 #006799;
	        color: #fff;
	        text-decoration: none;
	        text-shadow: 0 -1px 1px #006799, 1px 0 1px #006799, 0 1px 1px #006799, -1px 0 1px #006799;
	    }

	    .wp-core-ui .button, .wp-core-ui .button-primary, .wp-core-ui .button-secondary {
	    display: inline-block;
	    text-decoration: none;
	    font-size: 13px;
	    line-height: 26px;
	    height: 28px;
	    margin: 0;
	    padding: 0 10px 1px;
	    cursor: pointer;
	    border-width: 1px;
	    border-style: solid;
	    -webkit-appearance: none;
	    -webkit-border-radius: 3px;
	    border-radius: 3px;
	    white-space: nowrap;
	    -webkit-box-sizing: border-box;
	    -moz-box-sizing: border-box;
	    box-sizing: border-box;
	}


	p.login-remember {
	    font-weight: 400;
	    float: left;
	    margin: 0;
	}

	/* Login nav */
	.login #nav {
	    margin: 24px 0 0;
	}
	.login #backtoblog, .login #nav {
	    font-size: 13px;
	    padding: 0 24px;
	}
	.login #backtoblog a, .login #nav a {
	    text-decoration: none;
	    color: #555d66;
	}
		

</style>

<header>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/wpkit/admin/css/login.css">
</header>

<body class="login login-action-login wp-core-ui  locale-es-mx" data-pinterest-extension-installed="cr2.0.5">


	<style>
		body {
			<?php if( get_option( 'wk_custom_login_background_color' ) ) : ?>
				background-color:  <?php echo get_option('wk_custom_login_background_color'); ?>;
			<?php endif; ?>
			<?php if( get_option( 'wk_custom_login_background_image' ) ) : ?>
				background-image: url( <?php echo get_option( 'wk_custom_login_background_image' ); ?> );
			<?php endif; ?>
		}
		<?php if( get_option( 'wk_custom_login_color' ) ) : ?>
			#loginform,
			body.login a,
			body.login {
		    color: <?php echo get_option('wk_custom_login_color'); ?> !important;
			}
		<?php endif; ?>
	</style>




	<div class="wrapper">

		<div id="login">
			<h1>
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>" tabindex="-1">
					<?php if( get_option( 'wk_custom_login_logo' ) ) : ?>
						<img width="40" class="logo" src="<?php echo get_option( 'wk_custom_login_logo' ); ?>">
					<?php else: ?>
						<?php bloginfo( 'name' ); ?>
					<?php endif; ?>
				</a>
			</h1>
			
			<?php if( get_option( 'option_private_site_message' ) ) : echo '<p class="message">' . get_option( 'option_private_site_message' ) . '</p>'; endif; ?>
					
			<?php if( get_option( 'option_private_site_form' ) ) : wp_login_form( 'label_username=Nombre de usuario o dirección de correo electrónico' ); endif; ?>

			<!-- <p id="nav">
				<a href="<?php echo wp_registration_url(); ?>">Registrarse</a> | <a href="<?php echo wp_lostpassword_url(); ?>">¿Has perdido tu contraseña?</a>
			</p> -->

			<script type="text/javascript">
				function wp_attempt_focus(){
				setTimeout( function(){ try{
				d = document.getElementById('user_pass');
				d.value = '';
				d.focus();
				d.select();
				} catch(e){}
				}, 200);
				}

				wp_attempt_focus();
				if(typeof wpOnload=='function')wpOnload();
			</script>

			<!--<p id="backtoblog"><a href="<?php bloginfo('url'); ?>">← Regresar a WPKit 3</a></p>-->
		
		</div>

	</div>

</body>