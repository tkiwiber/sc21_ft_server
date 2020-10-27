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
define( 'DB_NAME', 'testdb' );

/** MySQL database username */
define( 'DB_USER', 'testuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'test_password' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', 'utf8mb4_unicode_ci' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<CH(:s[B]a?p+q{R*=|,)O]efb_LW? wYcX&fZU6<`IedjsO0R8-@aFLps<bFG_r');
define('SECURE_AUTH_KEY',  'I(*GR5]I=q;oWn]<ww3(:>Wn#q60dsJ_e4Vl}MYXL8SUKvJPn}rmppx7x|<6}M~X');
define('LOGGED_IN_KEY',    '+^U.K-evvUK{Xut700Z2=ZUI/B}Z8kz:-HoRZPZ9bcg-,O+F:.-?~SF.-LGz/j`2');
define('NONCE_KEY',        'H:Cigoq5^=,~[[j^8:aP]c,R?$H<QNfEQkk5:l#`+C+[PQW&:C^e}76kXU<|+I|}');
define('AUTH_SALT',        't@/H-EAf=`o,lljmtp:~hI7h@,(+7+[$igOO1yTiC7P;v1xUv4AEO /@|J2~v(_+');
define('SECURE_AUTH_SALT', '.-(1#nZ*SXIKiiB}hL&F[BDx+1L>yY-Z4Q.[ wG@vs)vAG~3[Y05umN<Q9BdXs}6');
define('LOGGED_IN_SALT',   'THCweg!!(VhBaLWmxuW0V08qb>{<sTIeIn;GQmW/F!rbJHb^>o&x3G8zU1IRaX;W');
define('NONCE_SALT',       'mz7Z5d%*!*&[Z;_4l{|[R-6-WMo]hC~H8Vot!ukAvg1bP>pf!X>I!X~P ><@G:+@');

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
