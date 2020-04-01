<?php
require("./vars.php") ;

switch($URL){
  case "/" :
    header("Location: acceuil");
    break ;
  case "/acceuil" :
    require("./Views/home.php") ;
    die() ;
  case "/connexion" :
    require("./Views/connection.php") ;
    die() ;
  case "/mon-profil" :
    require("./Views/profile.php") ;
    die() ;
  case "/mes-reussites" :
    require("./Views/achievements.php") ;
    die() ;
  case "/ma-classe" :
    require("./Views/class.php") ;
    die() ;
}

http_response_code(404);
require("./Views/error.php") ;
