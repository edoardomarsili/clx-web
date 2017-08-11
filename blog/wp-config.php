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
define('DB_NAME', 'clx_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '_clxSQLm1_dcit1');

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
define('AUTH_KEY',         'dt<q#@>+!VA2s~L-ORavYs[RYYT(MB,=mryY`#dRsLgPd_Fdw7QcG)Qp/)Gqie?d');
define('SECURE_AUTH_KEY',  '/Vl,j}PjP(568mtbvUZ`5QAE[Gv0E-~r*4u,5NQO!UVu )osP0&@4(p1le}*vJ:Y');
define('LOGGED_IN_KEY',    'U-s^N+cr9uOoPm/i)0;%r6-gD#G]<,)w*JW3`eRZ5dUW-f9LmFCL5CY5pJi^`iu+');
define('NONCE_KEY',        'c%D|jI.on3Qgw|d,k01+:$LfLs:L(I8@b^tUV_l(~sW~R>;$&6V]z<{u8Wiy#JhO');
define('AUTH_SALT',        ' `d4FaB{0v@d<^a|CAi>tno>l%11a|)>3)/d{K?`g0gLOZ C1<N[M~V=?TsS`]U ');
define('SECURE_AUTH_SALT', 'HL1CYiDu~Q|k0GV($ Hr Sc[DZ.^ysG1p!VufpZJ~>=1yEPw@.#:ABhH7w?5O+[_');
define('LOGGED_IN_SALT',   'kNwFygjHtQ*%9g^%:@L4TT;~YS$yA8r)on+}HZpEejRp#=PPhU~q35tzZG*H9n,^');
define('NONCE_SALT',       '0Uq#8[8Xt,AG^L&*G)[h/!j~XuO1[PXJpyDSWrgDq.%=T1pMYhO5QVV$w#!gl*oF');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'clx_blog_wp';

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

