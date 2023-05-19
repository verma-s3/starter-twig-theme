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
define('AUTH_KEY',         'U8fq/0sY D8>Tuvzm(!H@;Yam-5N`-LQ6[x+-*``HLC?/7/Onl7~kgMj7}tmVOSD');
define('SECURE_AUTH_KEY',  'ud[<aO=<VZ|G,.nk ~YyP;*v>=C-&#8(A8L%LwvU1aa#gh=w}FCG^(vj8<_D+`fI');
define('LOGGED_IN_KEY',    '5hc]R|h^P{?QpdP(d3J-|LaqM+b(@?ofda?%vN|;:{`(M_|vI?)|39TJWg|.E+(e');
define('NONCE_KEY',        'j@Fu?D<B2>$q]8e+4BecMDYK/x;)Q`j)E<FP&`&WClUwAn@p+C_7PMhWR,N2tqR`');
define('AUTH_SALT',        '+XE7 F;Rt_`_yH[YF-$WUM!*-#>8}?OW4yyh(6T_(BC_G(QOF)o87Ab58U<2_{KH');
define('SECURE_AUTH_SALT', '%0CV-C!D}u-_UnP-BrI%: lb*!E+Kf7!?C{!jF,JkB:w/uH[i*K@G*D*7|y@jq.J');
define('LOGGED_IN_SALT',   'q#CltT.B;V`NHRkH?qzNgJ7}x~-n&:xO|qF!SKPN6cl{WzUkf*,Ni1)rIAi4ErHf');
define('NONCE_SALT',       'c=l.M gfpSJOJ1vMn9+(c[Y.bjiZI,y|&HWzI&?>_2l^SkWh jf.p!;Ub^>c}uLN');




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
