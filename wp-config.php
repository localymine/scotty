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
define('DB_NAME', 'scotty');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'M[Add&rAlk{ULMQNo:LLPJ2vF[ej0G*#<3!/(R&F>c,HA)Jd%{W_C$wKwFqdawzZ');
define('SECURE_AUTH_KEY',  'rzqJ,X=)pgZ&qcv7;~)ERKq?v>U{]odztQd7v]T7bVW4;fhg8IDFLi,LAqB)t!pj');
define('LOGGED_IN_KEY',    '{Iygl;T?#!y5`sf)1+Ez#`S3]Qe0iCwHoB>Kha->W-0k+0n5h#;lr43Me#Z[;cuK');
define('NONCE_KEY',        '/vtfjUVrL.-;B;qCgy$L].?@}$nt]EeB<W{xwnFb3VEgNxoANrs/>tFK;izDtaP,');
define('AUTH_SALT',        'ACp?BN$G9nptb`/e4h~EDPN_df$ywdH|[$M]Ve-^?EFQA1fy>nM@[IRK F^&+^&V');
define('SECURE_AUTH_SALT', '}ve+ *_)D[-~x7hS}/mtfsyrl[J|B>wLk&ysR.(z4PA8c+PS9Fe`,2T%+R1Gb|2b');
define('LOGGED_IN_SALT',   'LQt<$#4Wveu(GOQ=q-()?he`V/^G6=qb:_*Vq-PkBt+R2/XaUd(5`%=.ZduVaUGI');
define('NONCE_SALT',       'j*^)]5}`]LOcT=F>4|+*V{ivPB9<UL7]CP]CcsQdy#9t=Ztn^soKnE+?5M+?PE<<');

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
