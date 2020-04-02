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
      <ul>
        <?php
        foreach($Class->students as $i ){
        ?>
        <li class="d-block w-100" style="height: 50px ;" onclick="location.href='./utilisateur/<?php echo $i->login ?>';">
          <div class="d-inline-block text-center" style="height: 50px ;">
            <?php echo $i->avatar != "" ? "<img class='rounded-circle' style='height:50px ; width:50px ;' src='" . $i->avatar . "'>" : "<i style='display:inline-block; height:50px ; width:50px ;vertical-align: middle;'></i>" ?>
            <?php echo $i->firstName ?> <?php echo $i->name ?>
          </div>
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </body>
</html>
