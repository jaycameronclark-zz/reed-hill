<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define('DB_NAME', 'reedhill_cornerstone');
define('DB_USER', 'reedhill_god');
define('DB_PASSWORD', 'Ov(~xS~O(BUl');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '9PWl%rD&Fl/b/E<c)H>e%c/@+OJ|9:fNftP98&!:lqrA^l%eB2xG]3^Q{L<kUcYf');
define('SECURE_AUTH_KEY',  'pa~BYq1q*T!/o;]TTc=FYp@7WCtMTf[JAxUv+lYnK^1*e ^]z-OW?Dk*fgNQST*<');
define('LOGGED_IN_KEY',    '!Y}YAEXFV?zJ$Q$R;~Sn.&(6V7[h+T)s{QC2|6L9E|#W-uwsdIR/ArDZQp2e#n]}');
define('NONCE_KEY',        'nOtNu;=`-gH}v62-Ut5)6T0]f)x}C1Xw9C/=a8`IV3#j9ho;S[w`84mWey9gXi6t');
define('AUTH_SALT',        '-oiPn Wz,]O48.aIg~6jb.Z;D;(.A5_J7S9-Vl+d|=A}-B{!wlz=7|od)!:9M&uw');
define('SECURE_AUTH_SALT', 'F$H-E/,~LJ:-^xm@p*dn8h86C|Y&HjR5OJ-RMwf&2Aw=Vwb|5QL44OMyl,I}puN,');
define('LOGGED_IN_SALT',   'tcQyp~k19)bR$:7lEGO!!bt0]{EZI*!X&l{)V4-F>t,g/Upm.@5Rku1$Tk0p3+hi');
define('NONCE_SALT',       '}:h6cw2#Lkd%M&Sq4-Xj-UKDP?DomY#LqBB;2$I|xsco]7lk{dM4p0+&:CP-H3aq');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
