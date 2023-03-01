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
define('AUTH_KEY',         '}36x6P~+-fT_bWGsC|, 5)w=sPX!oG{a#V[MtG8J*-5k:SW)H`T ~P_Rc4-QQOY+');
define('SECURE_AUTH_KEY',  'F-$/O+-8]&([V)/[3S0&K ;klnan-{oUK Ao7$;TyrOKvoMbM9XcZw;HY(77>hTs');
define('LOGGED_IN_KEY',    'O#Vx*-sf#ibRlKx]R-T{Cnci?WX})?7+[hmh*]BhM5=wyLtD7Vv4S)ste@A-9x[+');
define('NONCE_KEY',        '1DsT_!K5gq194G+wgc,MY4hVOi,bLZU-[p7}HcqV:pGu:|OM./dJ$y9*o_tFB~V<');
define('AUTH_SALT',        '+{b@^Gl-ZXCTzc[|3H-Z|R^}MK3J:d-:q2$Z$8uj}Bbh7(11rx((Kc&^Z)vUudG`');
define('SECURE_AUTH_SALT', 'T7Fy9_ =W406BS_kw!ly>0Yv$^_WVgo*|PDBhV}AX62Ylok)56sps(U_1h-p?u4+');
define('LOGGED_IN_SALT',   'w4cZ(d&Gz=Z_.!QXF838xW4.a|sg(DopeWy7Rj0uO^#Shn$X<)V;Vx, BYO;xqd_');
define('NONCE_SALT',       'hC+J>rgTc[%]UW}SRsFN0;}x4~+DT6Vh3fLe8gs-.m09oHPq$(N q=na-1H0[hp%');




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
