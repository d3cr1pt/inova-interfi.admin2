<?php

require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

function isADM2() {
	if($_SESSION['sudo'] == "1") {
		return true;
	}
	return false;
}

/**
 *  Listagem de Clientes
 */
function index() {
	if(!isADM2()) {
		header("Location: ../relatorios/conectados_contrato_contrato.php?id=".$_SESSION['id_contrato']);
	}
	global $customers;
	$db = open_database();
	$query = $db->query('SELECT users.* FROM users LEFT JOIN contrato ON (users.id_contrato=contrato.id)');
	while($customer=$query->fetch_assoc()){
		$customers[] = $customer;
	}
}

function view($id) {
	global $customer;
	$customer = find('users',$id);
}