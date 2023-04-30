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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'softuni-exam' );

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
define( 'AUTH_KEY',         '0pwPW/c|?R5ynrZ$Akk_<H]Ln>OKj{ga[GCsX[wFZ2X#[t^vSx`06?s,M8YwDD*Z' );
define( 'SECURE_AUTH_KEY',  'jBVW_UrR}1_l=4i.Y_$73$8.X;::)_mx~`]p8+7@8JmWY|nJSgl:6e7u4qWHr8,|' );
define( 'LOGGED_IN_KEY',    'rTm!_{#Y9Bo@Pi}Y[j<uEA@)2<lW)%p`94~2}@Wqo`q-n2ZyDzw)W`n,Ck=yc{}{' );
define( 'NONCE_KEY',        '9_N=>[=6xHm`NmKc6Fl$gUCkj}0Q):I7G*u5;l-.~?yCW>eRCe^KyV>oK5F:$[|x' );
define( 'AUTH_SALT',        'J9b%X-SorY2/Bl|(Oet_TuW2dA3&f&36;OR#SN@cZW4/|^!P0*cru35pR@i^@?&v' );
define( 'SECURE_AUTH_SALT', 'lhkSc[L]jxBs73W^W3>0E&#_g|h8uAz~{pT3+yUk{y!8/7u<AvT&JbU1}/oebbS>' );
define( 'LOGGED_IN_SALT',   '8`|oH05hMld=(f3j%5|*SZmF~|QACe)&R[1xfjF8L}7(5P;>xhC_w5UnR<19Rll_' );
define( 'NONCE_SALT',       '~Oj+/MjN.x/1&JJroK[8V`/Jh%E*741w/R9}6XtCu?);!`WHG2y#2o[Ya_I/|(qw' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */
define( 'WP_DEBUG_LOG', true ); # adding debug.log in wp-content folder
define( 'SCRIPT_DEBUG', true ); # showing the not minified assets
define( 'FS_METHOD', 'direct' ); // Allows you to upload/update themes/plugins/core from your localhost without the need of setting FTP server
error_reporting( E_ALL ); # Report all PHP errors
ini_set('display_errors', '1');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
