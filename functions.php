<?php

require_once('config.php');
require_once(DBAPI);
session_start();
$customers = null;
$customer = null;

/**
 *  Listagem de Clientes
 */
function login() {
    echo "<br>";
	if (!empty($_POST['customer'])) {
        $customer = $_POST['customer'];
        $db = open_database();
        $lg = $customer["'login'"];
        $pass = md5($customer["'password'"]);
        $check_user = $db->query($sql = 'SELECT * FROM administrators WHERE email = "'.$lg.'" AND password = "'.$pass.'"');
        // echo $sql;
        // var_dump($check_user);
        if($check_user->num_rows > 0){
            $user = $check_user->fetch_assoc();
            $_SESSION["loggedin"] = true;
            $_SESSION["id_user"]     = $user['id'];
            $_SESSION["id_contrato"] = $user['id_contrato'];
            $_SESSION["name"]        = $user['name'];
            $_SESSION["sudo"]        = $user['sudo']; 
            header('location: '.BASEURL.'index.php');     
        }
        else{
            echo $url = "Location: ".BASEURL."login.php";
            header($url);
        }
    }
	
}

