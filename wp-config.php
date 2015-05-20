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
define('DB_NAME', 'bubbubbu_wo7121');

/** MySQL database username */
define('DB_USER', 'bubbubbu_wo7121');

/** MySQL database password */
define('DB_PASSWORD', 'rTc9N2s5MTq2');

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
define('AUTH_KEY', '|n}+W*[xHJuJ]o%kcGadG)d]LvLt|dev&(xhV[eWz$hsP!_@W{$T>J+z>xkzzAvgHYK{%(fsW(qInCeXM^zrWlw[Ap$U%GP!L%RvlqW(&K}R+mRBxL)K}OCPRFHGvJ[E');
define('SECURE_AUTH_KEY', 'R(B]PE_|PQ}>fa|HGf}TVz/JPtvX@o>mjLnKEKIV+hGlNy{WDy[xJMxFKOJcskyNLgXl{jZ=xR?h{sXHEAo?>XamObM&!t@AMl+Mq+dkW*}U@ME]+uTsIxd(*U/U!p!=');
define('LOGGED_IN_KEY', 'cDEH-Zm+<hK{ziA|(rQ^_smXjDnaEZGlvacfGNqXJJUjWUduBcy^Bez>=hQDUZdBnm]IUKU;FifWAi_oEVl_cgQL}O$G&gs=xVw!kLT*<*[ou]w@k;Fdnp=)TSi-?O)u');
define('NONCE_KEY', 'jsm$gdjF+j{|Et-NvWX)*}nnP>CLZZ}ch[CW^)llj%tVzJ>lBk[(fLjHh;jvq|{O*b$G$!P|h-uVZikTm_OqVn{lT=hrdN}Gj*E|Nx+tcMREI+utED^b(kbMzqzdYUuO');
define('AUTH_SALT', '}E;Id-wXAhYRe^[{o)D%%P=FHJm!orqbKpwr_hAI$skLV-PgGFq*ZO{Qbk|@Lr&AsOXJPjv^=-LDyf-YNh|CoeN]ic!ca?KQwGF?Pjl[VtS-VcqraLybvVKRYUMO^(]n');
define('SECURE_AUTH_SALT', 'J*Cvtk/!Jpf^Z*&q(cJ<pQbyI)BYeDUdzKK|&Sb;%jU;dFfOh[$i!}x@OsPfP>Ei-=Y%cYlJ%wZHxxWm-tAM![BAnYtZpm!Bxb@t^uJp{=K]ahvL[;ZCT(!USU|S?Y]r');
define('LOGGED_IN_SALT', 'AMO^Zh@A^pn(_nmVolscPxxnU@xgxt-VSs;^eZdhi]uTE=>_h%a_>OJckUv|qe%M/rXDOxDx;HA_Gk+&o;b]xO=n?WRZM*Xl!=_c)YErj|lHN@Jd<nU+HNtf?S=AaZu{');
define('NONCE_SALT', '>U^iaUq(Y{%EKtUSTZ(Aca^Y=GQHrWAYi(RZETJyQVCZ+-XNy(j{Z^vLhuSSZwgJmnGV]W/Twktbr%W<d_(rzh{Ngl=o;Ua%P^(f{K(^d@{h?{QOoH^/rT=cl-[qKRsQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_mejx_';

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

/**
 * Include tweaks requested by hosting providers.  You can safely
 * remove either the file or comment out the lines below to get
 * to a vanilla state.
 */
if (file_exists(ABSPATH . 'hosting_provider_filters.php')) {
	include('hosting_provider_filters.php');
}
