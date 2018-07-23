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
define('DB_NAME', 'test_codingninjas');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ')_vB864SvHeK$!X^3C68(]b#D|i*-RI=8VPfSv)}wxqbNk%pz3,Es<2q-p_NO[.~');
define('SECURE_AUTH_KEY',  '*f 1+g0cw{.jg:/CmGE;Lk{k6RQu29Mv,-KaICm>Bho9C_Uviwd2f^}?52uC~r2*');
define('LOGGED_IN_KEY',    'TXZ{G&3gf{Zr,,Wjpf4*6PkXNURF}nNES6<pl$czh:fu 4#aB#3cLe5l5n4;+R3+');
define('NONCE_KEY',        '{p_0N![(~.._9JttpU~m;`/E>E6c/0vBa.HHNzV3Q9$kWE+uR)@xWQptBGc,s3:R');
define('AUTH_SALT',        'HRwRtr;.,afZO{i_nn<)>=xe,ic+4vwSDuyd`NBF<hGV*-du9??CL3%RL[_aCO4B');
define('SECURE_AUTH_SALT', 'aQ3XsdTV,XHI-y]1kXgQ%pNG*YLkxG%U.N^zqwL&5z{.PozM%m_@/YRd#yN1&Uyg');
define('LOGGED_IN_SALT',   '.Fs<7D?qOp?.Zev&1~f>5T+:JuaAy!4@#f`=XDcJniVhCeMq_=@?)<3^5n:U:>/n');
define('NONCE_SALT',       'YStyX[p~2M{/W]bD~?Zv2VFR+b]Sw9]FvLd:OQFxRs<&,>un@n%%sSU_8J>{xM={');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
