<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}
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
  </body>
</html>
