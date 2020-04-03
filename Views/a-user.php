<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}

require_once $ROOT . '/Controllers/UserController.php' ;
$Usr = UserController::getUserByUsername($UserName) ;

require_once $ROOT . '/Controllers/SkillAcquireController.php' ;
$Skills = SkillAcquireController::getSkillAcquireByStudentID($Usr->id) ;
$SkillsObs = SkillAcquireController::getSkillObsByStudentID($Usr->id) ;
$SkillsUnacq = SkillAcquireController::getUnacquiredSkillFromStudentID($Usr->id) ;
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
      <div class="row overflow-auto">
        <?php
        if($Skills == null || count($Skills) == 0){
        ?>
        <p>Pas encore de réussites</p>
        <?php
        }else{
          foreach ($Skills as $i) {
        ?>
        <div class="col-md-4 col-sm-12 text-center patent-container">
          <img src="<?= $i->image ?>">
          <p><?= $i->name ?></p>
          <p><?= $i->note . " " . $i->status ?></p>
        </div>
        <?php
          }
        }
        ?>
      </div>
      <h2>Réussites en cours</h2>
      <div class="row overflow-auto">
        <?php
        if($SkillsObs == null || count($SkillsObs) == 0){
        ?>
        <p>Pas de réussites en cours</p>
        <?php
        }else{
          foreach ($SkillsObs as $i) {
        ?>
        <div class="col-md-4 col-sm-12 text-center patent-container">
          <img src="<?= $i->image ?>">
          <p><?= $i->name ?></p>
          <p><?= $i->note . " " . $i->status ?></p>
        </div>
        <?php
          }
        }
        ?>
      </div>
      <h2>Donner une réussite</h2>
      <div class="row overflow-auto">
        <?php
        if($SkillsUnacq == null || count($SkillsUnacq) == 0){
        ?>
        <p>Plus de réussites à donner</p>
        <?php
        }else{
          foreach ($SkillsUnacq as $i) {
        ?>
        <div class="col-md-4 col-sm-12 text-center">
          <img src="<?= $i->image ?>">
          <p><?= $i->name ?></p>
        </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </body>
</html>

<?php die() ; ?>
