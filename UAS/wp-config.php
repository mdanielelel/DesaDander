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
define( 'DB_NAME', 'desadand_wp874' );

/** Database username */
define( 'DB_USER', 'desadand_wp874' );

/** Database password */
define( 'DB_PASSWORD', '[7pFS@D460' );

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
define( 'AUTH_KEY',         'rnaws0fvrzberckpjc0n0lnbgmcomznjrcqtfezvrhimlo76htls78sbdbjmdhk0' );
define( 'SECURE_AUTH_KEY',  'zmm3rsa2ec0667zrq8r6h6uzcqzjqrvhu6jhdypiszdyzl2jyrmeht281ubbqggw' );
define( 'LOGGED_IN_KEY',    'janueq2qamcupjlen5rkmp1skpidfukqaaryowdsduweuitum7u3gm2kcmanvs15' );
define( 'NONCE_KEY',        'ffmf5dxgr4gbbytxhj2kz4jfgipnvvw9tqhhmnufdzlh25vklkmp9maquzuiwq12' );
define( 'AUTH_SALT',        '6mof1nsxs3tqxvsahbmmbzkas782pntrboeabtclozxi6fmejcwfoh0krylaczlg' );
define( 'SECURE_AUTH_SALT', 'tewbbfivalbwoenmzhieuslxe9une9hfwya19myytamsgagfx95iwjb47kl4d672' );
define( 'LOGGED_IN_SALT',   'k9n317hzf2riwmnlngnqn0w4anrinnefzopgvykkgd1bgut47f4tyvyvb9j1jzwt' );
define( 'NONCE_SALT',       'osc0buagnlpuebl9hoqh8a2cmmiqgvuy7pd7oxmtuifs64tcd3h6ue4nsdp9w0t0' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp4k_';

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
