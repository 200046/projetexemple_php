<h1 class="center">Page profil</h1>
<div class="flexible wrap space-around">
    <div class="border card">
        <h2 class="center">Informations</h2>
        <p>Nom: <?= $_SESSION['user']->nomUser ?></p>
        <p>Prénom: <?= $_SESSION['user']->prenomUser ?></p>
        <p>Email: <?= $_SESSION['user']->emailUser ?></p>
        <p>Login: <?= $_SESSION['user']->loginUser ?></p>
        <div class="center">
            <a href="inscriptionOrEditeProfile.php" class="btn btn-page">Modifier</a>
        </div>
    </div>
</div>
