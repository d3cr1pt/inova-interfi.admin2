<?php
session_start();
require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 * Limpa as mensagens do banco
 */
function clear_messages() {
	unset($GLOBALS['messages']);
}

function isADM() {
	if($_SESSION['sudo'] == "1") {
		return true;
	}
	return false;
}

/**
 *  Listagem de Clientes
 */
function index() {
	global $customers;
	$customers = find_all('aparelhos');
}

/**
 *  Cadastro de Clientes
 */
function add() {

	if (!empty($_POST['customer'])) {
	  
	  $today = 
		date_create('now', new DateTimeZone('America/Sao_Paulo'));
  
	  $customer = $_POST['customer'];
	  $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
	  save('aparelhos', $customer);
	  header('location: index.php');
	}
  }



  function restart($id) {
	require('../inc/ubnt.php');
  	/* Controller Server */
	$unifiServer =  "https://ubnt.interfi.net:8443";  
	/* Controller admin user */
	$unifiUser = "d3cr1pt";
	/* Controller admin pass */
	$unifiPass = "xyloksmith1@";
	/* Controller version */
	$unifiVersion = "5.13.29";
	/* Controller site */
	$unifiSite = "default";
	$unifi_connection = new UniFi_API\Client($unifiUser, $unifiPass, $unifiServer, $unifiSite, $unifiVersion, false);
	$login            = $unifi_connection->login();
	$customers = find('aparelhos', $id);
	$unifi_connection->restart_device($customers['mac_aparelho']);
	header('location: ./');
}

function upgrade($id) {
	require('../inc/ubnt.php');
/* Controller Server */
$unifiServer =  "https://ubnt.interfi.net:8443";  
	/* Controller admin user */
	$unifiUser = "d3cr1pt";
	/* Controller admin pass */
	$unifiPass = "xyloksmith1@";
	/* Controller version */
	$unifiVersion = "5.13.29";
	/* Controller site */
	$unifiSite = "default";
	$unifi_connection = new UniFi_API\Client($unifiUser, $unifiPass, $unifiServer, $unifiSite, $unifiVersion, false);
	$login            = $unifi_connection->login();
	$customers = find('aparelhos', $id);
	$unifi_connection->upgrade_device($customers['mac_aparelho']);		
	header('location: ./');
}

function view($id) {
	$db = open_database();
	global $aparelho;
	$aparelho = find('aparelhos', $id);
	$id_contrato = $aparelho['id_contrato'];
	global $customer;
	$customer = find('contrato',$id_contrato);
	global $sessions;
	$query3 = $db->query("SELECT COUNT(sessions.id) AS usuarios_conectados FROM sessions LEFT JOIN users ON (sessions.user_id=users.id) LEFT JOIN contrato ON (users.id_contrato=contrato.id) WHERE id_contrato = '$id_contrato'");
	$sessions = $query3->fetch_assoc();
}

function acessos_roteadores() {
	global $customers;
	if(!isADM()) {
		header("Location: acessos_roteadores.php?id=".$_SESSION['id_contrato']);
	}
	$db = open_database();
	$SQL = "SELECT * FROM contrato";
	$query = $db->query($SQL);
	$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
}
function acessos_roteadores_contrato($id) {
	global $customers;
	$db = open_database();
	$SQL = "SELECT * FROM aparelhos WHERE id_contrato='$id'";
	$query = $db->query($SQL);
	$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
}