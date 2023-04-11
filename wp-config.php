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
define('AUTH_KEY',         'F/}&f!-J?,KI<D#39Th%{A)Q>zrd*7KB>5x-7H(oI1kA~KYOiM~6`nI.gY>=7JC,');
define('SECURE_AUTH_KEY',  '>[6}i9_,?=&K.`{ xuBWUI`I1!M/S.aOsiNGL-b-^)RAMFQpSk-J-|@LXwmC>|Ur');
define('LOGGED_IN_KEY',    '_]i{1&XoaXA1vRaQk:+GOtA5,^MDPs)U;WWydj,;q]3`lx=pYS.iY@KBY(mdwlFA');
define('NONCE_KEY',        '+z}6}6&+E[c6xST1T)}HEqmJazP5aAetf%-_Hp^[TB0PrA=X,{H$|<g3s JnDu e');
define('AUTH_SALT',        'CQ-Mz?E<A=jYyD_-W-dVt;8J@BiG%Ey/WOPBwUMcP{:8-4?-(-e30_3QRe:9@P7v');
define('SECURE_AUTH_SALT', 'b;jtxt~MA*,dhl|aEWO0|&a4r[k`Sm8aDw=asEdt+]iont^j;jvF?{#3EY[|l^]D');
define('LOGGED_IN_SALT',   'YJeTP8%?*diVW:L-rQnv[VL8-eg+-T[RU!fl,qISIKggU43L1&BK&`N`Tk(8HflM');
define('NONCE_SALT',       '1cL[.xHICK%bm~@BCH/.V^J]/0xB6+!xD.)L[R -.Wyyv-|oWBM5)5#w5Sv](=[Z');




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
