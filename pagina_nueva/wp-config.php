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
define( 'DB_NAME', 'parcial' );

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
define( 'AUTH_KEY',         'DE?bUF; uMwK{$|}^8<4_Tlh0#oTHL7nxo{?kS%qb{zv_IcD$>]Q 6_y)h/T`i6c' );
define( 'SECURE_AUTH_KEY',  'SU>H6;!Glf+q?3yHwHE7)3UM^MPoUrD:>6z2&7cGUh$l6xp|pYdT2T&{XNW ve_g' );
define( 'LOGGED_IN_KEY',    '-l`NmG}?BA_ /ed7z/y4PKO@6V}^y(Y~Fm.40P+6E2fa%8q:6EExw?[ni?7eq`i[' );
define( 'NONCE_KEY',        'tIZDP5e}#S44Jm@-)EXE+X7eB0yu`s)ZPl%jR0]-(JH*9zjqzv4H:X]2%uCQ6w1j' );
define( 'AUTH_SALT',        'Ac2;L(<:LuU[V^Vb8[28>1`0U^S>j#Al<|0tZ1FES.CH6,o[Rj=]jqIhF(-T[2o(' );
define( 'SECURE_AUTH_SALT', 'e8?ck]O?O^Om2@cK6&oaYvIB<<BI}~H*69_B>x[H]Xu>dOL29fOH3r$`8ZvXC8vF' );
define( 'LOGGED_IN_SALT',   '$+kY?N9Q{p@W$A0e4Ff^4[.z~7= 1;c0 -uti8v`SB}ITvh,Z*C2uZxY{D>yZ4s#' );
define( 'NONCE_SALT',       'Fj{~ncc41X=_w`8wJL2j]~hU(>ph+j 8zLo=U`+*-@QZh&~_UA|i2egS%m/[a7}4' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
