<?php
include('config.php');
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

define('WP_MEMORY_LIMIT', '64M');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', ':G0{[&Yn}x`a,TXE26M$cyCPiq<v&Z]Mw!9tJ#`^QVG%;Umxch{F5{t!yf0@q&cl');
define('SECURE_AUTH_KEY', '*=3ln|F[&#g&|I~(PWVc*$5ED+`[yc-~{PZ<W]mG|#x%b2P#dDwTKxLE.`Oj&Cy<');
define('LOGGED_IN_KEY', '5U[^u@4C?QLNqj)St+y(Ro6mM3hyj39hyipw)|MOqdN}ncI{/8I3nz>fHhqTo;.Y');
define('NONCE_KEY', '.yH?:,a,3}#$F`XdEjk6IZ-^$XAPcRQJ_S@e$5*1,|+m]+|Vf;My,!mX*C-E0]s[');
define('AUTH_SALT', 'sH84W-]#+%X[4|{nu5F|3,++(7[mMd;dpp,Jxp9D-uzl*+:*[-v658HEF02!2AiE');
define('SECURE_AUTH_SALT', 'TP3-xKL`<`cbvmkY5W4jOz+.9P`|G|rc*+zCNRruANdY2Sw=KW{8y9zm:k<xzg.X');
define('LOGGED_IN_SALT', 'Y@M*Fo)#gl`qM-(|NB2mRuJi{Buh7YuF[0ex^},J7/+}1IXVz^Kn>) TbckD0Gth');
define('NONCE_SALT', '#z%oT&+JW4ZcUNf}ocU= R=u3d:=35ea|G/ iw-,<1WY9p-#FM5-vsEbg]`>?cpV');




/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);


/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('DISALLOW_FILE_EDIT', true);