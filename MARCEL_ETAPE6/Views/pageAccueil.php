<?php if ($uri == '/mesecoles') : ?>
    <h1>Vos écoles</h1>
<?php else : ?>
    <h1>Liste des écoles répertoriées</h1>
<?php endif; ?>

<?php if (isset($_SESSION["user"])) : ?>
    <p><a href="/deleteschool?schoolId=<?= $school->schoolId ?>" class="petitsLiens lienModif">Supprimer l'école</a></p>
    <p><a href="/updateEcole?schoolId=<?= $school->schoolId ?>" class="petitsLiens lienModif">Modifier l'école</a></p>
<?php endif; ?>

<div class="flexible wrap space-around">
    <?php foreach ($schools as $school) : ?>
        <div class="border card">
            <h2 class="center"><?= $school->schoolNom ?></h2>
            <div class="flexible discImageEcole">
                <img src="<?= $school->schoolImage ?>" alt="photo de l'école">
            </div>
            <div class="center">
                <p><span class=""><?= $school->schoolAdresse ?></span> - <span><?= $school->schoolCodePostal ?></span>, <?= $school->schoolVille ?></p>
                <h3><a href="voirecole.php" class="btn btn-page">Voir l'école</a>
                </h3>
                <?php if ($uri == '/mesecoles') : ?>
                    <p><a href="/deleteschool?schoolId=<?= $school->schoolId ?>">Supprimer l'école</a></p>
                    <p><a href="/updateschool?schoolId=<?= $school->schoolId ?>">Modifier l'école</a></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>