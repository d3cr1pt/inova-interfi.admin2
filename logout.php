<?php
session_start();
$today = new DateTime();
$operation = 2;
$id_user = $_SESSION['id_user'];
$datetime = $today->format("Y-m-d H:i:s");
$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
$SQL = "INSERT INTO history (operation,id_user,datetime,ip) VALUES ('$operation','$id_user','$datetime','$ip')";
require './config.php';
require DBAPI;
$db = open_database();
$query = $db->query($SQL);
// echo $SQL;
// echo $db->error;
// echo $db->insert_id;
session_destroy();
header("Location:".BASEURL."login.php");