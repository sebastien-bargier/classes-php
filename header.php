<nav>
  <ul>
    <?php if($_SESSION) : ?>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>

    <?php else : ?>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>

    <?php endif ?>

    </li>
  </ul>
</nav>