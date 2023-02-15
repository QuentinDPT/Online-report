<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Accueil" ?>
    <?php require("./Views/Common/header.php") ?>

    <script type="text/javascript" src="./src/lib/ThreeJs/three.js"></script>
    <script type="text/javascript" src="./src/lib/ThreeJs/OBJLoader.js"></script>
    <script type="text/javascript" src="./src/lib/ThreeJs/MTLLoader.js"></script>
    <script type="text/javascript" src="./src/lib/ThreeJs/OBJMTLLoader.js"></script>

    <script type="text/javascript" src="./src/lib/ThreeJs/stats.js"></script>
    <script type="text/javascript" src="./src/lib/ThreeJs/dat.gui.js"></script>

  </head>
  <body>
    <?php $NavActive = "home" ?>
    <?php require("./Views/Common/navbar.php") ?>

    <div id="Stats-output">
    </div>

  </body>
</html>
