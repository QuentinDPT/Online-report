<?php
// Application title
$ApplicationName = "Application" ;
$PageName = "" ;

// Location
$URL = $_SERVER['REQUEST_URI'] ;

// User connection
$UserConnected = !($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_SESSION['user'])) ;
