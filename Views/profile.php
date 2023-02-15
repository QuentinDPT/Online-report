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
      <div class="card mt-3">
        <div class="card-header">
          <h3>Compte</h3>
        </div>
        <div class="card-body">
          <table class="ml-2 w-50">
            <tbody>
              <tr>
                <td>Nom d'utilisateur</td>
                <td>
                  <?php echo $User->login ?>
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
        </div>
      </div>

        <?php
        if($User->teacher != null){
          require_once $ROOT . "/Controllers/UserController.php" ;
          $teacher = UserController::getUserById($User->teacher) ;
        ?>
      <div class="card mt-3">
        <div class="card-header">
          <h3>Professeur</h3>
        </div>
        <div class="card-body">
          <?php echo $teacher->toHTML() ?>
        </div>
      </div>
        <?php
        }
        ?>

      <form class="" action="/api/changeUserInfo" method="post">
        <div class="card mt-3">
          <div class="card-header">
            <h3>Données personnelles</h3>
          </div>
          <div class="card-body">
            <table class="ml-2 w-100">
              <tbody>
                <tr>
                  <td>Prénom</td>
                  <td>
                    <input type="text" class="w-100 form-control" name="firstName" id="firstName" value="<?php echo $User->firstName ?>">
                  </td>
                </tr>
                <tr>
                  <td>Nom</td>
                  <td>
                    <input type="text" class="w-100 form-control" name="name" id="name" value="<?php echo $User->name ?>">
                  </td>
                </tr>
                <tr>
                  <td>Photo</td>
                  <td>
                    <input type="text" class="w-100 form-control" name="avatar" id="avatar" value="<?php echo $User->avatar ?>">
                  </td>
                </tr>
              </tbody>
            </table>
            <input type="submit" class="btn btn-outline-dark ml-2" value="Changer mes informations">
          </div>
        </div>
      </form>

      <div class="card mt-3">
        <div class="card-header">
          <h3>Paramètres</h3>
        </div>
        <div class="card-body">
          <div class="d-flex flex-column ml-2 pr-3 p-0 col-xl-3 col-md-4 col-12">
            <input type="button" class="btn btn-secondary w-100" name="" value="Proposer des modifications" onclick="window.open('https://github.com/QuentinDPT/Online-report/issues','_blank');">
            <input type="button" class="btn btn-warning mt-2 w-100" name="" value="Signaler un problème" onclick="window.open('https://github.com/QuentinDPT/Online-report/issues/new','_blank');">
            <input type="button" class="btn btn-danger mt-2 w-100" name="" value="Supprimer mon compte">
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
