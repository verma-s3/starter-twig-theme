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
define('AUTH_KEY',         '*1:qCZxvS#gfW>y-G,.jm3@L-@G@+zQ]QrCo!z|q6U6q#5vDKCeT*^Zwb<)I~p]t');
define('SECURE_AUTH_KEY',  '| i[.$nUIKYa?o9F+|za*:fm/zST|>KbZ&X|;xElBq$LnD4fKma4!b@/6~F/shkT');
define('LOGGED_IN_KEY',    '#zt{v2-2Rcf;+FsvN}PI-3,-?LmcyePRsoW{>2#CS?FlyVeH-K!$Qd~sue!c!u w');
define('NONCE_KEY',        '|.C774bwjNnI>Qe{pi%cZQTu,I`ScyC!+z6S-0kD2?e##O!KvPg9T9bf_uv;/ h1');
define('AUTH_SALT',        '|V!.}FV|wq;(gvjM!uNq:Kk8#K&<5F#yM7!tf(h1&q+5c(x$~}wy~2X|6{gh8]7T');
define('SECURE_AUTH_SALT', '-qEs9E]X&C7s~o dnZvgL_%|q9Hl{eCC{;:}M(&B9QvgoA ITc}v|0Vdbl&ii-2e');
define('LOGGED_IN_SALT',   'gw+ONYDhv%)6*YeVYqq{y]K^Vd=+gkCeZVj68@?yl6%)*MpQ.QAu=<UG 1l)94UH');
define('NONCE_SALT',       '(gIQ=|@NVbzaM-G`p6a O~FYWU8d}^<qHO!d c5]!!UlUr.}IwGB/-i{*4lICu)%');




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
