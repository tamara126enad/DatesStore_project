<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'store' );

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
define( 'AUTH_KEY',         ' daQQqz;p>eY7U/gMzk0gH0%vMBZQ@dWhn2>h>M7Hm[9?27<YIBUj1PU*5EsAN[p' );
define( 'SECURE_AUTH_KEY',  '_aqZIi:eH/)00Z#]{Zd= 2P0_S([HN1TL=9~;dMfv`+GGsICquv#TKCH}XCScF;z' );
define( 'LOGGED_IN_KEY',    '19BH$p+;/`h446nEm~U|QaC7dw]{osHpundlE(AmWf>k-*S_qC_-]YP<%[KaV{mO' );
define( 'NONCE_KEY',        '1h6YC_0DR7d|JWSUK*u{xq8qy^Mo*}{foCr,4i<X3i10NxDOwZ])/o@Yd{4}+eXV' );
define( 'AUTH_SALT',        'X7Qn~9QZ<csy=s52:qt&[W*U(N9o,Eh(cS=/$SmZ1DJ/jK9eGS0m Ji)mqoAJjRS' );
define( 'SECURE_AUTH_SALT', 'X}^.=s0AcgfA1Wn+a_,p1.}/T;Ce*kKP]oqhDhT!gGWFXPO=K)_Zp$smDU{ 8 X*' );
define( 'LOGGED_IN_SALT',   'T{AUmm;WBz=IIl+9!^Jtmrr6ib9RO90-|;JQ3[#Z+@u+aa8iSx-e*$}78nLN(/eB' );
define( 'NONCE_SALT',       'cXS#K5kq11pz1sY%m3=k1F4s$0FPnOeLjJA0Qxg=3)|Grb|dzg_Dg3D)f$6F;ZlJ' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
