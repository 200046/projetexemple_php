<?php
// appel au modèle pour la gestion des écoles
require_once "Models/schoolModel.php";

// récupération du chemin désiré
$uri = $_SERVER["REQUEST_URI"];

if($uri === "/mesEcoles"){
    // rappel de la page d'accueil adaptée avec vérification de l'état de connexion
    $schools = selectMySchools($pdo);

    $title = "Mes Écoles";                                   //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/pageAccueil.php";                    //chemin vers la vue demandée
    require_once "Views/base.php";                          //appel de la page de base qui sera remplie avec la vue demandée
} elseif ($uri === "/createSchool"){

} 
// ceci n'est possible que si on dispose d'un id pour l'école => isset($_GET["schoolId"])
elseif (isset($_GET["schoolId"]) && $uri === "/voirEcole?schoolId=" . $_GET["schoolId"]) {
    // rechercher les données de l'école concernée ainsi que les options correspondantes
    $school = selectOneSchool($pdo);
    $options = selectOptionsActiveSchool($pdo);
    $title = "Ajout d'une école";                                   //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/Schools/voirEcole.php";                    //chemin vers la vue demandée
    require_once "Views/base.php";                          //appel de la page de base qui sera remplie avec la vue demandée
}

//Mise à jour des données d'une école
elseif (isset($_GET["schoolId"]) && $uri === "/updateEcole?schoolId=" . $_GET["schoolId"]) {
    // si on a validé des modifications
    if (isset($_POST['btnEnvoi'])) {
        updateSchool($pdo); //mettre à jour la table school
        // pour mettre à jour les options, il faut d'abord supprimer les anciennes, puis réécrire les nouvelles
        deleteOptionSchool($pdo, $_GET["schoolId"]);
        for ($i = 0; $i < count($_POST["options"]); $i++) {
            $optionScolaireId = $_POST["options"][$i];
            // attention qu'il ne s'agit plus nécessairement du lastIndex !
            ajouterOptionsEcole($pdo, $_GET["schoolId"], $optionScolaireId);
        }
        header("location: /mesEcoles");
    }
    // rechercher les données de l'école concernée ainsi que les options correspondantes
    $school = selectOneSchool($pdo);
    $optionsActiveSchool = selectOptionsActiveSchool($pdo);
    $options = selectAllOptions($pdo);
    $title = "Mise à jour d'une école";                                   //titre à afficher dans l'onglet de la page du navigateur
    $template = "Views/Schools/editOrCreateSchool.php";                    //chemin vers la vue demandée
    require_once "Views/base.php";                          //appel de la page de base qui sera remplie avec la vue demandée
}
// suppression de l'école courante
elseif (isset($_GET["schoolId"]) && $uri === "/deleteEcole?schoolId=" . $_GET["schoolId"]) {
    // attention à l'ordre : supprimer les dépendances d'abord !
    deleteOptionSchool($pdo, $_GET["schoolId"]);
    deleteOneSchool($pdo);
    header("location: /mesEcoles");
}