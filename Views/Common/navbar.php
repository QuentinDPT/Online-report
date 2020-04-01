<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" style="min-width:150px" href="./"><?php echo $PageName ?></a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php echo ($NavActive != "home" ? "\" onclick=\"location.href='./acceuil';" : "active" )?>">
        <div class="nav-link">Acceuil</div>
      </li>
      <?php
        if($User != null){
      ?>
      <li class="nav-item <?php echo ($NavActive != "class" ? "\" onclick=\"location.href='./ma-classe';" : "active" )?>">
        <div class="nav-link">Ma classe</div>
      </li>
      <li class="nav-item <?php echo ($NavActive != "achievements" ? "\" onclick=\"location.href='./mes-reussites';" : "active" )?>">
        <div class="nav-link">Mes réussites</div>
      </li>
      <?php
        }
      ?>
    </ul>
    <?php
      if($User != null){
        echo '<div class="navbar-nav" ' . ($NavActive == "profile" ? "" : 'onclick="location.href = \'mon-profil\';"') . '>' ;
        echo '  <div class="nav-link ' . ($NavActive != "profile" ? "" : "active") . '">' . $User->Name  ;
        echo '    <img class="rounded-circle" style="height:50px; width:50px;" src="' . $User->Avatar . '" alt="Avatar">' ;
        echo '  </div>' ;
        echo '</div>' ;
      }else{
        echo '<input type="button" class="btn btn-light" value="Connexion" ' . ($NavActive == "connection" ? "" : 'onclick="location.href=\'connexion\';"') . '>' ;
      }
    ?>
  </div>
</nav>
