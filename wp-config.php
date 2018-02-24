<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
//define('DB_NAME', 'airmedia_asianvegan');
define('DB_NAME', 'codecase_asianvegan');

/** Tu nombre de usuario de MySQL */
//define('DB_USER', 'root');
define('DB_USER', 'codecase_asian');

/** Tu contraseña de MySQL */
//define('DB_PASSWORD', '');
define('DB_PASSWORD', 'CaPri1@*.$');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
//define('DB_HOST', 'localhost');
define('DB_HOST', '166.62.103.223:3306');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '*$?8TjTqcB`Kpg3EzHa)1t,uXZ1_)6 ?5_Q1x[,y*{:l3h|XihPj=VcA=R8O Udo');
define('SECURE_AUTH_KEY', 'u@Kl_TcV@_:EPeL1;rEsz[|>$kbPpd-k<=Ae@f)UCy]fgOQ59.rxpZh6#@Xe .sv');
define('LOGGED_IN_KEY', ')LtJz?_=%Oehh|&q;T<j?X]-LiQb`_9} T?%$p-2P1!={-(uPPk1`cB@UY~0=( t');
define('NONCE_KEY', 'f94_)6(wR7L|2p.iPKTY]_K,MF!-qHNGbVeK>Hui<$l?eH&#GTyyKh`rsd.cR$BL');
define('AUTH_SALT', 'c`=:y0c8eB2C[Yo.jM}rZ,]# X<<zp{K7n[VVgO~i]_zLU8s5kj]G075y+h=#hc#');
define('SECURE_AUTH_SALT', '3Lckdkuh/jKsYq:!<_{(kfIy<z`Z_u@>ZlyR+Dy3tDmSK-|]Qp}AV<>>RniQ>*2v');
define('LOGGED_IN_SALT', 'FC[c8gP#:/7f 2)MFxC;P5>4<V-EXyq9(0qORW$XO] -#t{ _FG,vGtE=:L+OD^d');
define('NONCE_SALT', 'mMN|A=`u_Wk{7z))P&tbTE|seg+,&<;  _M4%Sr@l-Fc,y:W?y$?[DRli{IeH?L|');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'asvgn_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
