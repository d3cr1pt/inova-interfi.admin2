<?php

/** O nome do banco de dados*/
define('DB_NAME', 'hotspot');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'admin');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'Mad@admin2020');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/inova-interfi.admin2/');
	
/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
define('DBAPI', ABSPATH . 'inc/database.php');
define('UNIFI_SERVER_IP','35.199.100.36');
define('UNIFI_SERVER',"https://".UNIFI_SERVER_IP.":8443");
define('UNIFI_LOGIN','d3cr1pt');
define('UNIFI_PASSWORD','xyloksmith1@');
define('UNIFI_VERSION','5.13.29');
ini_set('display_errors', 1);
ini_set('expose_php',0);