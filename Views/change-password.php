<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Changer le mot de passe" ?>
    <?php require("./Views/Common/header.php") ?>
  </head>
  <body>
    <?php $NavActive = "change-password" ; ?>
    <?php require("./Views/Common/navbar.php") ; ?>

    <main>
      <div class="container-lg">
        <div class="row">
          <h2>Changer votre mot de passe</h2>
          <form class="col-md-12" action="/api/change-password" method="post">

            <table class="w-100">
              <tbody>
                <tr>
                  <td>
                    <label class="w-100" for="password-a">Ancien mot de passe</label>
                  </td>
                  <td>
                    <input class="w-100" type="password" id="password-a" name="password-a" placeholder="R75fg%l8">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="w-100" for="password">Nouveau mot de passe</label>
                  </td>
                  <td>
                    <input class="w-100" type="password" id="password" name="password" placeholder="R75fg%l8">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label class="w-100" for="password">Confirmation mot de passe</label>
                  </td>
                  <td>
                    <input class="w-100" type="password" id="password-c" name="password-c" placeholder="R75fg%l8">
                  </td>
                </tr>
              </tbody>
            </table>
            <table class="w-100">
              <tbody>
                <tr>
                  <td>
                    <?php
                      if ( isset($_SESSION['message']) && !empty($_SESSION['message']))
                      {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                      }
                    ?>
                  </td>
                  <td class="text-right">
                    <input class="btn btn-primary" type="submit" value="Changer">
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </main>

  </body>
</html>
