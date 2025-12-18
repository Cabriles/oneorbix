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
define( 'DB_NAME', 'u897564190_oneorbix' );

/** Database username */
define( 'DB_USER', 'u897564190_Cabriles' );

/** Database password */
define( 'DB_PASSWORD', 'Oneorbix25@' );

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
define( 'AUTH_KEY',          ']D,)@]1b(<%6=h|0eZQTYIy<Z,45a zxY}[tt9ec(]v.G|~;+y2xYv$cf?3#)hK$' );
define( 'SECURE_AUTH_KEY',   'tLtou]Go#ipZy)R3g{$Bj&<bhM(~nnh*dC;VO<8^8vn<Hkzm57CHz]^`P ]fD1r-' );
define( 'LOGGED_IN_KEY',     'Sp$wEg%pa([2pwO@l4#{,uwJdPp3fh V@,qc.5:[btj!bP~H&9]emS#TnJBY#HQa' );
define( 'NONCE_KEY',         '(]hyozcK3o5aC))%Kw_GaluP_D]0`01?+cjlHX0NiZHdqUXYW5yzyKNc#vF*S.wy' );
define( 'AUTH_SALT',         'd{dfFr5F|glrDPU49BT#Xwbu82X{,Q<VA!0G(D9;$Nn@?BTR&M7(;F5^A#|>3sy(' );
define( 'SECURE_AUTH_SALT',  '%uc0RntaTDd|?4nC2^na7/eVK>~h4%Dh1&0*P_j;JMt~EH@W?;urXDNL-#59{u_V' );
define( 'LOGGED_IN_SALT',    '$)kuZ<:zNi#tIAVP*~V&EuogTyzxAJ.Pf|sWvDJd2.9BV|/#BOnsH3pju$<.{~B=' );
define( 'NONCE_SALT',        'S/zQw6.<cJwe>p$&Z.AC0@1V1*J8kv-t?=ELiXz)1W5E{w/Au@`Ho/8ihnUp09,U' );
define( 'WP_CACHE_KEY_SALT', 'Vh4$A 8x`kI{aoe9KEh,H^KlNzy[y8=4hgE*#hq(6,Lp}1YCJGzL,uq2iY:4[Th6' );


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
define( 'COOKIEHASH', 'f0abf152621e2212f42d9431339da08d' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
