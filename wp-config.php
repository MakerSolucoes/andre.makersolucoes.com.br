<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
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
define( 'DB_NAME', 'makersol_andre' );

/** Database username */
define( 'DB_USER', 'makersol_andre' );

/** Database password */
define( 'DB_PASSWORD', 'tgFX?.UT]aWL' );

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
define( 'AUTH_KEY',         'mao5boeruphyhgjfsabxepl0fxcktmg5ykag36lsc0b7ogkzqwwvxc0qzhjt6nn8' );
define( 'SECURE_AUTH_KEY',  '9ql0q0awma9h0puz5ycq8kxuo0rum3vp9sfhagrrxo3rvxqopcnu8co7oql83klm' );
define( 'LOGGED_IN_KEY',    '1aj7znjon8omzmljj7egoq6zofnzhrncwyadblzmohxmevmgadaouggegxpkwhmk' );
define( 'NONCE_KEY',        '6prsjlp34xgnh1r5dbz80rkpr1dp6ka7ufkgg5n7s4x2h895yqcneeisncgsnivb' );
define( 'AUTH_SALT',        '9kjjbu14we58y4fxcpo3irbfgzdrbvsqaea5a84vh6g4s5x9ejavnkweptto7jgy' );
define( 'SECURE_AUTH_SALT', 'ntnabrdpjxuu7unsz1vhhf8lxoyd6unabiy1mrnlzcrqx3xyr0hfwwb44etdbfkz' );
define( 'LOGGED_IN_SALT',   '590bujdifxeskgmnpayakqjop767fzagixz5tuwkrshjvtjziyzpykjsbmakwwxd' );
define( 'NONCE_SALT',       'tr0qugsz2gpmelrps01h7wkozp8mrr2znz15kny8mfoklrs5yldrc0wovg40qt3w' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpvj_';

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
