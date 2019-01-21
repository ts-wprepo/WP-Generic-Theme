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
define('DB_NAME', 'wp_basic_site_db');

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
define('AUTH_KEY',         'jN}G|Lbe4llGV))DU5{)%b^!ihJT(,ceFeHoM%Sp63YT9c-E3MY;TUNNTzK=l<=c');
define('SECURE_AUTH_KEY',  'Vmc*;~Ked*]<{o9g6nJPK(,OE~UYJI/!IcZK_YF`?TS$fUQJi@?TF_<O$-RF@;SQ');
define('LOGGED_IN_KEY',    'MO$vUNRG@.SDv$P#;|`HCE@F[v9wcw@`y^ZyZPKk@?A:QVPS>nNg(3m~bl8@+0X=');
define('NONCE_KEY',        'Ia6J0!XCJ.28>f8&;JPk;Sk.#TYspKT:WfKob+a(w%PHCBkEEz%I@C_%xV]fPm?6');
define('AUTH_SALT',        'qamf]stIFf,Gu?4/u[9_(/P/D>[~l9xX~/j3U)<^*Pn)dVADt4e:x*#,`[}UEmZU');
define('SECURE_AUTH_SALT', ')dY4R=mMcJ-vJ6dy~JTp`r,#p$e}]m)}jQZkv/?LPvz;v5#)-zlh%>t2$rG$JUd+');
define('LOGGED_IN_SALT',   '?:EG`Zbx.Vq1L<3hB~,I9M@dKG 9%<X:Ikgu;;^7D%I8yMi_X]YR?c&:5Xp4|,m5');
define('NONCE_SALT',       'Te{MLHsTf(ko@3;<s5QF^5A> &L`IWHLkQ) 4^tMCn5di87].7V(ck9SnhN%Z)et');

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
