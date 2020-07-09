<?php

require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 *  Listagem de Clientes
 */
function index() {
	$db = open_database();
	global $customers;
	$customers = $db->query('SELECT administrators.*, contrato.cnpj, contrato.razao_social FROM administrators LEFT JOIN contrato ON (administrators.id_contrato=contrato.id)');
	
}

/**
 *  Cadastro de Clientes
 */
function add() {

	if (!empty($_POST['customer'])) {
	  
	  $today = 
		date_create('now', new DateTimeZone('America/Sao_Paulo'));
		
	  $customer = $_POST['customer'];
	  $pass = filter_input(INPUT_POST,'pass');
	  $customer['password'] = md5($pass);
	  $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
	  $customer['sudo'] = 0;
	  save('administrators', $customer);
	//   header('location: index.php');
	}
  }


  /**
 *	Atualizacao/Edicao de Cliente
 */
function edit() {

	$now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
  
	if (isset($_GET['id'])) {
  
	  $id = $_GET['id'];
  
	  if (isset($_POST['customer'])) {
  
		$customer = $_POST['customer'];
		$customer['modified'] = $now->format("Y-m-d H:i:s");
		$pass = filter_input(INPUT_POST,'pass');
	  	$customer['password'] = md5($pass);
		update('administrators', $id, $customer);
		header('location: index.php');
	  } else {
  
		global $customer;
		$customer = find('administrators', $id);
	  } 
	} else {
	  header('location: index.php');
	}
  }

/**
 *  Visualização de um Cliente
 */
function view($id = null) {
	$today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
	$db = open_database();
	global $customer;
	$query = $db->query("SELECT * FROM administrators LEFT JOIN contrato ON (administrators.id_contrato=contrato.id) WHERE administrators.id = $id");
	$customer = $query->fetch_assoc();
	global $aparelhos;
	$id_contrato = $customer['id_contrato'];
	$query2 = $db->query("SELECT * FROM aparelhos WHERE id_contrato='$id_contrato' ORDER BY id_aparelho ASC");
	$array1 = [];
	while($row=$query2->fetch_assoc()) {
		$array1[]=$row;
	}
	$aparelhos = $array1;
	global $sessions;
	$query3 = $db->query("SELECT COUNT(sessions.id) AS usuarios_conectados FROM sessions LEFT JOIN users ON (sessions.user_id=users.id) LEFT JOIN contrato ON (users.id_contrato=contrato.id) WHERE id_contrato = '$id_contrato'");
	$sessions = $query3->fetch_assoc();
  }

  function delete($id) {
	$db = open_database();
	$query = $db->query("DELETE FROM administrators WHERE id = '$id'");
	header('location: ./');
  }