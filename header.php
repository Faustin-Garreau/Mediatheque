<?php
require_once('config.php');

?>
    <header>
    <nav class="navbar navbar-expand-lg header_nav">
  <div class="container-fluid">
    <a href="livre.php">
    <img width="100px" src="images/livre.png" alt="livres">
    </a>
      <div class="navbar-nav">
          <?php if($_SESSION['admin'] == 1) {?>
        <a style="color: white;" class="nav-link header_link" aria-current="page" href="user.php">Liste utilisateurs</a>
        <a style="color: white;" class="nav-link header_link" href="ajouter_livre.php">Ajouter un livre</a>
        <a style="color: white;" class="nav-link header_link" href="#">Livre empruntés</a>
        <a style="color: white;" class="nav-link header_link" href="deconnexion.php">Se deconnecter</a>
        <?php  }else { ?>
            <a style="color: white;" class="nav-link header_link" href="deconnexion.php">Se deconnecter</a>
        <?php } ?>
    </div>  
  </div>
</nav>
    </header>
