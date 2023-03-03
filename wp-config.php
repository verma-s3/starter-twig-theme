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


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'EHQ#fEVQTy]6)]&mS*n>I=C x-Sp/G]>)Qw,*m@LF3$kD>]H1Q-!I>_`hO!h/2kK');
define('SECURE_AUTH_KEY',  'j/=7Gs~5A5pkD<p8qT9|dqg.*E+WvU-)8Mw/+W~;Roc}IL7nT8%uad5=!vL45LrD');
define('LOGGED_IN_KEY',    '?-cpJNl98tZ%VX|%DKp0Da{ebd7;M5N,7+.k0<mylGwj8 t$q?a~rY#!eDK0TiMK');
define('NONCE_KEY',        '{I`a9-@8!Wea1|D&pw!#Fb0fwsOXj%6+ P0w%TV%~G1=n!~polq3;S<F`r=%DH+;');
define('AUTH_SALT',        'R=ju|DtOf$4XTp)0+AtKY;Vt K+fj+@K7vjOBVm,q2z8EhIUCN28r7oOXzkhi%0Q');
define('SECURE_AUTH_SALT', '|(MigNPoy%_PRt1K6uuMc`FGf+aZGKD|W;m~ct2QBk^B*iPg8;YlpNP6)q>ENjxd');
define('LOGGED_IN_SALT',   '4aZi|}8YAB@UX!tyy-8L6Bt,*ey(RZi9!.cnf~@d.Lc]s*)k-9Uvu&]87h^/GuT!');
define('NONCE_SALT',       'rLK6`}<who/RByG/iRoP}T^o,4+7D+-GlG;P~Y]_?gw`d/*`azbxVsGq)`5*Z&9J');




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
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('DISALLOW_FILE_EDIT', true);
