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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'minds' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9uJWEl}Fg@mkPXcqSxc[Oac %.Fkpj;r?ti*I8aRh&bjAge#~A@]>fnmmr8XXLS*' );
define( 'SECURE_AUTH_KEY',  'JYwo-D@ahYSt~8IxGyD]kekzrGRYyd(+)l_Ro+kjU~n1oII=/6SI}A|7+dM5|Ym*' );
define( 'LOGGED_IN_KEY',    'y<?w#+!zw+m.vf[l*3x-+dc<v?KA6$#Ll.&R|6umvY07]E|Nt[,#7z2f#oujz Us' );
define( 'NONCE_KEY',        'c7VN$H_.7.gd !DK%r6IH}OP5i~M|{Ty-DC|+uUG~ePlaNcBV~U!I4u*yG3~Jv`T' );
define( 'AUTH_SALT',        'S2Fw:45WkE4Si6GMIqOoP-O10$[tdtWH_]lMGMyNL`fD/|CEi$w&0P0@#;S[&15a' );
define( 'SECURE_AUTH_SALT', 's<F1N@swKAp3N)$xlxxf5dmo>$/N=O.y_L4&K<1]2[pI@>U1Y^i@p}LX*-V|u5H6' );
define( 'LOGGED_IN_SALT',   '6;hJ@Zq1Vk[fwoboTCX[Os5YBAwI!EE}mTf*vGo:&hi)<qcRA%RYP&Nq]N/xOS35' );
define( 'NONCE_SALT',       'ow,78i AB,V-Io^u(><a>g}^QaA<>,P9/{la~mKhvtkZmy|_IE8Tj0ybaDnet0b6' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
