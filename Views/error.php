<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Erreur" ?>
    <?php require("./Views/Common/header.php") ?>
  </head>
  <body>
    <?php require("./Views/Common/navbar.php") ?>
    <div class="container-lg">
      <h2>Erreur 404</h2>
      <p>La page <?= $LOCATION . $URL ?> n'existe pas</p>
    </div>
  </body>
</html>
