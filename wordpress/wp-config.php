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
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME', true) );

/** MySQL database username */
define( 'DB_USER', getenv('WORDPRESS_DB_USER', true) );

/** MySQL database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD', true) );

/** MySQL hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST', true) );

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
define( 'AUTH_KEY',         'Q2qAm]Y$pJ2QYf<3MS9IVDSXm(P7gN,2.tDrMKT00-I3z>oW;EQ=o! I)^_<#Bnd' );
define( 'SECURE_AUTH_KEY',  '`dnJg= MqHx-.[`;)pR5!no+HlaxgRyzbGa&0:TU@XD|1bepKtFH-F%f|U7p^5m]' );
define( 'LOGGED_IN_KEY',    '{p;!|*Y&mjxHH;}S7E#=I% (2ADUB{|8A@h(N$*%_l*!q8LMq4b[_13=,}Wv)Q1t' );
define( 'NONCE_KEY',        'TxY?Is/c.aO|s.b`*6&!DN<Ie9#X$5r3y^fI%bBDD-T6<&ZNm>EP#]/854 =Mz*T' );
define( 'AUTH_SALT',        'xys[-Y[6kcH4L2rBmf;+5&5ZB~p{rq>-f@k$IBg}{/=9:-7NwVFvH#?YIZ2sG=Y:' );
define( 'SECURE_AUTH_SALT', '=]KdRf35*=lZb8K!=Xg8A}2/JHGH6Xyrw:Z-w?nzq;}^cv5H>0lu$!VD7cZ% !8H' );
define( 'LOGGED_IN_SALT',   '#jF@=3%j*wt<%Y!`}cAI[l4s!IE3-l!-9eUVBR}*4S26!0(7N{y5U_:?WWLay#x5' );
define( 'NONCE_SALT',       'cG&0#`HyD=J<u&rGo65|E;6m~t-sg/^C1?8nW,l9QX~UgMrzb08UNqi.!8p!C+,P' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
