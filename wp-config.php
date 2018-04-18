<?php define('WP_ALLOW_REPAIR', true);
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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dev-it' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'xX^R>c<vY[G%[ZA$eJs]B1J8F>[Qu$L[DbWkG/#E?B0<V<F<AGTN>$s}@4I@<Mi}' );
define( 'SECURE_AUTH_KEY',  '5!k?:,Cqibl}J>PK3DU8+wx%&7G#qt[s%* 19YkXjRf#Z{~_5@aG8M1reWTYOoZv' );
define( 'LOGGED_IN_KEY',    'xPGeN1qASfq7 xl:*a$nO}{.4G8#e~yu6_PU;;MFYvc4d00DuPlX|:3pciFA].V+' );
define( 'NONCE_KEY',        '<_X1lvL*O1JGz/J@oxqvM2tDX;Bj2dI[-YMc1R&H7cltIPEV}08cT^&m#Y,^;vS]' );
define( 'AUTH_SALT',        '`>eV_~uS@ .IAMTy;$om50JyXuZ}OTx>_BAqlU!}vn}KOt/+q!NaFrC*^]| P}4_' );
define( 'SECURE_AUTH_SALT', 'q2X,|vCem-%{gDNsPaiLD(a ;tR72rp)tqGS!j@dWS liD_uO/^?-g`Q#Qp7%W1]' );
define( 'LOGGED_IN_SALT',   '>`+#a6DR(Y)j<?(nMq94 ^WIKWJz`HzS*BN7nrF nq9LsQ(79l?2,h+K9{N4I,Y(' );
define( 'NONCE_SALT',       'L8]UH?U]=(v?}jznz2<,WU]htS`.&Q-[bk(tM>HwI/>Dl~8[a~E!Jaz7L0b(8<vI' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
