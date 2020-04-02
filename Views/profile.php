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
      <table class="ml-2 w-50">
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
              <input type="button" class="btn btn-outline-danger" value="Changer" onclick="location.href='./mot-de-passe';">
            </td>
          </tr>
          <tr>
            <td>
              <input type="button" class="btn btn-outline-primary" value="Se déconnecter" onclick="location.href='./api/logout';">
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

      <form class="" action="/api/changeUserInfo" method="post">
        <h3>Données personnelles</h3>
        <table class="ml-2 w-100">
          <tbody>
            <tr>
              <td>Prénom</td>
              <td>
                <input type="text" class="w-100" name="firstName" id="firstName" value="<?php echo $User->firstName ?>">
              </td>
            </tr>
            <tr>
              <td>Nom</td>
              <td>
                <input type="text" class="w-100" name="name" id="name" value="<?php echo $User->name ?>">
              </td>
            </tr>
            <tr>
              <td>Photo</td>
              <td>
                <input type="text" class="w-100" name="avatar" id="avatar" value="<?php echo $User->avatar ?>">
              </td>
            </tr>
          </tbody>
        </table>
        <input type="submit" class="btn btn-outline-dark ml-2" value="Changer mes informations">
      </form>


      <h3>Droits</h3>
      <input type="button" class="btn btn-danger ml-2" name="" value="Supprimer mon compte">
    </div>

  </body>
</html>
