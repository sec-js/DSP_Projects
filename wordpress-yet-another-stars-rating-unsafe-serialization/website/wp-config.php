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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'db:3306' );

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
define('AUTH_KEY',         'MiR*YR: (duVUeH0[d.9vPI/{%[p>-l@Y3UY>9@&B+K=<Jg>VFZV}_[<F@&.0zN8');
define('SECURE_AUTH_KEY',  '71S.3g#9S]S4v&{EtGNz;JsL>tDQC[SejC+CfN0jCgLO`( @ DIP+{[w1Vf6>P[r');
define('LOGGED_IN_KEY',    'y@l{tS>!NC M>l; NLW7^+9|-?c-m(KN^K-a+JXwBdJ7h;J|x`X,+_?L-uC2Z; ;');
define('NONCE_KEY',        'F.QG@iXHJ[!#Lzy0_)%|vQEo7>R+oxTz5N1ZTex<DUx}x=sN{2;D++O/M-{EOt)I');
define('AUTH_SALT',        'fW)863uzfVe jnSp0&Yj@xGXz|I6cd|cy&mdb1`?%SC%a+R0?+b{hIdFF8K[0#gD');
define('SECURE_AUTH_SALT', 'N+I$5i#%4u|@a8q8}4}Ib]}BBpIvME=-m Hz4YKzlB/B}a5r#CkBQ&IJ 6Tmh#hf');
define('LOGGED_IN_SALT',   'q~v!7/!H@oTWG!{tq-L)N&na n8p$W.0ll2bN16Y;x0ymS(NY^#qF)Y+HZsITWtT');
define('NONCE_SALT',       ':bbZ|3`xTvcceR^GK..[3oF3^X#i!Qw_%0DKmK$7=)|Mt$9|eWqN|S@;B%6I3~>7');

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
