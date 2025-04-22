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

// viendront ensuite les opérations sur une école : voir, modifier, supprimer