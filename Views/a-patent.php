<?php
if($User == null || $User->teacher != null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}

if(!is_numeric($PatentId))
  return ;


  require_once $ROOT . '/Controllers/SkillAcquireController.php' ;

require_once $ROOT . '/Controllers/SkillController.php' ;
$patent = SkillController::getByDomainAndCode(($PatentId - $PatentId %100)/100, $PatentId %100) ;
if($patent->id == null)
  return ;

require_once $ROOT . '/Controllers/DomainController.php' ;
$domain = DomainController::getByID(($PatentId-($PatentId%100)) / 100) ;
if($domain->id == null)
  return ;
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Brevet " . $PatentId ?>
    <?php require("./Views/Common/header.php") ?>
    <script src="/src/scripts/emoji-translation.js"></script>
    <script src="/src/scripts/IO.patent.js"></script>
  </head>
  <body>
    <?php $NavActive = "user" ?>
    <?php require("./Views/Common/navbar.php") ?>
    <div class="container-lg">
      <?php
        require_once $ROOT . "/Models/SkillAcquire.php" ;
        require_once $ROOT . "/Controllers/ClassController.php" ;
        $Class = ClassroomController::getClassByTeacherId($User->teacher == null ? $User->id : $User->teacher) ;
      ?>
      <div class="row">
        <?php
        foreach($Class->students as $i ){
          $stored = SkillAcquireController::getSkillAcquireByStudentIDAndPatent($i->id, $patent->id) ;
          if($stored == null){
            $stored = new SkillAcquire(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0) ;
          }
        ?>
        <div class="d-inline-flex justify-content-between w-100" style="height: 50px ;">
          <?= $i->toHTML() ; ?>
          <div class="d-flex justify-content-end col-4 col-md-2 align-items-center">
            <?= SkillAcquire::getHTML_Button($stored->status,$stored->nbobs,$i->id) ?>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
      <div class="row">
        <div class="col-sm-0 col-md-9"></div>
        <input type="button" class="btn btn-primary col-sm-12 col-md-3" value="Valider les modifications">
      </div>
    </div>
  </body>
</html>

<?php die() ; ?>
