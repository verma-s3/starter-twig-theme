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
define('AUTH_KEY', 'C<lbNE6b?~IZ[HLe&KIW14cbM=&8&JTHU97ds)]X=^U2DsNFKoi{Z6+{v^+MNBb*');
define('SECURE_AUTH_KEY', 'lB $^djk/{s/&-_.?;D?.GKyc-rIk& .tj}ZpgY-8z+$pm`*3q|WoQC51}&7`//Y');
define('LOGGED_IN_KEY', '_PQ/+hU6&o_{fD/8xj?xXBm]cloi|(;o`,M`_x7yQQ9Eq(X3I>u3Jj5KFL ng 4u');
define('NONCE_KEY', 'E+D6U3}ZemG6>#SIp#r?@;Cbj5>*>snAJxT-m00>ve8&7[KGYd!#NeJh9V^]+rrM');
define('AUTH_SALT', 'ElP=[L4B;{cHPZ>}X,+xe(+n_VWW-wEct3>nd%12Oxypf<]VRN|jpdz!d479i4Rj');cd ..

define('SECURE_AUTH_SALT', 'lDt?NWv.m/[%cs/-yh|2sL+f[;-Hj fChoU_dVtfMH#q>a$isbH*:$||kRC%|D}E');
define('LOGGED_IN_SALT', 'Z~y;z>sxf7Z#]f,WCNHL.|v%,+9%m;(8vfV~)fVfWPUpeLK<rEZ9&hqhmP6%}=%U');
define('NONCE_SALT', '`K^.|R6Aivm62.-{aZn>HF1}<^>4m|.+T+vfVxR#=Wvy.]S6Oh(?(6Rg3gDpv~Ig');





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