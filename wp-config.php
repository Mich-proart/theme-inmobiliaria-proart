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
define( 'DB_NAME', 'inmobiliaria-proart' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'root' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', '' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY', ',P~7+v#*Umwadnb|}B<mWL$KNV+F!&;rUDEfEL4Ja.<RaZsRk)jh0`k*/Nbx}27Q' );
define( 'SECURE_AUTH_KEY', '~T@8,>An0V/7q,nw1&.4}4ZgG.Yf6;-1T(HA9eP7%sJ}1E^<K >B<CrA?|nM=Rhn' );
define( 'LOGGED_IN_KEY', 'Poe&$x6z89jjUv$>6&;LHDQ<#63PVb.r~_BTg:CDN3)>Dt<C2)zpC% YvCsy`4u7' );
define( 'NONCE_KEY', 'X}(5_ige(c5H)9UIGL,1?OsPsq.gfU;9^Y+H( j*OHN=Dn$~e5_lPnGQc~8mCec>' );
define( 'AUTH_SALT', '3[0vQdDg9cdEX4980v=_B6z/`:qYJ;<){/svnI<|@l3*6c,lu-p}~JO@y]:=<%^T' );
define( 'SECURE_AUTH_SALT', 'rW]@F#Ft_goe!RDmt[H^PMiIoQ)XNj+3Tr6H|Z%|XFdz}ojTL8|._YuJ&Fjav+s}' );
define( 'LOGGED_IN_SALT', 'bNVn)9`kUXnd4BTd`5g`CEYXM$uA;H`E]<)3`+rg3gz3qW*}|*zN9O;Pt^8%{d7#' );
define( 'NONCE_SALT', 'jw#m1o-1+x2ki5YlBu4_FtFAAXzh?}JjoPZjXbw|~1LuH|7Sr4d?=1>Ar*G2@5Ho' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'fc_wp_';


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

