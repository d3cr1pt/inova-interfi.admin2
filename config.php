<?php

/** O nome do banco de dados*/
define('DB_NAME', 'hotspot');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'rukito');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'rukito123');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/admin2/');
	

/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');

define('DBAPI', ABSPATH . 'inc/database.php');
ini_set('display_errors', 1);