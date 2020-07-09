<?php

require_once('config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 *  Listagem de Clientes
 */
function login() {
	if (!empty($_POST['customer'])) {
        $lg = $customer['login'];
        $pass = md5($customer['password']);
        $user = $db->query('SELECT * FROM administrators WHERE email = "$lg" AND password = "$pass"');
        if(!empty($user)){
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $user['id_contrato'];
            $_SESSION["name"] = $user['name'];
            $_SESSION["sudo"] = $user['sudo']; 
            header('location: index.php');     
        }
        else{
            header('location: login.php');
        }
    }
	
}

