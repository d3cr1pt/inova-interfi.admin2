<?php
session_start();
require_once('../config.php');
require_once(DBAPI);

$customers = null;
$customer = null;

/**
 *  Listagem de Clientes
 */
function index() {
	global $customers;
	$customers = find_all('roteadores');
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
	  save('roteadores', $customer);
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
	global $aparelho;
	$aparelho = find('roteadores', $id);
}
