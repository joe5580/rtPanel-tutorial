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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'u588741867_rtpnl');

/** MySQL database username */
define('DB_USER', 'u588741867_rtpnl');

/** MySQL database password */
define('DB_PASSWORD', 'u588741867_rtpnl');

/** MySQL hostname */
define('DB_HOST', 'mysql.1freehosting.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
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
define('AUTH_KEY',         'j.&QUGv~DCK&%CPp wF!}pWD*xmYzm~Dn33<,S,nU3C?>,PwRGZ@E q=LA@G@?_@');
define('SECURE_AUTH_KEY',  ')hz,D)$~a.w#+~}~+8-NaU%M+@^ma*UIs*.T5{#s<$lIQx4+DEQ8QSXCBbk cx9J');
define('LOGGED_IN_KEY',    '9e4ucMd.}&p(#83RF$fhS#R}/>s20oVQX ~yAoPX3iS+JBm8T/)2w[Y;~M_wSpWj');
define('NONCE_KEY',        'T<)o20k{N/Rzb4/Q>Y.OQFK;dOO-z?VGonMQgwN=wJ#bdyPd/R2D*<}Xl4<I?__?');
define('AUTH_SALT',        'Cv($Q)|kmD~WC27^ uk1,dbUs0i|+p*qDDb>!W$|h[RCimt4QIm1GP% HHF sOZK');
define('SECURE_AUTH_SALT', 'r|oy_H?S0(<K?hqi1tQ#S>59Jwq-CN1p6CB8o.b;(,![inU!ISh+fO]~:ZEG_KWI');
define('LOGGED_IN_SALT',   '8dgdBcs&-B-]irv;uET3->-IN[,*Rog?%PkNTg{dRc=052l~xr%Ar?+basfGj07F');
define('NONCE_SALT',       'c7giR[_Fgp?04mW=>nt}.7i3g(!y 0cjL<##l%-f]FmQ9CQnlSvqM==~@n[pa9V+');

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
