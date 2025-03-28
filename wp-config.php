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
define( 'DB_NAME', 'u567426392_wPZ6S' );

/** Database username */
define( 'DB_USER', 'u567426392_UQmCX' );

/** Database password */
define( 'DB_PASSWORD', 'YwEeEOqtFb' );

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
define( 'AUTH_KEY',          ' :8C(/[<aN1y5!;+ROw!CraLKYff[Gv%_A-I:3CWPu0}0|qPwV D*BbEvYQN@sGq' );
define( 'SECURE_AUTH_KEY',   '?;oDvnse^z#ok^Y=wir8(val*8<~!l!9/%c[4TO:U Gr>9qXmT2(H6<SYQsNT[LW' );
define( 'LOGGED_IN_KEY',     '_V3Qhu4z6}+d`}*{&GI}a`yL{U,M)HqghiJ>6<H&}?bqAjqbd57j!F[XBCkD*Qzz' );
define( 'NONCE_KEY',         '8kvwr8z:Cp!;Hhyr^ob4V!UV*f 0kf^`Uj}(Fx&w|gsz3lA!fNG-m_Opkk.Om2vQ' );
define( 'AUTH_SALT',         ']|r.)d8Atxnd*+ps: }|#A/],uXBPh%PG(-6e3E+y(__n!naaJM$zt0*$i0|6@Mw' );
define( 'SECURE_AUTH_SALT',  ']l4(CzaN|yV+6.y]+`ZBZ/*]7`7X+zl{bM6}VL7K-jQFlpQJ7y/@i}C/X<0?-*p9' );
define( 'LOGGED_IN_SALT',    'Vye V>xmp-?;Hs]Y_e.44P:@PsfVt//bW9,X3Jp-=Rp6aro:af|[xnheMi9Of@ b' );
define( 'NONCE_SALT',        '5-SKS][gY5l6Gu0)?Nb].*,>,c&}0A4~CD3jspN;C.RT2${^qQx_sn]5/r8SEU%&' );
define( 'WP_CACHE_KEY_SALT', '}];UHp_(d<F>Yl}TXdOZY(f!0%;<>A.Osb/(Hpt>r4hW4xDuZLDe[xrLm/UY6=Y/' );


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
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
