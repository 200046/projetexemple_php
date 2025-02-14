<!-- Code ayant toutes les écoles répertoriées -->
<h1>Liste des écoles répertoriées</h1>

<div class="flexible wrap space-around">
    <?php foreach ($schools as $school) : ?>
        <div class="border card">
            <h2 class="center"><?= $school->schoolNom ?></h2>
            <div>
                <div class="flexible blocImageEcole"><img src="<?= $school->schoolImage ?>" alt="Photo de l'école" /></div>
                <div class="center">
                    <p>
                        <span><?= $school->schoolAdresse ?></span> -
                        <span><?= $school->schoolCodePostal . " " . $school->schoolVile ?></span>
                    </p>
                </div>
                <a href="voirEcole.php" class="btn btn-page">Voir l'école</a>
            </div>
        </div>
    <?php endforeach ?>
</div>