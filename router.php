<?php
require_once "./vars.php" ;

// URLs
switch($URL){
  case "/" :
    header("Location: acceuil");
    die() ;
    break ;
  case "/acceuil" :
    require("./Views/home.php") ;
    die() ;
  case "/connexion" :
    require("./Views/connection.php") ;
    die() ;
}

// URLs User Connected
switch($URL){
  case "/mot-de-passe" :
    require("./Views/change-password.php") ;
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
  case "/brevets" :
    require("./Views/patent.php") ;
    die() ;
}

// URLs Teacher Connected
switch($URL){
  case "/mon-profil" :
    require("./Views/profile.php") ;
    die() ;
  case "/mes-reussites" :
    require("./Views/achievements.php") ;
    die() ;
  case "/ma-classe" :
    require("./Views/class.php") ;
    die() ;
  case "/brevets" :
    require("./Views/patent.php") ;
    die() ;
}

// APIs
switch($URL){
  case "/api/login" :
    require("./API/login.php") ;
    die() ;
  case "/api/logout" :
    require("./API/logout.php") ;
    die() ;
  case "/api/getClass" :
    require("./API/getClass.php") ;
    die() ;
}

http_response_code(404);
require("./Views/error.php") ;
