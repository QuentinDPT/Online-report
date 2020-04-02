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
      <table class="w-100">
        <?php
        if($User->_teacher == null){
          require_once $ROOT . "/Controllers/ClassController.php" ;
          $Class = new ClassroomController($User->_id) ;
          $Class->parseDB() ;
        ?>
        <thead>
          <tr>
            <th>Nom d'utilisateur</th>
            <th>Élève</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($Class->_students as $i ){
          ?>
          <tr style="height:50px;">
            <td><?php echo $i->_login ?></td>
            <td>
              <?php echo ($i->_avatar == null ? "" : '<img style="width:50px; height:50px;" class="rounded-circle" src="' . $i->_avatar . '">')?>
              <?php echo $i->_firstName . " " . $i->_name ?>
            </td>
            <td>
              <input type="button" class="btn btn-danger w-100" value="Supprimer">
            </td>
          </tr>
          <?php
          }
          ?>
          <tr>
            <td>
              <input type="text" class="w-100" name="login" id="login" value="" placeholder="Login">
            </td>
            <td>
              <input type="text" class="w-50" name="firstName" id="firstName" value="" placeholder="Prénom"><input type="text" class="w-50" name="name" id="name" value="" placeholder="Nom">
            </td>
            <td>
              <input type="submit" class="btn btn-primary w-100" value="Ajouter">
            </td>
          </tr>
        </tbody>
        <?php
        }else{
          require_once $ROOT . "/Controllers/ClassController.php" ;
          $Class = new ClassroomController($User->_teacher) ;
          $Class->parseDB() ;
          var_dump($Class) ;
        ?>
        <thead>
          <tr>
            <th>Élève</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($Class->_students as $i ){
          ?>

          <?php
          }
          ?>
        </tbody>
        <?php
        }
        ?>
      </table>
    </div>
  </body>
</html>
