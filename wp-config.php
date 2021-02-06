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
define('AUTH_KEY',         '2On2b+94A7kWwbSjfRrxqVlJK8C1Xd3IxaMUbKv6mb4+Ai3fJLe6F4dusDmQSXk9arL5PCGpEQ6nQczMtQpeVw==');
define('SECURE_AUTH_KEY',  'FUsY7nb2XnR/fDqF1xiUgOlHbPX4MEUQNueXxP1X4deymwFemXWY9XpgdyDyBE85XMjnhhUlRiEDiOx9Ez3nsw==');
define('LOGGED_IN_KEY',    'FqCFnzs8tDi7JSFP2rNmNDMKXcUJBF/6/GyHX7MoHOmzL2zkHDNWlqem+h9zIhAMrEfVNUwGs/H7OwI544tA6g==');
define('NONCE_KEY',        '93mOkhraoXADWS0kfZBamaiZwvobL6T73SG7VUtEQynHrz9RsxNgi134eRcaKBzRaysz6ATMN9Pcg1ELG5XflQ==');
define('AUTH_SALT',        'fXwxPjhpTR1YiiXUJwm1tavaRvF7SQ6RQkakcJFAZ9LVvsv0Wrd9OXFhChf9K0ODLE96E1RjQyI7T/VW/5vv+g==');
define('SECURE_AUTH_SALT', 'DyBrlNOyc7yaYvsTDVJ1Q+GrrDyv42EmDhngEJqKgkrMHiSqwQE6sWiBhnRPLsjApdCVtU18Tj4tHxpnZJG9/A==');
define('LOGGED_IN_SALT',   'latPwq3VYumfCrfvTICvpGGYhzgw+0/mJbsuYBzzR/+eSuimyK4OQYzyBh+WX0E+bIaUn+kupGmnP9KQ/6l3aw==');
define('NONCE_SALT',       'li0Q0YYaNSXbmstqBZ6O8khbrJya8gOlLjWxW9+2B6GjeEiD6Y2H5WX+SDQixK2O0xWLySSZURn6nxty7qFhuQ==');

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
