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
define('DB_NAME', 'besa');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ':DN-Ak:Y}9{~|%)KFEF-_L654 0_aw`f$=Zx@}8db[A<oC}-[AL#|1170)&vV%26');
define('SECURE_AUTH_KEY',  'jw;d1qme2`cDkEqH}[;OS(wECz&IRWLn8!Xy3zE5U47Nxr2ud.tU&#T/U6Vg!1~1');
define('LOGGED_IN_KEY',    '=I{GPT,9)/l1>g(lywzCsPw2AZ{OE8JU*J8$}l!zC~f^muW^&<s9bi5?Qkvem]a0');
define('NONCE_KEY',        '~xW+nTJP45NwfDR*j|dalN@>cn)D{eXgacVU+kH*ocm9XtUMR4,(b2}C!Zf$D5.Y');
define('AUTH_SALT',        '<XMZAkhu%x& zLqs.yX-~_+4po~b7GFm9BU&r67JP{]+La|fHf;ddGufRKEO2H%a');
define('SECURE_AUTH_SALT', '-Wb^cYaV2HK xXa`x-w:i`D;C(wH3<jfldl3,Lg>MOiD$GQ(@<gw#Fp/6gDRO7tw');
define('LOGGED_IN_SALT',   'Y!{LiT*/?GU{fuN 1.ooL}%6zx.s,m?@;YuL:~0jgUdh<-QPxBHYV@J0awC1$U!e');
define('NONCE_SALT',       '4A}E/=5VEa<esnogqZN?f^k)&iDYEc?z].^U8j!4|qZq>J^s7TB8d~B6?GfuD/=7');

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
