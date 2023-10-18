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
define('AUTH_KEY', 'Y6FHrL29p(O1Q?;v(V/z16<2H,#J2LkBVph9h-l!N!(k|LM+OC{?9% ^fON)Ty4X');
define('SECURE_AUTH_KEY', '9L75j[T#S!>-+P[k*;.w0Rt_YJE3</3vtFwn2:vUt(|(vce-+G;R|Oz6?BjJI$ac');
define('LOGGED_IN_KEY', 'mKDe[Fi@*GHKj^Z14s2/FH`{DNG~@h<m$)F7j-=V^,71^,#ZO,1*@[A]~D4qTBB5');
define('NONCE_KEY', '{+!(F.z?c0BiixD(]OkQL|W[`TEQq>ePSQ~Zw-2r9_qK^R|%K~ZcZ=umxRgP]Bz-');
define('AUTH_SALT', '0ZxQ>^|EFvHbTO8n(FKG,#[I#J<kIy.R|+QNY0Ew9$^g4DgHg9$+hs|Her@Y>rX8');
define('SECURE_AUTH_SALT', 'aZK|L[I%A$92?hl0n}^P!%#=l&ht:+[2}PVYRMTr[8aKrZ=.sZgx|pH[Ohz)B><)');
define('LOGGED_IN_SALT', '95YF3}3.Gd0U5Ua?cldw-z+jv+4Utw$^Gi$ZL51R([GZAayLrbM{E#_ws%N_wyR.');
define('NONCE_SALT', 'cD@`/}|1,~VE>~2%xn?Dh ?U!6zbIb-KW0?6sq(>Bri[@a5VUX{4h+=gK]#>)/a6');





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
define('WP_DEBUG', true);


/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define('DISALLOW_FILE_EDIT', true);