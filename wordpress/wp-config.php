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
define('DB_NAME', 'voyagewp');

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
define('AUTH_KEY',         '#@Y(>8F1y<V}/5@w,O9?`X66Mg$i!Sp~o$[8F(3zh5V|Y[W)GtiV!;D$F-RG/1*r');
define('SECURE_AUTH_KEY',  '%:CupP7IU[Su}sn0,8EV[n]*X>p24<*<jtmJYAe5qr5aKo?d%BBt.Xa>L}k%ho(X');
define('LOGGED_IN_KEY',    'oU7fj7t-Ck]r +Kbac~.d_$Ej%I6rnGobj?$2}BE!+@h5}Lw%Rsu &2p}r}`=VXA');
define('NONCE_KEY',        'c9XUFSx8zP`HW8k_.z~F@!aXqhM;Z1S1nEi~p;$SRWNnvL?P?LNAj}O<G+k=d}xf');
define('AUTH_SALT',        'pT=z<09]Y87VS!Jy?bTm4>67<VFoMneX={87d&}UL;y:h$*SKqYKp`(](Y3fJE8!');
define('SECURE_AUTH_SALT', 'nd%-2{S{CAhNI/$~*H%k/)oFVqPjS)uV}7veZFD;`c82Lx8oSu$F:kao`O0^LX1$');
define('LOGGED_IN_SALT',   'pDAW!v{!sxS]P=iceBTP0-b60Yp:Av}A}yyMFe/NNdn)w^r>i>^B?5}r;JZTk0_x');
define('NONCE_SALT',       '>I~L5if36mZBR %5p@31)HJ%?jfJRr81QSY?>d)? u4=4Vsoi5r[5Oo@BYCBVZ?s');

define( 'WPCF7_AUTOP', false );


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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
