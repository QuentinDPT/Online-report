<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Ma classe" ?>
    <?php require("./Views/Common/header.php") ?>
  </head>
  <body>
    <?php $NavActive = "class" ?>
    <?php require("./Views/Common/navbar.php") ?>
    <div class="container-lg">
      <?php
        require_once $ROOT . "/Controllers/ClassController.php" ;
        $Class = ClassroomController::getClassByTeacherId($User->teacher == null ? $User->id : $User->teacher) ;
      ?>
      <div>
        <?php
        foreach($Class->students as $i ){
        ?>
        <?php
        if($User->teacher == null){
        ?>
        <li class="d-block w-100" style="height: 50px ;" onclick="location.href='./utilisateur/<?php echo $i->login ?>';">
        <?php
        }else{
        ?>
        <span class="d-block w-100" style="height: 50px ;">
        <?php
        }
        echo $i->toHTML() ;
        ?>
      </span>
        <?php
        }
        ?>
      </div>
    </div>
  </body>
</html>
