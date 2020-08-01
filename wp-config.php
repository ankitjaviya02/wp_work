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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wk' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', '123456' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' u`>[.kB7c4e%r/Vj;raOj~!Ln*%|0U}3a1j,uf(bE,CUyep_Ya</lHN,dP,-pn!' );
define( 'SECURE_AUTH_KEY',  ';VAcs!AaNe:U41)]`R[KL};X}X:lCYlgYuHc*^ak^hT}[O:g:m3*+eNE4#sd5gOq' );
define( 'LOGGED_IN_KEY',    'oJ5lW,KCIk#m^wCo+l@9<`PVJ40[*O&}uIef}ak/NdU rbFTl9v#bh~p.$uszGsX' );
define( 'NONCE_KEY',        '26rcR8{J^8hl#DX#nUt .ic~-BRARUJ[~`0^j[MI;j:U  FR(iVMnzJeNODdy<w!' );
define( 'AUTH_SALT',        '$y{wD-2QKr9^hywCDW;Lj?MD~.M*S.;jV?,lNB]s#Z}ODr>hrEq?C0z?(U38{8Lm' );
define( 'SECURE_AUTH_SALT', '=,Ugb@i>,cj5Qt%JHB<=[>>7y%>fqc86jc}1@>:y9D-sUBC/O~m&EBc^=SAm+:T#' );
define( 'LOGGED_IN_SALT',   ']:2aqU[m}e4Yi(9AWqMkb,|SWNZvOHBYSN,~ih-ASX[BBRSar$wc%H2axah>BF5L' );
define( 'NONCE_SALT',       'S`)4BQmYY3]DG2!oSPq`pmvVru4N*.ev$PSg<a+<[_V(A*LZs0vA!Ef<7L1 -, 6' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
