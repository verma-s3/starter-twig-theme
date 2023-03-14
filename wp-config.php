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
define('AUTH_KEY',         'ko@78R2cPK =y9:2D/4dOz#eS.[8!tg1VJ|U9rRST%j=FIOd/tIO]c=x87z*4|su');
define('SECURE_AUTH_KEY',  '&d47t_Xd2r@Yv$DKlnHU&F<o<jiy6<|~CJX]y<P (BHE&%~V>-c!J#|:]M[cjui2');
define('LOGGED_IN_KEY',    '0=t.m.$v:ztsGfl2+ ++M=BHkB{(nnBIm-:k$_1o{ bJ.~n|~Bf,JuP>`UHh*h#v');
define('NONCE_KEY',        '-m?M1~eoZ_{A(K1-t7BWi_v!qSzx+hUKui0nMe*dr0?V,+EW&O`3(Gz(L(a^ym^+');
define('AUTH_SALT',        ':[SBO%Kj&5uQ|z]dy%2Cj<#b&4^AF4lYxD4YpP|l~@2ibt:I&yB|h1M=]f_nW;wr');
define('SECURE_AUTH_SALT', 'kpgJ+ivD?z<O$pa~QZ]A{IkdKLM}j@DwS].eXWN.TLb7SBR]}S,K?V,a|TbF/[ 3');
define('LOGGED_IN_SALT',   'Y:lYlp~KYn)hvHxUa&C7AXEx@mzbiCLr^{&>O^VVgFf|t=Me0xGa)Szy?)rQWWx6');
define('NONCE_SALT',       ';z4M:aK$/TrRNA8h;m{evmb@xbK.9LI*oWN~n8{M0c)FBvZ.lEse]`LfsEo~3F6L');




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
