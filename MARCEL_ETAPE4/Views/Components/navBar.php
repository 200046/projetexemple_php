<!-- Code ayant la navBar (menu supérieur ) --> 
<ul class="flexible space-evenly">
            <!-- grand écran -->
            <li class="menu"><a href="index.php">Home</a></li>
        <?php if (isset($_SESSION['user'])) :?>
            <li class="menu"><a href="mesEcoles">Mes écoles</a></li>
            <li class="menu"><a href="profile">Profil</a></li>
            <li class="menu"><a href="deconnexion">Déconnexion</a></li>
        <?php else :?>
            <li  class="menu"><a href="inscription">Inscription</a></li>
            <li  class="menu"><a href="connexion">Connexion</a></li>
        <?php endif ?>
</ul>