<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}
if(!is_numeric($PatentId))
  return ;

require_once $ROOT . '/Controllers/SkillController.php' ;
$patent = SkillController::getByID($PatentId) ;
if($patent->id == null)
  return ;

require_once $ROOT . '/Controllers/DomainController.php' ;
$domain = DomainController::getByID($PatentId%100) ;
if($domain->id == null)
  return ;
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Brevet : " . $patent->id ?>
    <?php require("./Views/Common/header.php") ?>
  </head>
  <body>
    <?php $NavActive = "user" ?>
    <?php require("./Views/Common/navbar.php") ?>
    <div class="container-lg">
    </div>
  </body>
</html>

<?php die() ; ?>
