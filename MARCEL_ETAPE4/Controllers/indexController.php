<?php 

require_once("Models/schoolModel.php");
$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    // Récuperer toutes les données de la table school 
    $schools = selectAllSchool($pdo);

    $title = "Page d'accueil";
    $template = "Views/pageAccueil.php";
    require_once("Views/base.php");
}

?>