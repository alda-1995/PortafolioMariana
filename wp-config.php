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
define( 'DB_NAME', 'bdportafolio' );

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
define( 'AUTH_KEY',         'aL~byGTJ*K:o4d:-WCDLS)0/!ZR~&jUpd]DoL;U)THpG0ui<3GKC/oCi>r/I:4I9' );
define( 'SECURE_AUTH_KEY',  '_:ps~d4){Ii3VxR<MX:s@92hG*BwYA fg>Nk@yahIyh)8n`g|tF@4*Tk}gI8H#)a' );
define( 'LOGGED_IN_KEY',    'DfW`FK__ -+9H8xH^+VW,8R&]7TBXW`JqvxKR}re?fhj7-ZuqMi*NfNL7)tV9Q6(' );
define( 'NONCE_KEY',        'x/g- f+fF4Y ]FVoP~Q+R@w-mv!DNjK+QHD<TM`gK=?%#J&iu[F|K%U=4W`=4Pxq' );
define( 'AUTH_SALT',        '$1~Bt@-0w-Tr&ITL5FEK]P5FxQ<}}#iN$mOw0Qg{vv/Br+ww1=cJ4K*L6pd9|$NT' );
define( 'SECURE_AUTH_SALT', ';KD9Y0RTkmWlYuz;Ysr%S6QnvUyUA;+#1.J-ERr3.ntM0/d_6w7SSuYl(%8Yw`SZ' );
define( 'LOGGED_IN_SALT',   '|?vO&B8Tf/WS:}tlE0x*gf~{P7HL/0_>%s`$MqhB| 65,U9tJTjBLkWk]u|9 LhF' );
define( 'NONCE_SALT',       'E{5_GFNtSB2{JAr{`N%GFr{7wzzY]B#h/Tk0 X2RpIm:N~%;&D#G/neuona]G5BX' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'portm_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
