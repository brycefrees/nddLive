<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nddLive');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'dP!coUBGu1e><<L)VYJ|5N+Q])M0PN<h[MVq*Gk;fbVe:SjS/D:8{)uq}9`/;vPe');
define('SECURE_AUTH_KEY',  ';9s+[/U@fVlrK@A{/5=4g#J0>@*>WJ<M6i^[_o]P<}S#uJ+}~{`s}D|927ICUXJd');
define('LOGGED_IN_KEY',    '<Y*C 6<Q[62?EhB|V=kB9+E}$#-A7~0Pj}=+.V<kHcRg/lg]I{M=+5=N`L,2+<vb');
define('NONCE_KEY',        'SI8@q5Y-]P{O9g|(ET^.k@OGBWuoO3<+h]Bv39:66gmB1g8k:rm&zYOUuQ7N55lf');
define('AUTH_SALT',        '8F]|,]l#&&&pOF@3+o.WibSv|={4p**>^.toaY_QCaml T{351+ 5rxlIlA}$%(h');
define('SECURE_AUTH_SALT', ':@3>|P!<t//oXDhQEzZMs+#n +i|9uyB:lmwRVfT:3iGSm|:Ptx [D/Nawn;h+mM');
define('LOGGED_IN_SALT',   '_+`qE=8D|Cj`+.2ut(IM,PV&F)~X#F|L~co:k|j53^,&fyQ=`*:|OUY62B&jZ=1@');
define('NONCE_SALT',       'wN2E SAD%QDu,Xj?t=O?PH`Oy+IJU|gQ:<@gB0)J.92R @|shvA]kYE-5DT(etq ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
