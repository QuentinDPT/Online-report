<?php
// Application title
$ApplicationName = "Ma classe" ;
$PageName = "" ;

// Nav Active
$NavActive = "" ;

// Location
$URL = $_SERVER['REQUEST_URI'] ;

// User connection
$User = null ;
if(!($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_SESSION['user']))){
  require("./Controllers/UserController.php") ;
  $User = new \stdClass() ;
  $User->Avatar = "https://www.gettyimages.fr/gi-resources/images/500px/983794168.jpg" ;
  $User->Name = "Quentin" ;
}
