<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Connexion" ?>
    <?php require("./Views/Common/header.php") ?>
  </head>
  <body>
    <?php $NavActive = "connection" ?>
    <?php require("./Views/Common/navbar.php") ?>

    <div class="container-lg">
      <div class="row">
        <form class="col-md-12" action="/api/login" method="post">
          <h2>Se connecter</h2>
          <table class="w-100">
            <tbody>
              <tr>
                <td>
                  <label class="w-100" for="user">Nom d'utilisateur</label>
                </td>
                <td>
                  <input class="w-100" type="text" id="user" name="user" placeholder="TiméoD, EmilieS, RodolpheF">
                </td>
              </tr>
              <tr>
                <td>
                  <label class="w-100" for="password">Mot de passe</label>
                </td>
                <td>
                  <input class="w-100" type="password" id="password" name="password" placeholder="R75fg%l8">
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
                  <input class="btn btn-primary" type="submit" value="Se connecter">
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>
