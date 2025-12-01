<?php


define( 'SBI_ENCRYPTION_KEY', 'iT6IiBsd&(QNUjsWD)*G!B%6Tn0zDG)AX5B6Dg7uo&qEIKXzvh)HjVkiX^Fyqpy%' );

define( 'SBI_ENCRYPTION_SALT', 'U96mkcrwpsKE)$bh&AWKWuOl&#wfc7ZPA6$B4G2KKX9i8p#1&#@!rfb!#4A1&973' );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_msflorestal' );

/** Database username */
define( 'DB_USER', 'breno.miranda' );

/** Database password */
define( 'DB_PASSWORD', 'breno' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '_I&e|O?l:<)Z]aVrIH[zrb}bX(:#2Of=Yi]p296O_+6uh29@$M<5h _G0IdFc3kU' );
define( 'SECURE_AUTH_KEY',  'GJ!7%R@K!cq t/TE!:L@tNXv8]Zz@?W*k7P)/_ <A1(/n>jT3s8Xw7(8kULouM8K' );
define( 'LOGGED_IN_KEY',    'yg9HdRZn]<3L{,b$)<?@/>^W+XjxdlY:m:fJ=vw[KR[0X?B]XBw$ Ud;Wv-U0TUe' );
define( 'NONCE_KEY',        'eP&VvtZb~yFILF|-jI*BGk9G:5UTh<T]^hZ2y=%^/sb^EGxT;Fd~-_-y))guch>A' );
define( 'AUTH_SALT',        'mh-3)}O{,ygl:]uueM?9;:M`@V E]ND@nreiT|tS=qet4|!.o!Ze15tuN{a!Be%&' );
define( 'SECURE_AUTH_SALT', 'XwFqSTHD(n3a^}wTThUD ]}-pTDb|n<(&!:;w|z:%E%$3 Gw9-ZhcdI$ CtG2CdO' );
define( 'LOGGED_IN_SALT',   'L_DC4yR4Yh_KqRT?$k M{+bmG$=LG$O<Wd?}.z7F1,44ss?9u.v^cE| kRomLheL' );
define( 'NONCE_SALT',       'Y(~b2e*0S[^by!c&6cZ7XYO!>6c~D[icc#)z!lM$9(s530`@@?# jP5Zbw~3tjl_' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
