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
define('AUTH_KEY',         'Bp^N@#xhl;qa7UpS~g,<Nr= ]+1QIk&3q3fQ/t0-*D_YnVH|p889tiS<5N@W3Xzq');
define('SECURE_AUTH_KEY',  'SYE%vLro1)%|>1U%v#|(75K>+)U,=A=<-uAEKm mil5K)H8d<@M,>Qs-Qs/z5Va,');
define('LOGGED_IN_KEY',    '#X+4^MVUgY<DY|RcNqJFjQCqGYXT.;&?|C{3)17wnOG2zg+#T6u{$qiJ_~Y#Uuf|');
define('NONCE_KEY',        'b+|MzU^(`Mqz,{arlKVb<t[mqQWnI8X1V8S;{7B*(+fiGOB(h)C_5r2u`=0z-Y-U');
define('AUTH_SALT',        ':BL(NQm0aw%>.c_Sl6|f;co1|HL_eZtT!_0)Dw?Mk>>muV|h!C{n0-dp<#[+g;Ak');
define('SECURE_AUTH_SALT', ';`j`3as#p$)9(A2%A70?S[gW8m|^+vLBny3||@=1i$6X4kw#y6R AZHm8l~%*445');
define('LOGGED_IN_SALT',   '$hK?F|W8A-JXeJH+nl;Y`ALZN5i{+qUG%cZnEl|B?DTvv%<9(OxaBak|4zS!DSlw');
define('NONCE_SALT',       'Kh!h+Z2S&2|a:EMy)l+qCtZi:wSjWwAJc(+^Hg2m;^WS:m#=dKx!UP+LAHEM2bmn');




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
