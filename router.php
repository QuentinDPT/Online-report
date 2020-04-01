<?php
require("./vars.php") ;

switch($URL){
  case "/" :
    header("Location: acceuil");
    break ;
  case "/acceuil" :
    require("./Views/home.php") ;
    break ;
  case "/connexion" :
    require("./Views/connection.php") ;
    break ;
  default :
    require("./Views/error.php") ;
    break ;
}
