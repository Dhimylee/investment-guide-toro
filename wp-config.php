<?php
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
define( 'DB_NAME', 'investment-guide-toro' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'j0|f~[NN:R`>Pv3]1d~Z!LPD}o%a<1;K*cSbI5ODH-Y dU*3r3/(dD]DcqeMU[Fx' );
define( 'SECURE_AUTH_KEY',  '71d!u? b5KzW4HrlW!m5aGq2!`WSq@>*+5q)-5zK/qOD;sF_?gP3tCj2?tfZ&mvZ' );
define( 'LOGGED_IN_KEY',    '7jfG7D-*m/%R,FBJ[Z2 +3*~xzx7? /1vpFuo<{o625,F&<?&.VFBS4z-St|2cK=' );
define( 'NONCE_KEY',        'Z8AF)dh;^.FN!{^qqTP)qt~nMgN!m +YkiABKXTO100]d2lYa*W2WyJYtU[_djJs' );
define( 'AUTH_SALT',        'hASjxw`vnJhfs<neG]ewWr QANkKydC.@yZi4$ ,kdSrzNQog[N)kJG?P}DlEj9]' );
define( 'SECURE_AUTH_SALT', '?S23Dj0GXtX#V#AwFoS5RW@HPMqC<Ouk=XUFw(kkf@CCM1`O*^SL^&h`p2&4npp3' );
define( 'LOGGED_IN_SALT',   'm+kO47[j&5ACRbtee>rf@v(=y9Dh%KuAY(&{vX_:1|*uUs5_C]b59{y[Q[0rPw})' );
define( 'NONCE_SALT',       '-%!b8cBukZDoW-(|RQc*p7%+19lkPZDDNQ.8<reXu&e&dY7|hhFkriV t`$6}~cw' );

/**#@-*/

/**
 * WordPress database table prefix.
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