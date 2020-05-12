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
        <div class="col-12 col-md-4 text-center patent-container" id="p-<?= $i->id ?>" onclick="patentModifyClick(<?= $i->id ?>)">
          <img src="<?= $i->image ?>">
          <p><?= $i->name ?></p>
          <p id="desc-<?= $i->id ?>"><?= $i->note?> </p>
          <script type="text/javascript">
            console.log(document.getElementById("desc-<?= $i->id ?>")) ;
            document.getElementById("desc-<?= $i->id ?>").innerHTML += CodeToEmoji(0,<?=$i->nbobs?>) + CodeToEmoji(<?=$i->status?>) ;
          </script>
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
        <div class="col-12 col-md-4 text-center patent-container" id="p-<?= $i->id ?>" onclick="patentModifyClick(<?= $i->id ?>, <?= $i->id ?>)">
          <img src="<?= $i->image ?>">
          <p><?= $i->name ?></p>
          <p id="desc-<?= $i->id ?>"><?= $i->note?> </p>
          <script type="text/javascript">
            console.log(document.getElementById("desc-<?= $i->id ?>")) ;
            document.getElementById("desc-<?= $i->id ?>").innerHTML += CodeToEmoji(0,<?=$i->nbobs?>) + CodeToEmoji(<?=$i->status?>) ;
          </script>
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
        <div class="col-12 col-md-4 text-center patent-container" id="p-<?= $i->id ?>" onclick="patentAddClick(<?= $i->id ?>)">
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
      <style media="print">
        @page{
          size: A4;
          margin: 0;

          height: 297mm;
          width: 210mm;
        }
        body{
          position: absolute;
          top:0;
          bottom:0;
          right:0;
          left:0;
          padding: 25mm 50mm 25mm 50mm;
        }
      </style>
      <div type="text/css" style="display:flex; flex-direction:column; height:100% ;flex-wrap:wrap;">
        <div class="">
          <h1 class="font-weight-bold h1"><?= $Usr->firstName ?></h1>
          <p>impression du <?= date('d/m/Y à H:i') ?></p>
        </div>
        <?php
        $Domains = DomainController::getAll() ;
        foreach($Domains as $i){
        ?>
        <table class="w-100">
          <thead>
            <th class="h2 text-center w-100" scope="col"><?= $i->name ?></th>
          </thead>
          <tbody>
            <?php
              $Skills = SkillController::getByDomainID($i->id);
              foreach($Skills as $j) {
            ?>
            <tr>
              <td><?= $j->name ?></td>

              <?php
              $res = SkillAcquireController::getSkillAcquireByStudentIDAndPatent($Usr->id,$j->id) ;
              if($res != null && $res->id != null){
              ?>
              <td id="descp-<?= $res->id ?>">
                <script type="text/javascript">
                  document.getElementById("descp-<?= $res->id ?>").innerHTML += CodeToEmoji(0,<?=$res->nbobs?>) + CodeToEmoji(<?=$res->status?>) ;
                </script>
              </td>
              <?php
            }else{
              ?>
              <td id="descp-<?= $res->id ?>">
                ⚪️⚪️⚪️⚪️
              </td>
            <?php
            }
            ?>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        <?php
        }
        ?>
      </div>
    </div>
  </body>
</html>

<?php die() ; ?>
