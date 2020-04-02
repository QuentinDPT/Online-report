<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}

require_once $ROOT . '/Controllers/UserController.php' ;
$Usr = UserController::getUserByUsername($UserName) ;

require_once $ROOT . '/Controllers/SkillAcquireController.php' ;
$Skills = SkillAcquireController::getSkillAcquireByStudentID($Usr->id) ;
var_dump($Skills) ;

$SkillsObs = SkillAcquireController::getSkillObsByStudentID($Usr->id) ;
var_dump($SkillsObs) ;

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = $Usr->firstName ?>
    <?php require("./Views/Common/header.php") ?>
  </head>
  <body>
    <?php $NavActive = "user" ?>
    <?php require("./Views/Common/navbar.php") ?>
    <div class="container-lg">
      <h2>Mes réussites</h2>
      <div class="row">
        <div class="col-md-4 col-sm-12">

        </div>
      </div>
      <h2>Réussites en cours</h2>
      <div class="row">
        <div class="col-md-4 col-sm-12">

        </div>
      </div>
      <h2>Donner une réussite</h2>
      <div class="row">
        <div class="col-md-4 col-sm-12">

        </div>
      </div>
    </div>
  </body>
</html>

<?php die() ; ?>
