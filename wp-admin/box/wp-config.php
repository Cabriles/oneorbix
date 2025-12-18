<?php
define( 'WP_CACHE', true );

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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u454567764_NGfeK' );

/** Database username */
define( 'DB_USER', 'u454567764_vCu3Y' );

/** Database password */
define( 'DB_PASSWORD', '9zpFDQB0Kt' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'h<,tD.^_ {dAS!`{P-SzK,6{^+yC-p5YZ(s023eJO<3ZX_@8nT7$/CHR@Juz#W4_' );
define( 'SECURE_AUTH_KEY',   'UU*OhhsT/J,t{-<~?@%]7(zzY?)^K)_IGHLHE)oUTr|5JY!@KF**8JWpdjReE 7a' );
define( 'LOGGED_IN_KEY',     'Ac7n/:%.hA/TZNh~A4}`7duqRw.OR@Z9flEkU?`xMc|sPWa$d-vh{Xsy6vB2|<hd' );
define( 'NONCE_KEY',         'G7*n=L$~#hB^jC7b*)x{1*-Rc}I> mPYW6%GjWMO9Le;%1a!K|(?0l/Ca]G9s6_j' );
define( 'AUTH_SALT',         'RC_-_ydv!;d)3@yo*6jPC}i7.,3=q#jXl,ebja~1^.!Ck9AOoOS#nV:4TxtvCJs ' );
define( 'SECURE_AUTH_SALT',  '>7Ge4Ga{ox^X7AH6#6oEg)LJt=IzRD.sbx#VKz6at-Tz<mA!C4l/ndY.X2K1^rxP' );
define( 'LOGGED_IN_SALT',    'd.7xBOF:VIWE%3-E1UJ ^rTW_:?A$F/2e0nr6pIAT5I(`5?0d 5`^jz$($eor3a6' );
define( 'NONCE_SALT',        'NeN{lj}Y(B?otA=1?!M+K&jBtMHw6]Ha%4[dYPXH,-n_OJ!O8mTtO<v6J*ZS[r47' );
define( 'WP_CACHE_KEY_SALT', 'B+>|z)pN3Iy(eMhe8R-r81Sxq<qT;]rU6m:{W2y{U>688#$w9>m5[~ff]i)X;^tU' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', 'b77100aa65bce5e56b46935f4a2da1c4' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
