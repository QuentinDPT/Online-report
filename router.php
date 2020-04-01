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
  case "/mon-profil" :
    require("./Views/profile.php") ;
    break ;
  case "/mes-reussites" :
    require("./Views/achievements.php") ;
    break ;
  case "/ma-classe" :
    require("./Views/class.php") ;
    break ;
  default :
    require("./Views/error.php") ;
    break ;
}
