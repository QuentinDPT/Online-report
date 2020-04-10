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

require_once $ROOT . '/Controllers/DomainController.php' ;
require_once $ROOT . '/Controllers/SkillController.php' ;
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = $Usr->firstName ?>
    <?php require("./Views/Common/header.php") ?>
    <script src="/src/scripts/emoji-translation.js"></script>
    <script src="/src/scripts/IO.patent.js"></script>
    <script src="/src/scripts/addPatent.js"></script>
  </head>
  <body>
    <?php $NavActive = "user" ?>
    <?php require("./Views/Common/navbar.php") ?>
    <div class="container-lg d-print-none">
      <h2>Mes réussites</h2>
      <div class="d-flex overflow-auto">
        <?php
        if($Skills == null || count($Skills) == 0){
        ?>
        <p>Pas encore de réussites</p>
        <?php
        }else{
          foreach ($Skills as $i) {
        ?>
        <div class="col-md-4 col-sm-12 text-center patent-container" id="p-<?= $i->id ?>" onclick="patentModifyClick(<?= $i->id ?>)">
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
      <div class="d-flex overflow-auto">
        <?php
        if($SkillsObs == null || count($SkillsObs) == 0){
        ?>
        <p>Pas de réussites en cours</p>
        <?php
        }else{
          foreach ($SkillsObs as $i) {
        ?>
        <div class="col-md-4 col-sm-12 text-center patent-container" id="p-<?= $i->id ?>" onclick="patentModifyClick(<?= $i->id ?>)">
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
      <div class="d-flex overflow-auto">
        <?php
        if($SkillsUnacq == null || count($SkillsUnacq) == 0){
        ?>
        <p>Plus de réussites à donner</p>
        <?php
        }else{
          foreach ($SkillsUnacq as $i) {
        ?>
        <div class="col-md-4 col-sm-12 text-center patent-container" id="p-<?= $i->id ?>" onclick="patentAddClick(<?= $i->id ?>)">
          <img src="<?= $i->image ?>">
          <p><?= $i->name ?></p>
        </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
    <div class="d-none d-print-block">
      <table class="w-100 table">
        <thead>
          <tr>
            <th class="font-weight-bold h1"><?= $Usr->firstName ?></th>
          </tr>
        </thead>
          <tbody>
          <?php
          $Domains = DomainController::getAll() ;
          foreach($Domains as $i){
          ?>
          <tr style="page-break-before: always">
            <th class="h2 text-center" scope="col"><?= $i->name ?></th>
          </tr>
          <tr>
            <td>
              <table class="w-100">
                <tbody>
                  <?php
                    $Skills = SkillController::getByDomainID($i->id);
                    foreach($Skills as $j) {
                  ?>
                  <tr>
                    <td><?= $j->name ?></td>
                    <td>
                      <?php
                      $res = SkillAcquireController::getSkillAcquireBySkillID($j->id) ;
                      if($res != null && $res->id != null){
                        echo $res->getIcon() ;
                      }
                      ?>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>

<?php die() ; ?>
