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
		unset($_SESSION['message']);
	}

	function isADM2() {
		if($_SESSION['sudo'] == "1") {
			return true;
		}
		return false;
	}

  function configurar_captive_edit($id) {
	  if(!empty($_POST['customer'])) {
		$customer = $_POST['customer'];
		update('settings', $id, $customer);
		echo "<script>window.history.go(-2)</script>";
	  } else {
		  global $captive;
		  $captive = find('settings',$id);
	  }
  }

  function config_guest_edit($id) {
	if(!empty($_POST['customer'])) {
	  $customer = $_POST['customer'];
	  update('settings', $id, $customer);
	  echo "<script>window.history.go(-2)</script>";
	} else {
		global $captive;
		$captive = find('settings',$id);
	}
}

	function acessos_roteadores() {
		global $customers;
		if(!isADM2()) {
			header("Location: acessos_roteadores_contrato.php?id=".$_SESSION['id_contrato']);
		}
		$db = open_database();
		$SQL = "SELECT * FROM contrato";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function acessos_contrato() {
		global $customers;
		if(!isADM2()) {
			header("Location: acessos_contrato_contrato.php?id=".$_SESSION['id_contrato']);
		}
		$db = open_database();
		$SQL = "SELECT * FROM contrato";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function configurar_captive() {
		global $customers;
		if(!isADM2()) {
			header("Location: configurar_captive_contrato.php?id=".$_SESSION['id_contrato']);
		}
		$db = open_database();
		$SQL = "SELECT * FROM contrato";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function config_guest() {
		global $customers;
		if(!isADM2()) {
			header("Location: config_guest_contrato.php?id=".$_SESSION['id_contrato']);
		}
		$db = open_database();
		$SQL = "SELECT * FROM contrato";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function acessos_roteadores_contrato($id) {
		global $customers;
		$db = open_database();
		$SQL = "SELECT * FROM aparelhos WHERE id_contrato='$id' ORDER BY id_aparelho ASC";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function conectados_contrato() {
		global $customers;
		if(!isADM2()) {
			header("Location: configurar_captive_contrato.php?id=".$_SESSION['id_contrato']);
		}
		$db = open_database();
		$SQL = "SELECT * FROM contrato";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function equipamentos_contrato() {
		global $customers;
		if(!isADM2()) {
			header("Location: equipamentos_contrato_contrato.php?id=".$_SESSION['id_contrato']);
		}
		$db = open_database();
		$SQL = "SELECT * FROM contrato";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function disponibilidade_roteadores() {
		global $customers;
		if(!isADM2()) {
			header("Location: disponibilidade_roteadores_contrato.php?id=".$_SESSION['id_contrato']);
		}
		$db = open_database();
		$SQL = "SELECT * FROM contrato";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function firmware_upgrade() {
		global $customers;
		if(!isADM2()) {
			header("Location: firmware_upgrade_contrato.php?id=".$_SESSION['id_contrato']);
		}
		$db = open_database();
		$SQL = "SELECT * FROM contrato";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function configurar_captive_contrato($id) {
		global $customers;
		$db = open_database();
		$SQL = "SELECT * FROM settings WHERE id_contrato='$id'";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function config_guest_contrato($id) {
		global $customers;
		$db = open_database();
		$SQL = "SELECT * FROM settings WHERE id_contrato='$id' AND param LIKE '%link_limit'";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function conectados_contrato_contrato($id) {
		global $customers;
		$db = open_database();
		$SQL = "SELECT * FROM users WHERE id_contrato='$id'";
		$query = $db->query($SQL);
		$customers=[]; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function equipamentos_contrato_contrato($id) {
		global $customers;
		$db = open_database();
		$SQL = "SELECT * FROM aparelhos WHERE id_contrato='$id'";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function squid_blacklist_contrato($id) {
		global $customers;
		$db = open_database();
		$SQL = "SELECT * FROM black_list WHERE id_contrato='$id'";
		$query = $db->query($SQL);
		$customers = []; while($customer=$query->fetch_assoc()) { $customers[]=$customer; }
	}

	function squid_blacklist_add() {
		if(!empty($_POST['customer'])) {
			($customer = $_POST['customer']);
			$db = open_database();
			$SQL = "INSERT INTO black_list (fqdn,id_contrato) VALUES ('".$customer['fqdn']."','".$customer['id_contrato']."')";
			$db->query($SQL);
			header("Location: squid_blacklist.php");
		}
	}

	function squid_blacklist_view($id) {
		global $customer;
		$db = open_database();
		$SQL = "SELECT * FROM black_list WHERE id = '$id'";
		$query = $db->query($SQL);
		$customer = $query->fetch_assoc();
	}

	function squid_blacklist_delete($id) {
		$db = open_database();
		echo $SQL = "DELETE FROM black_list WHERE id = '$id'";
		$query = $db->query($SQL);
		header("Location: squid_blacklist.php");
	}