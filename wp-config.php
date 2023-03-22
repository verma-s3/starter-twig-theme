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
define('AUTH_KEY',         '-l5kLM_a5%PBwGq=(NNRlq+r*@yI?)Ks;_+-P++(e0|Pc%H^WfG~SXM-.+74m|iA');
define('SECURE_AUTH_KEY',  'yf?9k7A(2NBt$6#PJlF&7.]af*MvP-+U+y;|qjufrQagQKr*(o#p8J1(tmG{A+2|');
define('LOGGED_IN_KEY',    'aqkm axek6Dc@gIjwy%no+AY_VtC=cc-L{s?Yz=Gt9t|=g5@+A-1p@Hk=P_vW.D`');
define('NONCE_KEY',        'Z.Ox&HG8Z`JDWUn+3kX13{YJxXoG;~r0/E44M-eeET_s/7h6i00rAs}+OfvR[wW>');
define('AUTH_SALT',        'qz;Z9r+cpUA%x.;C}!Y(|(v;JPlV]~vR[&sljNlp4Ke-[-:s+4G.XJ,Au=WMmb&z');
define('SECURE_AUTH_SALT', '>lF-dGij}P>CGM%T+-mW$lX!_h-9Af?DJX>]?X4iIlMu V@Aur 8 i([<D[XR{!J');
define('LOGGED_IN_SALT',   '5)Nh<V MMQ,IbmLx^]o/k00m0@=Xv9#g~?v?VI_7U26WE?;meTvpj2>o,(FaD-n%');
define('NONCE_SALT',       '6qDzU|#SWD#!RlI5U*X?R(yIB8c-cQ#=|-BXdE{1iN@+q|6qMr2fmHs@2m9Ayjk]');




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
