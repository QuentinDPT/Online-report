<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Mon profil" ?>
    <?php require("./Views/Common/header.php") ?>
  </head>
  <body>
    <?php $NavActive = "profile" ; ?>
    <?php require("./Views/Common/navbar.php") ; ?>
    <div class="container-lg">
      <h2>Modifier mon profile</h2>
      <h3>Compte</h3>
      <table class="w-50">
        <tbody>
          <tr>
            <td>Nom d'utilisateur</td>
            <td>
              <?php echo $User->_login ?>
            </td>
          </tr>
          <tr>
            <td>Mot de passe</td>
            <td>
              <input type="button" class="btn btn-outline-danger" value="Changer">
            </td>
          </tr>
          <tr>
            <td>
              <input type="button" class="btn btn-outline-primary" value="Se déconnecter">
            </td>
          </tr>
        </tbody>
      </table>

      <?php
      if($User->_teacher != null){

      ?>
      <h3>Professeur</h3>
      <p>Nom Prénom</p>
      <?php
      }
      ?>

      <h3>Données personnelles</h3>
      <table class="w-100">
        <tbody>
          <tr>
            <td>Prénom</td>
            <td>
              <input type="text" class="w-100" value="<?php echo $User->_firstName ?>">
            </td>
          </tr>
          <tr>
            <td>Nom</td>
            <td>
              <input type="text" class="w-100" value="<?php echo $User->_name ?>">
            </td>
          </tr>
          <tr>
            <td>Photo</td>
            <td>
              <input type="text" class="w-100" value="<?php echo $User->_avatar ?>">
            </td>
          </tr>
        </tbody>
      </table>

      <h3>Droits</h3>
      <input type="button" class="btn btn-danger" name="" value="Supprimer mon compte">
    </div>

  </body>
</html>
