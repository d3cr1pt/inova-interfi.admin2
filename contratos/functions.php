<?php
session_start();
require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 *  Listagem de Contrato
 */
function index() {
	$db = open_database();
	global $customers;
	$customers = find('contrato');
	
}

function clear_messages() {
	unset($_SESSION['message']);
}

/**
 *  Cadastro de Contrato
 */
function add() {

	if (!empty($_POST['customer'])) {
	  
	  $today = 
		date_create('now', new DateTimeZone('America/Sao_Paulo'));
		
	  $customer = $_POST['customer'];
	  $pass = filter_input(INPUT_POST,'senha_socio');
	  $customer['senha_socio'] = md5($pass);
	  $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
	  save('contrato', $customer);
	  header('location: index.php');
	}
  }


  /**
 *	Atualizacao/Edicao de contrato
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
		update('contrato', $id, $customer);
		header('location: index.php');
	  } else {
  
		global $customer;
		$customer = find('contrato', $id);
	  } 
	} else {
	  header('location: index.php');
	}
  }

/**
 *  Visualização de um contrato
 */

function view($id) {
	global $customer;
	$customer = find('contrato',$id);
}


  function delete($id) {
	$db = open_database();
	$query = $db->query("DELETE FROM contrato WHERE id = '$id'");
	header('location: ./');
  }