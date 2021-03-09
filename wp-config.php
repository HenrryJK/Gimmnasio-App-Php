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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fdWe91+IGct4jaSD1WLHHKiOLBSwvGFLpNHnPdejBDAasglP27YnmrRFweOL+G9foQRaZJjdJNUyOogQChcCww==');
define('SECURE_AUTH_KEY',  's/+FCsqSzsN9ehIt8XROcgB/+feepWpLPhehVuxERH9cbTFRsUTQwwRctEd3nT2pD8blnVXKRHzPUFqUiNKgDQ==');
define('LOGGED_IN_KEY',    'Kmt62bUAxk0BOW1qf4uRDFB5Jmv2F8YmSjYZjQ1JaOHA9iBNF0CyggGHynlzpksvJiEQGz/OR6vKfgfPWo/kjw==');
define('NONCE_KEY',        'VitBMjDMdis84UfzMthlATkbfSDDAC4Lx6rCxlZL6SQDbgqRH4Ah1UQ3WTQT4fuOLzKEzT6CVbyDGMHfSLs6pA==');
define('AUTH_SALT',        'p0v6lQvijdI3wvarR7UM/1BgaN5ctcfCx8fyX2uBRashD3bk1XTiG35hFL+Vw3eagz7cohN97IjnDmh2vjx8Xw==');
define('SECURE_AUTH_SALT', 'Bsxo/B9GIsk6R5jKpUZ9JjjoJsVdMRnVzqE+i/Oewujx4558w1qgpCQNmBqWMqSwhM7C/D8j4w3mcGe+Weakcg==');
define('LOGGED_IN_SALT',   '505qIdWzk7sQYieFsnH3aCxYmJsV0fymtGS2qF7HRlCWOc/XpNV1uO+yxOcdWQVHpyV65lA59TGhxgxWf7NrNw==');
define('NONCE_SALT',       'Y2FvUaXSEfF4V3JnpUTnWwja+dPZqqxAQjWAs7A9xGSn+/ZtaLx2qTPzah8AEucAkANhDoz9DkpGI/5H9ERhpg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
