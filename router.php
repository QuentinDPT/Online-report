<?php

$PageTitle = "Infinte skills" ;
$NavActive = "" ;
$Connected = !($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_SESSION['user'])) ;
$HeaderIncludes = "" ;
$Url = $_SERVER['REQUEST_URI'] ;
$UrlHashed = explode("/",$_SERVER['REQUEST_URI']) ;

switch($UrlHashed[1]){
  case "" :
    header("Location: ./home");
    break ;
  case "home" :
    require("./Views/home.php") ;
    break ;
  case "connection" :
  case "connexion" :
    require("./Views/connection.php") ;
    break ;
  default :
    $content = "" ;
    require("./Views/error.php") ;
    break ;
}
