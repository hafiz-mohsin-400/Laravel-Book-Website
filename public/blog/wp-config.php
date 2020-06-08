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
define( 'DB_NAME', 'alliedbookswpdb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'lQ51Z?vAqoU:JSP <onb{jouPpf @])w`4t-wt7BztbLYm656 <<DIy0{:am*-~q' );
define( 'SECURE_AUTH_KEY',  'F4jEi.}1[QQH$9#tM-D6}vA)Z6Z^Zi!K)>X0?%a[+ajC2Yw_#W:ojeo.ls}%G9t|' );
define( 'LOGGED_IN_KEY',    '5+ddm~I^]GihoSDv@OAc n<I,^Z]<!u=MP4/|qL4MYKoj*Puo.SFS{i$mAU ovM_' );
define( 'NONCE_KEY',        '^W2fuu$Y-P8/q]o)h*DPd8rMZblx%o%KYCB1x)ku& Vw?Hs{;0L?#DYOQC;$[Td;' );
define( 'AUTH_SALT',        'B#a &;e;.o;hwYc1s[<Cv?.uJ+6$EeYzJxQ>`_n eWMnlPjBk]rsk!rA+Met!/VM' );
define( 'SECURE_AUTH_SALT', 'oEKLC)V;iM~,$F5tsd_l]N}5F@(u+^Jn<4/,I2nCfvP1kw@4*T 5EL_wiK<SrH)!' );
define( 'LOGGED_IN_SALT',   '!qGNwpa/W _py3Y#D|~Km@80)0_8HN:ey4VE{`hj`U~h9YV;?Vi{W McK<KLPCQR' );
define( 'NONCE_SALT',       'x3a=WL+z^YU6 M%/RZ:$1liN.{P{11UMcV{b9)GQ[)@+{CD]_}0M1MgoLDf%DJL?' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'alliedbook110_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
