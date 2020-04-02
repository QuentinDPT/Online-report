<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}

require_once $ROOT . '/Controllers/DomainController.php' ;
require_once $ROOT . '/Controllers/SkillController.php' ;
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Brevets" ?>
    <?php require("./Views/Common/header.php") ?>
  </head>
  <body>
    <?php $NavActive = "patent" ?>
    <?php require("./Views/Common/navbar.php") ?>
    <div class="container-lg">
      <h2>Liste des brevets de réussites</h2>

      <?php
      $Domains = DomainController::getAll() ;
      foreach($Domains as $i){
      ?>
      <div class="content-lg" style="background-color:<?php echo $i->color ?>55 ;">
        <h3><?php echo $i->name ?></h3>
        <?php echo $i->description == "" ? "" : "<p>" . $i->description . "</p>" ?>
        <div class="d-flex flex-wrap">
          <?php
          $Skills = SkillController::getByDomainID($i->id);
          foreach($Skills as $j) {
          ?>
          <div class="col-md-4 col-sm-12 text-center" style="background-color:#FFFFFF55 ; padding-top: 16px ;" onclick="location.href='./brevet/<?php echo $j->id ?>';">
            <img src="<?php echo $j->image ?>">
            <p class="text-center"><?php echo $j->name ?></p>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
  </body>
</html>
