<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	session_start();
}

$ROOT = dirname(dirname(__FILE__)) . "/www" ;
$LOCATION = "http://localhost" ;

// Application title
$ApplicationName = "La classe" ;
$PageName = "" ;

// Nav Active
$NavActive = "" ;

// Location
$URL = $_SERVER['REQUEST_URI'] ;

// User connection
$User = null ;
if(!($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_SESSION['user']))){
	require_once $ROOT . "/Models/User.php" ;
	$User = unserialize($_SESSION['user']) ;
}
