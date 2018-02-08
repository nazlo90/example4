<?php
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', ' ');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
define('DB_NAME', 'parkplus_db');

/** MySQL database username */
define('DB_USER', ' ');


/** MySQL database password */
define('DB_PASSWORD', ' ');


/** MySQL hostname */
define('DB_HOST', 'localhost');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');


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
define('AUTH_KEY',         'rB6w/B[_R36g E%I(oA?0qn~CEu6cp`6DGr<oEpG8v5!@3W3Cb||2nRG0f]3mZf>');

define('SECURE_AUTH_KEY',  '[TP{!#1*1Df;EhT_Z*qQgOe9/ygkw*x$B0)DwaKR6mb<$P*]Kq1s^Kxq$^p7c^vl');

define('LOGGED_IN_KEY',    '*92Wc3&:LC~td4:`<!CR0^.SG(YsqBmeUD^fe[wErZr-J0hQB5=>6RFj/Z~TU[8T');

define('NONCE_KEY',        '[!L8&[EiClp8c{b&@>fec^@%Xdn[EMs3q`RRA<yd85U1];RQ2{AbVNcA|vn:Xe9b');

define('AUTH_SALT',        'ZmHXb<SG6b!}]~[:`?M5MbMA;VjG-Lie`W)F K999NERz_n*@_1}1.x~m?;B*]a-');

define('SECURE_AUTH_SALT', 'd}kiLi!OK3]=.FhxE}YzI~-[jKhRlf*Zrr7E)QLWg,mm:SL|S18Kxw,pg/*$acb[');

define('LOGGED_IN_SALT',   'FMJF&fNd/-?-N;d^qA]z6r5jnq]n*ik}{s`05$RCoEgJ_+g<dstiB`Fvz9pSlZ.B');

define('NONCE_SALT',       '6T[x^iL]D~(G^oNh8+B/_Ku@~{ #b|W%N~$SD+)T[-mL(kvy9&P*q^ui M[=s$EJ');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';


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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
