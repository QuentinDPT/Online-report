<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky fixed-top mb-3">
  <a class="navbar-brand" style="min-width:150px" href="/"><?php echo $PageName ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo ($NavActive != "home" ? "\" onclick=\"location.href='/acceuil';" : "active" )?>">
        <div class="nav-link">Accueil</div>
      </li>
      <?php
        if($User != null){
      ?>
      <li class="nav-item <?php echo ($NavActive != "class" ? "\" onclick=\"location.href='/ma-classe';" : "active" )?>">
        <div class="nav-link">Ma classe</div>
      </li>
      <?php
          if($User->teacher == null){
      ?>
      <li class="nav-item <?php echo ($NavActive != "patent" ? "\" onclick=\"location.href='/brevets';" : "active" )?>">
        <div class="nav-link">Brevets</div>
      </li>
      <?php
          }else{
      ?>
      <li class="nav-item <?php echo ($NavActive != "achievements" ? "\" onclick=\"location.href='/mes-reussites';" : "active" )?>">
        <div class="nav-link">Mes réussites</div>
      </li>
      <?php
          }
      ?>

      <?php
        }
      ?>
    </ul>
    <?php
      if($User != null){
        echo '<div class="navbar-nav" ' . ($NavActive == "profile" ? "" : 'onclick="location.href = \'/mon-profil\';"') . '>' ;
        echo '  <div class="nav-link ' . ($NavActive != "profile" ? "" : "active") . '">' ;
        echo      '<div class="d-inline">' . $User->firstName . " " .  $User->name . '</div>' ;
        echo '    <img class="rounded-circle" style="height:50px; width:50px;" src="' . $User->avatar . '" alt="Avatar">' ;
        echo '  </div>' ;
        echo '</div>' ;
      }else{
        echo '<input type="button" class="btn btn-light" value="Connexion" ' . ($NavActive == "connection" ? "" : 'onclick="location.href=\'connexion\';"') . '>' ;
      }
    ?>
  </div>
</nav>
