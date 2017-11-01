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
define('DB_NAME', 'akshayshipurkar_me');

/** MySQL database username */
define('DB_USER', 'akshayshipurkarm');

/** MySQL database password */
define('DB_PASSWORD', 'MCmy73sh');

/** MySQL hostname */
define('DB_HOST', 'mysql.akshayshipurkar.me');

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
define('AUTH_KEY',         'G7dOBjwH8"0)@QSb+L:udJ%4`)IaDEEhbATsBLgENMS7+w!K50cOhS(Tx@U3#H@9');
define('SECURE_AUTH_KEY',  'n!0K(|Khuoz|T)fKi?sUtULq7)p&47h*aVvzlY;4y1F%QL(jBr71sb2D22d4qMlO');
define('LOGGED_IN_KEY',    '%eX#7*#Nc(G0B`:l$3Qcvys|R2y;?H/MrP|Uvm2#k+1K"j?wVNTY^(DEZjKejq&r');
define('NONCE_KEY',        'K%ZPgLcvqz|jHZ?Rd|qH%ZI"*cJ*rO`~:r1|9*2Q*+0kX((5R&;5B$:#j|Rll#^a');
define('AUTH_SALT',        'jzpxH9I"nWX;Tu6Du8TJbps+ZYzLrEV&fWLg5K8nwyRTfSv7cS4Wm$P~E7fSs8|l');
define('SECURE_AUTH_SALT', 'JPCRsiI5_zf5N+17&6S49g/zD*+N~1ZLM(Gn58kHVisLj8(T7xR^/S45S6YxnYLb');
define('LOGGED_IN_SALT',   'nXN9ydKnb/w(3hJfvAbF3Z4;si2j8v?bFwmR_$7eMUJ"MyjS)4&_iDt5rF)dP&gl');
define('NONCE_SALT',       'USb&&O%s1UL$suRNggXoU3&wg6l&HncMJ1llfCn"QCAF7p&e^3%I^e$q`s@uY64a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_y2d4y9_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS',  10);

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

