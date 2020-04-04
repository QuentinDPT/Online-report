<?php
if($User == null){
  header('Location: ' . $LOCATION . '/connexion');
  exit() ;
}

require_once $ROOT . '/Controllers/DomainController.php' ;
require_once $ROOT . '/Controllers/SkillController.php' ;
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Brevets" ?>
    <?php require("./Views/Common/header.php") ?>
    <script src="/src/lib/bootstrap-treeview/treeview.min.js"></script>
  </head>
  <body>
    <?php $NavActive = "patent" ?>
    <?php require("./Views/Common/navbar.php") ?>

    <script type="text/javascript">
      var defaultData = [
        <?php
        $Domains = DomainController::getAll() ;
        foreach($Domains as $i){
        ?>
        {
          text: "<?= $i->name ?>",
          backColor: '<?= $i->color ?>55',
          selectable: false,
          nodes: [
            <?php
            $Skills = SkillController::getByDomainID($i->id);
            foreach($Skills as $j) {
            ?>
            {
              text: "<?= $j->name ?>",
              backColor: '<?= $i->color ?>1C',
              selectable: true,
              skillId: <?= $j->display_id ?>,
            },
            <?php
            }
            ?>
          ]
        },
        <?php
        }
        ?>
      ];
    </script>

    <div class="container-lg">
      <div id="treeview1" class="treeview">

      </div>
    </div>

    <script type="text/javascript">
      $('#treeview1').treeview({
        levels: 1,
        data: defaultData,
        selectedBackColor: "#FFF",
        selectedColor: "#000",
        onNodeSelected: function(event, node) {
          window.location.href = "/brevet/" + node.skillId;
          console.log(node.skillId);
        }
      });
    </script>
  </body>
</html>
