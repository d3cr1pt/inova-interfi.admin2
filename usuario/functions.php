<?php

require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 *  Listagem de Clientes
 */
function index() {
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