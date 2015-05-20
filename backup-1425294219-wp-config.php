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
define('DB_NAME', 'bubbubbu_wo7043');

/** MySQL database username */
define('DB_USER', 'bubbubbu_wo7043');

/** MySQL database password */
define('DB_PASSWORD', 'dLbtPHqR0Ifd');

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
define('AUTH_KEY', 'QYaQg)jhQspOwYVU*-y/pW_ZU[LHnKSPc/;]+Qk)POT=ErX%xQhrnMMv*hD]RzoWN$;>JBqLG<sZQvby@=A;|wC)c[*>G=GV/>pDiWZSru?KWBb|MzWtxtj(d?K-v[{l');
define('SECURE_AUTH_KEY', '*{$VxJ$JN&nlMECplGTKm+/HvPsU/qJEXatFVRaQiK|ZkYT)|ruoiRdD]@&euxMF@))/H/UF!zq{-pIE-g_vv>c;i$F*g]eO?QT<huOfKGG)CEqN%tG=m_}(FQ{iHlna');
define('LOGGED_IN_KEY', 'VhSREK<Gr%llQte}OyGbyJJ?X]Krjp(!S*Lrx?[^|ne?GIbcONAZ(_]d(p%a(KtBB)>cGw[n)Vs;pZ[B(-HqSX;^ay=IlZ;PoejGU;$Qi@cppPmD|w|GMaZt{tMx(=bD');
define('NONCE_KEY', 'ATqv/{jVA(XVIeHYFLcwXa=vpui>R^U}u@ZpZMUHwN|P[Q$ZP%GKfeZCB/fd?SEJbw=EZngtHmG!&@({X=vv}tgWH^xHhqg++ZqTbwkkmP?}>Cd?ruP<NS/PVrxb)e_o');
define('AUTH_SALT', '+ca>ufCSJ}?_=ZNShS;?WvWxHblxhMd^(zJzf_!|sZl<*>&d;[@={ax_?rs;BE_Q(E*wFxf-Y=]f^^[jUXc>lm^my+oSNxbWVO-}b*uuI?nQdan)pLWkYL++_S]_eEzp');
define('SECURE_AUTH_SALT', 'hw/L=M/Fri;htpUvQPsmvTvCQ@KOj|j[xrn!^^}$lwv;O{Oa=dDTA+ZmGx/b=S[C$t_Jokn/lWnS-{VUsYMtSpH%@_nkx]Lx)EK*D$H^IZD|^Q[bM{&]TtF[[=-<KsEN');
define('LOGGED_IN_SALT', 'gY{v$?jrxkq_>=c@XHs^yJ$vn@pu;HJ-H;_w>taW]n=C?LsUFXpbBcugN==Ynn_IKagGHIw*zW)nF%P)$(Bv!cHGK>&H&qGcqkXxPAS$%XqTdQvOAq?HEEJNWc$;Tpnr');
define('NONCE_SALT', '@+%wSDQoj/N/*J]$rm+@zT=uVuTvbPJjotu<*dhF!a@Z-oqoZNvWi<d?ry?E?[ohsiEobQlWrJ^dO%!/hcRpQXyTCpA]QehmW;UW^%CkrrP|oj[^=_Z=a|%GEAeEzyq[');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_yhxr_';

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
