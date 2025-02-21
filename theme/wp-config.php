<?php

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the installation.

 * You don't have to use the website, you can copy this file to "wp-config.php"

 * and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * Database settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/

 *

 * @package WordPress

 */



// ** Database settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', 'abreton_porfolio' );



/** Database username */

define( 'DB_USER', 'abreton_admin' );



/** Database password */

define( 'DB_PASSWORD', 'Soupes15' );



/** Database hostname */

define( 'DB_HOST', 'localhost' );



/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8mb4' );



/** The database collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );



/**#@+

 * Authentication unique keys and salts.

 *

 * Change these to different unique phrases! You can generate these using

 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.

 *

 * You can change these at any point in time to invalidate all existing cookies.

 * This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         'vQCsHtbs_/?*3.as8{kBI}Du[hiya(kx75:h=Hpp=@@AaFGp8l:Ie#KUXrOR>f;V' );

define( 'SECURE_AUTH_KEY',  'xmZ:aa,sFP3_mg:#&w>8JDvaZ(9*7g,3H#j=o==rj6hfA`)^[52X=gc?ar?xfo*T' );

define( 'LOGGED_IN_KEY',    '`<QL!<xXAC!WUPLYFNY{r9n[NdcX:&)xw}Wg:>76=r7w/wGP45=BK+14++IEs`rn' );

define( 'NONCE_KEY',        '>!S6Sy.Cl_VGA4J2Zvx|-#}=B=^SX-{OqW|V:=tT=W$MVZ61 V<J@C N9_x=]cvn' );

define( 'AUTH_SALT',        'l,XA{6.^>8`#]u([qF6.%>x-Z}G<h.]x:a;Rif(*f{BmXM[w5>#ZXoD{)741Mxjz' );

define( 'SECURE_AUTH_SALT', 'Jt]tUu#0<a/%w a6sj30hIhEZ!dFyF<83IIFSAnSItt<<Dz/j]Sz]8.LH]@Ym& _' );

define( 'LOGGED_IN_SALT',   ',=tlZ[A_0nP=G;oZ>Pz{,L2i2jJciL)g$E=fk+4e&E:#,0MEw>kKmGi7QLLgDfmg' );

define( 'NONCE_SALT',       'r_>K6Yglblp <{^J #StI;rh[KxN;i?+3gyZ|Iw!hrirAQM?WK0b Rk%-JaBaM]a' );



/**#@-*/



/**

 * WordPress database table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'wp_';



/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 *

 * For information on other constants that can be used for debugging,

 * visit the documentation.

 *

 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/

 */

define( 'WP_DEBUG', false );



/* Add any custom values between this line and the "stop editing" line. */







/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', __DIR__ . '/' );

}



/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

